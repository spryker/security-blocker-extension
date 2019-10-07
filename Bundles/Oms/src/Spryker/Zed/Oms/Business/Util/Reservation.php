<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Oms\Business\Util;

use Generated\Shared\Transfer\OmsProcessTransfer;
use Generated\Shared\Transfer\OmsStateCollectionTransfer;
use Generated\Shared\Transfer\OmsStateTransfer;
use Generated\Shared\Transfer\SalesOrderItemStateAggregationTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use Spryker\DecimalObject\Decimal;
use Spryker\Zed\Oms\Dependency\Facade\OmsToStoreFacadeInterface;
use Spryker\Zed\Oms\Persistence\OmsQueryContainerInterface;
use Spryker\Zed\Oms\Persistence\OmsRepositoryInterface;

class Reservation implements ReservationInterface
{
    /**
     * @var \Spryker\Zed\Oms\Persistence\OmsQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \Spryker\Zed\Oms\Dependency\Plugin\ReservationHandlerPluginInterface[]
     */
    protected $reservationHandlerPlugins;

    /**
     * @var \Spryker\Zed\Oms\Dependency\Facade\OmsToStoreFacadeInterface
     */
    protected $storeFacade;

    /**
     * @var \Spryker\Zed\Oms\Business\Util\ActiveProcessFetcherInterface
     */
    protected $activeProcessFetcher;

    /**
     * @var \Spryker\Zed\Oms\Persistence\OmsRepositoryInterface
     */
    protected $omsRepository;

    /**
     * @param \Spryker\Zed\Oms\Business\Util\ActiveProcessFetcherInterface $activeProcessFetcher
     * @param \Spryker\Zed\Oms\Persistence\OmsQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\Oms\Dependency\Plugin\ReservationHandlerPluginInterface[] $reservationHandlerPlugins
     * @param \Spryker\Zed\Oms\Dependency\Facade\OmsToStoreFacadeInterface $storeFacade
     * @param \Spryker\Zed\Oms\Persistence\OmsRepositoryInterface $omsRepository
     */
    public function __construct(
        ActiveProcessFetcherInterface $activeProcessFetcher,
        OmsQueryContainerInterface $queryContainer,
        array $reservationHandlerPlugins,
        OmsToStoreFacadeInterface $storeFacade,
        OmsRepositoryInterface $omsRepository
    ) {
        $this->activeProcessFetcher = $activeProcessFetcher;
        $this->queryContainer = $queryContainer;
        $this->reservationHandlerPlugins = $reservationHandlerPlugins;
        $this->storeFacade = $storeFacade;
        $this->omsRepository = $omsRepository;
    }

    /**
     * @param string $sku
     *
     * @return void
     */
    public function updateReservationQuantity($sku)
    {
        $currentStoreReservationAmount = $this->sumReservedProductQuantitiesForSku($sku);

        $currentStoreTransfer = $this->storeFacade->getCurrentStore();
        $this->saveReservation($sku, $currentStoreTransfer, $currentStoreReservationAmount);
        foreach ($currentStoreTransfer->getStoresWithSharedPersistence() as $storeName) {
            $storeTransfer = $this->storeFacade->getStoreByName($storeName);
            $this->saveReservation($sku, $storeTransfer, $currentStoreReservationAmount);
        }

        $this->handleReservationPlugins($sku);
    }

    /**
     * @param string $sku
     * @param \Generated\Shared\Transfer\StoreTransfer|null $storeTransfer
     *
     * @return \Spryker\DecimalObject\Decimal
     */
    public function sumReservedProductQuantitiesForSku(string $sku, ?StoreTransfer $storeTransfer = null): Decimal
    {
        return $this->sumProductQuantitiesForSku(
            $this->getOmsReservedStateCollection()->getStates(),
            $sku,
            $storeTransfer
        );
    }

    /**
     * @param string $sku
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     *
     * @return \Spryker\DecimalObject\Decimal
     */
    public function getOmsReservedProductQuantityForSku(string $sku, StoreTransfer $storeTransfer): Decimal
    {
        $idStore = $this->getIdStore($storeTransfer);

        $reservationEntity = $this->queryContainer
            ->queryProductReservationBySkuAndStore($sku, $idStore)
            ->findOne();

        $reservationQuantity = new Decimal(0);
        if ($reservationEntity !== null) {
            $reservationQuantity = new Decimal($reservationEntity->getReservationQuantity());
        }

        $reservationQuantity = $reservationQuantity->add($this->getReservationsFromOtherStores($sku, $storeTransfer));

        return $reservationQuantity;
    }

    /**
     * @param string $sku
     * @param \Generated\Shared\Transfer\StoreTransfer $currentStoreTransfer
     *
     * @return \Spryker\DecimalObject\Decimal
     */
    public function getReservationsFromOtherStores(string $sku, StoreTransfer $currentStoreTransfer): Decimal
    {
        $reservationQuantity = new Decimal(0);
        $reservationStores = $this->queryContainer
            ->queryOmsProductReservationStoreBySku($sku)
            ->find();

        foreach ($reservationStores as $omsProductReservationStoreEntity) {
            if ($omsProductReservationStoreEntity->getStore() === $currentStoreTransfer->getName()) {
                continue;
            }
            $reservationQuantity = $reservationQuantity->add($omsProductReservationStoreEntity->getReservationQuantity());
        }

        return $reservationQuantity;
    }

    /**
     * @return string[]
     */
    public function getReservedStateNames(): array
    {
        $stateNames = [];
        foreach ($this->activeProcessFetcher->getReservedStatesFromAllActiveProcesses() as $reservedState) {
            $stateNames[] = $reservedState->getName();
        }

        return $stateNames;
    }

    /**
     * @return \Generated\Shared\Transfer\OmsStateCollectionTransfer
     */
    public function getOmsReservedStateCollection(): OmsStateCollectionTransfer
    {
        $reservedStatesTransfer = new OmsStateCollectionTransfer();
        $stateProcessMap = [];
        foreach ($this->activeProcessFetcher->getReservedStatesFromAllActiveProcesses() as $reservedState) {
            $stateProcessMap[$reservedState->getName()][] = $reservedState->getProcess()->getName();
        }

        foreach ($stateProcessMap as $reservedStateName => $stateProcesses) {
            $stateTransfer = (new OmsStateTransfer())->setName($reservedStateName);
            foreach ($stateProcesses as $processName) {
                $stateTransfer->addProcess($processName, (new OmsProcessTransfer())->setName($processName));
            }

            $reservedStatesTransfer->addState($reservedStateName, $stateTransfer);
        }

        return $reservedStatesTransfer;
    }

    /**
     * @param \ArrayObject|\Generated\Shared\Transfer\OmsStateTransfer[] $reservedStates
     * @param string $sku
     * @param \Generated\Shared\Transfer\StoreTransfer|null $storeTransfer
     *
     * @return \Spryker\DecimalObject\Decimal
     */
    protected function sumProductQuantitiesForSku(
        iterable $reservedStates,
        string $sku,
        ?StoreTransfer $storeTransfer = null
    ): Decimal {
        $sumQuantity = new Decimal(0);
        $salesAggregationTransfers = $this->omsRepository->getSalesOrderAggregationBySkuAndStatesNames(
            array_keys($reservedStates->getArrayCopy()),
            $sku,
            $storeTransfer
        );

        foreach ($salesAggregationTransfers as $salesAggregationTransfer) {
            $this->assertAggregationTransfer($salesAggregationTransfer);

            $stateName = $salesAggregationTransfer->getStateName();
            $processName = $salesAggregationTransfer->getProcessName();
            if (!$reservedStates->offsetExists($stateName) || !$reservedStates[$stateName]->getProcesses()->offsetExists($processName)) {
                continue;
            }

            $salesAggregationTransfer->requireSumAmount();
            $sumQuantity = $sumQuantity->add($salesAggregationTransfer->getSumAmount());
        }

        return $sumQuantity;
    }

    /**
     * @param \Generated\Shared\Transfer\SalesOrderItemStateAggregationTransfer $salesAggregationTransfer
     *
     * @return void
     */
    protected function assertAggregationTransfer(SalesOrderItemStateAggregationTransfer $salesAggregationTransfer): void
    {
        $salesAggregationTransfer
            ->requireSku()
            ->requireProcessName()
            ->requireStateName();
    }

    /**
     * @param string $sku
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     * @param \Spryker\DecimalObject\Decimal $reservationQuantity
     *
     * @return void
     */
    public function saveReservation(string $sku, StoreTransfer $storeTransfer, Decimal $reservationQuantity): void
    {
        $storeTransfer->requireIdStore();

        $reservationEntity = $this->queryContainer
            ->queryProductReservationBySkuAndStore($sku, $storeTransfer->getIdStore())
            ->findOneOrCreate();

        $reservationEntity->setReservationQuantity($reservationQuantity);
        $reservationEntity->save();
    }

    /**
     * @param string $sku
     *
     * @return void
     */
    protected function handleReservationPlugins($sku)
    {
        foreach ($this->reservationHandlerPlugins as $reservationHandlerPluginInterface) {
            $reservationHandlerPluginInterface->handle($sku);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     *
     * @return int
     */
    protected function getIdStore(StoreTransfer $storeTransfer)
    {
        if ($storeTransfer->getIdStore()) {
            return $storeTransfer->getIdStore();
        }

        $storeTransfer->requireName();

        return $this->storeFacade
            ->getStoreByName($storeTransfer->getName())
            ->getIdStore();
    }
}

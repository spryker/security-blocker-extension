<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProduct\Business;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Generated\Shared\Transfer\PriceProductFilterTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\PriceTypeTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\PriceProduct\Business\PriceProductBusinessFactory getFactory()
 * @method \Spryker\Zed\PriceProduct\Persistence\PriceProductEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\PriceProduct\Persistence\PriceProductRepositoryInterface getRepository()
 */
class PriceProductFacade extends AbstractFacade implements PriceProductFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\PriceTypeTransfer[]
     */
    public function getPriceTypeValues()
    {
        return $this->getFactory()
            ->createPriceTypeReader()
            ->getPriceTypes();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sku
     * @param string|null $priceTypeName
     *
     * @return int|null
     */
    public function findPriceBySku($sku, $priceTypeName = null)
    {
        return $this->getFactory()
            ->createReaderModel()
            ->findPriceBySku($sku, $priceTypeName);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceFilterTransfer
     *
     * @return int|null
     */
    public function findPriceFor(PriceProductFilterTransfer $priceFilterTransfer)
    {
        return $this->getFactory()
            ->createReaderModel()
            ->findPriceFor($priceFilterTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceFilterTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer|null
     */
    public function findPriceProductFor(PriceProductFilterTransfer $priceFilterTransfer): ?PriceProductTransfer
    {
        return $this->getFactory()
            ->createReaderModel()
            ->findPriceProductFor($priceFilterTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $name
     *
     * @return int
     */
    public function createPriceType($name)
    {
        return $this->getFactory()
            ->createPriceTypeWriter()
            ->createPriceType($name);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $priceTypeName
     *
     * @return \Generated\Shared\Transfer\PriceTypeTransfer|null
     */
    public function findPriceTypeByName(string $priceTypeName): ?PriceTypeTransfer
    {
        return $this->getFactory()
            ->createPriceTypeReader()
            ->findPriceTypeByName($priceTypeName);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $transferPriceProduct
     *
     * @return void
     */
    public function setPriceForProduct(PriceProductTransfer $transferPriceProduct)
    {
        $this->getFactory()
            ->createWriterModel()
            ->setPriceForProduct($transferPriceProduct);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return void
     */
    public function install()
    {
        $this->getFactory()
            ->createInstaller()
            ->install();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sku
     * @param string|null $priceType
     *
     * @return bool
     */
    public function hasValidPrice($sku, $priceType = null)
    {
        return $this->getFactory()
            ->createReaderModel()
            ->hasValidPrice($sku, $priceType);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceFilterTransfer
     *
     * @return bool
     */
    public function hasValidPriceFor(PriceProductFilterTransfer $priceFilterTransfer)
    {
        return $this->getFactory()
            ->createReaderModel()
            ->hasValidPriceFor($priceFilterTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function createPriceForProduct(PriceProductTransfer $priceProductTransfer)
    {
        return $this->getFactory()
            ->createWriterModel()
            ->createPriceForProduct($priceProductTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getDefaultPriceTypeName()
    {
        return $this->getFactory()
            ->getConfig()
            ->getPriceTypeDefaultName();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sku
     * @param string $priceType
     * @param string $currencyIsoCode
     *
     * @return int
     */
    public function getIdPriceProduct($sku, $priceType, $currencyIsoCode)
    {
        return $this->getFactory()
            ->createReaderModel()
            ->getProductPriceIdBySku($sku, $priceType, $currencyIsoCode);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function persistProductAbstractPriceCollection(ProductAbstractTransfer $productAbstractTransfer)
    {
        return $this->getFactory()
            ->createPriceProductAbstractWriter()
            ->persistProductAbstractPriceCollection($productAbstractTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function persistProductConcretePriceCollection(ProductConcreteTransfer $productConcreteTransfer)
    {
        return $this->getFactory()
            ->createPriceProductConcreteWriter()
            ->persistProductConcretePriceCollection($productConcreteTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sku
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findPricesBySkuForCurrentStore($sku)
    {
        return $this->getFactory()
            ->createReaderModel()
            ->findPricesBySkuForCurrentStore($sku);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sku
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer|null $priceProductDimensionTransfer
     *
     * @return array
     */
    public function findPricesBySkuGroupedForCurrentStore(
        string $sku,
        ?PriceProductDimensionTransfer $priceProductDimensionTransfer = null
    ): array {
        return $this->getFactory()
            ->createPriceGrouper()
            ->findPricesBySkuGroupedForCurrentStore($sku, $priceProductDimensionTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer[] $priceProductTransfers
     *
     * @return array
     */
    public function groupPriceProductCollection(array $priceProductTransfers)
    {
        return $this->getFactory()
            ->createPriceGrouper()
            ->groupPriceProduct($priceProductTransfers);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findProductAbstractPrices(
        int $idProductAbstract,
        ?PriceProductCriteriaTransfer $priceProductCriteriaTransfer = null
    ): array {
        return $this->getFactory()
            ->createPriceProductAbstractReader()
            ->findProductAbstractPricesById($idProductAbstract, $priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductConcrete
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findProductConcretePrices(
        int $idProductConcrete,
        int $idProductAbstract,
        ?PriceProductCriteriaTransfer $priceProductCriteriaTransfer = null
    ): array {
        return $this->getFactory()
            ->createReaderModel()
            ->findProductConcretePrices($idProductConcrete, $idProductAbstract, $priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idAbstractProduct
     * @param string|null $priceTypeName
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer|null
     */
    public function findProductAbstractPrice($idAbstractProduct, $priceTypeName = null)
    {
        return $this->getFactory()
            ->createPriceProductAbstractReader()
            ->findProductAbstractPrice($idAbstractProduct, $priceTypeName);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getPriceModeIdentifierForBothType()
    {
        return $this->getFactory()
            ->getModuleConfig()
            ->getPriceModeIdentifierForBothType();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $priceData
     *
     * @return string
     */
    public function generatePriceDataChecksum(array $priceData): string
    {
        return $this->getFactory()
            ->createPriceDataChecksumGenerator()
            ->generatePriceDataChecksum($priceData);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function persistPriceProductStore(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        return $this->getFactory()
            ->createPriceProductStoreWriter()
            ->persistPriceProductStore($priceProductTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return void
     */
    public function deleteOrphanPriceProductStoreEntities(): void
    {
        $this->getFactory()
            ->createPriceProductStoreWriter()
            ->deleteOrphanPriceProductStoreEntities();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer|null $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findProductAbstractPricesWithoutPriceExtraction(
        int $idProductAbstract,
        ?PriceProductCriteriaTransfer $priceProductCriteriaTransfer = null
    ): array {
        return $this->getFactory()
            ->createPriceProductAbstractReader()
            ->findProductAbstractPricesWithoutPriceExtraction($idProductAbstract, $priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int[] $productAbstractIds
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findProductAbstractPricesWithoutPriceExtractionByIdProductAbstractIn(array $productAbstractIds): array
    {
        return $this->getFactory()
            ->createPriceProductAbstractReader()
            ->findProductAbstractPricesWithoutPriceExtractionByIdProductAbstractIn($productAbstractIds);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductCriteriaTransfer
     */
    public function buildCriteriaFromFilter(PriceProductFilterTransfer $priceProductFilterTransfer): PriceProductCriteriaTransfer
    {
        return $this->getFactory()
            ->createProductCriteriaBuilder()
            ->buildCriteriaFromFilter($priceProductFilterTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductConcrete
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findProductConcretePricesWithoutPriceExtraction(
        int $idProductConcrete,
        int $idProductAbstract,
        ?PriceProductCriteriaTransfer $priceProductCriteriaTransfer = null
    ): array {
        return $this->getFactory()
            ->createReaderModel()
            ->findProductConcretePricesWithoutPriceExtraction($idProductConcrete, $idProductAbstract, $priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return int|null
     */
    public function findIdProductAbstractForPriceProduct(PriceProductTransfer $priceProductTransfer): ?int
    {
        return $this->getFactory()
            ->createPriceProductAbstractReader()
            ->findIdProductAbstractForPriceProduct($priceProductTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int[] $productAbstractIds
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer|null $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function findProductAbstractPricesWithoutPriceExtractionByProductAbstractIdsAndCriteria(array $productAbstractIds, ?PriceProductCriteriaTransfer $priceProductCriteriaTransfer = null): array
    {
        return $this->getFactory()
            ->createPriceProductAbstractReader()
            ->findProductAbstractPricesWithoutPriceExtractionByProductAbstractIdsAndCriteria($productAbstractIds, $priceProductCriteriaTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return void
     */
    public function removePriceProductStore(PriceProductTransfer $priceProductTransfer): void
    {
        $this->getFactory()
            ->createPriceProductRemover()
            ->removePriceProductStore($priceProductTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return void
     */
    public function removePriceProductDefaultForPriceProduct(PriceProductTransfer $priceProductTransfer): void
    {
        $this->getFactory()
            ->createPriceProductDefaultRemover()
            ->removePriceProductDefaultsForPriceProduct($priceProductTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer[] $priceProductFilterTransfers
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function getValidPrices(array $priceProductFilterTransfers): array
    {
        return $this->getFactory()
            ->createReaderModel()
            ->getValidPrices($priceProductFilterTransfers);
    }
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\AvailabilityGui\Dependency\QueryContainer;

class AvailabilityGuiToAvailabilityQueryContainerBridge implements AvailabilityGuiToAvailabilityQueryContainerInterface
{
    /**
     * @var \Spryker\Zed\Availability\Persistence\AvailabilityQueryContainerInterface
     */
    protected $availabilityQueryContainer;

    /**
     * @param \Spryker\Zed\Availability\Persistence\AvailabilityQueryContainerInterface $availabilityQueryContainer
     */
    public function __construct($availabilityQueryContainer)
    {
        $this->availabilityQueryContainer = $availabilityQueryContainer;
    }

    /**
     * @param int $idLocale
     * @param int $idStore
     * @param array $stockNames
     *
     * @return \Orm\Zed\Availability\Persistence\SpyAvailabilityAbstractQuery|\Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryAvailabilityAbstractWithStockByIdLocale($idLocale, $idStore, array $stockNames)
    {
        return $this->availabilityQueryContainer->queryAvailabilityAbstractWithStockByIdLocale($idLocale, $idStore, $stockNames);
    }

    /**
     * @param int $idProductAbstract
     * @param int $idLocale
     * @param int $idStore
     * @param array $stockNames
     *
     * @return \Orm\Zed\Availability\Persistence\SpyAvailabilityAbstractQuery|\Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryAvailabilityWithStockByIdProductAbstractAndIdLocale($idProductAbstract, $idLocale, $idStore, array $stockNames = [])
    {
        return $this->availabilityQueryContainer->queryAvailabilityWithStockByIdProductAbstractAndIdLocale($idProductAbstract, $idLocale, $idStore, $stockNames);
    }

    /**
     * @param int $idProductAbstract
     * @param int $idLocale
     * @param int $idStore
     * @param array $stockNames
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryAvailabilityAbstractWithStockByIdProductAbstractAndIdLocale($idProductAbstract, $idLocale, $idStore, array $stockNames = [])
    {
        return $this->availabilityQueryContainer->queryAvailabilityAbstractWithStockByIdProductAbstractAndIdLocale($idProductAbstract, $idLocale, $idStore, $stockNames);
    }
}

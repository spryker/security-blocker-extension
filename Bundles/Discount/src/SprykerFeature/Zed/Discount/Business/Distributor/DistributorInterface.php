<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Discount\Business\Distributor;

use Generated\Shared\Discount\DiscountInterface;

interface DistributorInterface
{

    /**
     * @param array $discountableObjects
     * @param DiscountInterface $discountTransfer
     */
    public function distribute(array $discountableObjects, DiscountInterface $discountTransfer);

}

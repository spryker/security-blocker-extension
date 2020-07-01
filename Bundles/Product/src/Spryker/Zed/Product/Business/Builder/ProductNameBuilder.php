<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Product\Business\Builder;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;

class ProductNameBuilder implements ProductNameBuilderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return string|null
     */
    public function buildProductConcreteName(
        ProductConcreteTransfer $productConcreteTransfer,
        LocaleTransfer $localeTransfer
    ): ?string {
        $concreteLocalizedAttributesTransfer = $this->getConcreteLocalizedAttributesTransfer($productConcreteTransfer, $localeTransfer);

        $productConcreteName = $concreteLocalizedAttributesTransfer->getName();

        if (!$productConcreteName) {
            return null;
        }

        $extendedProductConcreteNameParts = [$productConcreteName];
        $productConcreteAttributes = array_merge(
            $productConcreteTransfer->getAttributes(),
            $concreteLocalizedAttributesTransfer->getAttributes()
        );

        foreach ($productConcreteAttributes as $productConcreteAttribute) {
            if (!$productConcreteAttribute) {
                continue;
            }

            $extendedProductConcreteNameParts[] = ucfirst($productConcreteAttribute);
        }

        return implode(', ', $extendedProductConcreteNameParts);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\LocalizedAttributesTransfer
     */
    protected function getConcreteLocalizedAttributesTransfer(
        ProductConcreteTransfer $productConcreteTransfer,
        LocaleTransfer $localeTransfer
    ): LocalizedAttributesTransfer {
        $localizedAttributeTransfers = $productConcreteTransfer->getLocalizedAttributes();

        foreach ($localizedAttributeTransfers as $localizedAttributesTransfer) {
            if ($localizedAttributesTransfer->getLocale()->getIdLocale() === $localeTransfer->getIdLocale()) {
                return $localizedAttributesTransfer;
            }
        }

        return $localizedAttributeTransfers->offsetGet(0);
    }
}

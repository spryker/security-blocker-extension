<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PriceProductOfferVolume;

interface PriceProductOfferVolumeClientInterface
{
    /**
     * Specification:
     * - Extracts additional product offer volume prices from price product data.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\PriceProductTransfer> $priceProductTransfers
     *
     * @return array<\Generated\Shared\Transfer\PriceProductTransfer>
     */
    public function extractProductPrices(array $priceProductTransfers): array;
}

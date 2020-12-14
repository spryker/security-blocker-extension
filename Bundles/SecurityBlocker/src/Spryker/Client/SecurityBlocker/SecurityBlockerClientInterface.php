<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SecurityBlocker;

use Generated\Shared\Transfer\AuthContextTransfer;
use Generated\Shared\Transfer\AuthResponseTransfer;

interface SecurityBlockerClientInterface
{
    /**
     * Specification:
     * - Saves a failed login attempt based on the data provided in the `AuthContextTransfer`.
     * - Returns `isSuccessful` to indicate the result.
     * - The TTL and number of attempts configuration for storing records are provided per type of the entity.
     * - Requires the `AuthContextTransfer.type` to be provided.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AuthContextTransfer $authContextTransfer
     *
     * @throws \Spryker\Client\SecurityBlocker\Exception\SecurityBlockerException
     *
     * @return \Generated\Shared\Transfer\AuthResponseTransfer
     */
    public function incrementLoginAttempt(AuthContextTransfer $authContextTransfer): AuthResponseTransfer;

    /**
     * Specification:
     * - Gets failed login attempt based on the data provided in the `AuthContextTransfer`.
     * - Returns `isSuccessful` to indicate the result.
     * - The TTL and number of attempts configuration for the decision are provided per type of the entity.
     * - Requires the `AuthContextTransfer.type` to be provided.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AuthContextTransfer $authContextTransfer
     *
     * @return \Generated\Shared\Transfer\AuthResponseTransfer
     */
    public function getLoginAttempt(AuthContextTransfer $authContextTransfer): AuthResponseTransfer;
}

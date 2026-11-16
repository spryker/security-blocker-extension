<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SecurityBlockerExtension\Dependency\Plugin;

/**
 * Provides extension capabilities for the login protection of identity realms.
 *
 * Use this plugin to define the per-account lockout and challenge thresholds of an identity realm whose login surfaces count login attempts together.
 */
interface SecurityBlockerLoginRealmConfigurationExpanderPluginInterface
{
    /**
     * Specification:
     * - Expands the login realm configurations, indexed by realm, with the configuration of the realm the plugin owns.
     * - A threshold of `0` disables its dimension.
     *
     * @api
     *
     * @param array<string, \Generated\Shared\Transfer\SecurityBlockerLoginRealmConfigurationTransfer> $securityBlockerLoginRealmConfigurationTransfers
     *
     * @return array<string, \Generated\Shared\Transfer\SecurityBlockerLoginRealmConfigurationTransfer>
     */
    public function expand(array $securityBlockerLoginRealmConfigurationTransfers): array;
}

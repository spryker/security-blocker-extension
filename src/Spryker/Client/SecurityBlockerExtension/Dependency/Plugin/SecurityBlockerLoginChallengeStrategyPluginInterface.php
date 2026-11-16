<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SecurityBlockerExtension\Dependency\Plugin;

use Generated\Shared\Transfer\SecurityCheckAuthContextTransfer;

/**
 * Implement this plugin interface to require a CAPTCHA for a login attempt on a condition of your own, for example an
 * IP reputation or a login from a new country. The plugins only add challenges: a login that reached a challenge
 * threshold of the security blocker always requires a CAPTCHA, whatever the plugins answer.
 */
interface SecurityBlockerLoginChallengeStrategyPluginInterface
{
    /**
     * Specification:
     * - Returns `true` when the login attempt described by `SecurityCheckAuthContextTransfer` (type, IP, realm, login identifier) requires a CAPTCHA.
     * - Is called only for an attempt that is not blocked and has not reached a challenge threshold of the security blocker.
     * - Runs on every login page view and every login form submission: keep it fast.
     *
     * @api
     */
    public function isChallengeRequired(SecurityCheckAuthContextTransfer $securityCheckAuthContextTransfer): bool;
}

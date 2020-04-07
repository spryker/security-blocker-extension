<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\SessionRedis\Communication\Plugin\Session;

use Codeception\Test\Unit;
use Spryker\Shared\SessionRedis\Handler\SessionHandlerRedis;
use Spryker\Shared\SessionRedis\SessionRedisConfig;
use Spryker\Zed\SessionRedis\Communication\Plugin\Session\SessionHandlerRedisProviderPlugin;
use Spryker\Zed\SessionRedis\SessionRedisDependencyProvider;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group SessionRedis
 * @group Communication
 * @group Plugin
 * @group Session
 * @group SessionHandlerRedisProviderPluginTest
 * Add your own group annotations below this line
 */
class SessionHandlerRedisProviderPluginTest extends Unit
{
    /**
     * @var \Spryker\Zed\SessionRedis\Communication\Plugin\Session\SessionHandlerRedisProviderPlugin
     */
    protected $sessionHandlerPlugin;

    /**
     * @var \SprykerTest\Zed\SessionRedis\SessionRedisCommunicationTester
     */
    protected $tester;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tester->setDependency(SessionRedisDependencyProvider::REQUEST_STACK, new RequestStack());
        $this->sessionHandlerPlugin = new SessionHandlerRedisProviderPlugin();
    }

    /**
     * @return void
     */
    public function testHasCorrectSessionHandlerName(): void
    {
        $this->assertEquals($this->getSharedConfig()->getSessionHandlerRedisName(), $this->sessionHandlerPlugin->getSessionHandlerName());
    }

    /**
     * @return void
     */
    public function testPluginReturnsCorrectSessionHandler(): void
    {
        $this->assertInstanceOf(SessionHandlerRedis::class, $this->sessionHandlerPlugin->getSessionHandler());
    }

    /**
     * @return \Spryker\Shared\SessionRedis\SessionRedisConfig
     */
    protected function getSharedConfig(): SessionRedisConfig
    {
        return new SessionRedisConfig();
    }
}

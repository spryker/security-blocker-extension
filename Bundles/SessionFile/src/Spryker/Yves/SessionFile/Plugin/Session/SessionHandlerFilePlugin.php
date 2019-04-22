<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\SessionFile\Plugin\Session;

use Spryker\Shared\SessionExtension\Dependency\Plugin\SessionHandlerPluginInterface;
use Spryker\Shared\SessionFile\Handler\SessionHandlerInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\SessionFile\SessionFileConfig;

/**
 * @method \Spryker\Yves\SessionFile\SessionFileFactory getFactory()
 */
class SessionHandlerFilePlugin extends AbstractPlugin implements SessionHandlerPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getSessionHandlerName(): string
    {
        return SessionFileConfig::SESSION_HANDLER_FILE;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return bool
     */
    public function close(): bool
    {
        return $this->getSessionHandler()->close();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sessionId
     *
     * @return bool
     */
    public function destroy($sessionId): bool
    {
        return $this->getSessionHandler()->destroy($sessionId);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $maxLifetime
     *
     * @return bool
     */
    public function gc($maxLifetime): bool
    {
        return $this->getSessionHandler()->gc($maxLifetime);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $savePath
     * @param string $name
     *
     * @return bool
     */
    public function open($savePath, $name): bool
    {
        return $this->getSessionHandler()->open($savePath, $name);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sessionId
     *
     * @return string
     */
    public function read($sessionId): string
    {
        return $this->getSessionHandler()->read($sessionId);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $sessionId
     * @param string $sessionData
     *
     * @return bool
     */
    public function write($sessionId, $sessionData): bool
    {
        return $this->getSessionHandler()->write($sessionId, $sessionData);
    }

    /**
     * @return \Spryker\Shared\SessionFile\Handler\SessionHandlerInterface
     */
    protected function getSessionHandler(): SessionHandlerInterface
    {
        return $this->getFactory()->createSessionHandlerFile();
    }
}

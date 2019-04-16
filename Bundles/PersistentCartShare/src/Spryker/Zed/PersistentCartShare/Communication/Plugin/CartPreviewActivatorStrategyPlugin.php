<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PersistentCartShare\Communication\Plugin;

use Generated\Shared\Transfer\ResourceShareTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ResourceShareExtension\Dependency\Plugin\ResourceShareActivatorStrategyPluginInterface;

/**
 * @method \Spryker\Zed\PersistentCartShare\Business\PersistentCartShareFacade getFacade()
 * @method \Spryker\Zed\PersistentCartShare\Communication\PersistentCartShareCommunicationFactory getFactory()
 * @method \Spryker\Zed\PersistentCartShare\PersistentCartShareConfig getConfig()
 */
class CartPreviewActivatorStrategyPlugin extends AbstractPlugin implements ResourceShareActivatorStrategyPluginInterface
{
    protected const SHARE_OPTION_PREVIEW = 'PREVIEW';
    protected const RESOURCE_TYPE_QUOTE = 'quote';
    protected const PARAM_ID_QUOTE = 'id_quote';
    protected const PARAM_SHARE_OPTION = 'share_option';

    /**
     * @api
     *
     * @inheritDoc
     */
    public function isLoginRequired(): bool
    {
        return false;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     */
    public function isApplicable(ResourceShareTransfer $resourceShareTransfer): bool
    {
        if ($resourceShareTransfer->getResourceType() !== static::RESOURCE_TYPE_QUOTE) {
            return false;
        }

        $resourceDataArray = $this->getFactory()
            ->getUtilEncodingService()
            ->decodeJson($resourceShareTransfer->getResourceData(), true);

        if (!isset($resourceDataArray[static::PARAM_ID_QUOTE], $resourceDataArray[static::PARAM_SHARE_OPTION])) {
            return false;
        }

        if ($resourceDataArray[static::PARAM_SHARE_OPTION] !== static::SHARE_OPTION_PREVIEW) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return void
     */
    public function execute(ResourceShareTransfer $resourceShareTransfer): void
    {
        //do nothing
    }
}

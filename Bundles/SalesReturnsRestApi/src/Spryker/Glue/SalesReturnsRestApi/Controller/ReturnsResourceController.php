<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\SalesReturnsRestApi\Controller;

use Generated\Shared\Transfer\RestReturnRequestAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \Spryker\Glue\SalesReturnsRestApi\SalesReturnsRestApiFactory getFactory()
 */
class ReturnsResourceController extends AbstractController
{
    /**
     * @Glue({
     *     "getResourceById": {
     *          "summary": [
     *              "Retrieves return by id."
     *          ],
     *          "parameters": [{
     *              "name": "Accept-Language",
     *              "in": "header"
     *          }],
     *          "responseAttributesClassName": "Generated\\Shared\\Transfer\\RestReturnDetailsAttributesTransfer",
     *          "responses": {
     *              "403": "Unauthorized request.",
     *              "404": "Retrun not found."
     *          }
     *     },
     *     "getCollection": {
     *          "summary": [
     *              "Retrieves list of returns."
     *          ],
     *          "parameters": [{
     *              "name": "Accept-Language",
     *              "in": "header"
     *          }],
     *          "responses": {
     *              "403": "Unauthorized request."
     *          }
     *     }
     * })
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createReturnReader()->getReturns($restRequest);
    }

    /**
     * @Glue({
     *     "post": {
     *          "summary": [
     *              "Creates a return."
     *          ],
     *          "parameters": [{
     *              "name": "Accept-Language",
     *              "in": "header"
     *          }],
     *          "responses": {
     *              "400": "Bad Request"
     *          }
     *     }
     * })
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestReturnRequestAttributesTransfer $restReturnRequestAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function postAction(
        RestRequestInterface $restRequest,
        RestReturnRequestAttributesTransfer $restReturnRequestAttributesTransfer
    ): RestResponseInterface {
        return $this->getFactory()
            ->createReturnWriter()
            ->createReturn($restRequest, $restReturnRequestAttributesTransfer);
    }
}

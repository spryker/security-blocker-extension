<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Url\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use Propel\Runtime\Exception\PropelException;
use SprykerEngine\Zed\Locale\Business\Exception\MissingLocaleException;
use SprykerFeature\Zed\Url\Business\Exception\MissingUrlException;
use SprykerFeature\Zed\Url\Business\Exception\UrlExistsException;
use SprykerFeature\Zed\Url\Persistence\Exception\MissingResourceException;
use SprykerFeature\Zed\Url\Persistence\Propel\SpyUrl;

interface UrlManagerInterface
{

    /**
     * @param string $url
     * @param LocaleTransfer $locale
     * @param string $resourceType
     * @param int $idResource
     *
     * @throws PropelException
     * @throws UrlExistsException
     * @throws MissingLocaleException
     *
     * @return SpyUrl
     */
    public function createUrl($url, LocaleTransfer $locale, $resourceType, $idResource);

    /**
     * @param UrlTransfer $url
     *
     * @throws UrlExistsException
     * @throws MissingUrlException
     * @throws \Exception
     * @throws PropelException
     *
     * @return UrlTransfer
     */
    public function saveUrl(UrlTransfer $url);

    /**
     * @param UrlTransfer $url
     *
     * @return UrlTransfer
     */
    public function saveUrlAndTouch(UrlTransfer $url);

    /**
     * @param string $url
     *
     * @return bool
     */
    public function hasUrl($url);

    /**
     * @param int $idUrl
     *
     * @return bool
     */
    public function hasUrlId($idUrl);

    /**
     * @param string $url
     *
     * @throws MissingUrlException
     *
     * @return SpyUrl
     */
    public function getUrlByPath($url);

    /**
     * @param int $idUrl
     *
     * @throws MissingUrlException
     *
     * @return SpyUrl
     */
    public function getUrlById($idUrl);

    /**
     * @param int $idCategoryNode
     * @param int $idLocale
     *
     * @return SpyUrl
     */
    public function getResourceUrlByCategoryNodeAndLocaleId($idCategoryNode, $idLocale);

    /**
     * @param int $idUrl
     */
    public function touchUrlActive($idUrl);

    /**
     * @param $idUrl
     */
    public function touchUrlDeleted($idUrl);

    /**
     * @param SpyUrl $urlEntity
     *
     * @throws MissingResourceException
     *
     * @return UrlTransfer
     */
    public function convertUrlEntityToTransfer(SpyUrl $urlEntity);

    /**
     * @param string $url
     * @param string $resourceType
     * @param int $idResource
     *
     * @throws PropelException
     * @throws UrlExistsException
     *
     * @return SpyUrl
     */
    public function createUrlForCurrentLocale($url, $resourceType, $idResource);

}

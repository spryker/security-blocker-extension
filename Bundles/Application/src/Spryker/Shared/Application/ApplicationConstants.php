<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Application;

use Spryker\Shared\Kernel\KernelConstants;

interface ApplicationConstants
{

    const COUCHBASE_BUCKET_PREFIX = 'COUCHBASE_BUCKET_PREFIX';
    const DISPLAY_ERRORS = 'DISPLAY_ERRORS';

    const ENABLE_APPLICATION_DEBUG = 'ENABLE_APPLICATION_DEBUG';
    const ENABLE_WEB_PROFILER = 'ENABLE_WEB_PROFILER';

    const SHOW_SYMFONY_TOOLBAR = 'SHOW_SYMFONY_TOOLBAR'; //deprecated
    const STORE_PREFIX = 'STORE_PREFIX';
    const BACKTRACE_USER_PATH = 'BACKTRACE_USER_PATH';

    /**
     * @deprecated Use `TwigConstants::YVES_THEME` instead
     */
    const YVES_THEME = 'YVES_THEME';

    const YVES_TRUSTED_PROXIES = 'YVES_TRUSTED_PROXIES';
    const YVES_TRUSTED_HOSTS = 'YVES_TRUSTED_HOSTS';
    const YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED = 'YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED';
    const YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG = 'YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG';
    const YVES_SSL_ENABLED = 'YVES_SSL_ENABLED';
    const YVES_COMPLETE_SSL_ENABLED = 'YVES_COMPLETE_SSL_ENABLED';
    const YVES_SSL_EXCLUDED = 'YVES_SSL_EXCLUDED';

    const YVES_COOKIE_VISITOR_ID_NAME = 'YVES_COOKIE_VISITOR_ID_NAME';
    const YVES_COOKIE_VISITOR_ID_VALID_FOR = 'YVES_COOKIE_VISITOR_ID_VALID_FOR';
    const YVES_COOKIE_DEVICE_ID_NAME = 'YVES_COOKIE_DEVICE_ID_NAME';
    const YVES_COOKIE_DEVICE_ID_VALID_FOR = 'YVES_COOKIE_DEVICE_ID_VALID_FOR';

    const YVES_AUTH_SETTINGS = 'YVES_AUTH_SETTINGS';

    /**
     * @deprecated Use `KernelConstants::PROJECT_NAMESPACES` instead
     */
    const PROJECT_NAMESPACES = KernelConstants::PROJECT_NAMESPACES;
    /**
     * @deprecated Use `KernelConstants::CORE_NAMESPACES` instead
     */
    const CORE_NAMESPACES = KernelConstants::CORE_NAMESPACES;

    const ELASTICA_PARAMETER__HOST = 'ELASTICA_PARAMETER__HOST';
    const ELASTICA_PARAMETER__PORT = 'ELASTICA_PARAMETER__PORT';
    const ELASTICA_PARAMETER__TRANSPORT = 'ELASTICA_PARAMETER__TRANSPORT';
    const ELASTICA_PARAMETER__INDEX_NAME = 'ELASTICA_PARAMETER__INDEX_NAME';
    const ELASTICA_PARAMETER__AUTH_HEADER = 'ELASTICA_PARAMETER__AUTH_HEADER';
    const ELASTICA_PARAMETER__DOCUMENT_TYPE = 'ELASTICA_PARAMETER__DOCUMENT_TYPE';

    /**
     * SSL
     */
    const ZED_SSL_ENABLED = 'ZED_SSL_ENABLED';
    const ZED_SSL_EXCLUDED = 'ZED_SSL_EXCLUDED';
    const ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED = 'ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED';
    const ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG = 'ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG';

    /**
     * RabbitMQ
     */
    const ZED_RABBITMQ_USERNAME = 'ZED_RABBITMQ_USERNAME';
    const ZED_RABBITMQ_PASSWORD = 'ZED_RABBITMQ_PASSWORD';
    const ZED_RABBITMQ_HOST = 'ZED_RABBITMQ_HOST';
    const ZED_RABBITMQ_PORT = 'ZED_RABBITMQ_PORT';
    const ZED_RABBITMQ_VHOST = 'ZED_RABBITMQ_VHOST';

    /**
     * Global timezone used to for underlying data, timezones for presentation layer can be changed in stores configuration
     */
    const PROJECT_TIMEZONE = 'PROJECT_TIMEZONE';

    /**
     * @deprecated Use `KernelConstants::PROJECT_NAMESPACE` instead
     */
    const PROJECT_NAMESPACE = KernelConstants::PROJECT_NAMESPACE;

    /**
     * Cloud
     */
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_ENABLED = 'CLOUD_ENABLED';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_OBJECT_STORAGE_ENABLED = 'CLOUD_OBJECT_STORAGE_ENABLED';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_ENABLED = 'CLOUD_CDN_ENABLED';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_STATIC_MEDIA_PREFIX = 'CLOUD_CDN_STATIC_MEDIA_PREFIX';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_STATIC_MEDIA_HTTP = 'CLOUD_CDN_STATIC_MEDIA_HTTP';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_STATIC_MEDIA_HTTPS = 'CLOUD_CDN_STATIC_MEDIA_HTTPS';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME = 'CLOUD_CDN_PRODUCT_IMAGES';

    /**
     * Yves host name / domain without scheme and port (e.g. www.de.demoshop.local) (Required)
     *
     * @api
     */
    const HOST_YVES = 'HOST_YVES';

    /**
     * Zed host name / domain without scheme and port (e.g. zed.de.demoshop.local) (Required)
     *
     * @api
     */
    const HOST_ZED = 'HOST_ZED';

    /**
     * Port definition for Yves with leading colon (e.g. :8080)
     *
     * @api
     */
    const PORT_YVES = 'PORT_YVES';

    /**
     * Port definition for Zed with leading colon (e.g. :9080)
     *
     * @api
     */
    const PORT_ZED = 'PORT_ZED';

    /**
     * Secure port definition for Yves with leading colon (e.g. :8443)
     *
     * @api
     */
    const PORT_SSL_YVES = 'PORT_SSL_YVES';

    /**
     * Secure port definition for Zed with leading colon (e.g. :9443)
     *
     * @api
     */
    const PORT_SSL_ZED = 'PORT_SSL_ZED';

    /**
     * Base url for Yves including scheme and port (e.g. http://www.de.demoshop.local:8080)
     *
     * @api
     */
    const BASE_URL_YVES = 'BASE_URL_YVES';

    /**
     * Base url for Zed including scheme and port (e.g. http://zed.de.demoshop.local:9080)
     *
     * @api
     */
    const BASE_URL_ZED = 'BASE_URL_ZED';

    /**
     * Base url for static assets including scheme and port (e.g. http://static.de.demoshop.local:8080)
     *
     * @api
     */
    const BASE_URL_STATIC_ASSETS = 'BASE_URL_STATIC_ASSETS';

    /**
     * Base url for static media including scheme and port (e.g. http://static.de.demoshop.local:8080)
     *
     * @api
     */
    const BASE_URL_STATIC_MEDIA = 'BASE_URL_STATIC_MEDIA';

    /**
     * Secure base url for Yves including scheme and port (e.g. https://www.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_YVES = 'BASE_URL_SSL_YVES';

    /**
     * Secure base url for Zed including scheme and port (e.g. https://www.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_ZED = 'BASE_URL_SSL_ZED';

    /**
     * Secure base url for static assets including scheme and port (e.g. https://static.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_STATIC_ASSETS = 'BASE_URL_SSL_STATIC_ASSETS';

    /**
     * Secure base url for static media including scheme and port (e.g. https://static.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_STATIC_MEDIA = 'BASE_URL_SSL_STATIC_MEDIA';

    /** @deprecated Please use ApplicationConstants::HOST_ZED or ApplicationConstants::BASE_URL_ZED instead */
    const HOST_ZED_GUI = 'HOST_ZED_GUI';
    /** @deprecated Please use ApplicationConstants::HOST_ZED or ApplicationConstants::BASE_URL_ZED instead */
    const HOST_ZED_API = 'HOST_ZED_API';
    /** @deprecated Please use ApplicationConstants::BASE_URL_STATIC_ASSETS instead */
    const HOST_STATIC_ASSETS = 'HOST_STATIC_ASSETS';
    /** @deprecated Please use ApplicationConstants::BASE_URL_STATIC_MEDIA instead */
    const HOST_STATIC_MEDIA = 'HOST_STATIC_MEDIA';

    /** @deprecated Please use ApplicationConstants::BASE_URL_SSL_YVES instead */
    const HOST_SSL_YVES = 'HOST_SSL_YVES';
    /** @deprecated Unused, will be removed with next major release */
    const HOST_SSL_ZED_GUI = 'HOST_SSL_ZED_GUI';
    /** @deprecated Unused, will be removed with next major release */
    const HOST_SSL_ZED_API = 'HOST_SSL_ZED_API';
    /** @deprecated Please use ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS instead */
    const HOST_SSL_STATIC_ASSETS = 'HOST_SSL_STATIC_ASSETS';
    /** @deprecated Please use ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA instead */
    const HOST_SSL_STATIC_MEDIA = 'HOST_SSL_STATIC_MEDIA';

    const FORM_FACTORY = 'FORM_FACTORY';

}

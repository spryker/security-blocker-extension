<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Development;

use Spryker\Shared\Development\DevelopmentConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Zed\Development\Business\IdeAutoCompletion\IdeAutoCompletionConstants;
use Spryker\Zed\Development\Business\IdeAutoCompletion\IdeAutoCompletionOptionConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class DevelopmentConfig extends AbstractBundleConfig
{
    public const BUNDLE_PLACEHOLDER = '[BUNDLE]';
    protected const PHPSTAN_CONFIG_FILENAME = 'phpstan.neon';

    protected const NAMESPACE_SPRYKER = 'Spryker';
    protected const NAMESPACE_SPRYKER_SHOP = 'SprykerShop';
    protected const NAMESPACE_SPRYKER_MERCHANT_PORTAL = 'SprykerMerchantPortal';

    public const APPLICATION_NAMESPACES = [
        'Orm',
    ];

    public const APPLICATIONS = [
        'Client',
        'Service',
        'Shared',
        'Yves',
        'Zed',
        'Glue',
    ];

    protected const INTERNAL_NAMESPACES = [
        self::NAMESPACE_SPRYKER,
        self::NAMESPACE_SPRYKER_SHOP,
        self::NAMESPACE_SPRYKER_MERCHANT_PORTAL,
    ];

    protected const INTERNAL_NAMESPACES_TO_PATH_MAPPING = [
        self::NAMESPACE_SPRYKER_SHOP => APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'vendor/spryker-shop/',
        self::NAMESPACE_SPRYKER_MERCHANT_PORTAL => APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'vendor/spryker-marketplace/',
    ];

    /**
     * @return int
     */
    public function getPermissionMode(): int
    {
        return $this->get(DevelopmentConstants::DIRECTORY_PERMISSION, 0777);
    }

    /**
     * @return string[]
     */
    public function getInternalNamespaces(): array
    {
        return ['Spryker', 'SprykerEco', 'SprykerSdk', 'SprykerShop', 'Orm'];
    }

    /**
     * @return string[]
     */
    public function getTwigPathPatterns(): array
    {
        return [
            $this->getPathToCore() . '%1$s/src/Spryker/Zed/%1$s/Presentation/',
            $this->getPathToCore() . '%1$s/src/Spryker/Yves/%1$s/Theme/',
            $this->getPathToShop() . '%1$s/src/SprykerShop/Yves/%1$s/Theme/',
        ];
    }

    /**
     * Gets path to application root directory.
     *
     * @return string
     */
    public function getPathToRoot()
    {
        return APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR;
    }

    /**
     * Gets Application layers.
     *
     * @return array
     */
    public function getApplications()
    {
        return static::APPLICATIONS;
    }

    /**
     * Gets Application namespaces.
     *
     * @return array
     */
    public function getApplicationNamespaces()
    {
        return static::APPLICATION_NAMESPACES;
    }

    /**
     * Gets path to Spryker core modules.
     *
     * @return string
     */
    public function getPathToCore()
    {
        // Check for deprecated environment config constant.
        $path = $this->getConfig()->get(KernelConstants::SPRYKER_ROOT);
        if ($path) {
            return rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        }

        return $this->getPathToRoot() . 'vendor/spryker/';
    }

    /**
     * Gets path to SprykerSdk core modules.
     *
     * @return string
     */
    public function getPathToSdk()
    {
        return $this->getPathToRoot() . 'vendor/spryker-sdk/';
    }

    /**
     * Gets path to SprykerShop core modules.
     *
     * @return string
     */
    public function getPathToShop()
    {
        return $this->getPathToRoot() . 'vendor/spryker-shop/';
    }

    /**
     * Gets path to SprykerEco core modules.
     *
     * @return string
     */
    public function getPathToEco()
    {
        return $this->getPathToRoot() . 'vendor/spryker-eco/';
    }

    /**
     * @return string[]
     */
    public function getOrganizationPathMap(): array
    {
        return [
            'Spryker' => $this->getPathToCore(),
            'SprykerEco' => $this->getPathToEco(),
        ];
    }

    /**
     * Either a relative or full path to the ruleset.xml or a name of an installed
     * standard (see `phpcs -i` for a list of available ones).
     *
     * @return string
     */
    public function getCodingStandard()
    {
        $vendorDir = APPLICATION_VENDOR_DIR . DIRECTORY_SEPARATOR;

        return $vendorDir . 'spryker/code-sniffer/Spryker/ruleset.xml';
    }

    /**
     * Either a relative or full path to the ruleset.xml or a name of an installed
     * standard. Can also be a comma separated list of multiple ones.
     *
     * @return string
     */
    public function getArchitectureStandard()
    {
        return __DIR__ . '/Business/PhpMd/ruleset.xml';
    }

    /**
     * Gets path to Application's composer.lock file.
     *
     * @return string
     */
    public function getPathToComposerLock()
    {
        return APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'composer.lock';
    }

    /**
     * @return string
     */
    public function getPathToJsonDependencyTree()
    {
        $pathParts = [
            APPLICATION_ROOT_DIR,
            'data',
            'dependencyTree.json',
        ];

        return implode(DIRECTORY_SEPARATOR, $pathParts);
    }

    /**
     * @return string
     */
    public function getPhpstanConfigFilename(): string
    {
        return static::PHPSTAN_CONFIG_FILENAME;
    }

    /**
     * @return string
     */
    public function getPathToPhpstanModuleTemporaryConfigFolder()
    {
        return APPLICATION_ROOT_DIR . '/data/phpstan/';
    }

    /**
     * Gets path to module config that holds information about engine modules.
     *
     * @return string
     */
    public function getPathToBundleConfig()
    {
        return __DIR__ . '/Business/DependencyTree/bundle_config.json';
    }

    /**
     * @return array
     */
    public function getExternalToInternalNamespaceMap()
    {
        return [
            'Psr\\Log\\' => 'spryker/log',
            'Psr\\Container\\' => 'spryker/container',
            'Propel\\' => 'spryker/propel-orm',
            'Silex\\' => 'spryker/silex',
            'Pimple' => 'spryker/pimple',
            'Predis\\' => 'spryker/redis',
            'Guzzle\\' => 'spryker/guzzle',
            'GuzzleHttp\\' => 'spryker/guzzle',
            'League\\Csv\\' => 'spryker/csv',
            'Monolog\\' => 'spryker/monolog',
            'Elastica\\' => 'spryker/elastica',
            'Symfony\\Component\\' => 'spryker/symfony',
            'Twig_' => 'spryker/twig',
            'Zend\\' => 'spryker/zend',
            'phpDocumentor\\GraphViz\\' => 'spryker/graphviz',
            'Egulias\\EmailValidator\\' => 'spryker/egulias',
            'Ramsey\\Uuid' => 'spryker/ramsey-uuid',
            'Doctrine\\Common\\Inflector' => 'spryker/doctrine-inflector',
        ];
    }

    /**
     * @return array
     */
    public function getExternalToInternalMap()
    {
        return [
            'psr/log' => 'spryker/log',
            'propel/propel' => 'spryker/propel-orm',
            'silex/silex' => 'spryker/silex',
            'pimple/pimple' => 'spryker/pimple',
            'mandrill/mandrill' => 'spryker/mandrill',
            'predis/predis' => 'spryker/redis',
            'guzzle/guzzle' => 'spryker/guzzle',
            'guzzlehttp/guzzle' => 'spryker/guzzle',
            'league/csv' => 'spryker/csv',
            'monolog/monolog' => 'spryker/monolog',
            'ruflin/elastica' => 'spryker/elastica',
            '/symfony/' => 'spryker/symfony',
            'twig/twig' => 'spryker/twig',
            '/zendframework/' => 'spryker/zend',
            'phpdocumentor/graphviz' => 'spryker/graphviz',
            'egulias/email-validator' => 'spryker/egulias',
            'ramsey/uuid' => 'spryker/ramsey-uuid',
            'doctrine/inflector' => 'spryker/doctrine-inflector',
        ];
    }

    /**
     * @return array
     */
    public function getIgnorableDependencies()
    {
        return [
            'codeception/codeception',
            'spryker/code-sniffer',
            'pdepend/pdepend',
            'phploc/phploc',
            'phpmd/phpmd',
            'sebastian/phpcpd',
            'codeception/codeception',
            'fabpot/php-cs-fixer',
            'sensiolabs/security-checker',
            'sllh/composer-versions-check',
        ];
    }

    /**
     * @return string[]
     */
    public function getYvesIdeAutoCompletionOptions()
    {
        $options = $this->getDefaultIdeAutoCompletionOptions();
        $options[IdeAutoCompletionOptionConstants::APPLICATION_NAME] = 'Yves';

        return $options;
    }

    /**
     * @return string[]
     */
    public function getZedIdeAutoCompletionOptions()
    {
        $options = $this->getDefaultIdeAutoCompletionOptions();
        $options[IdeAutoCompletionOptionConstants::APPLICATION_NAME] = 'Zed';

        return $options;
    }

    /**
     * @return array
     */
    public function getClientIdeAutoCompletionOptions()
    {
        $options = $this->getDefaultIdeAutoCompletionOptions();
        $options[IdeAutoCompletionOptionConstants::APPLICATION_NAME] = 'Client';

        return $options;
    }

    /**
     * @return array
     */
    public function getGlueIdeAutoCompletionOptions()
    {
        $options = $this->getDefaultIdeAutoCompletionOptions();
        $options[IdeAutoCompletionOptionConstants::APPLICATION_NAME] = 'Glue';

        return $options;
    }

    /**
     * @return array
     */
    public function getServiceIdeAutoCompletionOptions()
    {
        $options = $this->getDefaultIdeAutoCompletionOptions();
        $options[IdeAutoCompletionOptionConstants::APPLICATION_NAME] = 'Service';

        return $options;
    }

    /**
     * @return array
     */
    protected function getDefaultIdeAutoCompletionOptions()
    {
        return [
            IdeAutoCompletionOptionConstants::TARGET_BASE_DIRECTORY => APPLICATION_SOURCE_DIR . '/',
            IdeAutoCompletionOptionConstants::TARGET_DIRECTORY_PATTERN => sprintf(
                'Generated/%s/Ide',
                IdeAutoCompletionConstants::APPLICATION_NAME_PLACEHOLDER
            ),
            IdeAutoCompletionOptionConstants::TARGET_NAMESPACE_PATTERN => sprintf(
                'Generated\%s\Ide',
                IdeAutoCompletionConstants::APPLICATION_NAME_PLACEHOLDER
            ),
            IdeAutoCompletionConstants::DIRECTORY_PERMISSION => $this->getPermissionMode(),
        ];
    }

    /**
     * @return string[]
     */
    public function getIdeAutoCompletionSourceDirectoryGlobPatterns()
    {
        return [
            APPLICATION_VENDOR_DIR . '/*/*/src/' => '*/*/',
            APPLICATION_SOURCE_DIR . '/' => $this->get(KernelConstants::PROJECT_NAMESPACE) . '/*/',
        ];
    }

    /**
     * @return string[]
     */
    public function getIdeAutoCompletionGeneratorTemplatePaths()
    {
        return [
            __DIR__ . '/Business/IdeAutoCompletion/Generator/Templates',
        ];
    }

    /**
     * Returns CLI commmand to run the architecture sniffer with [BUNDLE] placeholder
     *
     * @return string
     */
    public function getArchitectureSnifferCommand()
    {
        return $this->getPhpMdCommand() . ' ' . self::BUNDLE_PLACEHOLDER . ' xml ' . $this->getArchitectureSnifferRuleset();
    }

    /**
     * Either a relative or full path to the ruleset.xml
     *
     * @return string
     */
    public function getArchitectureSnifferRuleset()
    {
        $vendorDir = APPLICATION_VENDOR_DIR . DIRECTORY_SEPARATOR;
        return $vendorDir . 'spryker/architecture-sniffer/src/ruleset.xml';
    }

    /**
     * @return string
     */
    public function getPhpMdCommand()
    {
        return 'vendor/bin/phpmd';
    }

    /**
     * @return array
     */
    public function getProjectNamespaces()
    {
        return $this->get(DevelopmentConstants::PROJECT_NAMESPACES);
    }

    /**
     * @return array
     */
    public function getCoreNamespaces()
    {
        return $this->get(DevelopmentConstants::CORE_NAMESPACES);
    }

    /**
     * Gets default priority for architecture sniffer.
     *
     * @return int
     */
    public function getArchitectureSnifferDefaultPriority(): int
    {
        return 2;
    }

    /**
     * Gets PHPStan default level. The higher, the better.
     *
     * @return int
     */
    public function getPhpstanLevel()
    {
        return 3;
    }

    /**
     * Gets CodeSniffer default level. The higher, the better.
     *
     * @return int
     */
    public function getCodeSnifferLevel(): int
    {
        return 1;
    }

    /**
     * @param string $namespace
     *
     * @return bool
     */
    public function isInternalNamespace(string $namespace): bool
    {
        return in_array($namespace, static::INTERNAL_NAMESPACES);
    }

    /**
     * @param string $namespace
     *
     * @return string|null
     */
    public function getPathToInternalNamespace(string $namespace): ?string
    {
        if ($namespace === static::NAMESPACE_SPRYKER) {
            return $this->getPathToCore();
        }

        if (array_key_exists($namespace, static::INTERNAL_NAMESPACES_TO_PATH_MAPPING)) {
            return static::INTERNAL_NAMESPACES_TO_PATH_MAPPING[$namespace];
        }

        return null;
    }
}

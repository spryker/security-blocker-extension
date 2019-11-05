<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use ArrayObject;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 *
 * @deprecated Testing transfer object deprecation.
 */
class MergedDeprecatedFooBarTransfer extends AbstractTransfer
{
    /**
     * @deprecated scalarField is deprecated.
     */
    public const SCALAR_FIELD = 'scalarField';

    /**
     * @deprecated arrayField is deprecated.
     */
    public const ARRAY_FIELD = 'arrayField';

    /**
     * @deprecated transferField is deprecated.
     */
    public const TRANSFER_FIELD = 'transferField';

    /**
     * @deprecated transferCollectionField is deprecated.
     */
    public const TRANSFER_COLLECTION_FIELD = 'transferCollectionField';

    /**
     * @deprecated Deprecated on project level.
     */
    public const PROJECT_LEVEL_DEPRECATED_FIELD = 'projectLevelDeprecatedField';

    /**
     * @var string|null
     */
    protected $scalarField;

    /**
     * @var array
     */
    protected $arrayField = [];

    /**
     * @var \Generated\Shared\Transfer\DeprecatedFooBarTransfer|null
     */
    protected $transferField;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\DeprecatedFooBarTransfer[]
     */
    protected $transferCollectionField;

    /**
     * @var string|null
     */
    protected $projectLevelDeprecatedField;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'scalar_field' => 'scalarField',
        'scalarField' => 'scalarField',
        'ScalarField' => 'scalarField',
        'array_field' => 'arrayField',
        'arrayField' => 'arrayField',
        'ArrayField' => 'arrayField',
        'transfer_field' => 'transferField',
        'transferField' => 'transferField',
        'TransferField' => 'transferField',
        'transfer_collection_field' => 'transferCollectionField',
        'transferCollectionField' => 'transferCollectionField',
        'TransferCollectionField' => 'transferCollectionField',
        'project_level_deprecated_field' => 'projectLevelDeprecatedField',
        'projectLevelDeprecatedField' => 'projectLevelDeprecatedField',
        'ProjectLevelDeprecatedField' => 'projectLevelDeprecatedField',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::SCALAR_FIELD => [
            'type' => 'string',
            'name_underscore' => 'scalar_field',
            'is_collection' => false,
            'is_transfer' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
        ],
        self::ARRAY_FIELD => [
            'type' => 'array',
            'name_underscore' => 'array_field',
            'is_collection' => false,
            'is_transfer' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
        ],
        self::TRANSFER_FIELD => [
            'type' => 'Generated\Shared\Transfer\DeprecatedFooBarTransfer',
            'name_underscore' => 'transfer_field',
            'is_collection' => false,
            'is_transfer' => true,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
        ],
        self::TRANSFER_COLLECTION_FIELD => [
            'type' => 'Generated\Shared\Transfer\DeprecatedFooBarTransfer',
            'name_underscore' => 'transfer_collection_field',
            'is_collection' => true,
            'is_transfer' => true,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
        ],
        self::PROJECT_LEVEL_DEPRECATED_FIELD => [
            'type' => 'string',
            'name_underscore' => 'project_level_deprecated_field',
            'is_collection' => false,
            'is_transfer' => false,
            'rest_request_parameter' => 'no',
            'is_associative' => false,
            'is_nullable' => false,
        ],
    ];

    /**
     * @module Deprecated
     *
     * @deprecated scalarField is deprecated.
     *
     * @param string|null $scalarField
     *
     * @return $this
     */
    public function setScalarField($scalarField)
    {
        $this->scalarField = $scalarField;
        $this->modifiedProperties[self::SCALAR_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated scalarField is deprecated.
     *
     * @return string|null
     */
    public function getScalarField()
    {
        return $this->scalarField;
    }

    /**
     * @module Deprecated
     *
     * @deprecated scalarField is deprecated.
     *
     * @return $this
     */
    public function requireScalarField()
    {
        $this->assertPropertyIsSet(self::SCALAR_FIELD);

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated arrayField is deprecated.
     *
     * @param array|null $arrayField
     *
     * @return $this
     */
    public function setArrayField(array $arrayField = null)
    {
        if ($arrayField === null) {
            $arrayField = [];
        }

        $this->arrayField = $arrayField;
        $this->modifiedProperties[self::ARRAY_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated arrayField is deprecated.
     *
     * @return array
     */
    public function getArrayField()
    {
        return $this->arrayField;
    }

    /**
     * @module Deprecated
     *
     * @deprecated arrayField is deprecated.
     *
     * @param mixed $arrayField
     *
     * @return $this
     */
    public function addArrayField($arrayField)
    {
        $this->arrayField[] = $arrayField;
        $this->modifiedProperties[self::ARRAY_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated arrayField is deprecated.
     *
     * @return $this
     */
    public function requireArrayField()
    {
        $this->assertPropertyIsSet(self::ARRAY_FIELD);

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferField is deprecated.
     *
     * @param \Generated\Shared\Transfer\DeprecatedFooBarTransfer|null $transferField
     *
     * @return $this
     */
    public function setTransferField(DeprecatedFooBarTransfer $transferField = null)
    {
        $this->transferField = $transferField;
        $this->modifiedProperties[self::TRANSFER_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferField is deprecated.
     *
     * @return \Generated\Shared\Transfer\DeprecatedFooBarTransfer|null
     */
    public function getTransferField()
    {
        return $this->transferField;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferField is deprecated.
     *
     * @return $this
     */
    public function requireTransferField()
    {
        $this->assertPropertyIsSet(self::TRANSFER_FIELD);

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferCollectionField is deprecated.
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\DeprecatedFooBarTransfer[] $transferCollectionField
     *
     * @return $this
     */
    public function setTransferCollectionField(ArrayObject $transferCollectionField)
    {
        $this->transferCollectionField = $transferCollectionField;
        $this->modifiedProperties[self::TRANSFER_COLLECTION_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferCollectionField is deprecated.
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\DeprecatedFooBarTransfer[]
     */
    public function getTransferCollectionField()
    {
        return $this->transferCollectionField;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferCollectionField is deprecated.
     *
     * @param \Generated\Shared\Transfer\DeprecatedFooBarTransfer $transferCollectionField
     *
     * @return $this
     */
    public function addTransferCollectionField(DeprecatedFooBarTransfer $transferCollectionField)
    {
        $this->transferCollectionField[] = $transferCollectionField;
        $this->modifiedProperties[self::TRANSFER_COLLECTION_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated transferCollectionField is deprecated.
     *
     * @return $this
     */
    public function requireTransferCollectionField()
    {
        $this->assertCollectionPropertyIsSet(self::TRANSFER_COLLECTION_FIELD);

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated Deprecated on project level.
     *
     * @param string|null $projectLevelDeprecatedField
     *
     * @return $this
     */
    public function setProjectLevelDeprecatedField($projectLevelDeprecatedField)
    {
        $this->projectLevelDeprecatedField = $projectLevelDeprecatedField;
        $this->modifiedProperties[self::PROJECT_LEVEL_DEPRECATED_FIELD] = true;

        return $this;
    }

    /**
     * @module Deprecated
     *
     * @deprecated Deprecated on project level.
     *
     * @return string|null
     */
    public function getProjectLevelDeprecatedField()
    {
        return $this->projectLevelDeprecatedField;
    }

    /**
     * @module Deprecated
     *
     * @deprecated Deprecated on project level.
     *
     * @return $this
     */
    public function requireProjectLevelDeprecatedField()
    {
        $this->assertPropertyIsSet(self::PROJECT_LEVEL_DEPRECATED_FIELD);

        return $this;
    }

    /**
     * @param array $data
     * @param bool $ignoreMissingProperty
     * @return MergedDeprecatedFooBarTransfer
     */
    public function fromArray(array $data, $ignoreMissingProperty = false)
    {
        foreach ($data as $property => $value) {
            $property = $this->transferPropertyNameMap[$property] ?? null;

            switch ($property) {
                case 'scalarField':
                case 'arrayField':
                case 'projectLevelDeprecatedField':
                    $this->$property = $value;
                    $this->modifiedProperties[$property] = true;
                    break;
                case 'transferField':
                    if (is_array($value)) {
                        $type = $this->transferMetadata[$property]['type'];
                        /** @var \Spryker\Shared\Kernel\Transfer\TransferInterface $transferObject */
                        $value = (new $type())->fromArray($value, $ignoreMissingProperty);
                    }
                    $this->$property = $value;
                    $this->modifiedProperties[$property] = true;

                    break;
                case 'transferCollectionField':
                    $elementType = $this->transferMetadata[$property]['type'];
                    $this->$property = $this->processArrayObject($elementType, $value, $ignoreMissingProperty);
                    $this->modifiedProperties[$property] = true;
                    break;
                default:
                    if (!$ignoreMissingProperty) {
                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
                    }
            }
        }

        return $this;
    }

    /**
    * @param bool $isRecursive
    * @param bool $camelCasedKeys
    * @return array
    */
    public function modifiedToArray($isRecursive = true, $camelCasedKeys = false)
    {
        if ($isRecursive && !$camelCasedKeys) {
            return $this->modifiedToArrayRecursiveNotCamelCased();
        }
        if ($isRecursive && $camelCasedKeys) {
            return $this->modifiedToArrayRecursiveCamelCased();
        }
        if (!$isRecursive && $camelCasedKeys) {
            return $this->modifiedToArrayNotRecursiveCamelCased();
        }
        if (!$isRecursive && !$camelCasedKeys) {
            return $this->modifiedToArrayNotRecursiveNotCamelCased();
        }
    }

    /**
    * @param bool $isRecursive
    * @param bool $camelCasedKeys
    * @return array
    */
    public function toArray($isRecursive = true, $camelCasedKeys = false)
    {
        if ($isRecursive && !$camelCasedKeys) {
            return $this->toArrayRecursiveNotCamelCased();
        }
        if ($isRecursive && $camelCasedKeys) {
            return $this->toArrayRecursiveCamelCased();
        }
        if (!$isRecursive && !$camelCasedKeys) {
            return $this->toArrayNotRecursiveNotCamelCased();
        }
        if (!$isRecursive && $camelCasedKeys) {
            return $this->toArrayNotRecursiveCamelCased();
        }
    }

    /**
    * @param mixed $value
    * @param bool $isRecursive
    * @param bool $camelCasedKeys
    * @return array
    */
    protected function addValuesToCollectionModified($value, $isRecursive, $camelCasedKeys)
    {
        $result = [];
        foreach ($value as $elementKey => $arrayElement) {
            if ($arrayElement instanceof AbstractTransfer) {
                $result[$elementKey] = $arrayElement->modifiedToArray($isRecursive, $camelCasedKeys);
                continue;
            }
            $result[$elementKey] = $arrayElement;
        }

        return $result;
    }

    /**
    * @param mixed $value
    * @param bool $isRecursive
    * @param bool $camelCasedKeys
    * @return array
    */
    protected function addValuesToCollection($value, $isRecursive, $camelCasedKeys)
    {
        $result = [];
        foreach ($value as $elementKey => $arrayElement) {
            if ($arrayElement instanceof AbstractTransfer) {
                $result[$elementKey] = $arrayElement->toArray($isRecursive, $camelCasedKeys);
                continue;
            }
            $result[$elementKey] = $arrayElement;
        }

        return $result;
    }

    /**
    * @return array
    */
    public function modifiedToArrayRecursiveCamelCased()
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $property;
            switch ($property) {
                case 'scalarField':
                case 'arrayField':
                case 'projectLevelDeprecatedField':
                    $values[$arrayKey] = $value;
                    break;
                case 'transferField':
                    $values[$arrayKey] = $value instanceof AbstractTransfer ? $value->modifiedToArray(true, true) : $value;
                    break;
                case 'transferCollectionField':
                    $values[$arrayKey] = $value ? $this->addValuesToCollectionModified($value, true, true) : $value;
                    break;
            }
        }

        return $values;
    }

    /**
    * @return array
    */
    public function modifiedToArrayRecursiveNotCamelCased()
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $this->transferMetadata[$property]['name_underscore'];
            switch ($property) {
                case 'scalarField':
                case 'arrayField':
                case 'projectLevelDeprecatedField':
                    $values[$arrayKey] = $value;
                    break;
                case 'transferField':
                    $values[$arrayKey] = $value instanceof AbstractTransfer ? $value->modifiedToArray(true, false) : $value;
                    break;
                case 'transferCollectionField':
                    $values[$arrayKey] = $value ? $this->addValuesToCollectionModified($value, true, false) : $value;
                    break;
            }
        }

        return $values;
    }

    /**
    * @return array
    */
    public function modifiedToArrayNotRecursiveNotCamelCased()
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $this->transferMetadata[$property]['name_underscore'];
            $values[$arrayKey] = $value;
        }

        return $values;
    }

    /**
    * @return array
    */
    public function modifiedToArrayNotRecursiveCamelCased()
    {
        $values = [];
        foreach ($this->modifiedProperties as $property => $_) {
            $value = $this->$property;

            $arrayKey = $property;
            $values[$arrayKey] = $value;
        }

        return $values;
    }

    /**
    * @return void
    */
    protected function initCollectionProperties()
    {
        $this->transferCollectionField = $this->transferCollectionField ?: new ArrayObject();
    }

    /**
    * @return array
    */
    public function toArrayNotRecursiveCamelCased()
    {
        return [
            'scalarField' => $this->scalarField,
            'arrayField' => $this->arrayField,
            'projectLevelDeprecatedField' => $this->projectLevelDeprecatedField,
            'transferField' => $this->transferField,
            'transferCollectionField' => $this->transferCollectionField,
        ];
    }

    /**
    * @return array
    */
    public function toArrayNotRecursiveNotCamelCased()
    {
        return [
            'scalar_field' => $this->scalarField,
            'array_field' => $this->arrayField,
            'project_level_deprecated_field' => $this->projectLevelDeprecatedField,
            'transfer_field' => $this->transferField,
            'transfer_collection_field' => $this->transferCollectionField,
        ];
    }

    /**
    * @return array
    */
    public function toArrayRecursiveNotCamelCased()
    {
        return [
            'scalar_field' => $this->scalarField,
            'array_field' => $this->arrayField,
            'project_level_deprecated_field' => $this->projectLevelDeprecatedField,
            'transfer_field' => $this->transferField instanceof AbstractTransfer ? $this->transferField->toArray(true, false) : $this->transferField,
            'transfer_collection_field' => $this->addValuesToCollection($this->transferCollectionField, true, false),
        ];
    }

    /**
    * @return array
    */
    public function toArrayRecursiveCamelCased()
    {
        return [
            'scalarField' => $this->scalarField,
            'arrayField' => $this->arrayField,
            'projectLevelDeprecatedField' => $this->projectLevelDeprecatedField,
            'transferField' => $this->transferField instanceof AbstractTransfer ? $this->transferField->toArray(true, true) : $this->transferField,
            'transferCollectionField' => $this->addValuesToCollection($this->transferCollectionField, true, true),
        ];
    }
}

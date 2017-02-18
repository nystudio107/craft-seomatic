<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Product;

/**
 * ProductModel - A datasheet or vendor specification of a product (in the
 * sense of a prototypical description).
 * Extends: Product
 * @see    http://schema.org/ProductModel
 */
class ProductModel extends Product
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ProductModel';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ProductModel';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A datasheet or vendor specification of a product (in the sense of a prototypical description).';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Product';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * A pointer to a base product from which this product is a variant. It is
     * safe to infer that the variant inherits all product features from the base
     * model, unless defined locally. This is not transitive.
     * @var ProductModel [schema.org types: ProductModel]
     */
    public $isVariantOf;

    /**
     * A pointer from a previous, often discontinued variant of the product to its
     * newer variant.
     * @var ProductModel [schema.org types: ProductModel]
     */
    public $predecessorOf;

    /**
     * A pointer from a newer variant of a product to its previous, often
     * discontinued predecessor.
     * @var ProductModel [schema.org types: ProductModel]
     */
    public $successorOf;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'isVariantOf',
                'predecessorOf',
                'successorOf',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'isVariantOf' => ['ProductModel'],
                'predecessorOf' => ['ProductModel'],
                'successorOf' => ['ProductModel'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'isVariantOf' => 'A pointer to a base product from which this product is a variant. It is safe to infer that the variant inherits all product features from the base model, unless defined locally. This is not transitive.',
                'predecessorOf' => 'A pointer from a previous, often discontinued variant of the product to its newer variant.',
                'successorOf' => 'A pointer from a newer variant of a product to its previous, often discontinued predecessor.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['isVariantOf','predecessorOf','successorOf',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ProductModel*/

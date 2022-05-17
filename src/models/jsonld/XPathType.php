<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v14.0-release
 * XPathType - Text representing an XPath (typically but not necessarily version 1.0).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/XPathType
 */
class XPathType extends MetaJsonLd implements XPathTypeInterface, TextInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'XPathType';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/XPathType';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Text';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
Text representing an XPath (typically but not necessarily version 1.0).
SCHEMADESC;

    use XPathTypeTrait;
    use TextTrait;

    // Public methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function getGoogleRequiredSchema(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getGoogleRecommendedSchema(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules = array_merge($rules, [
            [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
            [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}

<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\ImageObject;

/**
 * Barcode - An image of a visual machine-readable code such as a barcode or
 * QR code.
 * Extends: ImageObject
 * @see    http://schema.org/Barcode
 */
class Barcode extends ImageObject
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Barcode';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Barcode';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An image of a visual machine-readable code such as a barcode or QR code.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'ImageObject';

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
     * The caption for this object.
     * @var string [schema.org types: Text]
     */
    public $caption;

    /**
     * exif data for this object.
     * @var mixed PropertyValue, string [schema.org types: PropertyValue, Text]
     */
    public $exifData;

    /**
     * Indicates whether this image is representative of the content of the page.
     * @var mixed bool [schema.org types: Boolean]
     */
    public $representativeOfPage;

    /**
     * Thumbnail image for an image or video.
     * @var mixed ImageObject [schema.org types: ImageObject]
     */
    public $thumbnail;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'caption',
                'exifData',
                'representativeOfPage',
                'thumbnail',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'caption' => ['Text'],
                'exifData' => ['PropertyValue','Text'],
                'representativeOfPage' => ['Boolean'],
                'thumbnail' => ['ImageObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'caption' => 'The caption for this object.',
                'exifData' => 'exif data for this object.',
                'representativeOfPage' => 'Indicates whether this image is representative of the content of the page.',
                'thumbnail' => 'Thumbnail image for an image or video.',
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
                [['caption','exifData','representativeOfPage','thumbnail',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Barcode*/

<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MediaObject;

/**
 * ImageObject - An image file.
 * Extends: MediaObject
 * @see    http://schema.org/ImageObject
 */
class ImageObject extends MediaObject
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ImageObject';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ImageObject';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An image file.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'MediaObject';

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
     * A NewsArticle associated with the Media Object.
     * @var NewsArticle [schema.org types: NewsArticle]
     */
    public $associatedArticle;

    /**
     * The bitrate of the media object.
     * @var string [schema.org types: Text]
     */
    public $bitrate;

    /**
     * File size in (mega/kilo) bytes.
     * @var string [schema.org types: Text]
     */
    public $contentSize;

    /**
     * Actual bytes of the media object, for example the image file or video file.
     * @var string [schema.org types: URL]
     */
    public $contentUrl;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     * @var Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * A URL pointing to a player for a specific video. In general, this is the
     * information in the src element of an embed tag and should not be the same
     * as the content of the loc tag.
     * @var string [schema.org types: URL]
     */
    public $embedUrl;

    /**
     * The CreativeWork encoded by this media object.
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $encodesCreativeWork;

    /**
     * mp3, mpeg4, etc.
     * @var string [schema.org types: Text]
     */
    public $encodingFormat;

    /**
     * Date the content expires and is no longer useful or available. Useful for
     * videos.
     * @var Date [schema.org types: Date]
     */
    public $expires;

    /**
     * The height of the item.
     * @var mixed Distance, QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $height;

    /**
     * Player type required—for example, Flash or Silverlight.
     * @var mixed string [schema.org types: Text]
     */
    public $playerType;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     * @var mixed Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * The regions where the media is allowed. If not specified, then it's assumed
     * to be allowed everywhere. Specify the countries in ISO 3166 format.
     * @var mixed Place [schema.org types: Place]
     */
    public $regionsAllowed;

    /**
     * Indicates if use of the media require a subscription (either paid or free).
     * Allowed values are true or false (note that an earlier version had 'yes',
     * 'no').
     * @var mixed bool [schema.org types: Boolean]
     */
    public $requiresSubscription;

    /**
     * Date when this media object was uploaded to this site.
     * @var mixed Date [schema.org types: Date]
     */
    public $uploadDate;

    /**
     * The width of the item.
     * @var mixed Distance, QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $width;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'associatedArticle',
                'bitrate',
                'contentSize',
                'contentUrl',
                'duration',
                'embedUrl',
                'encodesCreativeWork',
                'encodingFormat',
                'expires',
                'height',
                'playerType',
                'productionCompany',
                'regionsAllowed',
                'requiresSubscription',
                'uploadDate',
                'width',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'associatedArticle' => ['NewsArticle'],
                'bitrate' => ['Text'],
                'contentSize' => ['Text'],
                'contentUrl' => ['URL'],
                'duration' => ['Duration'],
                'embedUrl' => ['URL'],
                'encodesCreativeWork' => ['CreativeWork'],
                'encodingFormat' => ['Text'],
                'expires' => ['Date'],
                'height' => ['Distance','QuantitativeValue'],
                'playerType' => ['Text'],
                'productionCompany' => ['Organization'],
                'regionsAllowed' => ['Place'],
                'requiresSubscription' => ['Boolean'],
                'uploadDate' => ['Date'],
                'width' => ['Distance','QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'associatedArticle' => 'A NewsArticle associated with the Media Object.',
                'bitrate' => 'The bitrate of the media object.',
                'contentSize' => 'File size in (mega/kilo) bytes.',
                'contentUrl' => 'Actual bytes of the media object, for example the image file or video file.',
                'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
                'embedUrl' => 'A URL pointing to a player for a specific video. In general, this is the information in the src element of an embed tag and should not be the same as the content of the loc tag.',
                'encodesCreativeWork' => 'The CreativeWork encoded by this media object.',
                'encodingFormat' => 'mp3, mpeg4, etc.',
                'expires' => 'Date the content expires and is no longer useful or available. Useful for videos.',
                'height' => 'The height of the item.',
                'playerType' => 'Player type required—for example, Flash or Silverlight.',
                'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
                'regionsAllowed' => 'The regions where the media is allowed. If not specified, then it\'s assumed to be allowed everywhere. Specify the countries in ISO 3166 format.',
                'requiresSubscription' => 'Indicates if use of the media require a subscription (either paid or free). Allowed values are true or false (note that an earlier version had \'yes\', \'no\').',
                'uploadDate' => 'Date when this media object was uploaded to this site.',
                'width' => 'The width of the item.',
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
                [['associatedArticle','bitrate','contentSize','contentUrl','duration','embedUrl','encodesCreativeWork','encodingFormat','expires','height','playerType','productionCompany','regionsAllowed','requiresSubscription','uploadDate','width',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ImageObject*/

<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * MediaObject - A media object, such as an image, video, or audio object
 * embedded in a web page or a downloadable dataset i.e. DataDownload. Note
 * that a creative work may have many media objects associated with it on the
 * same web page. For example, a page about a single song (MusicRecording) may
 * have a music video (VideoObject), and a high and low bandwidth audio stream
 * (2 AudioObject's).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MediaObject
 */
class MediaObject extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MediaObject';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MediaObject';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A media object, such as an image, video, or audio object embedded in a web page or a downloadable dataset i.e. DataDownload. Note that a creative work may have many media objects associated with it on the same web page. For example, a page about a single song (MusicRecording) may have a music video (VideoObject), and a high and low bandwidth audio stream (2 AudioObject\'s).';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * A NewsArticle associated with the Media Object.
     *
     * @var NewsArticle [schema.org types: NewsArticle]
     */
    public $associatedArticle;

    /**
     * The bitrate of the media object.
     *
     * @var string [schema.org types: Text]
     */
    public $bitrate;

    /**
     * File size in (mega/kilo) bytes.
     *
     * @var string [schema.org types: Text]
     */
    public $contentSize;

    /**
     * Actual bytes of the media object, for example the image file or video file.
     *
     * @var string [schema.org types: URL]
     */
    public $contentUrl;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * A URL pointing to a player for a specific video. In general, this is the
     * information in the src element of an embed tag and should not be the same
     * as the content of the loc tag.
     *
     * @var string [schema.org types: URL]
     */
    public $embedUrl;

    /**
     * The CreativeWork encoded by this media object. Inverse property: encoding.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $encodesCreativeWork;

    /**
     * Media type typically expressed using a MIME format (see IANA site and MDN
     * reference) e.g. application/zip for a SoftwareApplication binary,
     * audio/mpeg for .mp3 etc.). In cases where a CreativeWork has several media
     * type representations, encoding can be used to indicate each MediaObject
     * alongside particular encodingFormat information. Unregistered or niche
     * encoding and file formats can be indicated instead via the most appropriate
     * URL, e.g. defining Web page or a Wikipedia/Wikidata entry. Supersedes
     * fileFormat.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $encodingFormat;

    /**
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to December. For media, including audio and
     * video, it's the time offset of the end of a clip within a larger file. Note
     * that Event uses startDate/endDate instead of startTime/endTime, even when
     * describing dates with times. This situation may be clarified in future
     * revisions.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $endTime;

    /**
     * The height of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $height;

    /**
     * Player type required—for example, Flash or Silverlight.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $playerType;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * The regions where the media is allowed. If not specified, then it's assumed
     * to be allowed everywhere. Specify the countries in ISO 3166 format.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $regionsAllowed;

    /**
     * Indicates if use of the media require a subscription (either paid or free).
     * Allowed values are true or false (note that an earlier version had 'yes',
     * 'no').
     *
     * @var mixed|bool|MediaSubscription [schema.org types: Boolean, MediaSubscription]
     */
    public $requiresSubscription;

    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to December. For media, including audio and
     * video, it's the time offset of the start of a clip within a larger file.
     * Note that Event uses startDate/endDate instead of startTime/endTime, even
     * when describing dates with times. This situation may be clarified in future
     * revisions.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $startTime;

    /**
     * Date when this media object was uploaded to this site.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $uploadDate;

    /**
     * The width of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $width;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'associatedArticle',
        'bitrate',
        'contentSize',
        'contentUrl',
        'duration',
        'embedUrl',
        'encodesCreativeWork',
        'encodingFormat',
        'endTime',
        'height',
        'playerType',
        'productionCompany',
        'regionsAllowed',
        'requiresSubscription',
        'startTime',
        'uploadDate',
        'width'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'associatedArticle' => ['NewsArticle'],
        'bitrate' => ['Text'],
        'contentSize' => ['Text'],
        'contentUrl' => ['URL'],
        'duration' => ['Duration'],
        'embedUrl' => ['URL'],
        'encodesCreativeWork' => ['CreativeWork'],
        'encodingFormat' => ['Text','URL'],
        'endTime' => ['DateTime'],
        'height' => ['Distance','QuantitativeValue'],
        'playerType' => ['Text'],
        'productionCompany' => ['Organization'],
        'regionsAllowed' => ['Place'],
        'requiresSubscription' => ['Boolean','MediaSubscription'],
        'startTime' => ['DateTime'],
        'uploadDate' => ['Date'],
        'width' => ['Distance','QuantitativeValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'associatedArticle' => 'A NewsArticle associated with the Media Object.',
        'bitrate' => 'The bitrate of the media object.',
        'contentSize' => 'File size in (mega/kilo) bytes.',
        'contentUrl' => 'Actual bytes of the media object, for example the image file or video file.',
        'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
        'embedUrl' => 'A URL pointing to a player for a specific video. In general, this is the information in the src element of an embed tag and should not be the same as the content of the loc tag.',
        'encodesCreativeWork' => 'The CreativeWork encoded by this media object. Inverse property: encoding.',
        'encodingFormat' => 'Media type typically expressed using a MIME format (see IANA site and MDN reference) e.g. application/zip for a SoftwareApplication binary, audio/mpeg for .mp3 etc.). In cases where a CreativeWork has several media type representations, encoding can be used to indicate each MediaObject alongside particular encodingFormat information. Unregistered or niche encoding and file formats can be indicated instead via the most appropriate URL, e.g. defining Web page or a Wikipedia/Wikidata entry. Supersedes fileFormat.',
        'endTime' => 'The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to December. For media, including audio and video, it\'s the time offset of the end of a clip within a larger file. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
        'height' => 'The height of the item.',
        'playerType' => 'Player type required—for example, Flash or Silverlight.',
        'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
        'regionsAllowed' => 'The regions where the media is allowed. If not specified, then it\'s assumed to be allowed everywhere. Specify the countries in ISO 3166 format.',
        'requiresSubscription' => 'Indicates if use of the media require a subscription (either paid or free). Allowed values are true or false (note that an earlier version had \'yes\', \'no\').',
        'startTime' => 'The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to December. For media, including audio and video, it\'s the time offset of the start of a clip within a larger file. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
        'uploadDate' => 'Date when this media object was uploaded to this site.',
        'width' => 'The width of the item.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['associatedArticle','bitrate','contentSize','contentUrl','duration','embedUrl','encodesCreativeWork','encodingFormat','endTime','height','playerType','productionCompany','regionsAllowed','requiresSubscription','startTime','uploadDate','width'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}

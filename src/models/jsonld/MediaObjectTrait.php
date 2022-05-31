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

/**
 * schema.org version: v14.0-release
 * Trait for MediaObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MediaObject
 */

trait MediaObjectTrait
{
    
    /**
     * File size in (mega/kilo) bytes.
     *
     * @var string|Text
     */
    public $contentSize;

    /**
     * Actual bytes of the media object, for example the image file or video file.
     *
     * @var URL
     */
    public $contentUrl;

    /**
     * The width of the item.
     *
     * @var QuantitativeValue|Distance
     */
    public $width;

    /**
     * The height of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $height;

    /**
     * The regions where the media is allowed. If not specified, then it's assumed
     * to be allowed everywhere. Specify the countries in [ISO 3166
     * format](http://en.wikipedia.org/wiki/ISO_3166).
     *
     * @var Place
     */
    public $regionsAllowed;

    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from *January* to December. For media, including audio
     * and video, it's the time offset of the start of a clip within a larger
     * file.  Note that Event uses startDate/endDate instead of startTime/endTime,
     * even when describing dates with times. This situation may be clarified in
     * future revisions.
     *
     * @var DateTime|Time
     */
    public $startTime;

    /**
     * A NewsArticle associated with the Media Object.
     *
     * @var NewsArticle
     */
    public $associatedArticle;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed.  See also [[eligibleRegion]].       
     *
     * @var string|Place|Text|GeoShape
     */
    public $ineligibleRegion;

    /**
     * Indicates if use of the media require a subscription  (either paid or
     * free). Allowed values are ```true``` or ```false``` (note that an earlier
     * version had 'yes', 'no').
     *
     * @var bool|MediaSubscription|Boolean
     */
    public $requiresSubscription;

    /**
     * Player type required—for example, Flash or Silverlight.
     *
     * @var string|Text
     */
    public $playerType;

    /**
     * The CreativeWork encoded by this media object.
     *
     * @var CreativeWork
     */
    public $encodesCreativeWork;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * Media type typically expressed using a MIME format (see [IANA
     * site](http://www.iana.org/assignments/media-types/media-types.xhtml) and
     * [MDN
     * reference](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types))
     * e.g. application/zip for a SoftwareApplication binary, audio/mpeg for .mp3
     * etc.).  In cases where a [[CreativeWork]] has several media type
     * representations, [[encoding]] can be used to indicate each [[MediaObject]]
     * alongside particular [[encodingFormat]] information.  Unregistered or niche
     * encoding and file formats can be indicated instead via the most appropriate
     * URL, e.g. defining Web page or a Wikipedia/Wikidata entry.
     *
     * @var string|Text|URL
     */
    public $encodingFormat;

    /**
     * Date when this media object was uploaded to this site.
     *
     * @var Date
     */
    public $uploadDate;

    /**
     * A URL pointing to a player for a specific video. In general, this is the
     * information in the ```src``` element of an ```embed``` tag and should not
     * be the same as the content of the ```loc``` tag.
     *
     * @var URL
     */
    public $embedUrl;

    /**
     * The bitrate of the media object.
     *
     * @var string|Text
     */
    public $bitrate;

    /**
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to *December*. For media, including audio
     * and video, it's the time offset of the end of a clip within a larger file. 
     * Note that Event uses startDate/endDate instead of startTime/endTime, even
     * when describing dates with times. This situation may be clarified in future
     * revisions.
     *
     * @var DateTime|Time
     */
    public $endTime;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var Organization
     */
    public $productionCompany;

    /**
     * The [SHA-2](https://en.wikipedia.org/wiki/SHA-2) SHA256 hash of the content
     * of the item. For example, a zero-length input has value
     * 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'
     *
     * @var string|Text
     */
    public $sha256;

    /**
     * Used to indicate a specific claim contained, implied, translated or refined
     * from the content of a [[MediaObject]] or other [[CreativeWork]]. The
     * interpreting party can be indicated using [[claimInterpreter]].
     *
     * @var Claim
     */
    public $interpretedAsClaim;

}

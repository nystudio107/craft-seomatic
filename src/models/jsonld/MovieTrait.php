<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Movie.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Movie
 */
trait MovieTrait
{
    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $actors;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * An [EIDR](https://eidr.org/) (Entertainment Identifier Registry)
     * [[identifier]] representing at the most general/abstract level, a work of
     * film or television.  For example, the motion picture known as
     * "Ghostbusters" has a titleEIDR of  "10.5240/7EC7-228A-510A-053E-CBB8-J".
     * This title (or work) may have several variants, which EIDR calls "edits".
     * See [[editEIDR]].  Since schema.org types like [[Movie]] and [[TVEpisode]]
     * can be used for both works and their multiple expressions, it is possible
     * to use [[titleEIDR]] alone (for a general description), or alongside
     * [[editEIDR]] for a more edit-specific description.
     *
     * @var string|URL|Text
     */
    public $titleEIDR;

    /**
     * Languages in which subtitles/captions are available, in [IETF BCP 47
     * standard format](http://tools.ietf.org/html/bcp47).
     *
     * @var string|Language|Text
     */
    public $subtitleLanguage;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var VideoObject
     */
    public $trailer;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var Organization
     */
    public $productionCompany;

    /**
     * The country of origin of something, including products as well as creative
     * works such as movie and TV content.  In the case of TV and movie, this
     * would be the country of the principle offices of the production company or
     * individual responsible for the movie. For other kinds of [[CreativeWork]]
     * it is difficult to provide fully general guidance, and properties such as
     * [[contentLocation]] and [[locationCreated]] may be more applicable.  In the
     * case of products, the country of origin of the product. The exact
     * interpretation of this may vary by context and product type, and cannot be
     * fully enumerated here.
     *
     * @var Country
     */
    public $countryOfOrigin;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

    /**
     * The composer of the soundtrack.
     *
     * @var MusicGroup|Person
     */
    public $musicBy;
}

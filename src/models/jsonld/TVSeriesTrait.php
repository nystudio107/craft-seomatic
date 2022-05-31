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
 * Trait for TVSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TVSeries
 */

trait TVSeriesTrait
{
    
    /**
     * A season in a media series.
     *
     * @var URL|CreativeWorkSeason
     */
    public $season;

    /**
     * A season that is part of the media series.
     *
     * @var CreativeWorkSeason
     */
    public $containsSeason;

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
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     *
     * @var VideoObject
     */
    public $trailer;

    /**
     * An episode of a TV/radio series or season.
     *
     * @var Episode
     */
    public $episodes;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|Integer
     */
    public $numberOfEpisodes;

    /**
     * A season in a media series.
     *
     * @var CreativeWorkSeason
     */
    public $seasons;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var Organization
     */
    public $productionCompany;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $actors;

    /**
     * The number of seasons in this series.
     *
     * @var int|Integer
     */
    public $numberOfSeasons;

    /**
     * The composer of the soundtrack.
     *
     * @var Person|MusicGroup
     */
    public $musicBy;

    /**
     * An episode of a tv, radio or game media within a series or season.
     *
     * @var Episode
     */
    public $episode;

    /**
     * A director of e.g. tv, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

}

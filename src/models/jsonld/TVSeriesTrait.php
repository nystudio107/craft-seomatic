<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
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
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $seasons;

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
     * @var array|Country|Country[]
     */
    public $countryOfOrigin;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * The number of seasons in this series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfSeasons;

    /**
     * An episode of a TV/radio series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episodes;

    /**
     * An episode of a TV, radio or game media within a series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episode;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var array|VideoObject|VideoObject[]
     */
    public $trailer;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var array|Organization|Organization[]
     */
    public $productionCompany;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $directors;

    /**
     * A season in a media series.
     *
     * @var array|URL|URL[]|array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $season;

    /**
     * An [EIDR](https://eidr.org/) (Entertainment Identifier Registry)
     * [[identifier]] representing at the most general/abstract level, a work of
     * film or television.  For example, the motion picture known as
     * "Ghostbusters" has a titleEIDR of  "10.5240/7EC7-228A-510A-053E-CBB8-J".
     * This title (or work) may have several variants, which EIDR calls "edits".
     * See [[editEIDR]].  Since schema.org types like [[Movie]], [[TVEpisode]],
     * [[TVSeason]], and [[TVSeries]] can be used for both works and their
     * multiple expressions, it is possible to use [[titleEIDR]] alone (for a
     * general description), or alongside [[editEIDR]] for a more edit-specific
     * description.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $titleEIDR;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfEpisodes;

    /**
     * A season that is part of the media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $containsSeason;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $actors;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var array|Person|Person[]
     */
    public $actor;

    /**
     * The composer of the soundtrack.
     *
     * @var array|Person|Person[]|array|MusicGroup|MusicGroup[]
     */
    public $musicBy;
}

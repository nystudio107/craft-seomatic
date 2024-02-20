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
 * Trait for TVSeason.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TVSeason
 */
trait TVSeasonTrait
{
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
     * The TV series to which this episode or season belongs.
     *
     * @var array|TVSeries|TVSeries[]
     */
    public $partOfTVSeries;
}

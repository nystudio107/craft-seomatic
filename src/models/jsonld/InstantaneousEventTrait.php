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
 * schema.org version: v30.0
 * Trait for InstantaneousEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/InstantaneousEvent
 */
trait InstantaneousEventTrait
{
    /**
     * Data associated with the event, like for instance a log message.
     *
     * @var array|Thing|Thing[]
     */
    public $data;

    /**
     * The source or cause of the event.
     *
     * @var array|Thing|Thing[]
     */
    public $source;

    /**
     * The instant the event occured.
     *
     * @var array|DateTime|DateTime[]
     */
    public $timestamp;
}

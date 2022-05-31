<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for PublicationEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PublicationEvent
 */

trait PublicationEventTrait
{
    
    /**
     * An agent associated with the publication event.
     *
     * @var Organization|Person
     */
    public $publishedBy;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     *
     * @var bool|Boolean
     */
    public $free;

    /**
     * A broadcast service associated with the publication event.
     *
     * @var BroadcastService
     */
    public $publishedOn;

}

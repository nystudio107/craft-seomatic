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
 * Trait for BroadcastFrequencySpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastFrequencySpecification
 */

trait BroadcastFrequencySpecificationTrait
{
    
    /**
     * The subchannel used for the broadcast.
     *
     * @var string|Text
     */
    public $broadcastSubChannel;

    /**
     * The modulation (e.g. FM, AM, etc) used by a particular broadcast service.
     *
     * @var string|QualitativeValue|Text
     */
    public $broadcastSignalModulation;

    /**
     * The frequency in MHz for a particular broadcast.
     *
     * @var float|Number|QuantitativeValue
     */
    public $broadcastFrequencyValue;

}

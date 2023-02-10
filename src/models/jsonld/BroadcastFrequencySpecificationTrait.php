<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for BroadcastFrequencySpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastFrequencySpecification
 */
trait BroadcastFrequencySpecificationTrait
{
    /**
     * The modulation (e.g. FM, AM, etc) used by a particular broadcast service.
     *
     * @var string|Text|QualitativeValue
     */
    public $broadcastSignalModulation;

    /**
     * The subchannel used for the broadcast.
     *
     * @var string|Text
     */
    public $broadcastSubChannel;

    /**
     * The frequency in MHz for a particular broadcast.
     *
     * @var float|Number|QuantitativeValue
     */
    public $broadcastFrequencyValue;
}

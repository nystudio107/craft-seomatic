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
 * Trait for BroadcastFrequencySpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastFrequencySpecification
 */
trait BroadcastFrequencySpecificationTrait
{
    /**
     * The frequency in MHz for a particular broadcast.
     *
     * @var float|array|QuantitativeValue|QuantitativeValue[]|array|Number|Number[]
     */
    public $broadcastFrequencyValue;

    /**
     * The modulation (e.g. FM, AM, etc) used by a particular broadcast service.
     *
     * @var string|array|Text|Text[]|array|QualitativeValue|QualitativeValue[]
     */
    public $broadcastSignalModulation;

    /**
     * The subchannel used for the broadcast.
     *
     * @var string|array|Text|Text[]
     */
    public $broadcastSubChannel;
}

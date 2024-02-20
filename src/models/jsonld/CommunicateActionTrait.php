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
 * Trait for CommunicateAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CommunicateAction
 */
trait CommunicateActionTrait
{
    /**
     * The subject matter of the content.
     *
     * @var array|Thing|Thing[]
     */
    public $about;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|array|Text|Text[]|array|Language|Language[]
     */
    public $inLanguage;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var array|Organization|Organization[]|array|Audience|Audience[]|array|Person|Person[]|array|ContactPoint|ContactPoint[]
     */
    public $recipient;

    /**
     * A sub property of instrument. The language used on this action.
     *
     * @var array|Language|Language[]
     */
    public $language;
}

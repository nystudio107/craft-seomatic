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
     * @var Thing
     */
    public $about;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var Organization|ContactPoint|Person|Audience
     */
    public $recipient;

    /**
     * A sub property of instrument. The language used on this action.
     *
     * @var Language
     */
    public $language;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|Text|Language
     */
    public $inLanguage;
}

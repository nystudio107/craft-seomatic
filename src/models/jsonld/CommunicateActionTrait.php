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
 * Trait for CommunicateAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CommunicateAction
 */

trait CommunicateActionTrait
{
    
    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var Person|Audience|ContactPoint|Organization
     */
    public $recipient;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|Text|Language
     */
    public $inLanguage;

    /**
     * A sub property of instrument. The language used on this action.
     *
     * @var Language
     */
    public $language;

    /**
     * The subject matter of the content.
     *
     * @var Thing
     */
    public $about;

}

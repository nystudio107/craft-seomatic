<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for PronounceableText.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PronounceableText
 */
trait PronounceableTextTrait
{
    /**
     * Text value being annotated.
     *
     * @var string|Text
     */
    public $textValue;

    /**
     * Representation of a text [[textValue]] using the specified
     * [[speechToTextMarkup]]. For example the city name of Houston in IPA:
     * /ˈhjuːstən/.
     *
     * @var string|Text
     */
    public $phoneticText;

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
     * Form of markup used. eg. [SSML](https://www.w3.org/TR/speech-synthesis11)
     * or [IPA](https://www.wikidata.org/wiki/Property:P898).
     *
     * @var string|Text
     */
    public $speechToTextMarkup;
}

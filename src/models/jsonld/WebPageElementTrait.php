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
 * Trait for WebPageElement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WebPageElement
 */
trait WebPageElementTrait
{
    /**
     * An XPath, e.g. of a [[SpeakableSpecification]] or [[WebPageElement]]. In
     * the latter case, multiple matches within a page can constitute a single
     * conceptual "Web page element".
     *
     * @var array|XPathType|XPathType[]
     */
    public $xpath;

    /**
     * A CSS selector, e.g. of a [[SpeakableSpecification]] or [[WebPageElement]].
     * In the latter case, multiple matches within a page can constitute a single
     * conceptual "Web page element".
     *
     * @var array|CssSelectorType|CssSelectorType[]
     */
    public $cssSelector;
}

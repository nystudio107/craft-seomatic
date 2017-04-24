<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\variables;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\services\MetaContainers;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticVariable
{
    /**
     * Set the page's <title> tag
     *
     * @param string $title The page <title> tag text
     */
    public function includeMetaTitle(string $title)
    {
        Seomatic::$plugin->metaContainers->includeMetaTitle($title);
    }

    /**
     * Create a meta tag
     *
     * @param array $attributes The meta tag attributes
     *
     * @return null|MetaTag     The model object
     */
    public function createMetaTag(array $attributes = [])
    {
        return MetaTag::create($attributes);
    }

    /**
     * @param MetaTag $metaTag
     * @param string  $key
     */
    public function includeMetaTag(
        MetaTag $metaTag,
        $key = MetaContainers::SEOMATIC_METATAG_CONTAINER . MetaContainers::METATAG_GENERAL_HANDLE
    ) {
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaTag, $key);
    }

    /**
     * Create a link tag
     *
     * @param array $attributes The link tag attributes
     *
     * @return null|MetaLink    The model object
     */
    public function createMetaLink(array $attributes = [])
    {
        return MetaLink::create($attributes);
    }

    /**
     * @param MetaLink $metaLink
     * @param string   $key
     */
    public function includeMetaLink(
        MetaLink $metaLink,
        $key = MetaContainers::SEOMATIC_METALINK_CONTAINER . MetaContainers::METALINK_GENERAL_HANDLE
    ) {
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaLink, $key);
    }

    /**
     * Create a new JSON-LD schema type object
     *
     * @param string $jsonLdType The schema.org type to create
     * @param array  $config     The default attributes for the model
     *
     * @return null|MetaJsonLd   The model object
     */
    public function createMetaJsonLd(string $jsonLdType, $config = [])
    {
        return MetaJsonLd::create($jsonLdType, $config);
    }

    /**
     * @param MetaJsonLd $jsonLdModel
     * @param string     $key
     */
    public function includeMetaJsonLd(
        MetaJsonLd $jsonLdModel,
        $key = MetaContainers::SEOMATIC_METAJSONLD_CONTAINER . MetaContainers::METAJSONLD_GENERAL_HANDLE
    ) {
        Seomatic::$plugin->metaContainers->addToMetaContainer($jsonLdModel, $key);
    }

    /**
     * Create a meta script from a template
     *
     * @param string $template The template to render
     * @param array  $vars     The variables to include
     *
     * @return null|MetaScript The model object
     */
    public function createMetaScript(string $template, array $vars = [])
    {
        $config = [
            'templatePath' => '_metaScripts/' . $template,
            'vars'         => $vars,
        ];

        return MetaScript::create($config);
    }

    /**
     * @param MetaScript $metaScript
     * @param string     $key
     */
    public function includeMetaScript(
        MetaScript $metaScript,
        $key = MetaContainers::SEOMATIC_METASCRIPT_CONTAINER . MetaContainers::METASCRIPT_GENERAL_HANDLE
    ) {
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaScript, $key);
    }

    /**
     * Get the plugin's name
     *
     * @return null|string
     */
    public function getPluginName()
    {
        return Seomatic::$plugin->name;
    }

    /**
     * Get all of the meta bundles
     *
     * @param bool $allSites
     *
     * @return array
     */
    public function getContentMetaBundles(bool $allSites = true)
    {
        return Seomatic::$plugin->metaBundles->getContentMetaBundles($allSites);
    }
}

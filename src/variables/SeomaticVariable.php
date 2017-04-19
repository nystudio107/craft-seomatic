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
     * @param string $title  The page <title> tag text
     */
    public function includeMetaTitle(string $title)
    {
        Seomatic::$plugin->meta->includeMetaTitle($title);
    }

    /**
     * Create a meta tag
     *
     * @param array  $attributes  The meta tag attributes
     *
     * @return mixed              The model object
     */
    public function createMetaTag(array $attributes = [])
    {
        return MetaTag::create($attributes);
    }

    /**
     * @param MetaTag $metaTag
     * @param null    $key
     */
    public function includeMetaTag(MetaTag $metaTag, $key = null)
    {
        Seomatic::$plugin->meta->addToMetaContainer($metaTag, MetaTagContainer::CONTAINER_TYPE, $key);
    }

    /**
     * Create a link tag
     *
     * @param array  $attributes  The link tag attributes
     *
     * @return mixed              The model object
     */
    public function createMetaLink(array $attributes = [])
    {
        return MetaLink::create($attributes);
    }

    /**
     * @param MetaLink $metaLink
     * @param null     $key
     */
    public function includeMetaLink(MetaLink $metaLink, $key = null)
    {
        Seomatic::$plugin->meta->addToMetaContainer($metaLink, MetaLinkContainer::CONTAINER_TYPE, $key);
    }

    /**
     * Create a new JSON-LD schema type object
     *
     * @param string $jsonLdType  The schema.org type to create
     * @param array  $config      The default attributes for the model
     *
     * @return mixed              The model object
     */
    public function createMetaJsonLd(string $jsonLdType, $config = [])
    {
        return MetaJsonLd::create($jsonLdType, $config);
    }

    /**
     * @param MetaJsonLd $jsonLdModel
     * @param string $key
     */
    public function includeMetaJsonLd(MetaJsonLd $jsonLdModel, $key = null)
    {
        Seomatic::$plugin->meta->addToMetaContainer($jsonLdModel, MetaJsonLdContainer::CONTAINER_TYPE, $key);
    }

    /**
     * Create a meta script from a template
     *
     * @param string $template  The template to render
     * @param array  $vars      The variables to include
     *
     * @return mixed            The model object
     */
    public function createMetaScript(string $template, array $vars = [])
    {
        $config = [
            'templatePath' => '_metaScripts/' . $template,
            'vars' => $vars,
        ];
        return MetaScript::create($config);
    }

    /**
     * @param MetaScript $metaScript
     * @param string $key
     */
    public function includeMetaScript(MetaScript $metaScript, $key = null)
    {
        Seomatic::$plugin->meta->addToMetaContainer($metaScript, MetaScriptContainer::CONTAINER_TYPE, $key);
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
     * @return array
     */
    public function getMetaBundles()
    {
        return Seomatic::$plugin->metaBundles->metaBundles();
    }
}

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
use nystudio107\seomatic\models\JsonLd;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaTagsContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;

use Craft;

/**
 * Template variables
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */

class SeomaticVariable
{
    /**
     * Create a new JSON-LD schema type object
     *
     * @param string $jsonLdType  The schema.org type to create
     * @param array  $config      The default attributes for the model
     *
     * @return mixed              The model object
     */
    public function createJsonLd(string $jsonLdType, $config = [])
    {
        return JsonLd::create($jsonLdType, $config);
    }

    /**
     * @param JsonLd $jsonLdModel
     */
    public function includeJsonLd(JsonLd $jsonLdModel)
    {
        Seomatic::$plugin->meta->addMetaContainer(MetaJsonLdContainer::CONTAINER_TYPE, $jsonLdModel);
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
     */
    public function includeMetaScript(MetaScript $metaScript)
    {
        Seomatic::$plugin->meta->addMetaContainer(MetaScriptContainer::CONTAINER_TYPE, $metaScript);
    }

}
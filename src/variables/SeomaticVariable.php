<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\variables;

use nystudio107\seomatic\models\JsonLd;

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
     * @param  string $jsonLdType The schema.org type to create
     * @param  array  $config     The default attributes for the model
     * @return mixed              The model object
     */
    public function createJsonLd($jsonLdType, $config = [])
    {
        return $someSchema = JsonLd::create($jsonLdType, $config);
    } /* -- createJsonLd */

}
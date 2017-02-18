<?php
namespace nystudio107\seomatic\twigextensions;

use nystudio107\seomatic\models\JsonLd;

use Craft;

class JsonLdTwigExtension extends \Twig_Extension
{

    /**
     * Return our Twig Extension name
     * @return string [description]
     */
    public function getName()
    {
        return 'JsonLD';
    }

    /**
     * Return our Twig filters
     * @return array [description]
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('createJsonLd', [$this, 'createJsonLd']),
        );
    } /* -- getFilters */

    /**
     * Return our Twig functions
     * @return array [description]
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('createJsonLd', [$this, 'createJsonLd']),
        );
    } /* -- getFunctions */

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

} /* -- JsonLdTwigExtension */

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

namespace nystudio107\seomatic\base;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
interface MetaServiceInterface
{
    // Public Methods
    // =========================================================================

    /**
     * Get a meta item of a given key
     *
     * @param string $key    The key of the MetaItem to fetch
     * @param string $handle An optional handle to for the MetaContainer to search (defaults to all)
     *
     * @return null|MetaItem
     */
    public function get(string $key, string $handle = '');

    /**
     * Create a meta item
     *
     * @param array $config The configuration array used to create the MetaItem
     * @param bool  $add    Whether to add the newly created tag to a container
     *
     * @return MetaItem
     */
    public function create(array $config = [], $add = true);

    /**
     * Add a meta item to its appropriate container
     *
     * @param MetaItem $metaItem The MetaItem to add
     * @param string   $handle   An optional container handle to add the MetaItem to (defaults to GENERAL)
     *
     * @return null|MetaItem
     */
    public function add($metaItem, string $handle = '');

    /**
     * Render all of the MetaItems in this container
     *
     * @return \Twig_Markup|null
     */
    public function render();

    /**
     * Get the container for these meta items
     *
     * @param string $handle An optional container handle to get (defaults to GENERAL)
     *
     * @return null|MetaContainer The found MetaContainer
     */
    public function container(string $handle = '');
}

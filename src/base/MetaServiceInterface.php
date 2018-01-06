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
     * @param string $key
     * @param string $handle
     *
     * @return MetaItem
     */
    public function get(string $key, string $handle = '');

    /**
     * Create a meta item
     *
     * @param array $config
     *
     * @return MetaItem
     */
    public function create($config = []);

    /**
     * Add a meta item to its appropriate container
     *
     * @param MetaItem $metaItem
     * @param string $handle
     *
     * @return void
     */
    public function add($metaItem, string $handle = '');

    /**
     * Get the container for these meta items
     *
     * @param string $handle
     *
     * @return MetaContainer
     */
    public function container(string $handle = '');
}

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
interface MetaContainerInterface
{
    // Public Methods
    // =========================================================================

    /**
     * Include the MetaItems in the container in the Yii View
     */
    public function includeMetaData();

    /**
     * Render the container's content as an array
     *
     * @param array $params
     *
     * @return array
     */
    public function renderArray(array $params = []): array;
}

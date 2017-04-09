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

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\base\MetaContainer;

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaJsonLdContainer extends MetaContainer
{
    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Properties
    // =========================================================================

    // Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->type = 'metaJsonLd';
    }

    // Private Methods
    // =========================================================================

}
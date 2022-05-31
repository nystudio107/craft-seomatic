<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for Schema3DModel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Schema3DModel
 */

trait Schema3DModelTrait
{
    
    /**
     * Whether the 3DModel allows resizing. For example, room layout applications
     * often do not allow 3DModel elements to be resized to reflect reality.
     *
     * @var bool|Boolean
     */
    public $isResizable;

}

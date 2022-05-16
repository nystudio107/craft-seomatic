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
 * Trait for UpdateAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/UpdateAction
 */

trait UpdateActionTrait
{
    
    /**
     * A sub property of object. The collection target of the action.
     *
     * @var Thing
     */
    public $targetCollection;

    /**
     * A sub property of object. The collection target of the action.
     *
     * @var Thing
     */
    public $collection;

}

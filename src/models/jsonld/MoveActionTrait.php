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
 * Trait for MoveAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MoveAction
 */

trait MoveActionTrait
{
    
    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     *
     * @var Place
     */
    public $fromLocation;

    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     *
     * @var Place
     */
    public $toLocation;

}

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

use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class MetaContainer extends Model implements MetaContainerInterface
{
    // Traits
    // =========================================================================

    use MetaContainerTrait;

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    /**
     * Create a new Meta Container
     *
     * @param array $config
     *
     * @return null|MetaContainer
     */
    public static function create($config = [])
    {
        /** @var $model MetaContainer */
        $model = null;
        $className = self::className();
        $model = new $className($config);
        $model->normalizeContainerData();

        return $model;
    }

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function render(): string
    {
        $html = '';

        foreach ($this->data as $metaItemModel) {
            $html .= $metaItemModel->render();
        }
        
        return $html;
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
    }

    // Private Methods
    // =========================================================================

}
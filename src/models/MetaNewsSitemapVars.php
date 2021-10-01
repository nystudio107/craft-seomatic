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

use craft\validators\ArrayValidator;
use nystudio107\seomatic\base\InheritableSettingsModel;

/**
 * @inheritdoc
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.0
 */
class MetaNewsSitemapVars extends InheritableSettingsModel
{
    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaNewsSitemapVars
     */
    public static function create(array $config = [])
    {
        return new MetaNewsSitemapVars($config);
    }

    // Public Properties
    // =========================================================================

    /**
     * @var bool
     */
    public $newsSitemapEnabled;

    /**
     * @var array
     */
    public $sitemapNewsFieldMap = [];

    /**
     * @var bool
     */
    public $sitemapAltLinks;

    /**
     * @var string
     */
    public $sitemapChangeFreq;

    /**
     * @var float
     */
    public $sitemapPriority;

    /**
     * @var null|int
     */
    public $sitemapLimit;


    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Enforce types
        if ($this->newsSitemapEnabled !== null) {
            $this->newsSitemapEnabled = (bool)$this->newsSitemapEnabled;
        }
        if ($this->sitemapAltLinks !== null) {
            $this->sitemapAltLinks = (bool)$this->sitemapAltLinks;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [
                [
                    'sitemapChangeFreq',
                ],
                'string',
            ],
            [
                [
                    'sitemapPriority'
                ],
                'number'
            ],
            [
                [
                    'sitemapLimit'
                ],
                'integer'
            ],
            [
                [
                    'newsSitemapEnabled',
                    'sitemapAltLinks',
                ],
                'boolean'
            ],
            [
                [
                    'sitemapNewsFieldMap',
                ],
                ArrayValidator::class
            ],
        ];
    }
}

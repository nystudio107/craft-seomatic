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
 * Sitemap variables object, containing values for the sitemap settings
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaSitemapVars extends InheritableSettingsModel
{
    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaSitemapVars
     */
    public static function create(array $config = [])
    {
        return new MetaSitemapVars($config);
    }

    // Public Properties
    // =========================================================================

    /**
     * @var bool
     */
    public $sitemapUrls;

    /**
     * @var bool
     */
    public $sitemapAssets;

    /**
     * @var bool
     */
    public $sitemapFiles;

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

    /**
     * @var null|int
     */
    public $structureDepth;

    /**
     * @var array
     */
    public $sitemapImageFieldMap = [];

    /**
     * @var array
     */
    public $sitemapVideoFieldMap = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Enforce types
        if ($this->sitemapUrls !== null) {
            $this->sitemapUrls = (bool)$this->sitemapUrls;
        }
        if ($this->sitemapAssets !== null) {
            $this->sitemapAssets = (bool)$this->sitemapAssets;
        }
        if ($this->sitemapFiles !== null) {
            $this->sitemapFiles = (bool)$this->sitemapFiles;
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
                    'sitemapPriority',
                ],
                'number',
            ],
            [
                [
                    'sitemapLimit',
                ],
                'integer',
            ],
            [
                [
                    'structureDepth',
                ],
                'integer',
            ],
            [
                [
                    'sitemapUrls',
                    'sitemapAssets',
                    'sitemapAltLinks',
                    'sitemapFiles',
                ],
                'boolean',
            ],
            [
                [
                    'sitemapImageFieldMap',
                    'sitemapVideoFieldMap',
                ],
                ArrayValidator::class,
            ],
        ];
    }
}

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

namespace nystudio107\seomatic\jobs;

use Craft;
use craft\base\Element;
use craft\elements\db\ElementQueryInterface;
use craft\elements\db\EntryQuery;
use craft\helpers\DateTimeHelper;
use nystudio107\seomatic\base\InheritableSettingsModel;
use nystudio107\seomatic\helpers\Sitemap;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaNewsSitemapVars;
use nystudio107\seomatic\models\NewsSitemapTemplate;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Sitemaps;
use yii\helpers\Html;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.0
 */
class GenerateNewsSitemap extends GenerateSitemap
{

    // Protected Methods
    // =========================================================================

    /**
     * Generate the sitemap.
     *
     * @param array $params
     */
    protected function generateSitemap(array $params) {
        Sitemap::generateSitemap($params, NewsSitemapTemplate::class);
    }


    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('app', 'Generating {handle} news sitemap', [
            'handle' => $this->handle,
        ]);
    }
}

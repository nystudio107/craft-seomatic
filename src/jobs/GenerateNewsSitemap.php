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

use nystudio107\seomatic\base\InheritableSettingsModel;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\helpers\MetaValue;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaNewsSitemapVars;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\NewsSitemapTemplate;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\SitemapTemplate;

use nystudio107\fastcgicachebust\FastcgiCacheBust;

use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\console\Application as ConsoleApplication;
use craft\db\Paginator;
use craft\elements\Asset;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\models\SiteGroup;
use craft\queue\BaseJob;

use verbb\supertable\elements\SuperTableBlockElement as SuperTableBlock;

use benf\neo\elements\Block as NeoBlock;

use yii\base\Exception;
use yii\caching\TagDependency;
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
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('app', 'Generating {handle} news sitemap', [
            'handle' => $this->handle,
        ]);
    }

    // Protected Methods
    // =========================================================================

    protected function getXmlNs(MetaBundle $metaBundle, bool $multiSite): string
    {
        $xmlNs = 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"';
        if ($multiSite) {
            $xmlNs .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
        }

        return $xmlNs;
    }

    /**
     * @param MetaBundle $metaBundle
     * @param $seoElement
     * @return int|null
     */
    protected function getTotalElements(MetaBundle $metaBundle, $seoElement)
    {
        // Ensure `null` so that the resulting element query is correct
        if (empty($metaBundle->metaNewsSitemapVars->sitemapLimit)) {
            $metaBundle->metaNewsSitemapVars->sitemapLimit = null;
        }
        $totalElements = $seoElement::sitemapElementsQuery($metaBundle)->count();

        if ($metaBundle->metaNewsSitemapVars->sitemapLimit && ($totalElements > $metaBundle->metaNewsSitemapVars->sitemapLimit)) {
            $totalElements = $metaBundle->metaNewsSitemapVars->sitemapLimit;
        }

        return $totalElements;
    }

    /**
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaNewsSitemapVars->newsSitemapEnabled;
    }

    /**
     * @param MetaBundle $metaBundle
     * @return MetaSitemapVars
     */
    protected function getSiteMapVars(MetaBundle $metaBundle): InheritableSettingsModel
    {
        return $metaBundle->metaNewsSitemapVars;
    }

    protected function getAdditionalDataForElement(MetaBundle $metaBundle, Element $element): string
    {
        $map = $metaBundle->metaNewsSitemapVars->sitemapNewsFieldMap;
        $date = ($element->postDate ?? $element->dateCreated)->format(\DateTime::W3C);

        $sitemapItem = <<<PUBLICATION
        <news:news>
            <news:publication>
                <news:name>{publication_name}</news:name>
                <news:language>{publication_language}</news:language>
            </news:publication>
            <news:publication_date>{$date}</news:publication_date>
            <news:title>{title}</news:title>
        </news:news>
PUBLICATION;

        foreach ($map as $row) {
            $fieldName = $row['field'] ?? '';
            $propName = $row['property'] ?? '';

            if (!empty($element[$fieldName]) && !empty($propName)) {
                $sitemapItem = str_replace('{'.$propName.'}', Html::encode($element[$fieldName]), $sitemapItem);
            }
        }


        return $sitemapItem;
    }

    protected function getCacheKey(): string
    {
        return NewsSitemapTemplate::CACHE_KEY . $this->groupId . $this->type . $this->handle . $this->siteId;
    }


}

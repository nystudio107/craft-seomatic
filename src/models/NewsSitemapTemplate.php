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

use craft\base\Element;
use craft\elements\db\ElementQueryInterface;
use craft\elements\db\EntryQuery;
use craft\helpers\DateTimeHelper;
use craft\helpers\Html;
use nystudio107\seomatic\base\InheritableSettingsModel;
use nystudio107\seomatic\jobs\GenerateNewsSitemap;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Sitemaps;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.0i
 */
class NewsSitemapTemplate extends SitemapTemplate
{
    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'NewsSitemapTemplate';

    const CACHE_KEY = 'seomatic_news_sitemap_';

    const QUEUE_JOB_CACHE_KEY = 'seomatic_news_sitemap_queue_job_';

    const SITEMAP_JOB_CLASS = GenerateNewsSitemap::class;

    protected static $defaultConfig = [
        'path' => 'sitemaps-<groupId:\d+>-<type:[\w\.*]+>-<handle:[\w\.*]+>-<siteId:\d+>-news-sitemap.xml',
        'template' => '',
        'controller' => 'sitemap',
        'action' => 'news-sitemap',
    ];

    /**
     * @inheritdoc
     */
    public static function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaNewsSitemapVars->newsSitemapEnabled;
    }

    /**
     * @inheritdoc
     */
    public static function getXmlNs(MetaBundle $metaBundle, bool $multiSite): string
    {
        $xmlNs = 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"';
        if ($multiSite) {
            $xmlNs .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
        }

        return $xmlNs;
    }

    /**
     * @inheritdoc
     * @return MetaNewsSitemapVars
     */
    public static function getSiteMapVars(MetaBundle $metaBundle): InheritableSettingsModel
    {
        return $metaBundle->metaNewsSitemapVars;
    }

    /**
     * @inheritdoc
     */
    public static function getAdditionalDataForElement(MetaBundle $metaBundle, Element $element): string
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

    /**
     * @inheritdoc
     */
    public static function generateAdditionalEntriesForElement(MetaBundle $metaBundle, Element $element): string
    {
        return '';
    }

    /**
     * @param string $seoElement
     * @param MetaBundle $metaBundle
     * @return ElementQueryInterface
     */
    public static function getSitemapElementsQuery(string $seoElement, MetaBundle $metaBundle): ElementQueryInterface
    {
        /** @var EntryQuery $query */
        $query = $seoElement::sitemapElementsQuery($metaBundle);

        $twoDaysAgo = DateTimeHelper::currentUTCDateTime()->sub(new \DateInterval('P2D'));
        $query->postDate('>= ' . $twoDaysAgo->format(('Y-m-d H:i:s')));

        return $query;
    }

    /**
     * @inheritdoc
     */
    public static function getForceCreatingSitemap(MetaBundle $metaBundle): bool
    {
        return Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle, Sitemaps::SITEMAP_TYPE_NEWS);
    }
}

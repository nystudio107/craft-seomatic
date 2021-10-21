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
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaNewsSitemapVars;
use nystudio107\seomatic\models\NewsSitemapTemplate;
use nystudio107\seomatic\Seomatic;
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

    /**
     * @inheritdoc
     */
    protected function getXmlNs(MetaBundle $metaBundle, bool $multiSite): string
    {
        $xmlNs = 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"';
        if ($multiSite) {
            $xmlNs .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
        }

        return $xmlNs;
    }

    /**
     * @inheritdoc
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaNewsSitemapVars->newsSitemapEnabled;
    }

    /**
     * @inheritdoc
     * @return MetaNewsSitemapVars
     */
    protected function getSiteMapVars(MetaBundle $metaBundle): InheritableSettingsModel
    {
        return $metaBundle->metaNewsSitemapVars;
    }

    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
    protected function generateAdditionalEntriesForElement(MetaBundle $metaBundle, Element $element): string
    {
        return '';
    }


    /**
     * @inheritdoc
     */
    protected function getCacheKey(): string
    {
        return NewsSitemapTemplate::CACHE_KEY . $this->groupId . $this->type . $this->handle . $this->siteId;
    }

    /**
     * @return int|null
     */
    protected function getCacheDuration()
    {
        $cacheDuration = Seomatic::$devMode
            ? Seomatic::DEVMODE_CACHE_DURATION
            : 60 * 60 * 24 * 2;
        return $cacheDuration;
    }

    /**
     * @param string $seoElement
     * @param MetaBundle $metaBundle
     * @return ElementQueryInterface
     */
    protected function getSitemapElementsQuery(string $seoElement, MetaBundle $metaBundle): ElementQueryInterface
    {
        /** @var EntryQuery $query */
        $query = $seoElement::sitemapElementsQuery($metaBundle);

        $twoDaysAgo = DateTimeHelper::currentUTCDateTime()->sub(new \DateInterval('P2D'));
        $query->postDate('>= ' . $twoDaysAgo->format(('Y-m-d H:i:s')));
        
        return $query;
    }

}

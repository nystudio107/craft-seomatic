<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2019 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use Craft;
use craft\helpers\UrlHelper;
use craft\web\Controller;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\Seomatic;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use function count;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.18
 */
class ContentSeoController extends Controller
{
    // Constants
    // =========================================================================

    public const SORT_MAP = [
        'DESC' => SORT_DESC,
        'ASC' => SORT_ASC,
    ];

    public const ALLOWED_SORT_FIELDS = [
        'sourceName',
        'sourceType',
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected array|bool|int $allowAnonymous = [
    ];

    // Public Methods
    // =========================================================================

    /**
     * Handle requests for the dashboard statistics table
     *
     * @param string $sort
     * @param int $page
     * @param int $per_page
     * @param string $filter
     * @param null|int $siteId
     *
     * @return Response
     * @throws BadRequestHttpException
     */
    public function actionMetaBundles(
        string $sort = 'sourceName|asc',
        int    $page = 1,
        int    $per_page = 20,
               $filter = '',
               $siteId = 0,
    ): Response {
        $data = [];
        $sortField = 'sourceName';
        $sortType = 'ASC';
        // Figure out the sorting type
        if ($sort !== '') {
            if (strpos($sort, '|') === false) {
                $sortField = $sort;
            } else {
                list($sortField, $sortType) = explode('|', $sort);
            }
        }
        $sortType = strtoupper($sortType);
        $sortType = self::SORT_MAP[$sortType] ?? self::SORT_MAP['DESC'];
        $sortParams = [
            $sortField => $sortType,
        ];
        // Validate untrusted data
        if (!in_array($sortField, self::ALLOWED_SORT_FIELDS, true)) {
            throw new BadRequestHttpException(Craft::t('seomatic', 'Invalid sort field specified.'));
        }
        if ($sortField !== 'sourceName') {
            $sortParams = array_merge($sortParams, [
                'sourceName' => self::SORT_MAP['ASC'],
            ]);
        }

        // Query the db table
        $offset = ($page - 1) * $per_page;
        $currentSiteHandle = '';
        if ((int)$siteId !== 0) {
            $site = Craft::$app->getSites()->getSiteById($siteId);
            if ($site !== null) {
                $currentSiteHandle = $site->handle;
            }
        }
        $metaBundles = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId, $filter);
        $count = 0;
        if ($metaBundles) {
            $count = count($metaBundles);
            // Sort it manually
            ArrayHelper::multisort($metaBundles, $sortField, $sortType);
            $metaBundles = array_slice($metaBundles, $offset, $per_page);
            $dataArray = [];
            // Add in the `addLink` field
            foreach ($metaBundles as $metaBundle) {
                $dataItem = [];
                if ($metaBundle !== null) {
                    $sourceBundleType = $metaBundle->sourceBundleType;
                    $sourceHandle = $metaBundle->sourceHandle;
                    // For all the emojis
                    $dataItem['sourceName'] = html_entity_decode($metaBundle->sourceName, ENT_NOQUOTES, 'UTF-8');
                    $dataItem['sourceType'] = $metaBundle->sourceType;
                    $dataItem['contentSeoUrl'] = UrlHelper::cpUrl(
                        "seomatic/edit-content/general/{$sourceBundleType}/{$sourceHandle}/{$currentSiteHandle}"
                    );
                    // Fill in the number of entries
                    $entries = 0;
                    $seoElement = null;
                    if ($metaBundle->sourceBundleType) {
                        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType(
                            $metaBundle->sourceBundleType
                        );
                    }
                    /** @var SeoElementInterface $seoElement */
                    if ($seoElement !== null) {
                        // Ensure `null` so that the resulting element query is correct
                        if (empty($metaBundle->metaSitemapVars->sitemapLimit)) {
                            $metaBundle->metaSitemapVars->sitemapLimit = null;
                        }
                        $query = $seoElement::sitemapElementsQuery($metaBundle);
                        $entries = $query->count();
                    }
                    $dataItem['entries'] = $entries;
                    // Basic configuration setup
                    $dataItem['title'] = $metaBundle->metaGlobalVars->seoTitle !== '' ? 'enabled' : 'disabled';
                    $dataItem['description'] = $metaBundle->metaGlobalVars->seoDescription !== '' ? 'enabled' : 'disabled';
                    $dataItem['image'] = $metaBundle->metaGlobalVars->seoImage !== '' ? 'enabled' : 'disabled';
                    $dataItem['sitemap'] = $metaBundle->metaSitemapVars->sitemapUrls ? 'enabled' : 'disabled';
                    $dataItem['sitemapPriority'] = $metaBundle->metaSitemapVars->sitemapPriority;
                    $dataItem['sitemapFrequency'] = $metaBundle->metaSitemapVars->sitemapChangeFreq;
                    $dataItem['robots'] = $metaBundle->metaGlobalVars->robots;
                    // Calculate the setup stat
                    $stat = 0;
                    $numGrades = count(SettingsController::SETUP_GRADES);
                    $numFields = count(SettingsController::SEO_SETUP_FIELDS);
                    foreach (SettingsController::SEO_SETUP_FIELDS as $setupField => $setupLabel) {
                        $stat += (int)!empty($metaBundle->metaGlobalVars[$setupField]);
                        $value = $variables['contentSetupChecklist'][$setupField]['value'] ?? 0;
                        $variables['contentSetupChecklist'][$setupField] = [
                            'label' => $setupLabel,
                            'value' => $value + (int)!empty($metaBundle->metaGlobalVars[$setupField]),
                        ];
                    }
                    $stat = round($numGrades - (($stat * $numGrades) / $numFields));
                    if ($stat >= $numGrades) {
                        $stat = $numGrades - 1;
                    }
                    $dataItem['setup'] = SettingsController::SETUP_GRADES[$stat];

                    $dataArray[] = $dataItem;
                }
            }
            // Format the data for the API
            $data['data'] = $dataArray;
            $data['links']['pagination'] = [
                'total' => $count,
                'per_page' => $per_page,
                'current_page' => $page,
                'last_page' => ceil($count / $per_page),
                'next_page_url' => null,
                'prev_page_url' => null,
                'from' => $offset + 1,
                'to' => $offset + ($count > $per_page ? $per_page : $count),
            ];
        }

        return $this->asJson($data);
    }

    // Protected Methods
    // =========================================================================
}

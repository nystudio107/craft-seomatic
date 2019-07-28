<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2019 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use Craft;
use nystudio107\seomatic\Seomatic;

use craft\db\Query;
use craft\helpers\UrlHelper;
use craft\web\Controller;

use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.18
 */
class ContentSeoController extends Controller
{
    // Constants
    // =========================================================================

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array
     */
    protected $allowAnonymous = [
    ];

    // Public Methods
    // =========================================================================

    /**
     * Handle requests for the dashboard statistics table
     *
     * @param string   $sort
     * @param int      $page
     * @param int      $per_page
     * @param string   $filter
     * @param null|int $siteId
     *
     * @return Response
     */
    public function actionMetaBundles(
        string $sort = 'sourceName|asc',
        int $page = 1,
        int $per_page = 20,
        $filter = '',
        $siteId = 0
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
        // Query the db table
        $offset = ($page - 1) * $per_page;

        $query = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->offset($offset)
            ->limit($per_page)
            ->orderBy("{$sortField} {$sortType}")
            ->where(['!=', 'sourceBundleType', Seomatic::$plugin->metaBundles::GLOBAL_META_BUNDLE])
            ;
        $currentSiteHandle = '';
        if ((int)$siteId !== 0) {
            $query->andWhere(['sourceSiteId' => $siteId]);
            $site = Craft::$app->getSites()->getSiteById($siteId);
            if ($site !== null) {
                $currentSiteHandle = $site->handle;
            }
        }
        if ($filter !== '') {
            $query->where(['like', 'sourceName', $filter]);
            $query->orWhere(['like', 'sourceType', $filter]);
        }
        $bundles = $query->all();
        if ($bundles) {
            $dataArray = [];
            // Add in the `addLink` field
            foreach ($bundles as $bundle) {
                $dataItem = [];
                $sourceBundleType = $bundle['sourceBundleType'];
                $sourceHandle = $bundle['sourceHandle'];
                $dataItem['sourceName'] = $bundle['sourceName'];
                $dataItem['sourceType'] = $bundle['sourceType'];
                $dataItem['contentSeoUrl'] = UrlHelper::cpUrl(
                    "seomatic/edit-content/general/{$sourceBundleType}/{$sourceHandle}/{$currentSiteHandle}"
                );
                $dataArray[] = $dataItem;
            }
            // Format the data for the API
            $data['data'] = $dataArray;
            $query = (new Query())
                ->from(['{{%seomatic_metabundles}}'])
                ->orderBy("{$sortField} {$sortType}")
                ->where(['!=', 'sourceBundleType', Seomatic::$plugin->metaBundles::GLOBAL_META_BUNDLE])
            ;
            if ((int)$siteId !== 0) {
                $query->where(['sourceSiteId' => $siteId]);
            }
            if ($filter !== '') {
                $query->where(['like', 'sourceName', $filter]);
                $query->orWhere(['like', 'sourceType', $filter]);
            }
            $count = $query->count();
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

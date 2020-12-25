<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\console\controllers;

use Craft;
use craft\base\Element;
use craft\helpers\Console;
use craft\helpers\StringHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * SEOmatic SocialImages command
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
class SocialImagesController extends Controller
{
    // Public Properties
    // =========================================================================

    /**
     * @var string The bundle ID to invalidate or "all" for every meta bundle. For a specific bundle use
     * "sourceBundleType:sourceId:siteId:typeId" syntax. ":type" can be omitted for bundles without a type id.
     */
    public $bundleId;

    /**
     * @var int|null Use this option to limit the meta bundles to a given site, if invalidating all bundles.
     */
    public $siteId;

    /**
     * @var int The element ID to invalidate.
     */
    public $elementId;

    // Public Methods
    // =========================================================================

    /**
     * @param string $actionID
     *
     * @return string[]
     */
    public function options($actionID): array
    {
        switch ($actionID) {
            case 'invalidate-bundle':
                return ['bundleId', 'siteId'];
            case 'update-element':
                return ['elementId'];
        }

        return [];
    }

    /**
     * Invalidate social images for a meta bundle. You must provide the `bundleId` option, however, `siteId` is optional.
     */
    public function actionInvalidateBundle()
    {
        $all = false;
        $matches = [];

        if (empty($this->bundleId)) {
            $this->stdout('You must provide a bundle ID.' . PHP_EOL, Console::FG_RED);
            return ExitCode::CONFIG;
        }


        if (StringHelper::toLowerCase($this->bundleId) === 'all') {
            $siteMessage = $this->siteId ? ' in site ' . $this->siteId : '';
            $this->stdout('Invalidating social images for all meta bundles' . $siteMessage . PHP_EOL, Console::FG_GREEN);
            $all = true;
        } else if (!preg_match('/([\w]+):([\d]+):([\d]+)(?::([\d]+))?/', $this->bundleId, $matches)) {
            $this->stdout('Bundle ID is not in the correct form of `bundleType:sourceId:siteId:typeId`' . PHP_EOL, Console::FG_RED);
            return ExitCode::CONFIG;
        }

        $seomatic = Seomatic::getInstance();
        $metaBundles = $seomatic->metaBundles;
        $socialImages = $seomatic->socialImages;

        /** @var MetaBundle[] $bundles */
        if ($all) {
            $bundles = $metaBundles->getContentMetaBundlesForSiteId($this->siteId);
        } else {
            $bundle = $metaBundles->getMetaBundleBySourceId($matches[1], (int)$matches[2], (int)$matches[3], $matches[4] ?? null);
            $bundles = $bundle ? [$bundle] : [];
        }

        if (empty($bundles)) {
            $this->stdout('No matching bundles found.' . PHP_EOL, Console::FG_YELLOW);
            return ExitCode::CONFIG;
        }

        foreach ($bundles as $bundle) {
            $bundleId = $bundle->sourceBundleType . ':' . $bundle->sourceId . ':' . $bundle->sourceSiteId . ($bundle->typeId ? ':' . $bundle->typeId : '');
            $this->stdout('Invalidating social images for ', Console::FG_GREEN);
            $this->stdout($bundleId . PHP_EOL, Console::FG_YELLOW);
            $socialImages->invalidateSocialImagesForMetaBundle($bundle);
        }

        $this->stdout('done' . PHP_EOL, Console::FG_GREEN);

        return ExitCode::OK;
    }
    /**
     * Invalidate social images for an element. You can provide `siteId` option, otherwise all sites will be invalidated.
     */
    public function actionUpdateElement()
    {
        if (empty($this->elementId)) {
            $this->stdout('You must provide an element ID.' . PHP_EOL, Console::FG_RED);
            return ExitCode::CONFIG;
        }

        $seomatic = Seomatic::getInstance();
        $socialImages = $seomatic->socialImages;

        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementById($this->elementId);

        if (empty($element)) {
            $this->stdout('No matching elements found.' . PHP_EOL, Console::FG_YELLOW);
            return ExitCode::CONFIG;
        }

        $this->stdout('Updating social images for element ', Console::FG_GREEN);
        $this->stdout($element->id . PHP_EOL, Console::FG_YELLOW);
        $socialImages->updateSocialImages($element, true, true);

        $this->stdout('done' . PHP_EOL, Console::FG_GREEN);

        return ExitCode::OK;
    }
}

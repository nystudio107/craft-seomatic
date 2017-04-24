<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\models\MetaTagContainer;

use Craft;
use craft\web\Controller;

use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainerController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'all',
    ];

    // Public Methods
    // =========================================================================

    /**
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionAll(string $path, int $siteId = null)
    {
        $result = [];
        Seomatic::$plugin->metaContainers->loadMetaContainers($path, $siteId);
        $result[MetaTitleContainer::CONTAINER_TYPE] = Seomatic::$plugin->metaContainers->renderContainersByType(
            MetaTitleContainer::CONTAINER_TYPE
        );
        $result[MetaTagContainer::CONTAINER_TYPE] = Seomatic::$plugin->metaContainers->renderContainersByType(
            MetaTagContainer::CONTAINER_TYPE
        );
        $result[MetaScriptContainer::CONTAINER_TYPE] = Seomatic::$plugin->metaContainers->renderContainersByType(
            MetaScriptContainer::CONTAINER_TYPE
        );
        $result[MetaJsonLdContainer::CONTAINER_TYPE] = Seomatic::$plugin->metaContainers->renderContainersByType(
            MetaJsonLdContainer::CONTAINER_TYPE
        );

        return $this->asJson($result);
    }
}

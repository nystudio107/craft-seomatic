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

namespace nystudio107\seomatic\integrations\campaign\behaviors;

use Craft;
use craft\models\Section_SiteSettings;
use putyourlightson\campaign\models\CampaignTypeModel;
use yii\base\Behavior;

/**
 * @mixin CampaignTypeModel
 *
 * @author    nystudio107.com
 * @package   SEOmatic
 * @since     4.0.32
 */
class CampaignBehavior extends Behavior
{
    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * Returns the product types's site-specific settings.
     *
     * @return Section_SiteSettings[]
     */
    public function getSiteSettings(): array
    {
        $siteSettings = [];
        $sites = Craft::$app->getSites()->getAllSites();
        foreach ($sites as $site) {
            $siteSettings[$site->id] = new Section_SiteSettings([
                'id' => $site->id,
                'sectionId' => $this->owner->id,
                'siteId' => $site->id,
                'hasUrls' => !empty($this->owner->uriFormat),
                'uriFormat' => $this->owner->uriFormat,
                'template' => $this->owner->htmlTemplate,
            ]);
        }

        return $siteSettings;
    }
}

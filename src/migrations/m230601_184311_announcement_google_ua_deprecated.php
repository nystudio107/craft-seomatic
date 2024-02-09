<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;
use craft\db\Query;
use craft\helpers\Json;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\services\MetaBundles;

/**
 * m230601_184311_announcement_google_ua_deprecated migration.
 */
class m230601_184311_announcement_google_ua_deprecated extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        if (version_compare(Craft::$app->getVersion(), '3.7', '>=')) {
            $globalBundles = (new Query())
                ->from(['{{%seomatic_metabundles}}'])
                ->where([
                    'sourceBundleType' => MetaBundles::GLOBAL_META_BUNDLE,
                ])
                ->all();
            foreach ($globalBundles as $globalBundle) {
                $metaContainers = Json::decodeIfJson($globalBundle['metaContainers']);
                foreach ($metaContainers as $metaContainer) {
                    if ($metaContainer['class'] === MetaScriptContainer::class) {
                        $enabled = $metaContainer['data']['googleAnalytics']['include'] ?? null;
                        if ($enabled) {
                            Craft::$app->announcements->push(
                                function($language) {
                                    return Craft::t('seomatic', 'Google Universal Analytics deprecated', [], $language);
                                },
                                function($language) {
                                    return Craft::t('seomatic', 'Universal Analytics (which is used on this site via the SEOmatic plugin) is being [discontinued on July 1st, 2023]({url}). You should use Google gtag.js or Google Tag Manager instead and transition to a new GA4 property.', [
                                        'url' => 'https://support.google.com/analytics/answer/11583528',
                                    ], $language);
                                },
                                'seomatic'
                            );
                        }
                    }
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m230601_184311_announcement_google_ua_deprecated cannot be reverted.\n";
        return false;
    }
}

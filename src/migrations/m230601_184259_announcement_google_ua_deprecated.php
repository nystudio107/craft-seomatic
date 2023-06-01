<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;
use craft\db\Query;
use craft\helpers\Json;
use craft\i18n\Translation;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\services\MetaBundles;

/**
 * m230601_184259_announcement_google_ua_deprecated migration.
 */
class m230601_184259_announcement_google_ua_deprecated extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
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
                            Translation::prep('seomatic', 'Google Universal Analytics deprecated', []),
                            Translation::prep('seomatic', 'Universal Analytics (which is used on this site via the SEOmatic plugin) is being [discontinued on July 1st, 2023]({url}). You should use Google gtag.js or Google Tag Manager instead and transition to a new GA4 property.', [
                                'url' => 'https://support.google.com/analytics/answer/11583528',
                            ]),
                            'seomatic'
                        );
                    }
                }
            }
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m230601_184259_announcement_google_ua_deprecated cannot be reverted.\n";
        return false;
    }
}

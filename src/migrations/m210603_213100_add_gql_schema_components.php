<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;

/**
 * m210603_213100_add_gql_schema_components migration.
 */
class m210603_213100_add_gql_schema_components extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Don't make the same config changes twice
        $projectConfig = Craft::$app->getProjectConfig();
        $schemaVersion = $projectConfig->get('plugins.seomatic.schemaVersion', true);

        if (version_compare($schemaVersion, '3.0.10', '<')) {
            foreach ($projectConfig->get('graphql.schemas') ?? [] as $schemaUid => $schemaComponents) {
                if (isset($schemaComponents['scope'])) {
                    $scope = $schemaComponents['scope'];
                    $scope[] = 'seomatic.all:read';

                    $projectConfig->set("graphql.schemas.$schemaUid.scope", $scope);
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m210603_213100_add_gql_schema_components cannot be reverted.\n";
        return false;
    }
}

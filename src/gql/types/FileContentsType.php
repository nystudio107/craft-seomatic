<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\gql\types;

use Craft;
use craft\gql\base\ObjectType;
use craft\gql\GqlEntityRegistry;
use GraphQL\Type\Definition\Type;

/**
 * Class FileContentsType
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.18
 */
class FileContentsType extends ObjectType
{
    /**
     * @var string
     */
    public $name = 'FileContents';

    /**
     * @var string
     */
    public $description = 'Contents of a file';

    /**
     * @inheritdoc
     */
    public function __construct($config)
    {
        $config = array_merge($config, [
            'name' => self::getName(),
            'description' => $this->description,
            'fields' => self::getFieldDefinition(),
        ]);
        parent::__construct($config);
    }

    /**
     * Returns a singleton instance to ensure one type per schema.
     *
     * @return FileContentsType
     */
    public static function getType(): FileContentsType
    {
        return GqlEntityRegistry::getEntity(self::getName()) ?: GqlEntityRegistry::createEntity(self::getName(), new self([]));
    }

    /**
     *
     * @return string
     */
    public static function getName(): string
    {
        return 'FileContents';
    }

    /**
     * Define fields for this type.
     *
     * @return array
     */
    public static function getFieldDefinition(): array
    {
        $fields = [
            'filename' => [
                'name' => 'filename',
                'type' => Type::nonNull(Type::string()),
            ],
            'contents' => [
                'name' => 'contents',
                'type' => Type::string(),
            ],
        ];

        return Craft::$app->getGql()->prepareFieldDefinitions($fields, self::getName());
    }
}

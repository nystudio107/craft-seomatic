<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use Craft;
use craft\helpers\Json;
use craft\helpers\Template;
use craft\validators\UrlValidator;
use DateTime;
use Exception;
use nystudio107\seomatic\base\NonceItem;
use nystudio107\seomatic\helpers\JsonLd as JsonLdHelper;
use nystudio107\seomatic\Seomatic;
use yii\validators\BooleanValidator;
use yii\validators\DateValidator;
use yii\validators\NumberValidator;
use function in_array;
use function is_array;
use function is_object;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 *
 * @property-read array $googleRecommendedSchema
 * @property-read array $googleRequiredSchema
 * @property-read array $schemaPropertyDescriptions
 * @property-read array $schemaPropertyExpectedTypes
 * @property-read array $schemaPropertyNames
 */
class MetaJsonLd extends NonceItem
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'MetaJsonLd';

    protected const SCHEMA_NAMESPACE_PREFIX = 'nystudio107\\seomatic\\models\\jsonld\\';
    protected const SCHEMA_NAME_PREFIX = 'Schema_';

    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'JsonLd';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'Generic JsonLd type.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = '';

    // Public Properties
    // =========================================================================

    /**
     * The schema context.
     *
     * @var string [schema.org types: Text]
     */
    public $context;

    /**
     * The item's type.
     *
     * @var string|null [schema.org types: Text]
     */
    public $type;

    /**
     * The item's id.
     *
     * @var string [schema.org types: Text]
     */
    public $id;

    /**
     * The JSON-LD graph https://json-ld.org/spec/latest/json-ld/#named-graphs
     *
     * @var null|array
     */
    public $graph;


    // Static Methods
    // =========================================================================

    /**
     * Create a new JSON-LD schema type object
     *
     * @param string $schemaType
     * @param array $config
     *
     * @return MetaJsonLd
     */
    public static function create($schemaType, array $config = []): MetaJsonLd
    {
        // Try the passed in $schemaType
        $className = self::SCHEMA_NAMESPACE_PREFIX . $schemaType;
        /** @var $model MetaJsonLd */
        if (class_exists($className)) {
            self::cleanProperties($className, $config);

            return new $className($config);
        }
        // Try the prefixed $schemaType
        $className = self::SCHEMA_NAMESPACE_PREFIX . self::SCHEMA_NAME_PREFIX . $schemaType;
        /** @var $model MetaJsonLd */
        if (class_exists($className)) {
            self::cleanProperties($className, $config);

            return new $className($config);
        }
        // Fall back on returning a generic schema.org type
        self::cleanProperties(__CLASS__, $config);

        return new MetaJsonLd($config);
    }

    // Public Methods
    // =========================================================================

    /**
     * Set the $type & $context properties
     *
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        $this->type = static::$schemaTypeName;
        $this->context = 'http://schema.org';
        // Make sure we have a valid key
        $this->key = $this->key ?: lcfirst($this->type);
    }

    /**
     * Renders a JSON-LD representation of the schema
     *
     * @return string The resulting JSON-LD
     */
    public function __toString()
    {
        return $this->render([
            'renderRaw' => false,
            'renderScriptTags' => true,
            'array' => false,
        ]);
    }

    /**
     * Return the Schema.org Property Names
     *
     * @return array
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }


    /**
     * Return the Schema.org Property Expected Types
     *
     * @return array
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [];
    }

    /**
     * Return the Schema.org Property Descriptions
     *
     * @return array
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [];
    }

    /**
     * Return the Schema.org Google Required Schema for this type
     *
     * @return array
     */
    public function getGoogleRequiredSchema(): array
    {
        return [];
    }

    /**
     * Return the Schema.org Google Recommended Schema for this type
     *
     * @return array
     */
    public function getGoogleRecommendedSchema(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
        }

        return $shouldRender;
    }

    /**
     * Renders a JSON-LD representation of the schema
     *
     * @param array $params
     *
     * @return string
     */
    public function render(
        array $params = [
            'renderRaw' => true,
            'renderScriptTags' => true,
            'array' => false,
        ],
    ): string {
        $html = '';
        $options = $this->tagAttributes();
        if ($this->prepForRender($options)) {
            $linebreak = '';
            // If we're rendering for an array, don't add linebreaks
            $oldDevMode = Seomatic::$devMode;
            if ($params['array'] === true) {
                Seomatic::$devMode = false;
            }
            // If `devMode` is enabled, make the JSON-LD human-readable
            if (Seomatic::$devMode) {
                $linebreak = PHP_EOL;
            }
            // Render the resulting JSON-LD
            $scenario = $this->scenario;
            $this->setScenario('render');
            try {
                $html = JsonLdHelper::encode($this);
            } catch (Exception $e) {
                Craft::error($e, __METHOD__);
                Craft::$app->getErrorHandler()->logException($e);
            }
            $this->setScenario($scenario);
            if ($params['array'] === true) {
                Seomatic::$devMode = $oldDevMode;
            }
            if ($params['renderScriptTags']) {
                $html =
                    '<script type="application/ld+json">'
                    . $linebreak
                    . $html
                    . $linebreak
                    . '</script>';
            } elseif (Seomatic::$devMode) {
                $html =
                    $linebreak
                    . $html
                    . $linebreak;
            }
            if ($params['renderRaw'] === true) {
                $html = Template::raw($html);
            }
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function renderAttributes(array $params = []): array
    {
        $attributes = [];

        $result = Json::decodeIfJson($this->render([
            'renderRaw' => true,
            'renderScriptTags' => false,
            'array' => true,

        ]));
        if ($result !== false) {
            $attributes = $result;
        }

        return $attributes;
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'google':
            case 'default':
                break;
        }

        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [
                [
                    'id',
                    'type',
                    'context',
                ],
                'string',
            ],
        ]);

        return $rules;
    }

    /**
     * We don't want Craft's base Model messing with our dateCreated etc properties
     *
     * @return array|string[]
     */
    public function datetimeAttributes(): array
    {
        return [];
    }

    /**
     * Validate the passed in $attribute based on $schemaPropertyExpectedTypes
     *
     * @param string $attribute the attribute currently being validated
     * @param mixed $params the value of the "params" given in the rule
     */
    public function validateJsonSchema(
        $attribute,
        $params,
    ) {
        if (!in_array($attribute, $this->getSchemaPropertyNames(), true)) {
            $this->addError($attribute, 'The attribute does not exist.');
        } else {
            $expectedTypes = $this->getSchemaPropertyExpectedTypes()[$attribute];
            $validated = false;
            $dataToValidate = $this->$attribute;
            if (!is_array($dataToValidate)) {
                $dataToValidate = [$dataToValidate];
            }
            foreach ($dataToValidate as $key => $data) {
                /** @var array $expectedTypes */
                foreach ($expectedTypes as $expectedType) {
                    $className = 'nystudio107\\seomatic\\models\\jsonld\\' . $expectedType;
                    switch ($expectedType) {
                        // Text always validates
                        case 'Text':
                            $validated = true;
                            break;

                        // Use Yii's validator for URLs
                        case 'URL':
                            $validator = new UrlValidator();
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Booleans
                        case 'Boolean':
                            $validator = new BooleanValidator();
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Numbers
                        case 'Number':
                        case 'Float':
                        case 'Integer':
                            $validator = new NumberValidator();
                            if ($expectedType === 'Integer') {
                                $validator->integerOnly = true;
                            }
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Dates
                        case 'Date':
                            $validator = new DateValidator();
                            $validator->type = DateValidator::TYPE_DATE;
                            $validator->format = 'php:' . DateTime::ATOM;
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            $validator->format = 'YYYY-MM-DD';
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for DateTimes
                        case 'DateTime':
                            $validator = new DateValidator();
                            $validator->type = DateValidator::TYPE_DATETIME;
                            $validator->format = 'YYYY-MM-DDThh:mm:ss.sTZD';
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Times
                        case 'Time':
                            $validator = new DateValidator();
                            $validator->type = DateValidator::TYPE_TIME;
                            $validator->format = 'hh:mm:ss.sTZD';
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;
                        // Match an ISO 8601 duration as per: https://stackoverflow.com/questions/32044846/regex-for-iso-8601-durations
                        case 'Duration':
                            if (preg_match('/^P(?!$)((\d+Y)|(\d+\.\d+Y$))?((\d+M)|(\d+\.\d+M$))?((\d+W)|(\d+\.\d+W$))?((\d+D)|(\d+\.\d+D$))?(T(?=\d)((\d+H)|(\d+\.\d+H$))?((\d+M)|(\d+\.\d+M$))?(\d+(\.\d+)?S)?)??$/', $data) === 1) {
                                $validated = true;
                            }
                            break;

                        // By default, assume it's a schema.org JSON-LD object, and validate that
                        default:
                            // Allow for @id references
                            if ($key === 'id') {
                                $validated = true;
                            }
                            if (is_object($data) && ($data instanceof $className)) {
                                $validated = true;
                            }
                            if (is_string($data)) {
                                $targetClass = 'nystudio107\\seomatic\\models\\jsonld\\' . $data;
                                if (class_exists($targetClass)) {
                                    $validated = true;
                                }
                            }
                            break;
                    }
                }
                if (!$validated) {
                    $this->addError($attribute, 'Must be one of these types: ' . implode(', ', $expectedTypes));
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function generateNonce()
    {
        $result = parent::generateNonce();
        if (Seomatic::$plugin->metaContainers->cachedJsonLdNonce !== null) {
            return Seomatic::$plugin->metaContainers->cachedJsonLdNonce;
        }

        Seomatic::$plugin->metaContainers->cachedJsonLdNonce = $result;

        return $result;
    }

    // Private Methods
// =========================================================================
}

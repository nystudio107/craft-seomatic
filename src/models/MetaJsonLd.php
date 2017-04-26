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

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\JsonLd as JsonLdHelper;
use nystudio107\seomatic\base\MetaItem;

use Craft;
use craft\helpers\Template;

use yii\validators\UrlValidator;
use yii\validators\BooleanValidator;
use yii\validators\NumberValidator;
use yii\validators\DateValidator;
use yii\base\InvalidParamException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaJsonLd extends MetaItem
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'MetaJsonLd';

    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'JsonLd';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Generic JsonLd type.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = '';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

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
     * @var string [schema.org types: Text]
     */
    public $type;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Static Methods
    // =========================================================================

    /**
     * Create a new JSON-LD schema type object
     *
     * @param string $schemaType
     * @param array  $config
     *
     * @return mixed
     */
    public static function create($schemaType, $config = [])
    {
        $model = null;
        $className = 'nystudio107\\seomatic\\models\\jsonld\\'.$schemaType;
        /** @var $model MetaJsonLd */
        if (class_exists($className)) {
            $model = new $className($config);
        }
        $model->key = $model->type;

        return $model;
    }


    // Public Methods
    // =========================================================================

    /**
     * Set the $type & $context properties
     *
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->type = static::$schemaTypeName;
        $this->context = "http://schema.org";
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
            'renderScriptTags' => true
        ]);
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data)
    {
    }

    /**
     * Renders a JSON-LD representation of the schema
     *
     * @param array $params
     *
     * @return string
     */
    public function render($params = ['renderRaw' => true, 'renderScriptTags' => true]): string
    {
        $linebreak = "";

        // If `devMode` is enabled, make the JSON-LD human-readable
        if (Seomatic::$devMode) {
            $linebreak = PHP_EOL;
        }
        // Render the resulting JSON-LD
        $scenario = $this->scenario;
        $this->setScenario('render');
        $result = JsonLdHelper::encode($this);
        $this->setScenario($scenario);
        if ($params['renderScriptTags']) {
            $result =
                '<script type="application/ld+json">'
                . $linebreak
                . $result
                . $linebreak
                . '</script>';
        }
        if ($params['renderRaw'] === true) {
            $result = Template::raw($result);
        }

        return $result;
    }
    
    /**
     * @inheritdoc
     */
    public function fields()
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
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * Validate the passed in $attribute based on $schemaPropertyExpectedTypes
     *
     * @param string $attribute the attribute currently being validated
     * @param mixed  $params    the value of the "params" given in the rule
     */
    public function validateJsonSchema($attribute, $params)
    {
        if (!in_array($attribute, static::$schemaPropertyNames)) {
            $this->addError($attribute, 'The attribute does not exist.');
        } else {
            $expectedTypes = static::$schemaPropertyExpectedTypes[$attribute];
            $validated = false;
            $dataToValidate = $this->$attribute;
            if (!is_array($dataToValidate)) {
                $dataToValidate = [$dataToValidate];
            }
            foreach ($dataToValidate as $data) {
                foreach ($expectedTypes as $expectedType) {
                    $className = 'craft\\plugins\\seomatic\\models\\jsonld\\'.$expectedType;
                    switch ($expectedType) {
                        // Text always validates
                        case 'Text':
                            $validated = true;
                            break;

                        // Use Yii's validator for URLs
                        case 'URL':
                            $validator = new UrlValidator;
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Booleans
                        case 'Boolean':
                            $validator = new BooleanValidator;
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Numbers
                        case 'Number':
                        case 'Float':
                        case 'Integer':
                            $validator = new NumberValidator;
                            if ($expectedType == 'Integer') {
                                $validator->integerOnly = true;
                            }
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Dates
                        case 'Date':
                            $validator = new DateValidator;
                            $validator->type = DateValidator::TYPE_DATE;
                            $validator->format = 'YYYY-MM-DD';
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for DateTimes
                        case 'DateTime':
                            $validator = new DateValidator;
                            $validator->type = DateValidator::TYPE_DATETIME;
                            $validator->format = 'YYYY-MM-DDThh:mm:ss.sTZD';
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // Use Yii's validator for Times
                        case 'Time':
                            $validator = new DateValidator;
                            $validator->type = DateValidator::TYPE_TIME;
                            $validator->format = 'hh:mm:ss.sTZD';
                            if ($validator->validate($data, $error)) {
                                $validated = true;
                            }
                            break;

                        // By default, assume it's a schema.org JSON-LD object, and validate that
                        default:
                            if (is_object($data)) {
                                if (is_a($data, $className)) {
                                    $validated = true;
                                }
                            }
                            break;
                    }
                }
                if (!$validated) {
                    $this->addError($attribute, 'Must be one of these types: '.implode(', ', $expectedTypes));
                }
            }
        }
    }

    // Private Methods
    // =========================================================================
}

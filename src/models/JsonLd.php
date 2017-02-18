<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\helpers\Json;

use Craft;
use craft\base\Model;
use craft\helpers\ArrayHelper;
use craft\helpers\Template;

/**
 * JsonLd Model
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */

class JsonLd extends Model
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'JsonLd';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Generic JsonLd type.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = '';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Static Methods
    // =========================================================================

    /**
     * Create a new JSON-LD schema type object
     * @param  string $jsonLdType The schema.org type to create
     * @param  array  $config     The default attributes for the model
     * @return mixed              The model object
     */
    public static function create($jsonLdType, $config = [])
    {
        $className = 'nystudio107\\seomatic\\models\\jsonld\\' . $jsonLdType;
        $model = new $className();
        $model->attributes = $config;

//        static::populateModel($model, ArrayHelper::toArray($config, [], false));

        return $model;
    }

    // Properties
    // =========================================================================

    /**
     * The schema context.
     * @var string [schema.org types: Text]
     */
    public $context;

    /**
     * The item's type.
     * @var string [schema.org types: Text]
     */
    public $type;

    // Methods
    // =========================================================================

    /**
     * Set the $type property
     */
    public function init()
    {
        parent::init();
        $this->type = static::$schemaTypeName;
        $this->context = "http://schema.org";
    }

    /**
     * Renders a JSON-LD representation of the schema
     * @return string The resulting JSON-LD
     */
    public function __toString()
    {
        return $this->render(false);
    }

    /**
     * Magic getter/setter for the static properties of the class
     * @param  string $method The method name (static property name)
     * @param  mixed $args    The argurments list
     * @return string         The value of the property
     */
    public function __call($method, $args)
    {
        if (preg_match('/^([gs]et)([A-Z])(.*)$/', $method, $match))
        {
            $reflector = new \ReflectionClass(get_called_class());
            $property = strtolower($match[2]). $match[3];
            if ($reflector->hasProperty($property))
            {
                $property = $reflector->getProperty($property);
                switch($match[1])
                {
                    case 'get': return $property->getValue();
                    case 'set': return $property->setValue($args[0]);
                }
            }
            else
                throw new InvalidArgumentException("Property {$property} doesn't exist");
        }
    }

    /**
     * Return the fields that ::toArray() should process
     * @return array the fields
     */
    public function fields()
    {
        $excludeAttributes = ["classSuffix"];
        $fields = $this->attributes(null, $excludeAttributes);

        return array_combine($fields, $fields);
    }

    /**
     * Renders a JSON-LD representation of the schema
     * @return string The resulting JSON-LD
     */
    public function render($raw = true)
    {
        $result = "";
        $linebreak = "";

/* -- If `devMode` is enabled, make the JSON-LD human-readable */
        if (Craft::$app->config->get('devMode'))
            $linebreak = PHP_EOL;

/* -- Render the resulting JSON-LD */
        $result = '<script type="application/ld+json">' . $linebreak .
            Json::encode($this) .
            $linebreak . '</script>';

        if ($raw === true)
            $result = Template::raw($result);

        return $result;
    }

    /**
     * Validate the passed in $attribute based on $schemaPropertyExpectedTypes
     * @param string $attribute the attribute currently being validated
     * @param mixed $params the value of the "params" given in the rule
     */
    function validateJsonSchema($attribute, $params)
    {
        if (!in_array($attribute, static::$schemaPropertyNames))
            $this->addError($attribute, 'The attribute does not exists.');
        else
        {
            $expectedTypes = static::$schemaPropertyExpectedTypes[$attribute];
            $validated = false;
            $dataToValidate = $this->$attribute;
            if (!is_array($dataToValidate))
                $dataToValidate = [$dataToValidate];
            foreach ($dataToValidate as $data)
            {
                foreach ($expectedTypes as $expectedType)
                {
                    $className = 'craft\\plugins\\seomatic\\models\\jsonld\\' . $expectedType;
                    switch ($expectedType)
                    {
    /* -- Text always validates */
                        case 'Text':
                            $validated = true;
                            break;

    /* -- Use Yii's validator for URLs */
                        case 'URL':
                            $validator = new \yii\validators\UrlValidator();
                            if ($validator->validate($data, $error))
                                $validated = true;
                            break;

    /* -- Use Yii's validator for Booleans */
                        case 'Boolean':
                            $validator = new \yii\validators\BooleanValidator();
                            if ($validator->validate($data, $error))
                                $validated = true;
                            break;

    /* -- Use Yii's validator for Numbers */
                        case 'Number':
                        case 'Float':
                        case 'Integer':
                            $validator = new \yii\validators\NumberValidator();
                            if ($expectedType == 'Integer')
                                $validator->integerOnly = true;
                            if ($validator->validate($data, $error))
                                $validated = true;
                            break;

    /* -- Use Yii's validator for Dates */
                        case 'Date':
                            $validator = new \yii\validators\DateValidator();
                            $validator->type = DateValidator::TYPE_DATE;
                            $validator->format = 'YYYY-MM-DD';
                            if ($validator->validate($data, $error))
                                $validated = true;
                            break;

    /* -- Use Yii's validator for DateTimes */
                        case 'DateTime':
                            $validator = new \yii\validators\DateValidator();
                            $validator->type = DateValidator::TYPE_DATETIME;
                            $validator->format = 'YYYY-MM-DDThh:mm:ss.sTZD';
                            if ($validator->validate($data, $error))
                                $validated = true;
                            break;

    /* -- Use Yii's validator for Times */
                        case 'Time':
                            $validator = new \yii\validators\DateValidator();
                            $validator->type = DateValidator::TYPE_TIME;
                            $validator->format = 'hh:mm:ss.sTZD';
                            if ($validator->validate($data, $error))
                                $validated = true;
                            break;

    /* -- By default, assume it's a schema.org JSON-LD object, and validate that */
                        default:
                            if (is_object($data))
                            {
                                if (is_a($data, $className))
                                    $validated = true;
                            }
                            break;
                    }
                }
                if (!$validated)
                    $this->addError($attribute, 'Must be one of these types: ' . implode(', ', $expectedTypes));
            }
        }
    }

    // Private Methods
    // =========================================================================

}
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

namespace nystudio107\seomatic\base;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaJsonLd;

use Craft;
use craft\validators\ArrayValidator;

use yii\base\InvalidParamException;
use yii\helpers\Inflector;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class MetaItem extends FluentModel implements MetaItemInterface
{
    // Traits
    // =========================================================================

    use MetaItemTrait;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Set any per-environment attributes
        $envVars = ArrayHelper::getValue($this->environment, Seomatic::$settings->environment);
        if ($envVars) {
            $envVars = array_filter($envVars);
            $this->setAttributes($envVars);
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['include', 'uniqueKeys', 'key'], 'required'],
            [['include', 'uniqueKeys'], 'boolean'],
            [['key'], 'string'],
            [['environment'], 'safe'],
            [['dependencies'], 'safe'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'render':
                $fields = array_diff_key(
                    $fields,
                    array_flip([
                        'include',
                        'uniqueKeys',
                        'key',
                        'environment',
                        'dependencies',
                    ])
                );
                break;
        }

        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        return Dependency::validateDependencies($this->dependencies);
    }

    /**
     * @inheritdoc
     */
    public function render($params = []): string
    {
        $html = '';

        return $html;
    }

    /**
     * @return array
     */
    public function tagAttributes(): array
    {
        $tagAttributes = $this->toArray();
        $tagAttributes = array_filter($tagAttributes);
        foreach ($tagAttributes as $key => $value) {
            ArrayHelper::rename($tagAttributes, $key, Inflector::slug(Inflector::titleize($key)));
        }
        ksort($tagAttributes);

        return $tagAttributes;
    }

    /**
     * Add debug logging for the MetaItem
     *
     * @param string $errorLabel
     * @param array  $scenarios
     */
    public function debugMetaItem(
        $errorLabel = "Error: ",
        $scenarios = ['default' => 'error']
    ) {
        $isMetaJsonLdModel = false;
        if (is_subclass_of($this, MetaJsonLd::className())) {
            $isMetaJsonLdModel = true;
        }
        foreach ($scenarios as $scenario => $logLevel) {
            $this->setScenario($scenario);
            if (!$this->validate()) {
                $extraInfo = '';
                // Add a URL to the schema.org type if this is a MetaJsonLD object
                if ($isMetaJsonLdModel) {
                    /** @var  $this MetaJsonLd */
                    $extraInfo = ' for http://schema.org/' . $this->type;
                }
                $errorMsg =
                    Craft::t('seomatic', 'Scenario: "')
                    . $scenario
                    . '"'
                    . $extraInfo
                    . PHP_EOL
                    . print_r($this->render(), true);
                Craft::info($errorMsg, __METHOD__);
                foreach ($this->errors as $param => $errors) {
                    $errorMsg = Craft::t('seomatic', $errorLabel) . $param;
                    foreach ($errors as $error) {
                        $errorMsg .= ' -> ' . $error;
                        // Change the error level depending on the error message if this is a MetaJsonLD object
                        if ($isMetaJsonLdModel) {
                            if (strpos($error, 'recommended') !== false) {
                                $logLevel = 'warning';
                            }
                            if (strpos($error, 'required') !== false
                                || strpos($error, 'Must be') !== false
                            ) {
                                $logLevel = 'error';
                            }
                        }
                    }
                    Craft::$logLevel($errorMsg, __METHOD__);
                    // Extra debugging info for MetaJsonLd objects
                    if ($isMetaJsonLdModel) {
                        /** @var  $className MetaJsonLd */
                        $className = get_class($this);
                        if (!empty($className::$schemaPropertyDescriptions[$param])) {
                            $errorMsg = Craft::t('seomatic', $errorLabel) . $param;
                            /** @var $className MetaJsonLd */
                            $errorMsg .= ' -> ' . $className::$schemaPropertyDescriptions[$param];
                            Craft::info($errorMsg, __METHOD__);
                        }
                    }
                }
            }
        }
    }
}

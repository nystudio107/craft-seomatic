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

namespace nystudio107\seomatic\behaviors;

use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use yii\base\Behavior;
use yii\base\Model;
use yii\validators\UrlValidator;

/**
 * MetaItemAttributeParserBehavior can be applied to models with attributes that can be
 * parsed as twig expressions
 *
 * ---
 *
 * ```php
 * public function behaviors(): array
 * {
 *     return [
 *         'parser' => [
 *             'class' => MetaItemAttributeParserBehavior::class,
 *             'attributes' => ['attr1', 'attr2', '...'],
 *         ],
 *     ];
 * }
 * ```
 */
class MetaItemAttributeParserBehavior extends Behavior
{
    /**
     * @var Model
     */
    public $owner;

    /**
     * @var string[]|callable[] The attributes names that can be parsed as Twig expressions
     *
     * If the raw (unparsed) attribute value can’t be obtained from the attribute directly (`$model->foo`),
     * then the attribute name should be specified as an array key instead, and the value should be set to the
     * raw value, or a callable that returns the raw value. For example:
     *
     * ```php
     * 'attributes' => [
     *     'foo' => '$FOO',
     *     'bar' => function() {
     *         return $this->_bar;
     *     },
     * ],
     * ```
     */
    public array $attributes = [];

    /**
     * @var array Keeps track of the original attribute values
     */
    private array $originalAttributes;

    /**
     * @inheritdoc
     */
    public function events(): array
    {
        return [
            Model::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            Model::EVENT_AFTER_VALIDATE => 'afterValidate',
        ];
    }

    /**
     * Replaces attribute values before validation occurs.
     */
    public function beforeValidate(): void
    {
        $this->originalAttributes = [];

        // Default the attributes to the available fields in the `render` scenario if empty
        if (empty($this->attributes)) {
            $oldScenario = $this->owner->getScenario();
            $this->owner->setScenario('render');
            $this->attributes = $this->owner->fields();
            $this->owner->setScenario($oldScenario);
        }
        // Swap in parsed versions of the attributes before validation
        foreach ($this->attributes as $i => $attribute) {
            if ($i === 'dateCreated') {
                continue;
            }
            $value = $this->owner->$attribute;

            if (($parsed = MetaValueHelper::parseString($value)) !== $value) {
                $this->originalAttributes[$attribute] = $value;
                $this->owner->$attribute = $parsed;

                foreach ($this->owner->getActiveValidators($attribute) as $validator) {
                    if ($validator instanceof UrlValidator) {
                        $validator->defaultScheme = null;
                    }
                }
            }
        }
    }

    /**
     * Restores the original attribute values after validation occurs.
     */
    public function afterValidate(): void
    {
        foreach ($this->originalAttributes as $attribute => $value) {
            $this->owner->$attribute = $value;
        }
    }

    /**
     * Returns the original value of an attribute, or `null` if it wasn’t set to an environment variable or alias.
     *
     * @param string $attribute
     * @return string|null
     */
    public function getUnparsedAttribute(string $attribute): ?string
    {
        return $this->originalAttributes[$attribute] ?? null;
    }
}

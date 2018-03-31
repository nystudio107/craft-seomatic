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

use nystudio107\seomatic\helpers\Dependency;

use craft\base\Model;
use craft\validators\ArrayValidator;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class Container extends Model implements ContainerInterface
{
    // Traits
    // =========================================================================

    use ContainerTrait;

    // Static Methods
    // =========================================================================

    /**
     * Create a new Meta Container
     *
     * @param array $config
     *
     * @return null|Container
     */
    public static function create($config = [])
    {
        $className = get_called_class();
        /** @var $model Container */
        $model = new $className($config);
        if ($model) {
            $model->normalizeContainerData();
        }

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var array
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function addData($data, string $key)
    {
        $this->data[$key] = $data;
    }

    /**
     * @inheritdoc
     */
    public function getData(string $key)
    {
        if (!empty($this->data[$key])) {
            return $this->data[$key];
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public function prepForInclusion(): bool
    {
        return Dependency::validateDependencies($this->dependencies);
    }

    /**
     * @inheritdoc
     */
    public function render($params = []): string
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        // Set the appropriate class for this container
        $this->class = (string)static::class;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['include'], 'boolean'],
            [['name', 'description', 'handle', 'class'], 'string'],
            [['dependencies'], 'safe'],
            [['data'], ArrayValidator::class],
        ]);

        return $rules;
    }
}

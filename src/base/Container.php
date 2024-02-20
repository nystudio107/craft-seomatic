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

namespace nystudio107\seomatic\base;

use craft\validators\ArrayValidator;
use nystudio107\seomatic\events\IncludeContainerEvent;
use nystudio107\seomatic\helpers\Dependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class Container extends FluentModel implements ContainerInterface
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
     * @return static
     */
    public static function create(array $config = [])
    {
        $className = static::class;
        $model = new $className($config);
        $model->normalizeContainerData();

        return $model;
    }

    // Public Properties
    // =========================================================================

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
        if (empty($this->data[$key])) {
            return null;
        }

        return $this->data[$key];
    }

    /**
     * @inheritdoc
     */
    public function prepForInclusion(): bool
    {
        $include = $this->include;
        if ($include) {
            $include = Dependency::validateDependencies($this->dependencies);
        }

        $event = new IncludeContainerEvent([
            'include' => $include,
        ]);
        $this->trigger(self::EVENT_INCLUDE_CONTAINER, $event);

        return $event->include;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
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
    public function rules(): array
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

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

use craft\base\Model;
use ReflectionClass;
use Twig\Markup;
use yii\base\InvalidArgumentException;
use function is_object;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class FluentModel extends Model
{
    // Static Protected Methods
    // =========================================================================

    /**
     * Remove any properties that don't exist in the model
     *
     * @param string $class
     * @param array $config
     */
    protected static function cleanProperties(string $class, array &$config)
    {
        foreach ($config as $propName => $propValue) {
            if (!property_exists($class, $propName)) {
                unset($config[$propName]);
            }
        }
    }

    // Public Methods
    // =========================================================================

    /**
     * Add fluent getters/setters for this class
     *
     * @param string $method The method name (property name)
     * @param array $args The arguments list
     *
     * @return mixed            The value of the property
     */
    public function __call($method, $args)
    {
        $reflector = new ReflectionClass(static::class);
        if (!$reflector->hasProperty($method)) {
            throw new InvalidArgumentException("Property {$method} doesn't exist");
        }
        $property = $reflector->getProperty($method);
        if (empty($args)) {
            // Return the property
            return $property->getValue();
        }
        // Set the property
        $value = $args[0];
        if (is_object($value) && $value instanceof Markup) {
            $value = (string)$value;
        }
        $property->setValue($this, $value);

        // Make it chainable
        return $this;
    }
}

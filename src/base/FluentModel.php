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

use Craft;
use craft\base\Model;

use yii\base\InvalidArgumentException;

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
     * @param array  $config
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
     * @param array  $args   The arguments list
     *
     * @return mixed            The value of the property
     */
    public function __call($method, $args)
    {
        try {
            $reflector = new \ReflectionClass(static::class);
        } catch (\ReflectionException $e) {
            Craft::error(
                $e->getMessage(),
                __METHOD__
            );

            return null;
        }
        if (!$reflector->hasProperty($method)) {
            throw new InvalidArgumentException("Property {$method} doesn't exist");
        }
        $property = $reflector->getProperty($method);
        if (empty($args)) {
            // Return the property
            return $property->getValue();
        }
        // Set the property
        $property->setValue($this, $args[0]);

        // Make it chainable
        return $this;
    }
}

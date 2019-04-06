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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
interface ContainerInterface
{

    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'GenericContainer';

    /**
     * @event IncludeContainerEvent The event that is triggered when a container is
     * about to be included.
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\IncludeContainerEvent;
     * use nystudio107\seomatic\base\Container;
     * use yii\base\Event;
     * Event::on(Container::class, Container::EVENT_INCLUDE_CONTAINER, function(IncludeContainerEvent $e) {
     *     $e->include = false;
     * });
     * ```
     */
    const EVENT_INCLUDE_CONTAINER = 'includeContainer';

    // Static Methods
    // =========================================================================

    public static function create(array $config = []);

    // Public Methods
    // =========================================================================

    /**
     * Add data to the container. If the $key already exists, it is overwritten
     *
     * @param        $data
     * @param string $key
     */
    public function addData($data, string $key);

    /**
     * Get data from the container with the key $key
     *
     * @param string $key
     *
     * @return null|mixed
     */
    public function getData(string $key);

    /**
     * Prepare the container's data for inclusion
     *
     * @return bool Whether the render should happen or not
     */
    public function prepForInclusion(): bool;

    /**
     * Render the container's content
     *
     * @param array $params
     *
     * @return string
     */
    public function render(array $params = []): string;

    /**
     * Normalizes the containers’s data for use.
     *
     * This is called after container data is loaded, to allow it to be parsed,
     * models instantiated, etc.
     */
    public function normalizeContainerData();
}

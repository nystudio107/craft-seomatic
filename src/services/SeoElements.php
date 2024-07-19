<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\services;

use Craft;
use craft\base\Component;
use craft\base\ElementInterface;
use craft\events\RegisterComponentTypesEvent;
use nystudio107\seomatic\base\GqlSeoElementInterface;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\seoelements\SeoCampaign;
use nystudio107\seomatic\seoelements\SeoCategory;
use nystudio107\seomatic\seoelements\SeoDigitalProduct;
use nystudio107\seomatic\seoelements\SeoEntry;
use nystudio107\seomatic\seoelements\SeoEvent;
use nystudio107\seomatic\seoelements\SeoProduct;
use nystudio107\seomatic\seoelements\SeoShopifyProduct;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoElements extends Component
{
    // Constants
    // =========================================================================

    /**
     * @event RegisterComponentTypesEvent The event that is triggered when
     *        registering SeoElement types
     *
     * SeoElement types must implement [[SeoElementInterface]]
     *
     * ```php
     * use nystudio107\seomatic\services\SeoElements;
     * use craft\events\RegisterComponentTypesEvent;
     * use yii\base\Event;
     *
     * Event::on(SeoElements::class,
     *     SeoElements::EVENT_REGISTER_SEO_ELEMENT_TYPES,
     *     function(RegisterComponentTypesEvent $event) {
     *         $event->types[] = MySeoElement::class;
     *     }
     * );
     * ```
     */
    public const EVENT_REGISTER_SEO_ELEMENT_TYPES = 'registerSeoElementTypes';

    public const DEFAULT_SEO_ELEMENT_TYPES = [
        SeoCampaign::class,
        SeoCategory::class,
        SeoDigitalProduct::class,
        SeoEntry::class,
        SeoEvent::class,
        SeoProduct::class,
        SeoShopifyProduct::class,
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @var class-string<SeoElementInterface>[] indexed by [sourceType]
     */
    protected array $seoElements = [];

    // Public Methods
    // =========================================================================

    /**
     * @param null|string $metaBundleType
     *
     * @return class-string<SeoElementInterface>|null
     */
    public function getSeoElementByMetaBundleType(?string $metaBundleType): ?string
    {
        if ($metaBundleType === null) {
            return null;
        }
        $seoElements = $this->getAllSeoElementTypes();

        return $seoElements[$metaBundleType] ?? null;
    }

    /**
     * Returns all available field type classes.
     *
     * @return class-string<SeoElementInterface>[] The available field type classes
     */
    public function getAllSeoElementTypes(bool $useCache = true): array
    {
        // Return the memoized version if available
        if ($useCache && !empty($this->seoElements)) {
            return $this->seoElements;
        }
        // Merge in the built-in types with the types defined in the config.php
        $seoElementTypes = array_unique(array_merge(
            SeoMatic::$plugin->getSettings()->defaultSeoElementTypes ?? [],
            self::DEFAULT_SEO_ELEMENT_TYPES
        ), SORT_REGULAR);
        // Throw an event to allow other modules/plugins to define their own types
        $event = new RegisterComponentTypesEvent([
            'types' => $seoElementTypes,
        ]);
        $this->trigger(self::EVENT_REGISTER_SEO_ELEMENT_TYPES, $event);
        // Index the array by META_BUNDLE_TYPE
        /** @var class-string<SeoElementInterface> $seoElement */
        foreach ($event->types as $seoElement) {
            $requiredPlugin = $seoElement::getRequiredPluginHandle();
            if ($requiredPlugin === null || Craft::$app->getPlugins()->getPlugin($requiredPlugin)) {
                $this->seoElements[$seoElement::getMetaBundleType()] = $seoElement;
                $seoElement::installEventHandlers();
            }
        }

        return $this->seoElements;
    }

    /**
     * Return the Meta Bundle type for a given element
     *
     * @param ElementInterface $element
     *
     * @return string|null
     */
    public function getMetaBundleTypeFromElement(ElementInterface $element)
    {
        $seoElements = $this->getAllSeoElementTypes();
        /** @var SeoElementInterface $seoElement */
        foreach ($seoElements as $metaBundleType => $seoElement) {
            foreach ($seoElement::getElementClasses() as $elementClass) {
                if ($element instanceof $elementClass) {
                    return $metaBundleType;
                }
            }
        }

        return null;
    }

    /**
     * Returns all available known GQL interfaces used by SEO elements.
     *
     * @return string[] List of known GQL interface names.
     */
    public function getAllSeoElementGqlInterfaceNames(): array
    {
        $seoElements = $this->getAllSeoElementTypes();
        $interfaceNames = [];

        foreach ($seoElements as $seoElement) {
            if (is_subclass_of($seoElement, GqlSeoElementInterface::class)) {
                $interfaceNames[] = $seoElement::getGqlInterfaceTypeName();
            }
        }

        return $interfaceNames;
    }
}

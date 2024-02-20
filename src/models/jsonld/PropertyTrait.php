<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for Property.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Property
 */
trait PropertyTrait
{
    /**
     * Relates a property to a class that is (one of) the type(s) the property is
     * expected to be used on.
     *
     * @var array|SchemaClass|SchemaClass[]
     */
    public $domainIncludes;

    /**
     * Relates a term (i.e. a property, class or enumeration) to one that
     * supersedes it.
     *
     * @var array|SchemaClass|SchemaClass[]|array|Enumeration|Enumeration[]|array|Property|Property[]
     */
    public $supersededBy;

    /**
     * Relates a property to a property that is its inverse. Inverse properties
     * relate the same pairs of items to each other, but in reversed direction.
     * For example, the 'alumni' and 'alumniOf' properties are inverseOf each
     * other. Some properties don't have explicit inverses; in these situations
     * RDFa and JSON-LD syntax for reverse properties can be used.
     *
     * @var array|Property|Property[]
     */
    public $inverseOf;

    /**
     * Relates a property to a class that constitutes (one of) the expected
     * type(s) for values of the property.
     *
     * @var array|SchemaClass|SchemaClass[]
     */
    public $rangeIncludes;
}

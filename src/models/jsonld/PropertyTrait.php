<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Property.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Property
 */
trait PropertyTrait
{
    /**
     * Relates a term (i.e. a property, class or enumeration) to one that
     * supersedes it.
     *
     * @var SchemaClass|Property|Enumeration
     */
    public $supersededBy;

    /**
     * Relates a property to a class that is (one of) the type(s) the property is
     * expected to be used on.
     *
     * @var SchemaClass
     */
    public $domainIncludes;

    /**
     * Relates a property to a property that is its inverse. Inverse properties
     * relate the same pairs of items to each other, but in reversed direction.
     * For example, the 'alumni' and 'alumniOf' properties are inverseOf each
     * other. Some properties don't have explicit inverses; in these situations
     * RDFa and JSON-LD syntax for reverse properties can be used.
     *
     * @var Property
     */
    public $inverseOf;

    /**
     * Relates a property to a class that constitutes (one of) the expected
     * type(s) for values of the property.
     *
     * @var SchemaClass
     */
    public $rangeIncludes;
}

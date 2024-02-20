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
 * Trait for DigitalDocument.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DigitalDocument
 */
trait DigitalDocumentTrait
{
    /**
     * A permission related to the access to this document (e.g. permission to
     * read or write an electronic document). For a public document, specify a
     * grantee with an Audience with audienceType equal to "public".
     *
     * @var array|DigitalDocumentPermission|DigitalDocumentPermission[]
     */
    public $hasDigitalDocumentPermission;
}

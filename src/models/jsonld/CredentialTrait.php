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
 * schema.org version: v30.0
 * Trait for Credential.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Credential
 */
trait CredentialTrait
{
    /**
     * The category or type of credential being described, for example "degree”,
     * “certificate”, “badge”, or more specific term.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]|array|URL|URL[]
     */
    public $credentialCategory;

    /**
     * An organization that acknowledges the validity, value or utility of a
     * credential. Note: recognition may include a process of quality assurance or
     * accreditation.
     *
     * @var array|Organization|Organization[]
     */
    public $recognizedBy;

    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var array|Duration|Duration[]
     */
    public $validFor;

    /**
     * The geographic area where the item is valid. Applies for example to a
     * [[Permit]], a [[Certification]], or an
     * [[EducationalOccupationalCredential]].
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $validIn;
}

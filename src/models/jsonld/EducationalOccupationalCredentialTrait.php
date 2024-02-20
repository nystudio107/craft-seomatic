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
 * Trait for EducationalOccupationalCredential.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EducationalOccupationalCredential
 */
trait EducationalOccupationalCredentialTrait
{
    /**
     * Knowledge, skill, ability or personal attribute that must be demonstrated
     * by a person or other entity in order to do something such as earn an
     * Educational Occupational Credential or understand a LearningResource.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $competencyRequired;

    /**
     * An organization that acknowledges the validity, value or utility of a
     * credential. Note: recognition may include a process of quality assurance or
     * accreditation.
     *
     * @var array|Organization|Organization[]
     */
    public $recognizedBy;

    /**
     * The geographic area where the item is valid. Applies for example to a
     * [[Permit]], a [[Certification]], or an
     * [[EducationalOccupationalCredential]].
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $validIn;

    /**
     * The category or type of credential being described, for example "degree”,
     * “certificate”, “badge”, or more specific term.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]|array|URL|URL[]
     */
    public $credentialCategory;

    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var array|Duration|Duration[]
     */
    public $validFor;

    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $educationalLevel;
}

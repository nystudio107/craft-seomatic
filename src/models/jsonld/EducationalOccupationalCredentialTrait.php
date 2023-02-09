<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for EducationalOccupationalCredential.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EducationalOccupationalCredential
 */
trait EducationalOccupationalCredentialTrait
{
    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var string|Text|URL|DefinedTerm
     */
    public $educationalLevel;

    /**
     * Knowledge, skill, ability or personal attribute that must be demonstrated
     * by a person or other entity in order to do something such as earn an
     * Educational Occupational Credential or understand a LearningResource.
     *
     * @var string|Text|URL|DefinedTerm
     */
    public $competencyRequired;

    /**
     * An organization that acknowledges the validity, value or utility of a
     * credential. Note: recognition may include a process of quality assurance or
     * accreditation.
     *
     * @var Organization
     */
    public $recognizedBy;

    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var Duration
     */
    public $validFor;

    /**
     * The geographic area where a permit or similar thing is valid.
     *
     * @var AdministrativeArea
     */
    public $validIn;

    /**
     * The category or type of credential being described, for example "degree”,
     * “certificate”, “badge”, or more specific term.
     *
     * @var string|URL|DefinedTerm|Text
     */
    public $credentialCategory;
}

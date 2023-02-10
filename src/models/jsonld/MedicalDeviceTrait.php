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
 * Trait for MedicalDevice.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalDevice
 */
trait MedicalDeviceTrait
{
    /**
     * A description of the postoperative procedures, care, and/or followups for
     * this device.
     *
     * @var string|Text
     */
    public $postOp;

    /**
     * A possible serious complication and/or serious side effect of this therapy.
     * Serious adverse outcomes include those that are life-threatening; result in
     * death, disability, or permanent damage; require hospitalization or prolong
     * existing hospitalization; cause congenital anomalies or birth defects; or
     * jeopardize the patient and may require medical or surgical intervention to
     * prevent one of the outcomes in this definition.
     *
     * @var MedicalEntity
     */
    public $seriousAdverseOutcome;

    /**
     * A description of the workup, testing, and other preparations required
     * before implanting this device.
     *
     * @var string|Text
     */
    public $preOp;

    /**
     * A possible complication and/or side effect of this therapy. If it is known
     * that an adverse outcome is serious (resulting in death, disability, or
     * permanent damage; requiring hospitalization; or otherwise life-threatening
     * or requiring immediate medical attention), tag it as a
     * seriousAdverseOutcome instead.
     *
     * @var MedicalEntity
     */
    public $adverseOutcome;

    /**
     * A description of the procedure involved in setting up, using, and/or
     * installing the device.
     *
     * @var string|Text
     */
    public $procedure;

    /**
     * A contraindication for this therapy.
     *
     * @var string|Text|MedicalContraindication
     */
    public $contraindication;
}

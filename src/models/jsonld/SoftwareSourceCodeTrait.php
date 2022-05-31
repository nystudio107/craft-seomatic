<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for SoftwareSourceCode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SoftwareSourceCode
 */

trait SoftwareSourceCodeTrait
{
    
    /**
     * The computer programming language.
     *
     * @var string|Text|ComputerLanguage
     */
    public $programmingLanguage;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template.
     *
     * @var string|Text
     */
    public $sampleType;

    /**
     * Runtime platform or script interpreter dependencies (Example - Java v1,
     * Python2.3, .Net Framework 3.0).
     *
     * @var string|Text
     */
    public $runtimePlatform;

    /**
     * Runtime platform or script interpreter dependencies (Example - Java v1,
     * Python2.3, .Net Framework 3.0).
     *
     * @var string|Text
     */
    public $runtime;

    /**
     * Target Operating System / Product to which the code applies.  If applies to
     * several versions, just the product name can be used.
     *
     * @var SoftwareApplication
     */
    public $targetProduct;

    /**
     * Link to the repository where the un-compiled, human readable code and
     * related code is located (SVN, github, CodePlex).
     *
     * @var URL
     */
    public $codeRepository;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template.
     *
     * @var string|Text
     */
    public $codeSampleType;

}

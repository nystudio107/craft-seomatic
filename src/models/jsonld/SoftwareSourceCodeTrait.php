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
 * Trait for SoftwareSourceCode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SoftwareSourceCode
 */
trait SoftwareSourceCodeTrait
{
    /**
     * Link to the repository where the un-compiled, human readable code and
     * related code is located (SVN, GitHub, CodePlex).
     *
     * @var array|URL|URL[]
     */
    public $codeRepository;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template.
     *
     * @var string|array|Text|Text[]
     */
    public $codeSampleType;

    /**
     * The computer programming language.
     *
     * @var string|array|ComputerLanguage|ComputerLanguage[]|array|Text|Text[]
     */
    public $programmingLanguage;

    /**
     * Runtime platform or script interpreter dependencies (example: Java v1,
     * Python 2.3, .NET Framework 3.0).
     *
     * @var string|array|Text|Text[]
     */
    public $runtime;

    /**
     * Runtime platform or script interpreter dependencies (example: Java v1,
     * Python 2.3, .NET Framework 3.0).
     *
     * @var string|array|RuntimePlatform|RuntimePlatform[]|array|Text|Text[]
     */
    public $runtimePlatform;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template.
     *
     * @var string|array|Text|Text[]
     */
    public $sampleType;

    /**
     * Target Operating System / Product to which the code applies.  If applies to
     * several versions, just the product name can be used.
     *
     * @var array|SoftwareApplication|SoftwareApplication[]
     */
    public $targetProduct;
}

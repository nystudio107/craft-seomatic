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
 * Trait for SoftwareSourceCode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SoftwareSourceCode
 */
trait SoftwareSourceCodeTrait
{
    /**
     * Target Operating System / Product to which the code applies.  If applies to
     * several versions, just the product name can be used.
     *
     * @var SoftwareApplication
     */
    public $targetProduct;

    /**
     * Runtime platform or script interpreter dependencies (example: Java v1,
     * Python 2.3, .NET Framework 3.0).
     *
     * @var string|Text
     */
    public $runtimePlatform;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template.
     *
     * @var string|Text
     */
    public $codeSampleType;

    /**
     * Runtime platform or script interpreter dependencies (example: Java v1,
     * Python 2.3, .NET Framework 3.0).
     *
     * @var string|Text
     */
    public $runtime;

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
     * Link to the repository where the un-compiled, human readable code and
     * related code is located (SVN, GitHub, CodePlex).
     *
     * @var URL
     */
    public $codeRepository;
}

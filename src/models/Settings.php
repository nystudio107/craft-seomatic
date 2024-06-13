<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use craft\behaviors\EnvAttributeParserBehavior;
use craft\validators\ArrayValidator;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\base\VarsModel;

/**
 * Plugin settings object, containing values for configuring the plugin
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Settings extends VarsModel
{
    // Public Properties
    // =========================================================================

    /**
     * @var string The public-facing name of the plugin
     */
    public string $pluginName = 'SEOmatic';

    /**
     * @var bool Should SEOmatic render metadata?
     */
    public bool $renderEnabled = true;

    /**
     * @var bool Should SEOmatic render frontend sitemaps?
     */
    public bool $sitemapsEnabled = true;

    /**
     * @var bool Should sitemaps be regenerated automatically?
     */
    public bool $regenerateSitemapsAutomatically = true;

    /**
     * @var bool Should sitemaps be submitted to search engines automatically whenever there are changes?
     */
    public bool $submitSitemaps = true;

    /**
     * @var bool Should items where the entry URL doesn't match the canonical URL be excluded?
     */
    public bool $excludeNonCanonicalUrls = false;

    /**
     * @var bool Should the homepage be included in the generated Breadcrumbs JSON-LD?
     */
    public bool $includeHomepageInBreadcrumbs = true;

    /**
     * @var bool Should SEOmatic add to the http response headers?
     */
    public bool $headersEnabled = true;

    /**
     * @var bool Whether the environment should be manually set, or automatically determined
     */
    public bool $manuallySetEnvironment = false;

    /**
     * @var string The server environment, either `live`, `staging`, or `local`
     */
    public string $environment = 'live';

    /**
     * @var bool Should SEOmatic display the SEO Preview sidebar?
     */
    public bool $displayPreviewSidebar = true;

    /**
     * @var bool Should SEOmatic add a Social Media Preview Target?
     */
    public bool $socialMediaPreviewTarget = true;

    /**
     * @var array The social media platforms that should be displayed in the SEO Preview sidebar
     */
    public array $sidebarDisplayPreviewTypes = [
        'google',
        'twitter',
        'facebook',
    ];

    /**
     * @var bool Should SEOmatic display the SEO Analysis sidebar?
     */
    public bool $displayAnalysisSidebar = true;

    /**
     * @var string If `devMode` is on, prefix the <title> with this string
     */
    public string $devModeTitlePrefix = '&#x1f6a7; ';

    /**
     * @var string Prefix the Control Panel <title> with this string
     */
    public string $cpTitlePrefix = '&#x2699; ';

    /**
     * @var string If `devMode` is on, prefix the Control Panel <title> with this string
     */
    public string $devModeCpTitlePrefix = '&#x1f6a7;&#x2699; ';

    /**
     * @var string The separator character to use for the `<title>` tag
     */
    public string $separatorChar = '|';

    /**
     * @var int The max number of characters in the `<title>` tag
     */
    public int $maxTitleLength = 70;

    /**
     * @var int The max number of characters in the `<meta name="description">` tag
     */
    public int $maxDescriptionLength = 155;

    /**
     * @var bool Should Title tags be truncated at the max length, on word boundaries?
     */
    public bool $truncateTitleTags = true;

    /**
     * @var bool Should Description tags be truncated at the max length, on word boundaries?
     */
    public bool $truncateDescriptionTags = true;

    /**
     * @var bool Site Groups define logically separate sites
     */
    public bool $siteGroupsSeparate = true;

    /**
     * @var bool Whether to dynamically include the hreflang tags
     */
    public bool $addHrefLang = true;

    /**
     * @var bool Whether to dynamically include the `x-default` hreflang tags
     */
    public bool $addXDefaultHrefLang = true;

    /**
     * @var int The site to use for the `x-default` hreflang tag (0 defaults to the Primary site)
     */
    public int $xDefaultSite = 0;

    /**
     * @var bool Whether to dynamically include hreflang tags on paginated pages
     */
    public bool $addPaginatedHreflang = true;

    /**
     * @var string Whether to include a Content Security Policy "nonce" for inline
     *      CSS or JavaScript. Valid values are 'header' or 'tag' for how the CSP
     *      should be included. c.f.:
     *      https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src#Unsafe_inline_script
     */
    public string $cspNonce = '';

    /**
     * @var array Fixed Content Security Policies to be added before any CSP nonces
     */
    public array $cspScriptSrcPolicies = [
        0 => [
            'policy' => "'self'",
        ],
    ];

    /**
     * @var bool
     * SEO [best practices](https://www.searchenginejournal.com/google-dont-mix-noindex-relcanonical/262607)
     * are to have `canonical` links not appear on pages that are not intended to be indexed. SEOmatic does
     * this for you by default, but you can override that behavior with this setting
     */
    public bool $alwaysIncludeCanonicalUrls = false;

    /**
     * @var bool Should the Canonical URL be automatically lower-cased?
     */
    public bool $lowercaseCanonicalUrl = true;

    /**
     * @var bool Should the meta generator tag and X-Powered-By header be included?
     */
    public bool $generatorEnabled = true;

    /**
     * @var string|array
     * SEOmatic uses the Craft `siteUrl` to generate the external URLs.  If you
     * are using it in a non-standard environment, such as a headless GraphQL or
     * ElementAPI server, you can override what it uses for the `siteUrl` below.
     * This can be either a simple string, or an array of strings indexed by the site
     * handle, for multi-site setups. e.g.:
     * 'siteUrlOverride' => [
     *     'default' => 'http://example.com/',
     *     'spanish' => 'http://example.com/es/',
     * ],     */
    public string|array $siteUrlOverride = '';

    /**
     * @var int|null
     * The duration of the SEOmatic meta cache in seconds.  Null means always cached until explicitly broken
     * If devMode is on, caches last 30 seconds.
     */
    public ?int $metaCacheDuration = 0;

    /**
     * @var bool Determines whether the meta container endpoint should be enabled for anonymous frontend access
     */
    public bool $enableMetaContainerEndpoint = false;

    /**
     * @var bool Determines whether the JSON-LD endpoint should be enabled for anonymous frontend access
     */
    public bool $enableJsonLdEndpoint = false;

    /**
     * @var bool Determines whether the SEO File Link endpoint should be enabled for anonymous frontend access
     */
    public bool $enableSeoFileLinkEndpoint = false;

    /**
     * @var bool Determines whether the SEOmatic debug toolbar panel should be added to the Yii2 debug toolbar
     */
    public bool $enableDebugToolbarPanel = true;

    /**
     * @var SeoElementInterface[] The default SeoElement type classes
     */
    public array $defaultSeoElementTypes = [
    ];

    /**
     * @var string[] URL params that are allowed to be considered part of the unique URL used for the metadata cache
     */
    public array $allowedUrlParams = [
    ];

    // Public Methods
    // =========================================================================

    /**
     * @inerhitdoc
     */
    public function __construct($config = [])
    {
        if (!empty($config)) {
            // Normalize the metaCacheDuration to an integer
            if (empty($config['metaCacheDuration']) || $config['metaCacheDuration'] === 'null') {
                $config['metaCacheDuration'] = 0;
            }
        }

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            ['pluginName', 'string'],
            ['pluginName', 'default', 'value' => 'SEOmatic'],
            [
                [
                    'renderEnabled',
                    'sitemapsEnabled',
                    'regenerateSitemapsAutomatically',
                    'submitSitemaps',
                    'excludeNonCanonicalUrls',
                    'includeHomepageInBreadcrumbs',
                    'headersEnabled',
                    'generatorEnabled',
                    'addHrefLang',
                    'addXDefaultHrefLang',
                    'addPaginatedHreflang',
                    'manuallySetEnvironment',
                ],
                'boolean',
            ],
            ['xDefaultSite', 'integer'],
            ['xDefaultSite', 'default', 'value' => 0],
            ['cspNonce', 'string'],
            ['cspNonce', 'in', 'range' => [
                '',
                'header',
                'tag',
            ]],
            ['environment', 'string'],
            ['environment', 'default', 'value' => 'live'],
            [
                [
                    'displayPreviewSidebar',
                    'socialMediaPreviewTarget',
                    'displayAnalysisSidebar',
                    'enableMetaContainerEndpoint',
                    'enableJsonLdEndpoint',
                    'enableSeoFileLinkEndpoint',
                    'alwaysIncludeCanonicalUrls',
                    'lowercaseCanonicalUrl',
                    'truncateTitleTags',
                    'truncateDescriptionTags',
                    'enableDebugToolbarPanel',
                ],
                'boolean',
            ],
            [['devModeTitlePrefix', 'cpTitlePrefix', 'devModeCpTitlePrefix'], 'string'],
            ['separatorChar', 'string'],
            ['separatorChar', 'default', 'value' => '|'],
            ['maxTitleLength', 'integer', 'min' => 10],
            ['maxTitleLength', 'default', 'value' => 70],
            ['maxDescriptionLength', 'integer', 'min' => 10],
            ['maxDescriptionLength', 'default', 'value' => 155],
            ['siteUrlOverride', 'safe'],
            ['siteUrlOverride', 'default', 'value' => ''],
            [
                [
                    'sidebarDisplayPreviewTypes',
                    'defaultSeoElementTypes',
                    'cspScriptSrcPolicies',
                    'allowedUrlParams',
                ],
                ArrayValidator::class,
            ],
            ['metaCacheDuration', 'default', 'value' => 0],
            ['metaCacheDuration', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        // Keep any parent behaviors
        $behaviors = parent::behaviors();

        return array_merge($behaviors, [
            'parser' => [
                'class' => EnvAttributeParserBehavior::class,
                'attributes' => [
                    'environment',
                ],
            ],
        ]);
    }
}

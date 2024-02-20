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

use nystudio107\seomatic\base\InheritableSettingsModel;

/**
 * Global variables object, containing the values used to derive meta tags
 *
 * @method void setLanguage(string $language)
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaGlobalVars extends InheritableSettingsModel
{
    // Constants
    // =========================================================================
    protected const ADJUST_QUERY_ACCESS_FIELDS = [
        'seoImage',
        'seoImageWidth',
        'seoImageHeight',
        'ogImage',
        'ogImageWidth',
        'ogImageHeight',
        'twitterImage',
        'twitterImageWidth',
        'twitterImageHeight',
    ];

    // Public Properties
    // =========================================================================
    /**
     * @var string The current language
     */
    public $language;
    /**
     * @var string The schema.org type representing the mainEntityOfPage
     */
    public $mainEntityOfPage = 'WebPage';
    /**
     * @var string The seoTitle is used in the `<title>` tag, and as a default
     *      setting for the ogTitle & twitterTitle
     */
    public $seoTitle;
    /**
     * @var string where the site name should be positioned in the `<title>` tag
     */
    public $siteNamePosition;
    /**
     * @var string The seoDescription is used for the `<meta name="description">`
     *      tag, and as a default setting for the Description & twitterDescription
     */
    public $seoDescription;
    /**
     * @var string The $seoKeywords are used for the `<meta name="keywords">` tag
     */
    public $seoKeywords;
    /**
     * @var string Fully qualified URL to the SEO image
     */
    public $seoImage;
    /**
     * @var string Width of the SEO image
     */
    public $seoImageWidth;
    /**
     * @var string Height of the SEO image
     */
    public $seoImageHeight;
    /**
     * @var string SEO image description
     */
    public $seoImageDescription;
    /**
     * @var string|object The search engine friendly URL that you want the search engines to treat as authoritative.
     */
    public $canonicalUrl;
    /**
     * @var string The robots meta tag lets you utilize a granular, page-specific approach to controlling how
     * an individual page should be indexed and served to users in search results.
     */
    public $robots;
    /**
     * @var string The type of OpenGraph object representing the page
     */
    public $ogType;
    /**
     * @var string The title for the OpenGraph object, which appears when sharing it on Facebook
     */
    public $ogTitle;
    /**
     * @var string Where the site name should be positioned in the `og:title` tag
     */
    public $ogSiteNamePosition;
    /**
     * @var string The description of the OpenGraph object, which appears when sharing it on Facebook
     */
    public $ogDescription;
    /**
     * @var string Fully qualified URL to the image representing the OpenGraph object, which appears when sharing it on Facebook
     */
    public $ogImage;
    /**
     * @var string The width of the ogImage
     */
    public $ogImageWidth;
    /**
     * @var string The height of the ogImage
     */
    public $ogImageHeight;
    /**
     * @var string The description of the ogImage
     */
    public $ogImageDescription;
    /**
     * @var string The type of Twitter card to use
     */
    public $twitterCard;
    /**
     * @var string Twitter username for the content creator / author, without the preceding @
     */
    public $twitterCreator;
    /**
     * @var string The title for the Twitter card, which appears when sharing it on Twitter
     */
    public $twitterTitle;
    /**
     * @var string Where the site name should be positioned in the `twitter:title` tag
     */
    public $twitterSiteNamePosition;
    /**
     * @var string The description of the Twitter card, which appears when sharing it on Twitter
     */
    public $twitterDescription;
    /**
     * @var string Fully qualified URL to the Twitter image, which appears when sharing it on Twitter
     */
    public $twitterImage;
    /**
     * @var string The width of the Twitter image
     */
    public $twitterImageWidth;
    /**
     * @var string The height of the Twitter image
     */
    public $twitterImageHeight;
    /**
     * @var string The description of the Twitter image
     */
    public $twitterImageDescription;

    /**
     * @inheritdoc
     */
    public function __construct(array $config = [])
    {
        // Unset any deprecated properties
        //unset($config['siteNamePosition']);
        parent::__construct($config);
    }

    // Public Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaGlobalVars
     */
    public static function create(array $config = [])
    {
        return new MetaGlobalVars($config);
    }

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        // If we have potentially unsafe Twig code, strip it out
        if (!empty($this->canonicalUrl)) {
            if (is_string($this->canonicalUrl)) {
                if (str_contains($this->canonicalUrl, 'craft.app.request.pathInfo')) {
                    $this->canonicalUrl = '{{ seomatic.helper.safeCanonicalUrl() }}';
                }
            } else {
                // Ensure that `canonicalUrl` is always a string
                $this->canonicalUrl = '{{ seomatic.helper.safeCanonicalUrl() }}';
            }
        }
        // Find any instances of image-related fields that contain Twig code, and access assets
        // using the old `[0]` array syntax with `.collect()[0]`
        foreach (self::ADJUST_QUERY_ACCESS_FIELDS as $queryField) {
            if (!empty($this->$queryField) && str_contains($this->$queryField, '{') && !str_contains($this->$queryField, '[0].src')) {
                $this->$queryField = preg_replace('/(?<!\))\[0]/', '.collect()[0]', $this->$queryField);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [
                [
                    'language',
                    'mainEntityOfPage',
                    'seoTitle',
                    'siteNamePosition',
                    'seoDescription',
                    'seoKeywords',
                    'seoImage',
                    'seoImageWidth',
                    'seoImageHeight',
                    'seoImageDescription',
                    'robots',
                    'ogType',
                    'ogTitle',
                    'ogSiteNamePosition',
                    'ogDescription',
                    'ogImage',
                    'ogImageWidth',
                    'ogImageHeight',
                    'ogImageDescription',
                    'twitterCard',
                    'twitterCreator',
                    'twitterTitle',
                    'twitterSiteNamePosition',
                    'twitterDescription',
                    'twitterImage',
                    'twitterImageHeight',
                    'twitterImageWidth',
                    'twitterImageDescription',
                    'canonicalUrl',
                ],
                'string',
            ],
            [
                'twitterCard', 'in', 'range' => [
                'summary',
                'summary_large_image',
                'app',
                'player',
            ],
            ],
        ];
    }
}

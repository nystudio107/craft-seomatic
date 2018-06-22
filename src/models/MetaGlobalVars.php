<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\base\VarsModel;

/**
 * @inheritdoc
 * @method void setLanguage(string $language)
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaGlobalVars extends VarsModel
{
    // Static Methods
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

    // Public Properties
    // =========================================================================

    /**
     * @var string
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
     * @var string
     */
    public $seoImage;

    /**
     * @var string
     */
    public $seoImageDescription;

    /**
     * @var string
     */
    public $canonicalUrl;

    /**
     * @var string
     */
    public $robots;

    /**
     * @var string
     */
    public $ogType;

    /**
     * @var string
     */
    public $ogTitle;

    /**
     * @var string
     */
    public $ogSiteNamePosition;

    /**
     * @var string
     */
    public $ogDescription;

    /**
     * @var string
     */
    public $ogImage;

    /**
     * @var string
     */
    public $ogImageDescription;

    /**
     * @var string
     */
    public $twitterCard;

    /**
     * @var string
     */
    public $twitterCreator;

    /**
     * @var string
     */
    public $twitterTitle;

    /**
     * @var string
     */
    public $twitterSiteNamePosition;

    /**
     * @var string
     */
    public $twitterDescription;

    /**
     * @var string
     */
    public $twitterImage;

    /**
     * @var string
     */
    public $twitterImageDescription;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct(array $config = [])
    {
        // Unset any deprecated properties
        //unset($config['siteNamePosition']);
        parent::__construct($config);
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
                    'seoImageDescription',
                    'robots',
                    'ogType',
                    'ogTitle',
                    'ogSiteNamePosition',
                    'ogDescription',
                    'ogImage',
                    'ogImageDescription',
                    'twitterCard',
                    'twitterCreator',
                    'twitterTitle',
                    'twitterSiteNamePosition',
                    'twitterDescription',
                    'twitterImage',
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
            [
                'robots', 'in', 'range' => [
                    'all',
                    'index',
                    'noindex',
                    'follow',
                    'nofollow',
                    'none',
                    'noodp',
                    'noarchive',
                    'nosnippet',
                    'noimageindex',
                    'nocache',
                ],
            ],
        ];
    }
}

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

namespace nystudio107\seomatic\models\metalink;

use Craft;
use craft\helpers\StringHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class CanonicalLink extends MetaLink
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'CanonicalLink';

    // Static Methods
    // =========================================================================

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
            $request = Craft::$app->getRequest();
            $response = Craft::$app->getResponse();
            // Don't render a canonical url for http status codes >= 400
            if (!$request->isConsoleRequest
                && !Seomatic::$previewingMetaContainers
                && $response->statusCode >= 400
            ) {
                return false;
            }
            // Don't render a canonical URL if this page isn't meant to be indexed as per:
            // https://www.reddit.com/r/TechSEO/comments/8yahdr/2_questions_about_the_canonical_tag/e2dey9i/?context=1
            $robots = Seomatic::$seomaticVariable->tag->get('robots');
            if ($robots !== null && $robots->include && !Seomatic::$previewingMetaContainers && !Seomatic::$settings->alwaysIncludeCanonicalUrls) {
                $robotsArray = $robots->renderAttributes();
                $contentArray = explode(',', $robotsArray['content'] ?? '');
                if (in_array('noindex', $contentArray, true) || in_array('none', $contentArray, true)) {
                    return false;
                }
            }
            // Ensure the href is a full url
            if (!empty($data['href'])) {
                if (Seomatic::$settings->lowercaseCanonicalUrl) {
                    $data['href'] = StringHelper::toLowerCase($data['href']);
                }
                $url = UrlHelper::absoluteUrlWithProtocol($data['href']);
                // The URL should be stripped of its query string already, but because
                // Craft adds the `tokenParam` URL param back in via UrlHelper, strip it again
                if (Seomatic::$plugin->metaContainers->paginationPage === '1') {
                    $token = Craft::$app->getConfig()->getGeneral()->tokenParam;
                    $url = preg_replace('~([?&])' . $token . '=[^&]*~', '$1', $url);
                    $url = rtrim($url, '?&');
                    $url = str_replace(['&&', '?&'], ['&', '?'], $url);
                    $data['href'] = $url;
                }
            }
        }

        return $shouldRender;
    }
}

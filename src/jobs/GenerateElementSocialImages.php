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

namespace nystudio107\seomatic\jobs;

use Craft;
use craft\base\Element;
use craft\helpers\ElementHelper;
use nystudio107\seomatic\queue\SingletonJob;
use nystudio107\seomatic\helpers\PullField;
use nystudio107\seomatic\models\MetaBundleSettings;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Helper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
class GenerateElementSocialImages extends SingletonJob
{
    // Properties
    // =========================================================================
    /**
     * @var int Element id
     */
    public $elementId;

    /**
     * @var bool Whether all sites for elements should have images re-generated.
     */
    public $allSites = false;

    /**
     * @var string title for the job description
     */
    public $title;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        $element = Craft::$app->getElements()->getElementById($this->elementId);
        Seomatic::getInstance()->socialImages->updateSocialImagesForElement($element, $this->allSites);

        $this->finishJob();
    }

    // Protected Methods
    // =========================================================================
    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('seomatic', 'Generating SEO images for {title}', [
            'title' => $this->title
        ]);
    }
}

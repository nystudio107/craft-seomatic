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
use nystudio107\seomatic\models\MetaBundle;
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
class GenerateBundleSocialImages extends SingletonJob
{
    // Properties
    // =========================================================================
    /**
     * @var string
     */
    public $sourceBundleType;

    /**
     * @var int
     */
    public $sourceId;

    /**
     * @var int
     */
    public $sourceSiteId;

    /**
     * @var int
     */
    public $typeId;

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
        $seomatic = Seomatic::getInstance();
        $metaBundle = $seomatic->metaBundles->getMetaBundleBySourceId($this->sourceBundleType, $this->sourceId, $this->sourceSiteId, $this->typeId);

        if ($metaBundle) {
            $seomatic->socialImages->updateSocialImagesForMetaBundle($metaBundle);
        }

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

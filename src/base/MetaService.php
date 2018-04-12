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

namespace nystudio107\seomatic\base;

use nystudio107\seomatic\Seomatic;

use Craft;
use craft\base\Component;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class MetaService extends Component implements MetaServiceInterface
{
    // Constants
    // =========================================================================

    const GENERAL_HANDLE = 'general';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function get(string $key, string $handle = '')
    {
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true)
    {
    }

    /**
     * @inheritdoc
     */
    public function add($metaItem, string $handle = '')
    {
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
    }

    /**
     * @inheritdoc
     */
    public function container(string $handle = '')
    {
    }
}

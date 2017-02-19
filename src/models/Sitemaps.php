<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\models;

use Craft;
use craft\base\Model;

/**
 * JsonLd Model
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */

class SiteMaps extends Model
{
    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Properties
    // =========================================================================

    /**
     * The Sitemap Type (section, category, commerce_product, etc.)
     * @var string
     */
    public $sitemapType;

    /**
     * The Handle of the sitemapType entity
     * @var string
     */
    public $sitemapHandle;

    /**
     * The Schema.org Type Description
     * @var string
     */
    public $dateUpdated;

    // Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function datetimeAttributes()
    {
        $names = parent::datetimeAttributes();
        $names[] = 'dateUpdated';

        return $names;
    }

    /**
     * Return the fields that ::toArray() should process
     * @return array the fields
     */
    public function fields()
    {
        $fields = parent::fields();
        $fields = array_diff_key($fields, array_flip([
            ]));
        return $fields;
    }

    /**
     * Validation rules
     * @return array the validation rules
     */
    public function rules()
    {
        $rules = [
            [['sitemapType', 'sitemapHandle', 'dateUpdated'], 'required'],
            [['sitemapType'], 'string', 'max' => 50],
            [['sitemapHandle'], 'string', 'max' => 255],
            [['dateUpdated'], 'datetime'],
        ];
        return $rules;
    } /* -- rules */

    // Private Methods
    // =========================================================================

}
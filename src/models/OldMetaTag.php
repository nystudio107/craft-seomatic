<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use Craft;
use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Recipe
 * @since     1.0.0
 */
class OldMetaTag extends Model
{
    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Properties
    // =========================================================================

    /**
     * @var string
     */
    public $tagName;

    /**
     * @var string
     */
    public $tagDescription;

    /**
     * @var string
     */
    public $tagAttributes = [];

    // Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        $fields = array_diff_key($fields, array_flip([
            ]));
        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = [
            [['tagName', 'tagDescription', 'tagAttributes'], 'required'],
            [['tagName'], 'string', 'max' => 50],
            [['tagDescription'], 'string', 'max' => 255],
        ];
        return $rules;
    } /* -- rules */

    // Private Methods
    // =========================================================================

}
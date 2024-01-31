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

namespace nystudio107\seomatic\base;

use craft\helpers\StringHelper;

/**
 * InheritableSettingsModel allows keeping track of inherited/overridden settings.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
abstract class InheritableSettingsModel extends VarsModel
{
    /**
     * @var array A list of all the settings for which the inherited values should be used.
     */
    public $inherited = [];

    /**
     * @var array A list of all the settings for which the inherited values are overridden.
     */
    public $overrides = [];

    /**
     * Keep track of which settings to use the override for.
     *
     * @param string $name
     * @param mixed $value
     * @throws \yii\base\UnknownPropertyException
     */
    public function __set($name, $value)
    {
        if (StringHelper::startsWith($name, 'override-')) {
            $remainder = StringHelper::removeLeft($name, 'override-');

            if ($remainder) {
                if ($value) {
                    $this->overrides[$remainder] = true;
                    unset($this->inherited[$remainder]);
                } else {
                    $this->inherited[$remainder] = true;
                    unset($this->overrides[$remainder]);
                }
            }

            return;
        }

        parent::__set($name, $value);
    }
}

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

use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class VarsModel extends FluentModel
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // For all the emojis
        $attributes = $this->attributes();
        if ($attributes !== null) {
            foreach ($attributes as $attribute) {
                if (\is_string($this->$attribute)) {
                    $this->$attribute = html_entity_decode($this->$attribute, ENT_NOQUOTES, 'UTF-8');
                }
            }
        }
    }
    /**
     * Return the parsed value of a single property
     *
     * @param string $property
     *
     * @return string
     */
    public function parsedValue(string $property): string
    {
        $result = '';

        if ($this->canGetProperty($property)) {
            $result = MetaValueHelper::parseString($this->$property);
        }

        return $result;
    }
    /**
     * Parse the model properties
     */
    public function parseProperties()
    {
        Craft::beginProfile('VarsModel::parseProperties', __METHOD__);
        // Parse the meta global vars
        $attributes = $this->getAttributes();
        MetaValueHelper::parseArray($attributes);
        $this->setAttributes($attributes);
        Craft::endProfile('VarsModel::parseProperties', __METHOD__);
    }
}

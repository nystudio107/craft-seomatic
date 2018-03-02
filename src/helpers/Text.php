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

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\helpers\Field as FieldHelper;

use craft\base\ElementInterface;
use craft\elements\Tag;
use craft\elements\MatrixBlock;

use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Text
{
    // Constants
    // =========================================================================

    // Static Methods
    // =========================================================================

    /**
     * Extract plain old text from an Element
     *
     * @param ElementInterface $element
     *
     * @return string
     */
    public static function extractTextFromElement(ElementInterface $element)
    {
        if ($element instanceof MatrixBlock) {
            /** @var MatrixBlock $element */
            $result = self::extractTextFromMatrix($element);
        } elseif ($element instanceof Tag) {
            $result = self::extractTextFromTags($element);
        } else {
            $result = strip_tags($element);
        }

        return $result;
    }

    /**
     * Extract concatenated text from all of the tags in the $tagElement
     *
     * @param Tag $tagElement
     *
     * @return string
     */
    public static function extractTextFromTags(Tag $tagElement)
    {
        $result = '';
        // Iterate through all of the matrix blocks
        $tags = $tagElement::find()->all();
        foreach ($tags as $tag) {
            $result .= $tag->title.", ";
        }
        $result = rtrim($result, ", ");

        return $result;
    }

    /**
     * Extract text from all of the blocks in a matrix field, concatenating it
     * together.
     *
     * @param MatrixBlock $matrixElement
     * @param string      $fieldHandle
     *
     * @return string
     */
    public static function extractTextFromMatrix(MatrixBlock $matrixElement, $fieldHandle = '')
    {
        $result = '';
        // Iterate through all of the matrix blocks
        $blocks = $matrixElement::find()->all();
        foreach ($blocks as $block) {
            try {
                $matrixBlockTypeModel = $block->getType();
            } catch (InvalidConfigException $e) {
                $matrixBlockTypeModel = null;
            }
            // Find any text fields inside of the matrix block
            if ($matrixBlockTypeModel) {
                $fieldClasses = FieldHelper::FIELD_CLASSES[FieldHelper::TEXT_FIELD_CLASS_KEY];
                $fields = $matrixBlockTypeModel->getFields();

                foreach ($fields as $field) {
                    foreach ($fieldClasses as $fieldClassKey) {
                        if ($field instanceof $fieldClassKey) {
                            if ($field->handle == $fieldHandle || empty($fieldHandle)) {
                                $result .= strip_tags($block[$field->handle]).' ';
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }

    public function extractKeywords($text = null, $limit = 15, $withoutStopWords = true)
    {
        return (is_array($keywords)) ? implode(", ", array_slice(array_keys($keywords), 0, $limit)) : $keywords;
    }

    public function extractSummary($text = null, $limit = null, $withoutStopWords = true)
    {
    }

}

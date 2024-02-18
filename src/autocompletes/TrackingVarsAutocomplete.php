<?php
/**
 * Twigfield for Craft CMS
 *
 * Provides a twig editor field with Twig & Craft API autocomplete
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\autocompletes;

use nystudio107\codeeditor\base\Autocomplete;
use nystudio107\codeeditor\models\CompleteItem;
use nystudio107\codeeditor\types\AutocompleteTypes;
use nystudio107\codeeditor\types\CompleteItemKind;

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.4.43
 */
class TrackingVarsAutocomplete extends Autocomplete
{
    // Constants
    // =========================================================================

    public const OPTIONS_DATA_KEY = 'SeomaticTrackingVars';

    // Public Properties
    // =========================================================================

    /**
     * @var string The name of the autocomplete
     */
    public $name = 'TrackingVarsAutocomplete';

    /**
     * @var string The type of the autocomplete
     */
    public $type = AutocompleteTypes::TwigExpressionAutocomplete;

    /**
     * @var bool Whether the autocomplete should be parsed with . -delimited nested sub-properties
     */
    public $hasSubProperties = false;

    /**
     * @var array Variables to add from the Tracking Scripts settings
     */
    public $vars = [];

    // Public Methods
    // =========================================================================

    /**
     * @inerhitDoc
     */
    public function init(): void
    {
        $this->vars = $this->codeEditorOptions[self::OPTIONS_DATA_KEY] ?? [];
    }

    /**
     * Core function that generates the autocomplete array
     */
    public function generateCompleteItems(): void
    {
        foreach ($this->vars as $key => $value) {
            CompleteItem::create()
                ->insertText($key)
                ->label($key)
                ->detail($value['title'])
                ->documentation($value['instructions'])
                ->kind(CompleteItemKind::VariableKind)
                ->add($this);
        }
    }
}

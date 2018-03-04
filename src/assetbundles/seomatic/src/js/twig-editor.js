/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.0.0
 */

// JavaScript
var ace = require('brace');
require('brace/mode/twig');
require('brace/theme/github');

$(function () {
    // Hook up ACE editor to all textareas with data-editor attribute
    $('textarea.seomatic-twig-editor').each(function() {
        var textarea = $(this);
        var editDiv = $('<div>', {
            position: 'absolute',
            width: '98%',
            height: 700,
            'class': textarea.attr('class')
        }).insertBefore(textarea);
        textarea.css('display', 'none');
        var editor = ace.edit(editDiv[0]);
        editor.renderer.setShowGutter(textarea.data('gutter'));
        editor.getSession().setValue(textarea.val());
        editor.getSession().setMode("ace/mode/twig");
        editor.setTheme("ace/theme/github");
        editor.setFontSize(14);
        editor.setShowPrintMargin(false);
        editor.setDisplayIndentGuides(true);
        editor.renderer.setShowGutter(true);
        editor.setHighlightActiveLine(false);
        editor.setOptions({
            minLines: 10,
            maxLines: Infinity
        });

        // copy back to textarea on form submit...
        textarea.closest('form').submit(function() {
            textarea.val(editor.getSession().getValue());
        })
    });
});
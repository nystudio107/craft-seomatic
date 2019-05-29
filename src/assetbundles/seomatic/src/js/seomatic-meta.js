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
import tokenfield from 'bootstrap-tokenfield/js/bootstrap-tokenfield.js';

/**
 * Fill a dynamic schema.org type menu with the schema hierarchy in path
 *
 * @param menuId
 * @param menuValue
 * @param path
 * @param subTypes
 * @param blankItem
 * @param callback
 */
function fillDynamicSchemaMenu(menuId, menuValue, path, subTypes, blankItem, callback) {
    var menu = $('#' + menuId);

    if (menu.length) {
        menu.empty();
        var action = 'get-single-type-menu';
        if (subTypes) {
            action = 'get-type-menu';
        }
        $.ajax({
                url: Craft.getActionUrl('seomatic/json-ld/' + action + '?path=' + path)
            })
            .done(function(data) {
                if (blankItem) {
                    $('<option />')
                        .attr('value', 'none')
                        .html('')
                        .appendTo(menu);
                }
                $.each(data, function() {
                    // Strip out any &nbsp; characters, char code 160
                    var re = new RegExp(String.fromCharCode(160), "g");
                    var val = this.replace(re, '');
                    $('<option />')
                        .attr('value', val)
                        .html(this)
                        .appendTo(menu);
                });
                menu.val(menuValue);
                if (callback !== undefined) {
                    callback();
                }
            })
            .fail(function(data) {
                console.log('Error loading schema data');
            })
    }

}

function seomaticTabChangeHandler() {
    // Tab handler
    $('.seomatic-tab-links').on('click', function(e) {
        e.preventDefault();
        $('.seomatic-tab-links').removeClass('sel');
        $(this).addClass('sel');
        $('.seomatic-tab-content').addClass('hidden');
        var selector = $(this).attr('href');
        $(selector).removeClass('hidden');
    });
}

window.fillDynamicSchemaMenu = fillDynamicSchemaMenu;
window.seomaticTabChangeHandler = seomaticTabChangeHandler;
window.seomaticTabChangeHandler();

$(function() {
    // Tokenize any seomatic-keywords fields
    $('.seomatic-keywords').tokenfield({
        createTokensOnBlur: true,
    });

    // Show/hide the script settings containers
    var selector = $('.seomatic-script-lightswitch').find('.lightswitch');
    $(selector).each(function(index, value) {
        var value = $(this).find('input').first().val();
        if (value) {
            $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').show();
        } else {
            $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').hide();
        }
    });
    $(selector).on('click', function(e) {
        var value = $(this).find('input').first().val();
        if (value) {
            $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').slideDown();
        } else {
            $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').slideUp();
        }
    });

    // Show/hide the image source fields initially
    $('.seomatic-imageSourceSelect > select').each(function(index, value) {
        var popupValue = $(this).val();
        switch (popupValue) {
            case 'sameAsSeo':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').hide();
                break;

            case 'fromField':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').show();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').show();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').hide();
                break;

            case 'fromAsset':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').show();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').show();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').hide();
                break;

            case 'fromUrl':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').show();
                break;
        }
    });
    // Handle hiding/showing the image source fields based on the selection
    $('.seomatic-imageSourceSelect > select').on('change', function(e) {
        switch (this.value) {
            case 'sameAsSeo':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').slideUp();
                break;

            case 'fromField':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').slideUp();
                break;

            case 'fromAsset':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').slideUp();
                break;

            case 'fromUrl':
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceFromUrl').slideDown();
                break;
        }
    });

    // Show/hide the text source fields initially
    $('.seomatic-textSourceSelect > select').each(function(index, value) {
        var popupValue = $(this).val();
        switch (popupValue) {
            case 'sameAsSeo':
            case 'sameAsGlobal':
            case 'sameAsSiteTwitter':
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromField':
            case 'summaryFromField':
            case 'keywordsFromField':
            case 'fromUserField':
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromField').show();
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromCustom':
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromUrl').show();
                break;
        }
    });
    // Handle hiding/showing the image source fields based on the selection
    $('.seomatic-textSourceSelect > select').on('change', function(e) {
        switch (this.value) {
            case 'sameAsSeo':
            case 'sameAsGlobal':
            case 'sameAsSiteTwitter':
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromField':
            case 'summaryFromField':
            case 'keywordsFromField':
            case 'fromUserField':
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromField').show();
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromCustom':
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.seomatic-textSourceWrapper').children('.seomatic-textSourceFromUrl').show();
                break;
        }
    });
});

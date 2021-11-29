/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

import SchemaTypeList from "@/vue/SchemaTypeList.vue";

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.0.0
 */

if (window.schemaSelectClass !== undefined) {
    // Create our vue instance(s)
    for (const el of document.querySelectorAll('.' + window.schemaSelectClass)) {
        let elementId = 'vue-' + Math.round(Math.random() * 1000);
        el.setAttribute('id', elementId);

        new Vue({
            el: '#' + elementId,
            components: {
                'schema-type-list': SchemaTypeList,
            },
            data: {},
            methods: {},
            mounted() {
            },
        });
    }
}

// Accept HMR as per: https://webpack.js.org/api/hot-module-replacement#accept
if (module.hot) {
    module.hot.accept();
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

window.seomaticTabChangeHandler = seomaticTabChangeHandler;
window.seomaticTabChangeHandler();

function initFieldSettings() {

    const disableInputs = ($obj) => $obj.find('input, select, button').prop('disabled', true);
    disableInputs($('.inheritable-field .inherited'));

    $('.inheritable-field .override .lightswitch:not(.on) input').val(0);
    $('.inheritable-field .override .lightswitch').on('change', function (ev) {
        if ($(this).hasClass('on')) {
            $(this).parents('.inheritable-field').addClass('defined-settings').removeClass('inherited-settings');
        } else {
            $(this).parents('.inheritable-field').removeClass('defined-settings').addClass('inherited-settings');
            $(this).find('input').val(0);
        }
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
        console.log(popupValue);
        switch (popupValue) {
            case 'sameAsSeo':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').not('.seomatic-imageSourceNotSameAsSeo').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl.seomatic-imageSourceNotSameAsSeo').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.imageSourceNotSameAsSeo').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').hide();
                break;

            case 'fromField':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').hide();
                break;

            case 'fromAsset':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').hide();
                break;

            case 'fromTemplate':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').show();
                break;

            case 'fromUrl':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').hide();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').show();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').hide();
                break;
        }
    });

    // Handle hiding/showing the image source fields based on the selection
    $('.seomatic-imageSourceSelect > select').on('change', function(e) {
        switch (this.value) {
            case 'sameAsSeo':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').not('.seomatic-imageSourceNotSameAsSeo').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl.seomatic-imageSourceNotSameAsSeo').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').slideUp();
                break;

            case 'fromField':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').slideUp();
                break;

            case 'fromAsset':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').slideUp();
                break;

            case 'fromTemplate':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').slideDown();
                break;

            case 'fromUrl':
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceNotFromUrl').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromField').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromAsset').slideUp();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromUrl').slideDown();
                $(this).closest('.seomatic-imageSourceWrapper').find('.seomatic-imageSourceFromTemplate').slideUp();
                break;
        }
    });

    // Show/hide the text source fields initially
    $('.seomatic-textSourceSelect select').each(function(index, value) {
        var popupValue = $(this).val();
        switch (popupValue) {
            case 'sameAsSeo':
            case 'sameAsGlobal':
            case 'sameAsSiteTwitter':
                $(this).closest('.value-wrapper').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.value-wrapper').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromField':
            case 'summaryFromField':
            case 'keywordsFromField':
            case 'fromUserField':
                $(this).closest('.value-wrapper').children('.seomatic-textSourceFromField').show();
                $(this).closest('.value-wrapper').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromCustom':
                $(this).closest('.value-wrapper').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.value-wrapper').children('.seomatic-textSourceFromUrl').show();
                break;
        }
    });
    // Handle hiding/showing the image source fields based on the selection
    $('.field-settings .seomatic-textSourceSelect select').on('change', function(e) {
        switch (this.value) {
            case 'sameAsSeo':
            case 'sameAsGlobal':
            case 'sameAsSiteTwitter':
                $(this).closest('.field-settings').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.field-settings').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromField':
            case 'summaryFromField':
            case 'keywordsFromField':
            case 'fromUserField':
                $(this).closest('.field-settings').children('.seomatic-textSourceFromField').show();
                $(this).closest('.field-settings').children('.seomatic-textSourceFromUrl').hide();
                break;

            case 'fromCustom':
                $(this).closest('.field-settings').children('.seomatic-textSourceFromField').hide();
                $(this).closest('.field-settings').children('.seomatic-textSourceFromUrl').show();
                break;
        }
    });
}

if (typeof Craft.EntryTypeSwitcher !== 'undefined') {
    Garnish.on(Craft.EntryTypeSwitcher, 'typeChange', () => {
        initFieldSettings();
    });
}

$(function() {
    initFieldSettings();
});

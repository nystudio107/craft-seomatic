/*!
 * @project        SEOmatic
 * @name           seomatic-meta.js
 * @author         Andrew Welch
 * @build          Mon, Jul 29, 2019 10:19 PM ET
 * @release        6b56669ba84a6de53b567afcd274a19f6a49a6c8 [feature/refactor-content-seo-page]
 * @copyright      Copyright (c) 2019 nystudio107
 *
 */

/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		6: 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([49,12]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ 49:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var bootstrap_tokenfield_js_bootstrap_tokenfield_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(50);
/* harmony import */ var bootstrap_tokenfield_js_bootstrap_tokenfield_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(bootstrap_tokenfield_js_bootstrap_tokenfield_js__WEBPACK_IMPORTED_MODULE_0__);
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
    }).done(function (data) {
      if (blankItem) {
        $('<option />').attr('value', 'none').html('').appendTo(menu);
      }

      $.each(data, function () {
        // Strip out any &nbsp; characters, char code 160
        var re = new RegExp(String.fromCharCode(160), "g");
        var val = this.replace(re, '');
        $('<option />').attr('value', val).html(this).appendTo(menu);
      });
      menu.val(menuValue);

      if (callback !== undefined) {
        callback();
      }
    }).fail(function (data) {
      console.log('Error loading schema data');
    });
  }
}

function seomaticTabChangeHandler() {
  // Tab handler
  $('.seomatic-tab-links').on('click', function (e) {
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
$(function () {
  // Tokenize any seomatic-keywords fields
  $('.seomatic-keywords').tokenfield({
    createTokensOnBlur: true
  }); // Show/hide the script settings containers

  var selector = $('.seomatic-script-lightswitch').find('.lightswitch');
  $(selector).each(function (index, value) {
    var value = $(this).find('input').first().val();

    if (value) {
      $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').show();
    } else {
      $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').hide();
    }
  });
  $(selector).on('click', function (e) {
    var value = $(this).find('input').first().val();

    if (value) {
      $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').slideDown();
    } else {
      $(this).closest('.seomatic-script-wrapper').find('.seomatic-script-container').slideUp();
    }
  }); // Show/hide the image source fields initially

  $('.seomatic-imageSourceSelect > select').each(function (index, value) {
    var popupValue = $(this).val();

    switch (popupValue) {
      case 'sameAsSeo':
        $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').show();
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
  }); // Handle hiding/showing the image source fields based on the selection

  $('.seomatic-imageSourceSelect > select').on('change', function (e) {
    switch (this.value) {
      case 'sameAsSeo':
        $(this).closest('.seomatic-imageSourceWrapper').children('.seomatic-imageSourceNotFromUrl').slideDown();
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
  }); // Show/hide the text source fields initially

  $('.seomatic-textSourceSelect > select').each(function (index, value) {
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
  }); // Handle hiding/showing the image source fields based on the selection

  $('.seomatic-textSourceSelect > select').on('change', function (e) {
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

/***/ })

/******/ });
//# sourceMappingURL=seomatic-meta.js.map
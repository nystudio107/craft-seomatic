/*!
 * @project        SEOmatic
 * @name           content-seo.js
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
/******/ 		2: 0
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
/******/ 	deferredModules.push([58,0,9]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ 58:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/vue/dist/vue.min.js
var vue_min = __webpack_require__(2);
var vue_min_default = /*#__PURE__*/__webpack_require__.n(vue_min);

// EXTERNAL MODULE: ./node_modules/vue-events/dist/index.js
var dist = __webpack_require__(19);
var dist_default = /*#__PURE__*/__webpack_require__.n(dist);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/ContentSeoTable.vue?vue&type=template&id=f275922e&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "py-4" },
    [
      _c("vuetable-filter-bar"),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "vuetable-pagination clearafter" },
        [
          _c("vuetable-pagination-info", { ref: "paginationInfoTop" }),
          _vm._v(" "),
          _c("vuetable-pagination", {
            ref: "paginationTop",
            on: { "vuetable-pagination:change-page": _vm.onChangePage }
          })
        ],
        1
      ),
      _vm._v(" "),
      _c("vuetable", {
        ref: "vuetable",
        attrs: {
          "api-url": "/seomatic/content-seo/meta-bundles",
          "per-page": 20,
          fields: _vm.fields,
          css: _vm.css,
          "sort-order": _vm.sortOrder,
          "append-params": _vm.moreParams
        },
        on: { "vuetable:pagination-data": _vm.onPaginationData }
      }),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "vuetable-pagination clearafter" },
        [
          _c("vuetable-pagination-info", { ref: "paginationInfo" }),
          _vm._v(" "),
          _c("vuetable-pagination", {
            ref: "pagination",
            on: { "vuetable-pagination:change-page": _vm.onChangePage }
          })
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoTable.vue?vue&type=template&id=f275922e&

// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoFieldDefs.js
// Field definitions for ContentSeoTable.vue
/* harmony default export */ var ContentSeoFieldDefs = ([{
  name: '__component:content-seo-url',
  sortField: 'sourceName',
  title: 'Name',
  titleClass: 'text-left',
  dataClass: 'text-left'
}, {
  name: 'entries',
  title: 'Entries',
  titleClass: 'text-center',
  dataClass: 'text-center'
}, {
  name: 'sourceType',
  sortField: 'sourceType',
  title: 'Type',
  titleClass: 'text-left',
  dataClass: 'text-left'
}, {
  name: 'title',
  title: 'Title',
  titleClass: 'text-center',
  dataClass: 'text-center',
  callback: 'settingFormatter'
}, {
  name: 'description',
  title: 'Description',
  titleClass: 'text-center',
  dataClass: 'text-center',
  callback: 'settingFormatter'
}, {
  name: 'image',
  title: 'Image',
  titleClass: 'text-center',
  dataClass: 'text-center',
  callback: 'settingFormatter'
}, {
  name: 'sitemap',
  title: 'Sitemap',
  titleClass: 'text-center',
  dataClass: 'text-center',
  callback: 'settingFormatter'
}, {
  name: 'robots',
  title: 'Robots',
  titleClass: 'text-center',
  dataClass: 'text-center'
}]);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/ContentSeoUrl.vue?vue&type=template&id=be61e66c&
var ContentSeoUrlvue_type_template_id_be61e66c_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("span", {
      staticClass: "status",
      style: { backgroundColor: _vm.rowData.setup["color"] },
      attrs: { title: "Setup Grade: " + _vm.rowData.setup["name"] }
    }),
    _vm._v(" "),
    _c(
      "a",
      {
        staticClass: "go",
        attrs: { href: _vm.rowData.contentSeoUrl, title: _vm.linkTitle }
      },
      [_vm._v(_vm._s(_vm.rowData.sourceName))]
    )
  ])
}
var ContentSeoUrlvue_type_template_id_be61e66c_staticRenderFns = []
ContentSeoUrlvue_type_template_id_be61e66c_render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoUrl.vue?vue&type=template&id=be61e66c&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/ContentSeoUrl.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
/* harmony default export */ var ContentSeoUrlvue_type_script_lang_js_ = ({
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  computed: {
    linkTitle: function linkTitle() {
      var title = '';
      title += this.rowData.sourceName;
      return title;
    }
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoUrl.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_ContentSeoUrlvue_type_script_lang_js_ = (ContentSeoUrlvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__(0);

// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoUrl.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  vue_ContentSeoUrlvue_type_script_lang_js_,
  ContentSeoUrlvue_type_template_id_be61e66c_render,
  ContentSeoUrlvue_type_template_id_be61e66c_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/assetbundles/seomatic/src/vue/ContentSeoUrl.vue"
/* harmony default export */ var ContentSeoUrl = (component.exports);
// EXTERNAL MODULE: ./node_modules/vuetable-2/src/components/Vuetable.vue + 4 modules
var Vuetable = __webpack_require__(21);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetablePagination.vue?vue&type=template&id=385ac09a&
var VuetablePaginationvue_type_template_id_385ac09a_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      directives: [
        {
          name: "show",
          rawName: "v-show",
          value: _vm.tablePagination && _vm.tablePagination.last_page > 1,
          expression: "tablePagination && tablePagination.last_page > 1"
        }
      ],
      class: _vm.css.wrapperClass
    },
    [
      _c(
        "a",
        {
          class: [
            "btn-nav",
            _vm.css.linkClass,
            _vm.isOnFirstPage ? _vm.css.disabledClass : ""
          ],
          on: {
            click: function($event) {
              return _vm.loadPage(1)
            }
          }
        },
        [
          _vm.css.icons.first != ""
            ? _c("i", { class: [_vm.css.icons.first] })
            : _c("span", [_vm._v("«")])
        ]
      ),
      _vm._v(" "),
      _c(
        "a",
        {
          class: [
            "btn-nav",
            _vm.css.linkClass,
            _vm.isOnFirstPage ? _vm.css.disabledClass : ""
          ],
          on: {
            click: function($event) {
              return _vm.loadPage("prev")
            }
          }
        },
        [
          _vm.css.icons.next != ""
            ? _c("i", { class: [_vm.css.icons.prev] })
            : _c("span", [_vm._v(" ‹")])
        ]
      ),
      _vm._v(" "),
      _vm.notEnoughPages
        ? [
            _vm._l(_vm.totalPage, function(n) {
              return [
                _c("a", {
                  class: [
                    _vm.css.pageClass,
                    _vm.isCurrentPage(n) ? _vm.css.activeClass : ""
                  ],
                  domProps: { innerHTML: _vm._s(n) },
                  on: {
                    click: function($event) {
                      return _vm.loadPage(n)
                    }
                  }
                })
              ]
            })
          ]
        : [
            _vm._l(_vm.windowSize, function(n) {
              return [
                _c("a", {
                  class: [
                    _vm.css.pageClass,
                    _vm.isCurrentPage(_vm.windowStart + n - 1)
                      ? _vm.css.activeClass
                      : ""
                  ],
                  domProps: { innerHTML: _vm._s(_vm.windowStart + n - 1) },
                  on: {
                    click: function($event) {
                      return _vm.loadPage(_vm.windowStart + n - 1)
                    }
                  }
                })
              ]
            })
          ],
      _vm._v(" "),
      _c(
        "a",
        {
          class: [
            "btn-nav",
            _vm.css.linkClass,
            _vm.isOnLastPage ? _vm.css.disabledClass : ""
          ],
          on: {
            click: function($event) {
              return _vm.loadPage("next")
            }
          }
        },
        [
          _vm.css.icons.next != ""
            ? _c("i", { class: [_vm.css.icons.next] })
            : _c("span", [_vm._v("› ")])
        ]
      ),
      _vm._v(" "),
      _c(
        "a",
        {
          class: [
            "btn-nav",
            _vm.css.linkClass,
            _vm.isOnLastPage ? _vm.css.disabledClass : ""
          ],
          on: {
            click: function($event) {
              return _vm.loadPage(_vm.totalPage)
            }
          }
        },
        [
          _vm.css.icons.last != ""
            ? _c("i", { class: [_vm.css.icons.last] })
            : _c("span", [_vm._v("»")])
        ]
      )
    ],
    2
  )
}
var VuetablePaginationvue_type_template_id_385ac09a_staticRenderFns = []
VuetablePaginationvue_type_template_id_385ac09a_render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePagination.vue?vue&type=template&id=385ac09a&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetablePaginationMixin.vue?vue&type=script&lang=js&
/* harmony default export */ var VuetablePaginationMixinvue_type_script_lang_js_ = ({
  props: {
    css: {
      type: Object,
      default: function _default() {
        return {
          wrapperClass: 'vuetable pagination float-right py-4',
          activeClass: 'active large',
          disabledClass: 'disabled',
          pageClass: 'item btn',
          linkClass: 'item btn',
          paginationClass: 'ui bottom attached segment grid',
          paginationInfoClass: 'left floated left aligned six wide column',
          dropdownClass: 'ui search dropdown',
          icons: {
            first: '',
            prev: '',
            next: '',
            last: ''
          }
        };
      }
    },
    onEachSide: {
      type: Number,
      default: function _default() {
        return 2;
      }
    }
  },
  data: function data() {
    return {
      eventPrefix: 'vuetable-pagination:',
      tablePagination: null
    };
  },
  computed: {
    totalPage: function totalPage() {
      return this.tablePagination === null ? 0 : this.tablePagination.last_page;
    },
    isOnFirstPage: function isOnFirstPage() {
      return this.tablePagination === null ? false : this.tablePagination.current_page === 1;
    },
    isOnLastPage: function isOnLastPage() {
      return this.tablePagination === null ? false : this.tablePagination.current_page === this.tablePagination.last_page;
    },
    notEnoughPages: function notEnoughPages() {
      return this.totalPage < this.onEachSide * 2 + 4;
    },
    windowSize: function windowSize() {
      return this.onEachSide * 2 + 1;
    },
    windowStart: function windowStart() {
      if (!this.tablePagination || this.tablePagination.current_page <= this.onEachSide) {
        return 1;
      } else if (this.tablePagination.current_page >= this.totalPage - this.onEachSide) {
        return this.totalPage - this.onEachSide * 2;
      }

      return this.tablePagination.current_page - this.onEachSide;
    }
  },
  methods: {
    loadPage: function loadPage(page) {
      this.$emit(this.eventPrefix + 'change-page', page);
    },
    isCurrentPage: function isCurrentPage(page) {
      return page === this.tablePagination.current_page;
    },
    setPaginationData: function setPaginationData(tablePagination) {
      this.tablePagination = tablePagination;
    },
    resetData: function resetData() {
      this.tablePagination = null;
    }
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationMixin.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_VuetablePaginationMixinvue_type_script_lang_js_ = (VuetablePaginationMixinvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationMixin.vue
var VuetablePaginationMixin_render, VuetablePaginationMixin_staticRenderFns




/* normalize component */

var VuetablePaginationMixin_component = Object(componentNormalizer["a" /* default */])(
  vue_VuetablePaginationMixinvue_type_script_lang_js_,
  VuetablePaginationMixin_render,
  VuetablePaginationMixin_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var VuetablePaginationMixin_api; }
VuetablePaginationMixin_component.options.__file = "src/assetbundles/seomatic/src/vue/VuetablePaginationMixin.vue"
/* harmony default export */ var VuetablePaginationMixin = (VuetablePaginationMixin_component.exports);
// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetablePagination.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var VuetablePaginationvue_type_script_lang_js_ = ({
  mixins: [VuetablePaginationMixin]
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePagination.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_VuetablePaginationvue_type_script_lang_js_ = (VuetablePaginationvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePagination.vue





/* normalize component */

var VuetablePagination_component = Object(componentNormalizer["a" /* default */])(
  vue_VuetablePaginationvue_type_script_lang_js_,
  VuetablePaginationvue_type_template_id_385ac09a_render,
  VuetablePaginationvue_type_template_id_385ac09a_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var VuetablePagination_api; }
VuetablePagination_component.options.__file = "src/assetbundles/seomatic/src/vue/VuetablePagination.vue"
/* harmony default export */ var VuetablePagination = (VuetablePagination_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetablePaginationInfo.vue?vue&type=template&id=ac4347fe&
var VuetablePaginationInfovue_type_template_id_ac4347fe_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", {
    class: ["vuetable-pagination-info", _vm.css.infoClass],
    domProps: { innerHTML: _vm._s(_vm.paginationInfo) }
  })
}
var VuetablePaginationInfovue_type_template_id_ac4347fe_staticRenderFns = []
VuetablePaginationInfovue_type_template_id_ac4347fe_render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationInfo.vue?vue&type=template&id=ac4347fe&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetablePaginationInfoMixin.vue?vue&type=script&lang=js&
/* harmony default export */ var VuetablePaginationInfoMixinvue_type_script_lang_js_ = ({
  props: {
    css: {
      type: Object,
      default: function _default() {
        return {
          infoClass: 'left floated left py-5 text-gray-600'
        };
      }
    },
    infoTemplate: {
      type: String,
      default: function _default() {
        return "Displaying {from} to {to} of {total} items";
      }
    },
    noDataTemplate: {
      type: String,
      default: function _default() {
        return 'No relevant data';
      }
    }
  },
  data: function data() {
    return {
      tablePagination: null
    };
  },
  computed: {
    paginationInfo: function paginationInfo() {
      if (this.tablePagination == null || this.tablePagination.total == 0) {
        return this.noDataTemplate;
      }

      return this.infoTemplate.replace('{from}', this.tablePagination.from || 0).replace('{to}', this.tablePagination.to || 0).replace('{total}', this.tablePagination.total || 0);
    }
  },
  methods: {
    setPaginationData: function setPaginationData(tablePagination) {
      this.tablePagination = tablePagination;
    },
    resetData: function resetData() {
      this.tablePagination = null;
    }
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationInfoMixin.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_VuetablePaginationInfoMixinvue_type_script_lang_js_ = (VuetablePaginationInfoMixinvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationInfoMixin.vue
var VuetablePaginationInfoMixin_render, VuetablePaginationInfoMixin_staticRenderFns




/* normalize component */

var VuetablePaginationInfoMixin_component = Object(componentNormalizer["a" /* default */])(
  vue_VuetablePaginationInfoMixinvue_type_script_lang_js_,
  VuetablePaginationInfoMixin_render,
  VuetablePaginationInfoMixin_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var VuetablePaginationInfoMixin_api; }
VuetablePaginationInfoMixin_component.options.__file = "src/assetbundles/seomatic/src/vue/VuetablePaginationInfoMixin.vue"
/* harmony default export */ var VuetablePaginationInfoMixin = (VuetablePaginationInfoMixin_component.exports);
// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetablePaginationInfo.vue?vue&type=script&lang=js&
//
//
//
//
//
//

/* harmony default export */ var VuetablePaginationInfovue_type_script_lang_js_ = ({
  mixins: [VuetablePaginationInfoMixin]
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationInfo.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_VuetablePaginationInfovue_type_script_lang_js_ = (VuetablePaginationInfovue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetablePaginationInfo.vue





/* normalize component */

var VuetablePaginationInfo_component = Object(componentNormalizer["a" /* default */])(
  vue_VuetablePaginationInfovue_type_script_lang_js_,
  VuetablePaginationInfovue_type_template_id_ac4347fe_render,
  VuetablePaginationInfovue_type_template_id_ac4347fe_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var VuetablePaginationInfo_api; }
VuetablePaginationInfo_component.options.__file = "src/assetbundles/seomatic/src/vue/VuetablePaginationInfo.vue"
/* harmony default export */ var VuetablePaginationInfo = (VuetablePaginationInfo_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetableFilterBar.vue?vue&type=template&id=d041081c&
var VuetableFilterBarvue_type_template_id_d041081c_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "filter-bar" }, [
    _c("div", { staticClass: "ui form" }, [
      _c("div", { staticClass: "inline field" }, [
        _c("label", { staticClass: "text-gray-600" }, [_vm._v("Search for:")]),
        _vm._v(" "),
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.filterText,
              expression: "filterText"
            }
          ],
          staticClass: "text nicetext",
          attrs: { type: "text", placeholder: "" },
          domProps: { value: _vm.filterText },
          on: {
            keyup: _vm.doFilter,
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.filterText = $event.target.value
            }
          }
        }),
        _vm._v(" "),
        _c(
          "button",
          { staticClass: "btn delete icon", on: { click: _vm.resetFilter } },
          [_vm._v("Reset")]
        )
      ])
    ])
  ])
}
var VuetableFilterBarvue_type_template_id_d041081c_staticRenderFns = []
VuetableFilterBarvue_type_template_id_d041081c_render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetableFilterBar.vue?vue&type=template&id=d041081c&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/VuetableFilterBar.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var VuetableFilterBarvue_type_script_lang_js_ = ({
  data: function data() {
    return {
      filterText: ''
    };
  },
  methods: {
    doFilter: function doFilter() {
      this.$events.fire('filter-set', this.filterText);
    },
    resetFilter: function resetFilter() {
      this.filterText = '';
      this.$events.fire('filter-reset');
    }
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetableFilterBar.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_VuetableFilterBarvue_type_script_lang_js_ = (VuetableFilterBarvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/VuetableFilterBar.vue





/* normalize component */

var VuetableFilterBar_component = Object(componentNormalizer["a" /* default */])(
  vue_VuetableFilterBarvue_type_script_lang_js_,
  VuetableFilterBarvue_type_template_id_d041081c_render,
  VuetableFilterBarvue_type_template_id_d041081c_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var VuetableFilterBar_api; }
VuetableFilterBar_component.options.__file = "src/assetbundles/seomatic/src/vue/VuetableFilterBar.vue"
/* harmony default export */ var VuetableFilterBar = (VuetableFilterBar_component.exports);
// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/ContentSeoTable.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//







vue_min_default.a.component('content-seo-url', ContentSeoUrl); // Our component exports

/* harmony default export */ var ContentSeoTablevue_type_script_lang_js_ = ({
  components: {
    'vuetable': Vuetable["a" /* default */],
    'vuetable-pagination': VuetablePagination,
    'vuetable-pagination-info': VuetablePaginationInfo,
    'vuetable-filter-bar': VuetableFilterBar
  },
  props: {
    siteId: {
      type: Number,
      default: 0
    },
    refreshIntervalSecs: {
      type: Number,
      default: 0
    }
  },
  data: function data() {
    return {
      moreParams: {
        'siteId': this.siteId
      },
      css: {
        tableClass: 'data fullwidth seomatic-content-seo',
        ascendingIcon: 'menubtn seomatic-menubtn-asc',
        descendingIcon: 'menubtn seomatic-menubtn-desc'
      },
      sortOrder: [{
        field: '__component:content-seo-url',
        sortField: 'sourceName',
        direction: 'asc'
      }],
      fields: ContentSeoFieldDefs
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$events.$on('filter-set', function (eventData) {
      return _this.onFilterSet(eventData);
    });
    this.$events.$on('filter-reset', function (e) {
      return _this.onFilterReset();
    }); // Live refresh the data

    if (this.refreshIntervalSecs) {
      setInterval(function () {
        if (typeof _this.$refs.pagination !== 'undefined' && _this.$refs.pagination.isOnFirstPage) {
          if (typeof _this.$refs.vuetable !== 'undefined') {
            _this.$refs.vuetable.refresh();
          }
        }
      }, this.refreshIntervalSecs * 1000);
    }
  },
  methods: {
    onFilterSet: function onFilterSet(filterText) {
      this.moreParams = {
        'siteId': this.siteId,
        'filter': filterText
      };
      this.$events.fire('refresh-table', this.$refs.vuetable);
    },
    onFilterReset: function onFilterReset() {
      this.moreParams = {
        'siteId': this.siteId
      };
      this.$events.fire('refresh-table', this.$refs.vuetable);
    },
    onPaginationData: function onPaginationData(paginationData) {
      this.$refs.paginationTop.setPaginationData(paginationData);
      this.$refs.paginationInfoTop.setPaginationData(paginationData);
      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
    },
    onChangePage: function onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },
    urlFormatter: function urlFormatter(value) {
      if (value === '') {
        return '';
      }

      return "\n            <a class=\"go\" href=\"".concat(value, "\" title=\"").concat(value, "\" target=\"_blank\" rel=\"noopener\">").concat(value, "</a>\n            ");
    },
    settingFormatter: function settingFormatter(value) {
      return "\n            <span class='status ".concat(value, " inline-item'></span>\n            ");
    }
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoTable.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_ContentSeoTablevue_type_script_lang_js_ = (ContentSeoTablevue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/ContentSeoTable.vue





/* normalize component */

var ContentSeoTable_component = Object(componentNormalizer["a" /* default */])(
  vue_ContentSeoTablevue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var ContentSeoTable_api; }
ContentSeoTable_component.options.__file = "src/assetbundles/seomatic/src/vue/ContentSeoTable.vue"
/* harmony default export */ var ContentSeoTable = (ContentSeoTable_component.exports);
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/js/content-seo.js



vue_min_default.a.use(dist_default.a); // Create our vue instance

var vm = new vue_min_default.a({
  el: "#cp-nav-content",
  components: {
    'content-seo-table': ContentSeoTable
  },
  data: {},
  methods: {
    onTableRefresh: function onTableRefresh(vuetable) {
      vue_min_default.a.nextTick(function () {
        return vuetable.refresh();
      });
    }
  },
  mounted: function mounted() {
    var _this = this;

    this.$events.$on('refresh-table', function (eventData) {
      return _this.onTableRefresh(eventData);
    });
  }
}); // Accept HMR as per: https://webpack.js.org/api/hot-module-replacement#accept

if (false) {}

/***/ })

/******/ });
//# sourceMappingURL=content-seo.js.map
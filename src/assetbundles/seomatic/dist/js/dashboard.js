/*!
 * @project        SEOmatic
 * @name           dashboard.js
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
/******/ 		3: 0
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
/******/ 	deferredModules.push([59,0,10]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ 59:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/vue/dist/vue.min.js
var vue_min = __webpack_require__(2);
var vue_min_default = /*#__PURE__*/__webpack_require__.n(vue_min);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/Confetti.vue?vue&type=template&id=89067e8e&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("main")
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/Confetti.vue?vue&type=template&id=89067e8e&

// EXTERNAL MODULE: ./node_modules/vue-confetti/dist/vue-confetti.js
var vue_confetti = __webpack_require__(18);
var vue_confetti_default = /*#__PURE__*/__webpack_require__.n(vue_confetti);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/Confetti.vue?vue&type=script&lang=js&
//
//
//
//
//


vue_min_default.a.use(vue_confetti_default.a);
/* harmony default export */ var Confettivue_type_script_lang_js_ = ({
  mounted: function mounted() {
    var _this = this;

    this.$confetti.start({
      shape: 'rect',
      colors: ['DodgerBlue', 'OliveDrab', 'Gold', 'pink', 'SlateBlue', 'lightblue', 'Violet', 'PaleGreen', 'SteelBlue', 'SandyBrown', 'Chocolate', 'Crimson']
    });
    setTimeout(function () {
      _this.$confetti.stop();
    }, 5000);
  },
  methods: {}
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/Confetti.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_Confettivue_type_script_lang_js_ = (Confettivue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__(0);

// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/Confetti.vue





/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  vue_Confettivue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "src/assetbundles/seomatic/src/vue/Confetti.vue"
/* harmony default export */ var Confetti = (component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/DashboardMultiRadialChart.vue?vue&type=template&id=f73cb44e&
var DashboardMultiRadialChartvue_type_template_id_f73cb44e_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("apexcharts", {
    staticClass: "cursor-pointer",
    attrs: {
      width: "100%",
      height: "310px",
      type: "radialBar",
      options: _vm.chartOptions,
      series: _vm.series
    }
  })
}
var DashboardMultiRadialChartvue_type_template_id_f73cb44e_staticRenderFns = []
DashboardMultiRadialChartvue_type_template_id_f73cb44e_render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/DashboardMultiRadialChart.vue?vue&type=template&id=f73cb44e&

// EXTERNAL MODULE: ./node_modules/vue-apexcharts/dist/vue-apexcharts.js
var vue_apexcharts = __webpack_require__(4);
var vue_apexcharts_default = /*#__PURE__*/__webpack_require__.n(vue_apexcharts);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/DashboardMultiRadialChart.vue?vue&type=script&lang=js&
//
//
//
//
 // Our component exports

/* harmony default export */ var DashboardMultiRadialChartvue_type_script_lang_js_ = ({
  components: {
    'apexcharts': vue_apexcharts_default.a
  },
  props: {
    colors: Array,
    labels: Array,
    series: Array,
    showLabels: {
      type: Boolean,
      default: false
    },
    url: {
      type: String,
      default: ''
    }
  },
  methods: {},
  created: function created() {},
  data: function data() {
    var _this = this;

    return {
      chartOptions: {
        chart: {
          toolbar: {
            show: false
          },
          events: {
            click: function click(event, chartContext, config) {
              window.location = _this.url;
            }
          }
        },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                show: true
              },
              value: {
                offsetY: 5,
                fontSize: '24px',
                color: undefined,
                formatter: function formatter(val) {
                  return val + "%";
                }
              }
            },
            hollow: {
              margin: 0,
              size: '32%',
              background: '#fff',
              position: 'front'
            },
            track: {
              background: '#EEE',
              strokeWidth: '98%',
              margin: 5 // margin is in pixels

            }
          }
        },
        stroke: {
          lineCap: 'round'
        },
        legend: {
          verticalAlign: 'middle'
        },
        colors: this.colors,
        labels: this.labels
      }
    };
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/DashboardMultiRadialChart.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_DashboardMultiRadialChartvue_type_script_lang_js_ = (DashboardMultiRadialChartvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/DashboardMultiRadialChart.vue





/* normalize component */

var DashboardMultiRadialChart_component = Object(componentNormalizer["a" /* default */])(
  vue_DashboardMultiRadialChartvue_type_script_lang_js_,
  DashboardMultiRadialChartvue_type_template_id_f73cb44e_render,
  DashboardMultiRadialChartvue_type_template_id_f73cb44e_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var DashboardMultiRadialChart_api; }
DashboardMultiRadialChart_component.options.__file = "src/assetbundles/seomatic/src/vue/DashboardMultiRadialChart.vue"
/* harmony default export */ var DashboardMultiRadialChart = (DashboardMultiRadialChart_component.exports);
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/DashboardRadialChart.vue?vue&type=template&id=0346b2fc&
var DashboardRadialChartvue_type_template_id_0346b2fc_render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("apexcharts", {
    staticClass: "cursor-pointer",
    attrs: {
      width: "100%",
      height: "300px",
      type: "radialBar",
      options: _vm.chartOptions,
      series: _vm.series
    }
  })
}
var DashboardRadialChartvue_type_template_id_0346b2fc_staticRenderFns = []
DashboardRadialChartvue_type_template_id_0346b2fc_render._withStripped = true


// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/DashboardRadialChart.vue?vue&type=template&id=0346b2fc&

// CONCATENATED MODULE: ./node_modules/babel-loader/lib??ref--0!./node_modules/vue-loader/lib??vue-loader-options!./src/assetbundles/seomatic/src/vue/DashboardRadialChart.vue?vue&type=script&lang=js&
//
//
//
//
 // Our component exports

/* harmony default export */ var DashboardRadialChartvue_type_script_lang_js_ = ({
  components: {
    'apexcharts': vue_apexcharts_default.a
  },
  props: {
    colors: Array,
    labels: Array,
    series: Array,
    showLabels: {
      type: Boolean,
      default: false
    },
    url: {
      type: String,
      default: ''
    }
  },
  methods: {},
  created: function created() {},
  data: function data() {
    var _this = this;

    return {
      chartOptions: {
        chart: {
          toolbar: {
            show: false
          },
          events: {
            click: function click(event, chartContext, config) {
              console.log(_this.url);
              window.location = _this.url;
            }
          }
        },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                show: true
              },
              value: {
                fontSize: '24px',
                offsetY: 5,
                color: undefined,
                formatter: function formatter(val) {
                  return val + "%";
                }
              }
            },
            hollow: {
              margin: 0,
              size: '72%',
              background: '#fff',
              position: 'front'
            },
            track: {
              background: '#EEE',
              strokeWidth: '98%',
              margin: 5 // margin is in pixels

            }
          }
        },
        stroke: {
          lineCap: 'round'
        },
        legend: {
          verticalAlign: 'middle'
        },
        colors: this.colors,
        labels: this.labels
      }
    };
  }
});
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/DashboardRadialChart.vue?vue&type=script&lang=js&
 /* harmony default export */ var vue_DashboardRadialChartvue_type_script_lang_js_ = (DashboardRadialChartvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/vue/DashboardRadialChart.vue





/* normalize component */

var DashboardRadialChart_component = Object(componentNormalizer["a" /* default */])(
  vue_DashboardRadialChartvue_type_script_lang_js_,
  DashboardRadialChartvue_type_template_id_0346b2fc_render,
  DashboardRadialChartvue_type_template_id_0346b2fc_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var DashboardRadialChart_api; }
DashboardRadialChart_component.options.__file = "src/assetbundles/seomatic/src/vue/DashboardRadialChart.vue"
/* harmony default export */ var DashboardRadialChart = (DashboardRadialChart_component.exports);
// CONCATENATED MODULE: ./src/assetbundles/seomatic/src/js/dashboard.js



 // Create our vue instance

var vm = new vue_min_default.a({
  el: "#cp-nav-content",
  components: {
    'confetti': Confetti,
    'dashboard-multi-radial-chart': DashboardMultiRadialChart,
    'dashboard-radial-chart': DashboardRadialChart
  },
  data: {},
  methods: {},
  mounted: function mounted() {}
});

/***/ })

/******/ });
//# sourceMappingURL=dashboard.js.map
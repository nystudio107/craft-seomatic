/*!
 * @project        SEOmatic
 * @name           vendors~content-seo.js
 * @author         Andrew Welch
 * @build          Mon, Jul 29, 2019 10:19 PM ET
 * @release        6b56669ba84a6de53b567afcd274a19f6a49a6c8 [feature/refactor-content-seo-page]
 * @copyright      Copyright (c) 2019 nystudio107
 *
 */

(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[9],[
/* 0 */,
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var bind = __webpack_require__(9);

/*global toString:true*/

// utils is a library of generic helper functions non-specific to axios

var toString = Object.prototype.toString;

/**
 * Determine if a value is an Array
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Array, otherwise false
 */
function isArray(val) {
  return toString.call(val) === '[object Array]';
}

/**
 * Determine if a value is an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an ArrayBuffer, otherwise false
 */
function isArrayBuffer(val) {
  return toString.call(val) === '[object ArrayBuffer]';
}

/**
 * Determine if a value is a FormData
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an FormData, otherwise false
 */
function isFormData(val) {
  return (typeof FormData !== 'undefined') && (val instanceof FormData);
}

/**
 * Determine if a value is a view on an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a view on an ArrayBuffer, otherwise false
 */
function isArrayBufferView(val) {
  var result;
  if ((typeof ArrayBuffer !== 'undefined') && (ArrayBuffer.isView)) {
    result = ArrayBuffer.isView(val);
  } else {
    result = (val) && (val.buffer) && (val.buffer instanceof ArrayBuffer);
  }
  return result;
}

/**
 * Determine if a value is a String
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a String, otherwise false
 */
function isString(val) {
  return typeof val === 'string';
}

/**
 * Determine if a value is a Number
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Number, otherwise false
 */
function isNumber(val) {
  return typeof val === 'number';
}

/**
 * Determine if a value is undefined
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if the value is undefined, otherwise false
 */
function isUndefined(val) {
  return typeof val === 'undefined';
}

/**
 * Determine if a value is an Object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Object, otherwise false
 */
function isObject(val) {
  return val !== null && typeof val === 'object';
}

/**
 * Determine if a value is a Date
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Date, otherwise false
 */
function isDate(val) {
  return toString.call(val) === '[object Date]';
}

/**
 * Determine if a value is a File
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a File, otherwise false
 */
function isFile(val) {
  return toString.call(val) === '[object File]';
}

/**
 * Determine if a value is a Blob
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Blob, otherwise false
 */
function isBlob(val) {
  return toString.call(val) === '[object Blob]';
}

/**
 * Determine if a value is a Function
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Function, otherwise false
 */
function isFunction(val) {
  return toString.call(val) === '[object Function]';
}

/**
 * Determine if a value is a Stream
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Stream, otherwise false
 */
function isStream(val) {
  return isObject(val) && isFunction(val.pipe);
}

/**
 * Determine if a value is a URLSearchParams object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a URLSearchParams object, otherwise false
 */
function isURLSearchParams(val) {
  return typeof URLSearchParams !== 'undefined' && val instanceof URLSearchParams;
}

/**
 * Trim excess whitespace off the beginning and end of a string
 *
 * @param {String} str The String to trim
 * @returns {String} The String freed of excess whitespace
 */
function trim(str) {
  return str.replace(/^\s*/, '').replace(/\s*$/, '');
}

/**
 * Determine if we're running in a standard browser environment
 *
 * This allows axios to run in a web worker, and react-native.
 * Both environments support XMLHttpRequest, but not fully standard globals.
 *
 * web workers:
 *  typeof window -> undefined
 *  typeof document -> undefined
 *
 * react-native:
 *  typeof document.createElement -> undefined
 */
function isStandardBrowserEnv() {
  return (
    typeof window !== 'undefined' &&
    typeof document !== 'undefined' &&
    typeof document.createElement === 'function'
  );
}

/**
 * Iterate over an Array or an Object invoking a function for each item.
 *
 * If `obj` is an Array callback will be called passing
 * the value, index, and complete array for each item.
 *
 * If 'obj' is an Object callback will be called passing
 * the value, key, and complete object for each property.
 *
 * @param {Object|Array} obj The object to iterate
 * @param {Function} fn The callback to invoke for each item
 */
function forEach(obj, fn) {
  // Don't bother if no value provided
  if (obj === null || typeof obj === 'undefined') {
    return;
  }

  // Force an array if not already something iterable
  if (typeof obj !== 'object' && !isArray(obj)) {
    /*eslint no-param-reassign:0*/
    obj = [obj];
  }

  if (isArray(obj)) {
    // Iterate over array values
    for (var i = 0, l = obj.length; i < l; i++) {
      fn.call(null, obj[i], i, obj);
    }
  } else {
    // Iterate over object keys
    for (var key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) {
        fn.call(null, obj[key], key, obj);
      }
    }
  }
}

/**
 * Accepts varargs expecting each argument to be an object, then
 * immutably merges the properties of each object and returns result.
 *
 * When multiple objects contain the same key the later object in
 * the arguments list will take precedence.
 *
 * Example:
 *
 * ```js
 * var result = merge({foo: 123}, {foo: 456});
 * console.log(result.foo); // outputs 456
 * ```
 *
 * @param {Object} obj1 Object to merge
 * @returns {Object} Result of all merge properties
 */
function merge(/* obj1, obj2, obj3, ... */) {
  var result = {};
  function assignValue(val, key) {
    if (typeof result[key] === 'object' && typeof val === 'object') {
      result[key] = merge(result[key], val);
    } else {
      result[key] = val;
    }
  }

  for (var i = 0, l = arguments.length; i < l; i++) {
    forEach(arguments[i], assignValue);
  }
  return result;
}

/**
 * Extends object a by mutably adding to it the properties of object b.
 *
 * @param {Object} a The object to be extended
 * @param {Object} b The object to copy properties from
 * @param {Object} thisArg The object to bind function to
 * @return {Object} The resulting value of object a
 */
function extend(a, b, thisArg) {
  forEach(b, function assignValue(val, key) {
    if (thisArg && typeof val === 'function') {
      a[key] = bind(val, thisArg);
    } else {
      a[key] = val;
    }
  });
  return a;
}

module.exports = {
  isArray: isArray,
  isArrayBuffer: isArrayBuffer,
  isFormData: isFormData,
  isArrayBufferView: isArrayBufferView,
  isString: isString,
  isNumber: isNumber,
  isObject: isObject,
  isUndefined: isUndefined,
  isDate: isDate,
  isFile: isFile,
  isBlob: isBlob,
  isFunction: isFunction,
  isStream: isStream,
  isURLSearchParams: isURLSearchParams,
  isStandardBrowserEnv: isStandardBrowserEnv,
  forEach: forEach,
  merge: merge,
  extend: extend,
  trim: trim
};


/***/ }),
/* 2 */,
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),
/* 4 */,
/* 5 */,
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(process) {

var utils = __webpack_require__(1);
var normalizeHeaderName = __webpack_require__(28);

var PROTECTION_PREFIX = /^\)\]\}',?\n/;
var DEFAULT_CONTENT_TYPE = {
  'Content-Type': 'application/x-www-form-urlencoded'
};

function setContentTypeIfUnset(headers, value) {
  if (!utils.isUndefined(headers) && utils.isUndefined(headers['Content-Type'])) {
    headers['Content-Type'] = value;
  }
}

function getDefaultAdapter() {
  var adapter;
  if (typeof XMLHttpRequest !== 'undefined') {
    // For browsers use XHR adapter
    adapter = __webpack_require__(10);
  } else if (typeof process !== 'undefined') {
    // For node use HTTP adapter
    adapter = __webpack_require__(10);
  }
  return adapter;
}

var defaults = {
  adapter: getDefaultAdapter(),

  transformRequest: [function transformRequest(data, headers) {
    normalizeHeaderName(headers, 'Content-Type');
    if (utils.isFormData(data) ||
      utils.isArrayBuffer(data) ||
      utils.isStream(data) ||
      utils.isFile(data) ||
      utils.isBlob(data)
    ) {
      return data;
    }
    if (utils.isArrayBufferView(data)) {
      return data.buffer;
    }
    if (utils.isURLSearchParams(data)) {
      setContentTypeIfUnset(headers, 'application/x-www-form-urlencoded;charset=utf-8');
      return data.toString();
    }
    if (utils.isObject(data)) {
      setContentTypeIfUnset(headers, 'application/json;charset=utf-8');
      return JSON.stringify(data);
    }
    return data;
  }],

  transformResponse: [function transformResponse(data) {
    /*eslint no-param-reassign:0*/
    if (typeof data === 'string') {
      data = data.replace(PROTECTION_PREFIX, '');
      try {
        data = JSON.parse(data);
      } catch (e) { /* Ignore */ }
    }
    return data;
  }],

  timeout: 0,

  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',

  maxContentLength: -1,

  validateStatus: function validateStatus(status) {
    return status >= 200 && status < 300;
  }
};

defaults.headers = {
  common: {
    'Accept': 'application/json, text/plain, */*'
  }
};

utils.forEach(['delete', 'get', 'head'], function forEachMehtodNoData(method) {
  defaults.headers[method] = {};
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  defaults.headers[method] = utils.merge(DEFAULT_CONTENT_TYPE);
});

module.exports = defaults;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(8)))

/***/ }),
/* 7 */,
/* 8 */,
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function bind(fn, thisArg) {
  return function wrap() {
    var args = new Array(arguments.length);
    for (var i = 0; i < args.length; i++) {
      args[i] = arguments[i];
    }
    return fn.apply(thisArg, args);
  };
};


/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);
var settle = __webpack_require__(29);
var buildURL = __webpack_require__(31);
var parseHeaders = __webpack_require__(32);
var isURLSameOrigin = __webpack_require__(33);
var createError = __webpack_require__(11);
var btoa = (typeof window !== 'undefined' && window.btoa && window.btoa.bind(window)) || __webpack_require__(34);

module.exports = function xhrAdapter(config) {
  return new Promise(function dispatchXhrRequest(resolve, reject) {
    var requestData = config.data;
    var requestHeaders = config.headers;

    if (utils.isFormData(requestData)) {
      delete requestHeaders['Content-Type']; // Let the browser set it
    }

    var request = new XMLHttpRequest();
    var loadEvent = 'onreadystatechange';
    var xDomain = false;

    // For IE 8/9 CORS support
    // Only supports POST and GET calls and doesn't returns the response headers.
    // DON'T do this for testing b/c XMLHttpRequest is mocked, not XDomainRequest.
    if ( true &&
        typeof window !== 'undefined' &&
        window.XDomainRequest && !('withCredentials' in request) &&
        !isURLSameOrigin(config.url)) {
      request = new window.XDomainRequest();
      loadEvent = 'onload';
      xDomain = true;
      request.onprogress = function handleProgress() {};
      request.ontimeout = function handleTimeout() {};
    }

    // HTTP basic authentication
    if (config.auth) {
      var username = config.auth.username || '';
      var password = config.auth.password || '';
      requestHeaders.Authorization = 'Basic ' + btoa(username + ':' + password);
    }

    request.open(config.method.toUpperCase(), buildURL(config.url, config.params, config.paramsSerializer), true);

    // Set the request timeout in MS
    request.timeout = config.timeout;

    // Listen for ready state
    request[loadEvent] = function handleLoad() {
      if (!request || (request.readyState !== 4 && !xDomain)) {
        return;
      }

      // The request errored out and we didn't get a response, this will be
      // handled by onerror instead
      // With one exception: request that using file: protocol, most browsers
      // will return status as 0 even though it's a successful request
      if (request.status === 0 && !(request.responseURL && request.responseURL.indexOf('file:') === 0)) {
        return;
      }

      // Prepare the response
      var responseHeaders = 'getAllResponseHeaders' in request ? parseHeaders(request.getAllResponseHeaders()) : null;
      var responseData = !config.responseType || config.responseType === 'text' ? request.responseText : request.response;
      var response = {
        data: responseData,
        // IE sends 1223 instead of 204 (https://github.com/mzabriskie/axios/issues/201)
        status: request.status === 1223 ? 204 : request.status,
        statusText: request.status === 1223 ? 'No Content' : request.statusText,
        headers: responseHeaders,
        config: config,
        request: request
      };

      settle(resolve, reject, response);

      // Clean up request
      request = null;
    };

    // Handle low level network errors
    request.onerror = function handleError() {
      // Real errors are hidden from us by the browser
      // onerror should only fire if it's a network error
      reject(createError('Network Error', config));

      // Clean up request
      request = null;
    };

    // Handle timeout
    request.ontimeout = function handleTimeout() {
      reject(createError('timeout of ' + config.timeout + 'ms exceeded', config, 'ECONNABORTED'));

      // Clean up request
      request = null;
    };

    // Add xsrf header
    // This is only done if running in a standard browser environment.
    // Specifically not if we're in a web worker, or react-native.
    if (utils.isStandardBrowserEnv()) {
      var cookies = __webpack_require__(35);

      // Add xsrf header
      var xsrfValue = (config.withCredentials || isURLSameOrigin(config.url)) && config.xsrfCookieName ?
          cookies.read(config.xsrfCookieName) :
          undefined;

      if (xsrfValue) {
        requestHeaders[config.xsrfHeaderName] = xsrfValue;
      }
    }

    // Add headers to the request
    if ('setRequestHeader' in request) {
      utils.forEach(requestHeaders, function setRequestHeader(val, key) {
        if (typeof requestData === 'undefined' && key.toLowerCase() === 'content-type') {
          // Remove Content-Type if data is undefined
          delete requestHeaders[key];
        } else {
          // Otherwise add header to the request
          request.setRequestHeader(key, val);
        }
      });
    }

    // Add withCredentials to request if needed
    if (config.withCredentials) {
      request.withCredentials = true;
    }

    // Add responseType to request if needed
    if (config.responseType) {
      try {
        request.responseType = config.responseType;
      } catch (e) {
        if (request.responseType !== 'json') {
          throw e;
        }
      }
    }

    // Handle progress if needed
    if (typeof config.onDownloadProgress === 'function') {
      request.addEventListener('progress', config.onDownloadProgress);
    }

    // Not all browsers support upload events
    if (typeof config.onUploadProgress === 'function' && request.upload) {
      request.upload.addEventListener('progress', config.onUploadProgress);
    }

    if (config.cancelToken) {
      // Handle cancellation
      config.cancelToken.promise.then(function onCanceled(cancel) {
        if (!request) {
          return;
        }

        request.abort();
        reject(cancel);
        // Clean up request
        request = null;
      });
    }

    if (requestData === undefined) {
      requestData = null;
    }

    // Send the request
    request.send(requestData);
  });
};


/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var enhanceError = __webpack_require__(30);

/**
 * Create an Error with the specified message, config, error code, and response.
 *
 * @param {string} message The error message.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 @ @param {Object} [response] The response.
 * @returns {Error} The created error.
 */
module.exports = function createError(message, config, code, response) {
  var error = new Error(message);
  return enhanceError(error, config, code, response);
};


/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function isCancel(value) {
  return !!(value && value.__CANCEL__);
};


/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * A `Cancel` is an object that is thrown when an operation is canceled.
 *
 * @class
 * @param {string=} message The message.
 */
function Cancel(message) {
  this.message = message;
}

Cancel.prototype.toString = function toString() {
  return 'Cancel' + (this.message ? ': ' + this.message : '');
};

Cancel.prototype.__CANCEL__ = true;

module.exports = Cancel;


/***/ }),
/* 14 */,
/* 15 */,
/* 16 */,
/* 17 */,
/* 18 */,
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function plugin(Vue) {

  // Exit if the plugin has already been installed.
  if (plugin.installed) return;

  // Create a `vm` to serve as our global event bus.
  var events = new Vue({
    methods: {
      /**
       * Emit the given event.
       *
       * @param {string|object} event
       * @param {...*} args
       */
      emit: function emit(event) {
        for (var _len = arguments.length, args = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
          args[_key - 1] = arguments[_key];
        }

        this.$emit.apply(this, [event].concat(args));
      },


      /**
       * Emit the given event.
       *
       * @param {string|object} event
       * @param {...*} args
       */
      fire: function fire(event) {
        for (var _len2 = arguments.length, args = Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
          args[_key2 - 1] = arguments[_key2];
        }

        this.emit.apply(this, [event].concat(args));
      },


      /**
       * Listen for the given event.
       *
       * @param {string} event
       * @param {function} callback
       */
      on: function on(event, callback) {
        this.$on(event, callback);
      },


      /**
       * Listen for the given event.
       *
       * @param {string} event
       * @param {function} callback
       */
      listen: function listen(event, callback) {
        this.on(event, callback);
      },


      /**
       * Listen for the given event once.
       *
       * @param {string} event
       * @param {function} callback
       */
      once: function once(event, callback) {
        this.$once(event, callback);
      },


      /**
       * Remove one or more event listeners.
       *
       * @param {string} event
       * @param {function} callback
       */
      off: function off(event, callback) {
        this.$off(event, callback);
      },


      /**
       * Remove one or more event listeners.
       *
       * @param {string} event
       * @param {function} callback
       */
      remove: function remove(event, callback) {
        this.off(event, callback);
      }
    }
  });

  // Extend `Vue.prototype` to include our global event bus.
  Object.defineProperty(Vue.prototype, '$events', {
    get: function get() {
      return events;
    }
  });

  // Register a mixin that adds an `events` option to Vue 2.0 components.
  Vue.mixin({
    // Hook into the Vue 2.0 `beforeCreate` life-cycle event.
    beforeCreate: function beforeCreate() {
      // Exit if there's no `events` option.
      if (_typeof(this.$options.events) !== 'object') return;
      // Cache of events to bound functions for automatic unsubscriptions
      var eventMap = {};
      // Loop through each event.
      for (var key in this.$options.events) {
        // Assign event type and bound function to map
        eventMap[key] = this.$options.events[key].bind(this);
      }
      // Listen for the `hook:beforeMount` Vue 2.0 life-cycle event.
      this.$once('hook:beforeMount', function () {
        // Loop through each event.
        for (var key in eventMap) {
          // Register a listener for the event.
          events.$on(key, eventMap[key]);
        }
      });
      // Listen for the `hook:beforeDestroy` Vue 2.0 life-cycle event.
      this.$once('hook:beforeDestroy', function () {
        // Loop through each event.
        for (var key in eventMap) {
          // Register a listener for the event.
          events.$off(key, eventMap[key]);
        }
        // Release cache
        eventMap = null;
      });
    }
  });
}

// Check for `window.Vue`
if (typeof window !== 'undefined' && window.Vue) {
  // Install plugin automatically.
  window.Vue.use(plugin);
}

exports.default = plugin;

/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(26);

/***/ }),
/* 21 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./node_modules/vuetable-2/src/components/Vuetable.vue?vue&type=template&id=15965e3b&scoped=true&
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.isFixedHeader
    ? _c("div", [
        _c("div", { staticClass: "vuetable-head-wrapper" }, [
          _c(
            "table",
            {
              class: ["vuetable", _vm.css.tableClass, _vm.css.tableHeaderClass]
            },
            [
              _c("thead", [
                _c(
                  "tr",
                  [
                    _vm._l(_vm.tableFields, function(field, fieldIndex) {
                      return [
                        field.visible
                          ? [
                              _vm.isSpecialField(field.name)
                                ? [
                                    _vm.extractName(field.name) == "__checkbox"
                                      ? _c(
                                          "th",
                                          {
                                            key: fieldIndex,
                                            class: [
                                              "vuetable-th-checkbox-" +
                                                _vm.trackBy,
                                              field.titleClass
                                            ],
                                            style: { width: field.width }
                                          },
                                          [
                                            _c("input", {
                                              attrs: { type: "checkbox" },
                                              domProps: {
                                                checked: _vm.checkCheckboxesState(
                                                  field.name
                                                )
                                              },
                                              on: {
                                                change: function($event) {
                                                  return _vm.toggleAllCheckboxes(
                                                    field.name,
                                                    $event
                                                  )
                                                }
                                              }
                                            })
                                          ]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) == "__component"
                                      ? _c("th", {
                                          key: fieldIndex,
                                          class: [
                                            "vuetable-th-component-" +
                                              _vm.trackBy,
                                            field.titleClass,
                                            _vm.sortClass(field),
                                            { sortable: _vm.isSortable(field) }
                                          ],
                                          style: { width: field.width },
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.renderTitle(field)
                                            )
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.orderBy(field, $event)
                                            }
                                          }
                                        })
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) == "__slot"
                                      ? _c("th", {
                                          key: fieldIndex,
                                          class: [
                                            "vuetable-th-slot-" +
                                              _vm.extractArgs(field.name),
                                            field.titleClass,
                                            _vm.sortClass(field),
                                            { sortable: _vm.isSortable(field) }
                                          ],
                                          style: { width: field.width },
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.renderTitle(field)
                                            )
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.orderBy(field, $event)
                                            }
                                          }
                                        })
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) == "__sequence"
                                      ? _c("th", {
                                          key: fieldIndex,
                                          class: [
                                            "vuetable-th-sequence",
                                            field.titleClass || ""
                                          ],
                                          style: { width: field.width },
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.renderTitle(field)
                                            )
                                          }
                                        })
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.notIn(_vm.extractName(field.name), [
                                      "__sequence",
                                      "__checkbox",
                                      "__component",
                                      "__slot"
                                    ])
                                      ? _c("th", {
                                          key: fieldIndex,
                                          class: [
                                            "vuetable-th-" + field.name,
                                            field.titleClass || ""
                                          ],
                                          style: { width: field.width },
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.renderTitle(field)
                                            )
                                          }
                                        })
                                      : _vm._e()
                                  ]
                                : [
                                    _c("th", {
                                      key: fieldIndex,
                                      class: [
                                        "vuetable-th-" + field.name,
                                        field.titleClass,
                                        _vm.sortClass(field),
                                        { sortable: _vm.isSortable(field) }
                                      ],
                                      style: { width: field.width },
                                      attrs: { id: "_" + field.name },
                                      domProps: {
                                        innerHTML: _vm._s(
                                          _vm.renderTitle(field)
                                        )
                                      },
                                      on: {
                                        click: function($event) {
                                          return _vm.orderBy(field, $event)
                                        }
                                      }
                                    })
                                  ]
                            ]
                          : _vm._e()
                      ]
                    }),
                    _vm._v(" "),
                    _vm.scrollVisible
                      ? _c("th", {
                          staticClass: "vuetable-gutter-col",
                          style: { width: _vm.scrollBarWidth }
                        })
                      : _vm._e()
                  ],
                  2
                )
              ])
            ]
          )
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "vuetable-body-wrapper",
            style: { height: _vm.tableHeight }
          },
          [
            _c(
              "table",
              {
                class: ["vuetable", _vm.css.tableClass, _vm.css.tableBodyClass]
              },
              [
                _c(
                  "colgroup",
                  [
                    _vm._l(_vm.tableFields, function(field, fieldIndex) {
                      return [
                        field.visible
                          ? [
                              _c("col", {
                                key: fieldIndex,
                                class: [
                                  "vuetable-th-" + field.name,
                                  field.titleClass
                                ],
                                style: { width: field.width },
                                attrs: { id: "_col_" + field.name }
                              })
                            ]
                          : _vm._e()
                      ]
                    })
                  ],
                  2
                ),
                _vm._v(" "),
                _c(
                  "tbody",
                  { staticClass: "vuetable-body" },
                  [
                    _vm._l(_vm.tableData, function(item, itemIndex) {
                      return [
                        _c(
                          "tr",
                          {
                            key: itemIndex,
                            class: _vm.onRowClass(item, itemIndex),
                            attrs: {
                              "item-index": itemIndex,
                              render: _vm.onRowChanged(item)
                            },
                            on: {
                              click: function($event) {
                                return _vm.onRowClicked(item, $event)
                              },
                              dblclick: function($event) {
                                return _vm.onRowDoubleClicked(item, $event)
                              }
                            }
                          },
                          [
                            _vm._l(_vm.tableFields, function(
                              field,
                              fieldIndex
                            ) {
                              return [
                                field.visible
                                  ? [
                                      _vm.isSpecialField(field.name)
                                        ? [
                                            _vm.extractName(field.name) ==
                                            "__sequence"
                                              ? _c("td", {
                                                  key: fieldIndex,
                                                  class: [
                                                    "vuetable-sequence",
                                                    field.dataClass
                                                  ],
                                                  domProps: {
                                                    innerHTML: _vm._s(
                                                      _vm.renderSequence(
                                                        itemIndex
                                                      )
                                                    )
                                                  }
                                                })
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm.extractName(field.name) ==
                                            "__handle"
                                              ? _c("td", {
                                                  key: fieldIndex,
                                                  class: [
                                                    "vuetable-handle",
                                                    field.dataClass
                                                  ],
                                                  domProps: {
                                                    innerHTML: _vm._s(
                                                      _vm.renderIconTag([
                                                        "handle-icon",
                                                        _vm.css.handleIcon
                                                      ])
                                                    )
                                                  }
                                                })
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm.extractName(field.name) ==
                                            "__checkbox"
                                              ? _c(
                                                  "td",
                                                  {
                                                    key: fieldIndex,
                                                    class: [
                                                      "vuetable-checkboxes",
                                                      field.dataClass
                                                    ]
                                                  },
                                                  [
                                                    _c("input", {
                                                      attrs: {
                                                        type: "checkbox"
                                                      },
                                                      domProps: {
                                                        checked: _vm.rowSelected(
                                                          item,
                                                          field.name
                                                        )
                                                      },
                                                      on: {
                                                        change: function(
                                                          $event
                                                        ) {
                                                          return _vm.toggleCheckbox(
                                                            item,
                                                            field.name,
                                                            $event
                                                          )
                                                        }
                                                      }
                                                    })
                                                  ]
                                                )
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm.extractName(field.name) ===
                                            "__component"
                                              ? _c(
                                                  "td",
                                                  {
                                                    key: fieldIndex,
                                                    class: [
                                                      "vuetable-component",
                                                      field.dataClass
                                                    ]
                                                  },
                                                  [
                                                    _c(
                                                      _vm.extractArgs(
                                                        field.name
                                                      ),
                                                      {
                                                        tag: "component",
                                                        attrs: {
                                                          "row-data": item,
                                                          "row-index": itemIndex,
                                                          "row-field":
                                                            field.sortField
                                                        }
                                                      }
                                                    )
                                                  ],
                                                  1
                                                )
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _vm.extractName(field.name) ===
                                            "__slot"
                                              ? _c(
                                                  "td",
                                                  {
                                                    key: fieldIndex,
                                                    class: [
                                                      "vuetable-slot",
                                                      field.dataClass
                                                    ]
                                                  },
                                                  [
                                                    _vm._t(
                                                      _vm.extractArgs(
                                                        field.name
                                                      ),
                                                      null,
                                                      {
                                                        rowData: item,
                                                        rowIndex: itemIndex,
                                                        rowField:
                                                          field.sortField
                                                      }
                                                    )
                                                  ],
                                                  2
                                                )
                                              : _vm._e()
                                          ]
                                        : [
                                            _c("td", {
                                              key: fieldIndex,
                                              class: field.dataClass,
                                              domProps: {
                                                innerHTML: _vm._s(
                                                  _vm.renderNormalField(
                                                    field,
                                                    item
                                                  )
                                                )
                                              },
                                              on: {
                                                click: function($event) {
                                                  return _vm.onCellClicked(
                                                    item,
                                                    field,
                                                    $event
                                                  )
                                                },
                                                dblclick: function($event) {
                                                  return _vm.onCellDoubleClicked(
                                                    item,
                                                    field,
                                                    $event
                                                  )
                                                },
                                                contextmenu: function($event) {
                                                  return _vm.onCellRightClicked(
                                                    item,
                                                    field,
                                                    $event
                                                  )
                                                }
                                              }
                                            })
                                          ]
                                    ]
                                  : _vm._e()
                              ]
                            })
                          ],
                          2
                        ),
                        _vm._v(" "),
                        _vm.useDetailRow
                          ? [
                              _c(
                                "transition",
                                {
                                  key: itemIndex,
                                  attrs: { name: _vm.detailRowTransition }
                                },
                                [
                                  _vm.isVisibleDetailRow(item[_vm.trackBy])
                                    ? _c(
                                        "tr",
                                        {
                                          class: [_vm.css.detailRowClass],
                                          on: {
                                            click: function($event) {
                                              return _vm.onDetailRowClick(
                                                item,
                                                $event
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "td",
                                            {
                                              attrs: {
                                                colspan: _vm.countVisibleFields
                                              }
                                            },
                                            [
                                              _c(_vm.detailRowComponent, {
                                                tag: "component",
                                                attrs: {
                                                  "row-data": item,
                                                  "row-index": itemIndex
                                                }
                                              })
                                            ],
                                            1
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ]
                          : _vm._e()
                      ]
                    }),
                    _vm._v(" "),
                    _vm.displayEmptyDataRow
                      ? [
                          _c("tr", [
                            _c("td", {
                              staticClass: "vuetable-empty-result",
                              attrs: { colspan: _vm.countVisibleFields },
                              domProps: {
                                innerHTML: _vm._s(_vm.noDataTemplate)
                              }
                            })
                          ])
                        ]
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.lessThanMinRows
                      ? _vm._l(_vm.blankRows, function(i) {
                          return _c(
                            "tr",
                            { key: i, staticClass: "blank-row" },
                            [
                              _vm._l(_vm.tableFields, function(
                                field,
                                fieldIndex
                              ) {
                                return [
                                  field.visible
                                    ? _c("td", { key: fieldIndex }, [
                                        _vm._v(" ")
                                      ])
                                    : _vm._e()
                                ]
                              })
                            ],
                            2
                          )
                        })
                      : _vm._e()
                  ],
                  2
                )
              ]
            )
          ]
        )
      ])
    : _c("table", { class: ["vuetable", _vm.css.tableClass] }, [
        _c("thead", [
          _c(
            "tr",
            [
              _vm._l(_vm.tableFields, function(field, fieldIndex) {
                return [
                  field.visible
                    ? [
                        _vm.isSpecialField(field.name)
                          ? [
                              _vm.extractName(field.name) == "__checkbox"
                                ? _c(
                                    "th",
                                    {
                                      key: fieldIndex,
                                      class: [
                                        "vuetable-th-checkbox-" + _vm.trackBy,
                                        field.titleClass
                                      ],
                                      style: { width: field.width }
                                    },
                                    [
                                      _c("input", {
                                        attrs: { type: "checkbox" },
                                        domProps: {
                                          checked: _vm.checkCheckboxesState(
                                            field.name
                                          )
                                        },
                                        on: {
                                          change: function($event) {
                                            return _vm.toggleAllCheckboxes(
                                              field.name,
                                              $event
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.extractName(field.name) == "__component"
                                ? _c("th", {
                                    key: fieldIndex,
                                    class: [
                                      "vuetable-th-component-" + _vm.trackBy,
                                      field.titleClass,
                                      _vm.sortClass(field),
                                      { sortable: _vm.isSortable(field) }
                                    ],
                                    style: { width: field.width },
                                    domProps: {
                                      innerHTML: _vm._s(_vm.renderTitle(field))
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.orderBy(field, $event)
                                      }
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.extractName(field.name) == "__slot"
                                ? _c("th", {
                                    key: fieldIndex,
                                    class: [
                                      "vuetable-th-slot-" +
                                        _vm.extractArgs(field.name),
                                      field.titleClass,
                                      _vm.sortClass(field),
                                      { sortable: _vm.isSortable(field) }
                                    ],
                                    style: { width: field.width },
                                    domProps: {
                                      innerHTML: _vm._s(_vm.renderTitle(field))
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.orderBy(field, $event)
                                      }
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.extractName(field.name) == "__sequence"
                                ? _c("th", {
                                    key: fieldIndex,
                                    class: [
                                      "vuetable-th-sequence",
                                      field.titleClass || "",
                                      _vm.sortClass(field)
                                    ],
                                    style: { width: field.width },
                                    domProps: {
                                      innerHTML: _vm._s(_vm.renderTitle(field))
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.notIn(_vm.extractName(field.name), [
                                "__sequence",
                                "__checkbox",
                                "__component",
                                "__slot"
                              ])
                                ? _c("th", {
                                    key: fieldIndex,
                                    class: [
                                      "vuetable-th-" + field.name,
                                      field.titleClass || "",
                                      _vm.sortClass(field)
                                    ],
                                    style: { width: field.width },
                                    domProps: {
                                      innerHTML: _vm._s(_vm.renderTitle(field))
                                    }
                                  })
                                : _vm._e()
                            ]
                          : [
                              _c("th", {
                                key: fieldIndex,
                                class: [
                                  "vuetable-th-" + field.name,
                                  field.titleClass,
                                  _vm.sortClass(field),
                                  { sortable: _vm.isSortable(field) }
                                ],
                                style: { width: field.width },
                                attrs: { id: "_" + field.name },
                                domProps: {
                                  innerHTML: _vm._s(_vm.renderTitle(field))
                                },
                                on: {
                                  click: function($event) {
                                    return _vm.orderBy(field, $event)
                                  }
                                }
                              })
                            ]
                      ]
                    : _vm._e()
                ]
              })
            ],
            2
          )
        ]),
        _vm._v(" "),
        _c(
          "tbody",
          { staticClass: "vuetable-body" },
          [
            _vm._l(_vm.tableData, function(item, itemIndex) {
              return [
                _c(
                  "tr",
                  {
                    key: itemIndex,
                    class: _vm.onRowClass(item, itemIndex),
                    attrs: {
                      "item-index": itemIndex,
                      render: _vm.onRowChanged(item)
                    },
                    on: {
                      dblclick: function($event) {
                        return _vm.onRowDoubleClicked(item, $event)
                      },
                      click: function($event) {
                        return _vm.onRowClicked(item, $event)
                      }
                    }
                  },
                  [
                    _vm._l(_vm.tableFields, function(field, fieldIndex) {
                      return [
                        field.visible
                          ? [
                              _vm.isSpecialField(field.name)
                                ? [
                                    _vm.extractName(field.name) == "__sequence"
                                      ? _c("td", {
                                          key: fieldIndex,
                                          class: [
                                            "vuetable-sequence",
                                            field.dataClass
                                          ],
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.renderSequence(itemIndex)
                                            )
                                          }
                                        })
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) == "__handle"
                                      ? _c("td", {
                                          key: fieldIndex,
                                          class: [
                                            "vuetable-handle",
                                            field.dataClass
                                          ],
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.renderIconTag([
                                                "handle-icon",
                                                _vm.css.handleIcon
                                              ])
                                            )
                                          }
                                        })
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) == "__checkbox"
                                      ? _c(
                                          "td",
                                          {
                                            key: fieldIndex,
                                            class: [
                                              "vuetable-checkboxes",
                                              field.dataClass
                                            ]
                                          },
                                          [
                                            _c("input", {
                                              attrs: { type: "checkbox" },
                                              domProps: {
                                                checked: _vm.rowSelected(
                                                  item,
                                                  field.name
                                                )
                                              },
                                              on: {
                                                change: function($event) {
                                                  return _vm.toggleCheckbox(
                                                    item,
                                                    field.name,
                                                    $event
                                                  )
                                                }
                                              }
                                            })
                                          ]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) ===
                                    "__component"
                                      ? _c(
                                          "td",
                                          {
                                            key: fieldIndex,
                                            class: [
                                              "vuetable-component",
                                              field.dataClass
                                            ]
                                          },
                                          [
                                            _c(_vm.extractArgs(field.name), {
                                              tag: "component",
                                              attrs: {
                                                "row-data": item,
                                                "row-index": itemIndex,
                                                "row-field": field.sortField
                                              }
                                            })
                                          ],
                                          1
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.extractName(field.name) === "__slot"
                                      ? _c(
                                          "td",
                                          {
                                            key: fieldIndex,
                                            class: [
                                              "vuetable-slot",
                                              field.dataClass
                                            ]
                                          },
                                          [
                                            _vm._t(
                                              _vm.extractArgs(field.name),
                                              null,
                                              {
                                                rowData: item,
                                                rowIndex: itemIndex,
                                                rowField: field.sortField
                                              }
                                            )
                                          ],
                                          2
                                        )
                                      : _vm._e()
                                  ]
                                : [
                                    _vm.hasCallback(field)
                                      ? _c("td", {
                                          key: fieldIndex,
                                          class: field.dataClass,
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.callCallback(field, item)
                                            )
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.onCellClicked(
                                                item,
                                                field,
                                                $event
                                              )
                                            },
                                            dblclick: function($event) {
                                              return _vm.onCellDoubleClicked(
                                                item,
                                                field,
                                                $event
                                              )
                                            },
                                            contextmenu: function($event) {
                                              return _vm.onCellRightClicked(
                                                item,
                                                field,
                                                $event
                                              )
                                            }
                                          }
                                        })
                                      : _c("td", {
                                          key: fieldIndex,
                                          class: field.dataClass,
                                          domProps: {
                                            innerHTML: _vm._s(
                                              _vm.getObjectValue(
                                                item,
                                                field.name,
                                                ""
                                              )
                                            )
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.onCellClicked(
                                                item,
                                                field,
                                                $event
                                              )
                                            },
                                            dblclick: function($event) {
                                              return _vm.onCellDoubleClicked(
                                                item,
                                                field,
                                                $event
                                              )
                                            },
                                            contextmenu: function($event) {
                                              return _vm.onCellRightClicked(
                                                item,
                                                field,
                                                $event
                                              )
                                            }
                                          }
                                        })
                                  ]
                            ]
                          : _vm._e()
                      ]
                    })
                  ],
                  2
                ),
                _vm._v(" "),
                _vm.useDetailRow
                  ? [
                      _c(
                        "transition",
                        {
                          key: itemIndex,
                          attrs: { name: _vm.detailRowTransition }
                        },
                        [
                          _vm.isVisibleDetailRow(item[_vm.trackBy])
                            ? _c(
                                "tr",
                                {
                                  class: [_vm.css.detailRowClass],
                                  on: {
                                    click: function($event) {
                                      return _vm.onDetailRowClick(item, $event)
                                    }
                                  }
                                },
                                [
                                  _c(
                                    "td",
                                    {
                                      attrs: { colspan: _vm.countVisibleFields }
                                    },
                                    [
                                      _c(_vm.detailRowComponent, {
                                        tag: "component",
                                        attrs: {
                                          "row-data": item,
                                          "row-index": itemIndex
                                        }
                                      })
                                    ],
                                    1
                                  )
                                ]
                              )
                            : _vm._e()
                        ]
                      )
                    ]
                  : _vm._e()
              ]
            }),
            _vm._v(" "),
            _vm.displayEmptyDataRow
              ? [
                  _c("tr", [
                    _c("td", {
                      staticClass: "vuetable-empty-result",
                      attrs: { colspan: _vm.countVisibleFields },
                      domProps: { innerHTML: _vm._s(_vm.noDataTemplate) }
                    })
                  ])
                ]
              : _vm._e(),
            _vm._v(" "),
            _vm.lessThanMinRows
              ? _vm._l(_vm.blankRows, function(i) {
                  return _c(
                    "tr",
                    { key: i, staticClass: "blank-row" },
                    [
                      _vm._l(_vm.tableFields, function(field, fieldIndex) {
                        return [
                          field.visible
                            ? _c("td", { key: fieldIndex }, [_vm._v(" ")])
                            : _vm._e()
                        ]
                      })
                    ],
                    2
                  )
                })
              : _vm._e()
          ],
          2
        )
      ])
}
var staticRenderFns = []
render._withStripped = true


// CONCATENATED MODULE: ./node_modules/vuetable-2/src/components/Vuetable.vue?vue&type=template&id=15965e3b&scoped=true&

// EXTERNAL MODULE: ./node_modules/vuetable-2/node_modules/axios/index.js
var axios = __webpack_require__(20);
var axios_default = /*#__PURE__*/__webpack_require__.n(axios);

// CONCATENATED MODULE: ./node_modules/vue-loader/lib??vue-loader-options!./node_modules/vuetable-2/src/components/Vuetable.vue?vue&type=script&lang=js&
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



/* harmony default export */ var Vuetablevue_type_script_lang_js_ = ({
  props: {
    fields: {
      type: Array,
      required: true
    },
    loadOnStart: {
      type: Boolean,
      default: true
    },
    apiUrl: {
        type: String,
        default: ''
    },
    httpMethod: {
        type: String,
        default: 'get',
        validator: (value) => {
          return ['get', 'post'].indexOf(value) > -1
        }
    },
    reactiveApiUrl: {
        type: Boolean,
        default: true
    },
    apiMode: {
      type: Boolean,
      default: true
    },
    data: {
      type: [Array, Object],
      default: null
    },
    dataTotal: {
      type: Number,
      default: 0
    },
    dataManager: {
      type: Function,
      default: null
    },
    dataPath: {
        type: String,
        default: 'data'
    },
    paginationPath: {
        type: [String],
        default: 'links.pagination'
    },
    queryParams: {
      type: [Object, Function],
      default () {
        return {
          sort: 'sort',
          page: 'page',
          perPage: 'per_page'
        }
      }
    },
    appendParams: {
      type: Object,
      default () {
        return {}
      }
    },
    httpOptions: {
      type: Object,
      default () {
        return {}
      }
    },
    httpFetch: {
      type: Function,
      default: null
    },
    perPage: {
        type: Number,
        default: 10
    },
    initialPage: {
      type: Number,
      default: 1
    },
    sortOrder: {
      type: Array,
      default () {
        return []
      }
    },
    multiSort: {
      type: Boolean,
      default () {
        return false
      }
    },
    tableHeight: {
      type: String,
      default: null
    },
    /*
     * physical key that will trigger multi-sort option
     * possible values: 'alt', 'ctrl', 'meta', 'shift'
     * 'ctrl' might not work as expected on Mac
     */
    multiSortKey: {
      type: String,
      default: 'alt'
    },
    /* deprecated */
    rowClassCallback: {
      type: [String, Function],
      default: ''
    },
    rowClass: {
      type: [String, Function],
      default: ''
    },
    detailRowComponent: {
      type: String,
      default: ''
    },
    detailRowTransition: {
      type: String,
      default: ''
    },
    trackBy: {
      type: String,
      default: 'id'
    },
    css: {
      type: Object,
      default () {
        return {
          tableClass: 'ui blue selectable celled stackable attached table',
          loadingClass: 'loading',
          ascendingIcon: 'blue chevron up icon',
          descendingIcon: 'blue chevron down icon',
          ascendingClass: 'sorted-asc',
          descendingClass: 'sorted-desc',
          sortableIcon: '',
          detailRowClass: 'vuetable-detail-row',
          handleIcon: 'grey sidebar icon',
          tableBodyClass: 'vuetable-semantic-no-top vuetable-fixed-layout',
          tableHeaderClass: 'vuetable-fixed-layout'
        }
      }
    },
    minRows: {
      type: Number,
      default: 0
    },
    silent: {
      type: Boolean,
      default: false
    },
    noDataTemplate: {
      type: String,
      default() {
        return 'No Data Available'
      }
    },
    showSortIcons: {
      type: Boolean,
      default: true
    }
  },
  data () {
    return {
      eventPrefix: 'vuetable:',
      tableFields: [],
      tableData: null,
      tablePagination: null,
      currentPage: this.initialPage,
      selectedTo: [],
      visibleDetailRows: [],
      lastScrollPosition: 0,
      scrollBarWidth: '17px', //chrome default
      scrollVisible: false,
    }
  },
  mounted () {
    this.normalizeFields()
    this.normalizeSortOrder()
    if (this.isFixedHeader) {
      this.scrollBarWidth = this.getScrollBarWidth() + 'px';
    }
    this.$nextTick(function() {
      this.fireEvent('initialized', this.tableFields)
    })

    if (this.loadOnStart) {
      this.loadData()
    }
    if (this.isFixedHeader) {
      let elem = this.$el.getElementsByClassName('vuetable-body-wrapper')[0];
      if (elem != null) {
        elem.addEventListener('scroll', this.handleScroll);
      }
    }
  },
  destroyed () {
    let elem = this.$el.getElementsByClassName('vuetable-body-wrapper')[0];
    if (elem != null) {
      elem.removeEventListener('scroll', this.handleScroll);
    }
  },
  computed: {
    version: () => VERSION,
    useDetailRow () {
      if (this.tableData && this.tableData[0] && this.detailRowComponent !== '' && typeof this.tableData[0][this.trackBy] === 'undefined') {
        this.warn('You need to define unique row identifier in order for detail-row feature to work. Use `track-by` prop to define one!')
        return false
      }

      return this.detailRowComponent !== ''
    },
    countVisibleFields () {
      return this.tableFields.filter(function(field) {
        return field.visible
      }).length
    },
    countTableData () {
      if (this.tableData === null) {
        return 0
      }
      return this.tableData.length
    },
    displayEmptyDataRow () {
      return this.countTableData === 0 && this.noDataTemplate.length > 0
    },
    lessThanMinRows () {
      if (this.tableData === null || this.tableData.length === 0) {
        return true
      }
      return this.tableData.length < this.minRows
    },
    blankRows () {
      if (this.tableData === null || this.tableData.length === 0) {
        return this.minRows
      }
      if (this.tableData.length >= this.minRows) {
        return 0
      }

      return this.minRows - this.tableData.length
    },
    isApiMode () {
      return this.apiMode
    },
    isDataMode () {
      return ! this.apiMode
    },
    isFixedHeader () {
      return this.tableHeight != null
    }
  },
  methods: {
    getScrollBarWidth () {
      const outer = document.createElement('div');
      const inner = document.createElement('div');

      outer.style.visibility = 'hidden';
      outer.style.width = '100px';

      inner.style.width = '100%';


      outer.appendChild(inner);
      document.body.appendChild(outer);


      const widthWithoutScrollbar = outer.offsetWidth;

      outer.style.overflow = 'scroll';

      const widthWithScrollbar = inner.offsetWidth;


      document.body.removeChild(outer);


      return (widthWithoutScrollbar - widthWithScrollbar);
    },
    handleScroll (e) { //make sure that the header and the body are aligned when scrolling horizontally on a table that is wider than the viewport
      let horizontal = e.currentTarget.scrollLeft;
      if (horizontal != this.lastScrollPosition) { //don't modify header scroll if we are scrolling vertically
        let header = this.$el.getElementsByClassName('vuetable-head-wrapper')[0]
        if (header != null) {
          header.scrollLeft = horizontal;
        }
        this.lastScrollPosition = horizontal;
      }

    },
    normalizeFields () {
      if (typeof(this.fields) === 'undefined') {
        this.warn('You need to provide "fields" prop.')
        return
      }

      this.tableFields = []
      let self = this
      let obj
      this.fields.forEach(function(field, i) {
        if (typeof (field) === 'string') {
          obj = {
            name: field,
            title: self.setTitle(field),
            titleClass: '',
            dataClass: '',
            callback: null,
            visible: true,
          }
        } else {
          obj = {
            name: field.name,
            width: field.width,
            title: (field.title === undefined) ? self.setTitle(field.name) : field.title,
            sortField: field.sortField,
            titleClass: (field.titleClass === undefined) ? '' : field.titleClass,
            dataClass: (field.dataClass === undefined) ? '' : field.dataClass,
            callback: (field.callback === undefined) ? '' : field.callback,
            visible: (field.visible === undefined) ? true : field.visible,
          }
        }
        self.tableFields.push(obj)
      })
    },
    setData (data) {
      if (data === null || typeof(data) === 'undefined') return

      this.fireEvent('loading')

      if (Array.isArray(data)) {
        this.tableData = data
        this.fireEvent('loaded')
        return
      }

      this.tableData = this.getObjectValue(data, this.dataPath, null)
      this.tablePagination = this.getObjectValue(data, this.paginationPath, null)

      this.$nextTick(function() {
        this.fixHeader()
        this.fireEvent('pagination-data', this.tablePagination)
        this.fireEvent('loaded')
      })
    },
    setTitle (str) {
      if (this.isSpecialField(str)) {
        return ''
      }

      return this.titleCase(str)
    },
    getTitle (field) {
      if (typeof(field.title) === 'function') return field.title()

      return typeof(field.title) === 'undefined'
        ? field.name.replace('.', ' ')
        : field.title
    },
    renderTitle (field) {
      let title = this.getTitle(field)

      if (title.length > 0 && this.isInCurrentSortGroup(field) || this.hasSortableIcon(field)) {
        let style = `opacity:${this.sortIconOpacity(field)};position:relative;float:right`
        let iconTag = this.showSortIcons ? this.renderIconTag(['sort-icon', this.sortIcon(field)], `style="${style}"`) : ''
        return title + ' ' + iconTag
      }

      return title
    },
    renderSequence (index) {
      return this.tablePagination
        ? this.tablePagination.from + index
        : index
    },
    renderNormalField (field, item) {
      return this.hasCallback(field)
        ? this.callCallback(field, item)
        : this.getObjectValue(item, field.name, '')
    },
    isSpecialField (fieldName) {
      return fieldName.slice(0, 2) === '__'
    },
    titleCase (str) {
      return str.replace(/\w+/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase()
      })
    },
    camelCase (str, delimiter = '_') {
      let self = this
      return str.split(delimiter).map(function(item) {
        return self.titleCase(item)
      }).join('')
    },
    notIn (str, arr) {
      return arr.indexOf(str) === -1
    },
    loadData (success = this.loadSuccess, failed = this.loadFailed) {
      if (this.isDataMode) {
        this.callDataManager()
        return
      }

      this.fireEvent('loading')

      this.httpOptions['params'] = this.getAppendParams( this.getAllQueryParams() )

      return this.fetch(this.apiUrl, this.httpOptions).then(
          success,
          failed
      ).catch(() => failed())
    },
    fetch (apiUrl, httpOptions) {
      return this.httpFetch
          ? this.httpFetch(apiUrl, httpOptions)
          : axios_default.a[this.httpMethod](apiUrl, httpOptions)
    },
    loadSuccess (response) {
      this.fireEvent('load-success', response)

      let body = this.transform(response.data)

      this.tableData = this.getObjectValue(body, this.dataPath, null)
      this.tablePagination = this.getObjectValue(body, this.paginationPath, null)

      if (this.tablePagination === null) {
        this.warn('vuetable: pagination-path "' + this.paginationPath + '" not found. '
          + 'It looks like the data returned from the sever does not have pagination information '
          + "or you may have set it incorrectly.\n"
          + 'You can explicitly suppress this warning by setting pagination-path="".'
        )
      }

      this.$nextTick(function() {
        this.fixHeader()
        this.fireEvent('pagination-data', this.tablePagination)
        this.fireEvent('loaded')
      })
    },
    fixHeader() {
      if (!this.isFixedHeader) {
        return;
      }

      let elem = this.$el.getElementsByClassName('vuetable-body-wrapper')[0]
      if (elem != null) {
        if (elem.scrollHeight > elem.clientHeight) {
          this.scrollVisible = true;
        }
        else {
          this.scrollVisible = false;
        }
      }
    },
    loadFailed (response) {
      console.error('load-error', response)
      this.fireEvent('load-error', response)
      this.fireEvent('loaded')
    },
    transform (data) {
      let func = 'transform'

      if (this.parentFunctionExists(func)) {
          return this.$parent[func].call(this.$parent, data)
      }

      return data
    },
    parentFunctionExists (func) {
      return (func !== '' && typeof this.$parent[func] === 'function')
    },
    callParentFunction (func, args, defaultValue = null) {
      if (this.parentFunctionExists(func)) {
        return this.$parent[func].call(this.$parent, args)
      }

      return defaultValue
    },
    fireEvent (eventName, args) {
      this.$emit(this.eventPrefix + eventName, args)
    },
    warn (msg) {
      if (!this.silent) {
        console.warn(msg)
      }
    },
    getAllQueryParams () {
      let params = {}

      if (typeof(this.queryParams) === 'function') {
        params = this.queryParams(this.sortOrder, this.currentPage, this.perPage)
        return typeof(params) !== 'object' ? {} : params
      }

      params[this.queryParams.sort] = this.getSortParam()
      params[this.queryParams.page] = this.currentPage
      params[this.queryParams.perPage] = this.perPage

      return params
    },
    getSortParam () {
      if (!this.sortOrder || this.sortOrder.field == '') {
        return ''
      }

      if (typeof this.$parent['getSortParam'] === 'function') {
        return this.$parent['getSortParam'].call(this.$parent, this.sortOrder)
      }

      return this.getDefaultSortParam()
    },
    getDefaultSortParam () {
      let result = '';

      for (let i = 0; i < this.sortOrder.length; i++) {
        let fieldName = (typeof this.sortOrder[i].sortField === 'undefined')
          ? this.sortOrder[i].field
          : this.sortOrder[i].sortField;

        result += fieldName + '|' + this.sortOrder[i].direction + ((i+1) < this.sortOrder.length ? ',' : '');
      }
      return result;
    },
    getAppendParams (params) {
      for (let x in this.appendParams) {
        params[x] = this.appendParams[x]
      }

      return params
    },
    extractName (string) {
      return string.split(':')[0].trim()
    },
    extractArgs (string) {
      return string.split(':')[1]
    },
    isSortable (field) {
      return !(typeof field.sortField === 'undefined')
    },
    isInCurrentSortGroup (field) {
      return this.currentSortOrderPosition(field) !== false;
    },
    hasSortableIcon (field) {
      return this.isSortable(field) && this.css.sortableIcon != ''
    },
    currentSortOrderPosition (field) {
      if ( ! this.isSortable(field)) {
        return false
      }

      for (let i = 0; i < this.sortOrder.length; i++) {
        if (this.fieldIsInSortOrderPosition(field, i)) {
          return i;
        }
      }

      return false;
    },
    fieldIsInSortOrderPosition (field, i) {
      return this.sortOrder[i].field === field.name && this.sortOrder[i].sortField === field.sortField
    },
    orderBy (field, event) {
      if ( ! this.isSortable(field) ) return

      let key = this.multiSortKey.toLowerCase() + 'Key'

      if (this.multiSort && event[key]) { //adding column to multisort
        this.multiColumnSort(field)
      } else {
        //no multisort, or resetting sort
        this.singleColumnSort(field)
      }

      this.currentPage = 1    // reset page index
      if (this.apiMode || this.dataManager) {
        this.loadData()
      }
    },
    multiColumnSort (field) {
      let i = this.currentSortOrderPosition(field);

      if(i === false) { //this field is not in the sort array yet
        this.sortOrder.push({
          field: field.name,
          sortField: field.sortField,
          direction: 'asc'
        });
      } else { //this field is in the sort array, now we change its state
        if(this.sortOrder[i].direction === 'asc') {
          // switch direction
          this.sortOrder[i].direction = 'desc'
        } else {
          //remove sort condition
          this.sortOrder.splice(i, 1);
        }
      }
    },
    singleColumnSort (field) {
      if (this.sortOrder.length === 0) {
        this.clearSortOrder()
      }

      this.sortOrder.splice(1); //removes additional columns

      if (this.fieldIsInSortOrderPosition(field, 0)) {
        // change sort direction
        this.sortOrder[0].direction = this.sortOrder[0].direction === 'asc' ? 'desc' : 'asc'
      } else {
        // reset sort direction
        this.sortOrder[0].direction = 'asc'
      }
      this.sortOrder[0].field = field.name
      this.sortOrder[0].sortField = field.sortField
    },
    clearSortOrder () {
      this.sortOrder.push({
        field: '',
        sortField: '',
        direction: 'asc'
      });
    },
    sortClass (field) {
      let cls = ''
      let i = this.currentSortOrderPosition(field)

      if (i !== false) {
        cls = (this.sortOrder[i].direction == 'asc') ? this.css.ascendingClass : this.css.descendingClass
      }

      return cls
    },
    sortIcon (field) {
      let cls = this.css.sortableIcon
      let i = this.currentSortOrderPosition(field)

      if (i !== false) {
        cls = (this.sortOrder[i].direction == 'asc') ? this.css.ascendingIcon : this.css.descendingIcon
      }

      return cls;
    },
    sortIconOpacity (field) {
      /*
       * fields with stronger precedence have darker color
       *
       * if there are few fields, we go down by 0.3
       * ex. 2 fields are selected: 1.0, 0.7
       *
       * if there are more we go down evenly on the given spectrum
       * ex. 6 fields are selected: 1.0, 0.86, 0.72, 0.58, 0.44, 0.3
       */
      let max = 1.0,
          min = 0.3,
          step = 0.3

      let count = this.sortOrder.length;
      let current = this.currentSortOrderPosition(field)


      if(max - count * step < min) {
        step = (max - min) / (count-1)
      }

      let opacity = max - current * step

      return opacity
    },
    hasCallback (item) {
      return item.callback ? true : false
    },
    callCallback (field, item) {
      if ( ! this.hasCallback(field)) return

      if(typeof(field.callback) == 'function') {
       return field.callback(this.getObjectValue(item, field.name))
      }

      let args = field.callback.split('|')
      let func = args.shift()

      if (typeof this.$parent[func] === 'function') {
        let value = this.getObjectValue(item, field.name)

        return (args.length > 0)
          ? this.$parent[func].apply(this.$parent, [value].concat(args))
          : this.$parent[func].call(this.$parent, value)
      }

      return null
    },
    getObjectValue (object, path, defaultValue) {
      defaultValue = (typeof defaultValue === 'undefined') ? null : defaultValue

      let obj = object
      if (path.trim() != '') {
        let keys = path.split('.')
        keys.forEach(function(key) {
          if (obj !== null && typeof obj[key] !== 'undefined' && obj[key] !== null) {
            obj = obj[key]
          } else {
            obj = defaultValue
            return
          }
        })
      }
      return obj
    },
    toggleCheckbox (dataItem, fieldName, event) {
      let isChecked = event.target.checked
      let idColumn = this.trackBy

      if (dataItem[idColumn] === undefined) {
        this.warn('__checkbox field: The "'+this.trackBy+'" field does not exist! Make sure the field you specify in "track-by" prop does exist.')
        return
      }

      let key = dataItem[idColumn]
      if (isChecked) {
        this.selectId(key)
      } else {
        this.unselectId(key)
      }
      this.$emit('vuetable:checkbox-toggled', isChecked, dataItem)
    },
    selectId (key) {
      if ( ! this.isSelectedRow(key)) {
        this.selectedTo.push(key)
      }
    },
    unselectId (key) {
      this.selectedTo = this.selectedTo.filter(function(item) {
        return item !== key
      })
    },
    isSelectedRow (key) {
      return this.selectedTo.indexOf(key) >= 0
    },
    rowSelected (dataItem, fieldName){
      let idColumn = this.trackBy
      let key = dataItem[idColumn]

      return this.isSelectedRow(key)
    },
    checkCheckboxesState (fieldName) {
      if (! this.tableData) return

      let self = this
      let idColumn = this.trackBy
      let selector = 'th.vuetable-th-checkbox-' + idColumn + ' input[type=checkbox]'
      let els = document.querySelectorAll(selector)

      //fixed:document.querySelectorAll return the typeof nodeList not array
      if (els.forEach===undefined)
        els.forEach=function(cb){
          [].forEach.call(els, cb);
        }

      // count how many checkbox row in the current page has been checked
      let selected = this.tableData.filter(function(item) {
        return self.selectedTo.indexOf(item[idColumn]) >= 0
      })

      // count == 0, clear the checkbox
      if (selected.length <= 0) {
        els.forEach(function(el) {
          el.indeterminate = false
        })
        return false
      }
      // count > 0 and count < perPage, set checkbox state to 'indeterminate'
      else if (selected.length < this.perPage) {
        els.forEach(function(el) {
          el.indeterminate = true
        })
        return true
      }
      // count == perPage, set checkbox state to 'checked'
      else {
        els.forEach(function(el) {
          el.indeterminate = false
        })
        return true
      }
    },
    toggleAllCheckboxes (fieldName, event) {
      let self = this
      let isChecked = event.target.checked
      let idColumn = this.trackBy

      if (isChecked) {
        this.tableData.forEach(function(dataItem) {
          self.selectId(dataItem[idColumn])
        })
      } else {
        this.tableData.forEach(function(dataItem) {
          self.unselectId(dataItem[idColumn])
        })
      }
      this.$emit('vuetable:checkbox-toggled-all', isChecked)
    },
    gotoPreviousPage () {
      if (this.currentPage > 1) {
        this.currentPage--
        this.loadData()
      }
    },
    gotoNextPage () {
      if (this.currentPage < this.tablePagination.last_page) {
        this.currentPage++
        this.loadData()
      }
    },
    gotoPage (page) {
      if (page != this.currentPage && (page > 0 && page <= this.tablePagination.last_page)) {
        this.currentPage = page
        this.loadData()
      }
    },
    isVisibleDetailRow (rowId) {
      return this.visibleDetailRows.indexOf( rowId ) >= 0
    },
    showDetailRow (rowId) {
      if (!this.isVisibleDetailRow(rowId)) {
        this.visibleDetailRows.push(rowId)
      }
    },
    hideDetailRow (rowId) {
      if (this.isVisibleDetailRow(rowId)) {
        this.visibleDetailRows.splice(
          this.visibleDetailRows.indexOf(rowId),
          1
        )
      }
    },
    toggleDetailRow (rowId) {
      if (this.isVisibleDetailRow(rowId)) {
        this.hideDetailRow(rowId)
      } else {
        this.showDetailRow(rowId)
      }
    },
    showField (index) {
      if (index < 0 || index > this.tableFields.length) return

      this.tableFields[index].visible = true
    },
    hideField (index) {
      if (index < 0 || index > this.tableFields.length) return

      this.tableFields[index].visible = false
    },
    toggleField (index) {
      if (index < 0 || index > this.tableFields.length) return

      this.tableFields[index].visible = ! this.tableFields[index].visible
    },
    renderIconTag (classes, options = '') {
      return typeof(this.css.renderIcon) === 'undefined'
        ? `<i class="${classes.join(' ')}" ${options}></i>`
        : this.css.renderIcon(classes, options)
    },
    makePagination (total = null, perPage = null, currentPage = null) {
      let pagination = {}
      total = total === null ? this.dataTotal : total
      perPage = perPage === null ? this.perPage : perPage
      currentPage = currentPage === null ? this.currentPage : currentPage

      return {
        'total': total,
        'per_page': perPage,
        'current_page': currentPage,
        'last_page': Math.ceil(total / perPage) || 0,
        'next_page_url': '',
        'prev_page_url': '',
        'from': (currentPage -1) * perPage +1,
        'to': Math.min(currentPage * perPage, total)
      }
    },
    normalizeSortOrder () {
      this.sortOrder.forEach(function(item) {
        item.sortField = item.sortField || item.field
      })
    },
    callDataManager () {
      if (this.dataManager === null && this.data === null) return

      if (Array.isArray(this.data)) {
        return this.setData(this.data)
      } 
      
      this.normalizeSortOrder()

      return this.setData(
        this.dataManager
          ? this.dataManager(this.sortOrder, this.makePagination())
          : this.data
      )
    },
    onRowClass (dataItem, index) {
      if (this.rowClassCallback !== '') {
        this.warn('"row-class-callback" prop is deprecated, please use "row-class" prop instead.')
        return
      }

      if (typeof(this.rowClass) === 'function') {
        return this.rowClass(dataItem, index)
      }

      return this.rowClass
    },
    onRowChanged (dataItem) {
      this.fireEvent('row-changed', dataItem)
      return true
    },
    onRowClicked (dataItem, event) {
      this.$emit(this.eventPrefix + 'row-clicked', dataItem, event)
      return true
    },
    onRowDoubleClicked (dataItem, event) {
      this.$emit(this.eventPrefix + 'row-dblclicked', dataItem, event)
    },
    onDetailRowClick (dataItem, event) {
      this.$emit(this.eventPrefix + 'detail-row-clicked', dataItem, event)
    },
    onCellClicked (dataItem, field, event) {
      this.$emit(this.eventPrefix + 'cell-clicked', dataItem, field, event)
    },
    onCellDoubleClicked (dataItem, field, event) {
      this.$emit(this.eventPrefix + 'cell-dblclicked', dataItem, field, event)
    },
    onCellRightClicked (dataItem, field, event) {
      this.$emit(this.eventPrefix + 'cell-rightclicked', dataItem, field, event)
    },
    /*
     * API for externals
     */
    changePage (page) {
      if (page === 'prev') {
        this.gotoPreviousPage()
      } else if (page === 'next') {
        this.gotoNextPage()
      } else {
        this.gotoPage(page)
      }
    },
    reload () {
      return this.loadData()
    },
    refresh () {
      this.currentPage = 1
      return this.loadData()
    },
    resetData () {
      this.tableData = null
      this.tablePagination = null
      this.fireEvent('data-reset')
    }
  }, // end: methods
  watch: {
    'multiSort' (newVal, oldVal) {
      if (newVal === false && this.sortOrder.length > 1) {
        this.sortOrder.splice(1);
        this.loadData();
      }
    },
    'apiUrl'  (newVal, oldVal) {
      if(this.reactiveApiUrl && newVal !== oldVal)
        this.refresh()
    },
    'data' (newVal, oldVal) {
      this.setData(newVal)
    },
    'tableHeight' (newVal, oldVal) {
      this.fixHeader()
    }
  },
});

// CONCATENATED MODULE: ./node_modules/vuetable-2/src/components/Vuetable.vue?vue&type=script&lang=js&
 /* harmony default export */ var components_Vuetablevue_type_script_lang_js_ = (Vuetablevue_type_script_lang_js_); 
// EXTERNAL MODULE: ./node_modules/vuetable-2/src/components/Vuetable.vue?vue&type=style&index=0&id=15965e3b&scoped=true&lang=css&
var Vuetablevue_type_style_index_0_id_15965e3b_scoped_true_lang_css_ = __webpack_require__(43);

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__(0);

// CONCATENATED MODULE: ./node_modules/vuetable-2/src/components/Vuetable.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  components_Vuetablevue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "15965e3b",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "node_modules/vuetable-2/src/components/Vuetable.vue"
/* harmony default export */ var Vuetable = __webpack_exports__["a"] = (component.exports);

/***/ }),
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);
var bind = __webpack_require__(9);
var Axios = __webpack_require__(27);
var defaults = __webpack_require__(6);

/**
 * Create an instance of Axios
 *
 * @param {Object} defaultConfig The default config for the instance
 * @return {Axios} A new instance of Axios
 */
function createInstance(defaultConfig) {
  var context = new Axios(defaultConfig);
  var instance = bind(Axios.prototype.request, context);

  // Copy axios.prototype to instance
  utils.extend(instance, Axios.prototype, context);

  // Copy context to instance
  utils.extend(instance, context);

  return instance;
}

// Create the default instance to be exported
var axios = createInstance(defaults);

// Expose Axios class to allow class inheritance
axios.Axios = Axios;

// Factory for creating new instances
axios.create = function create(instanceConfig) {
  return createInstance(utils.merge(defaults, instanceConfig));
};

// Expose Cancel & CancelToken
axios.Cancel = __webpack_require__(13);
axios.CancelToken = __webpack_require__(41);
axios.isCancel = __webpack_require__(12);

// Expose all/spread
axios.all = function all(promises) {
  return Promise.all(promises);
};
axios.spread = __webpack_require__(42);

module.exports = axios;

// Allow use of default import syntax in TypeScript
module.exports.default = axios;


/***/ }),
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var defaults = __webpack_require__(6);
var utils = __webpack_require__(1);
var InterceptorManager = __webpack_require__(36);
var dispatchRequest = __webpack_require__(37);
var isAbsoluteURL = __webpack_require__(39);
var combineURLs = __webpack_require__(40);

/**
 * Create a new instance of Axios
 *
 * @param {Object} instanceConfig The default config for the instance
 */
function Axios(instanceConfig) {
  this.defaults = instanceConfig;
  this.interceptors = {
    request: new InterceptorManager(),
    response: new InterceptorManager()
  };
}

/**
 * Dispatch a request
 *
 * @param {Object} config The config specific for this request (merged with this.defaults)
 */
Axios.prototype.request = function request(config) {
  /*eslint no-param-reassign:0*/
  // Allow for axios('example/url'[, config]) a la fetch API
  if (typeof config === 'string') {
    config = utils.merge({
      url: arguments[0]
    }, arguments[1]);
  }

  config = utils.merge(defaults, this.defaults, { method: 'get' }, config);

  // Support baseURL config
  if (config.baseURL && !isAbsoluteURL(config.url)) {
    config.url = combineURLs(config.baseURL, config.url);
  }

  // Hook up interceptors middleware
  var chain = [dispatchRequest, undefined];
  var promise = Promise.resolve(config);

  this.interceptors.request.forEach(function unshiftRequestInterceptors(interceptor) {
    chain.unshift(interceptor.fulfilled, interceptor.rejected);
  });

  this.interceptors.response.forEach(function pushResponseInterceptors(interceptor) {
    chain.push(interceptor.fulfilled, interceptor.rejected);
  });

  while (chain.length) {
    promise = promise.then(chain.shift(), chain.shift());
  }

  return promise;
};

// Provide aliases for supported request methods
utils.forEach(['delete', 'get', 'head'], function forEachMethodNoData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url
    }));
  };
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, data, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url,
      data: data
    }));
  };
});

module.exports = Axios;


/***/ }),
/* 28 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

module.exports = function normalizeHeaderName(headers, normalizedName) {
  utils.forEach(headers, function processHeader(value, name) {
    if (name !== normalizedName && name.toUpperCase() === normalizedName.toUpperCase()) {
      headers[normalizedName] = value;
      delete headers[name];
    }
  });
};


/***/ }),
/* 29 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var createError = __webpack_require__(11);

/**
 * Resolve or reject a Promise based on response status.
 *
 * @param {Function} resolve A function that resolves the promise.
 * @param {Function} reject A function that rejects the promise.
 * @param {object} response The response.
 */
module.exports = function settle(resolve, reject, response) {
  var validateStatus = response.config.validateStatus;
  // Note: status is not exposed by XDomainRequest
  if (!response.status || !validateStatus || validateStatus(response.status)) {
    resolve(response);
  } else {
    reject(createError(
      'Request failed with status code ' + response.status,
      response.config,
      null,
      response
    ));
  }
};


/***/ }),
/* 30 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Update an Error with the specified config, error code, and response.
 *
 * @param {Error} error The error to update.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 @ @param {Object} [response] The response.
 * @returns {Error} The error.
 */
module.exports = function enhanceError(error, config, code, response) {
  error.config = config;
  if (code) {
    error.code = code;
  }
  error.response = response;
  return error;
};


/***/ }),
/* 31 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

function encode(val) {
  return encodeURIComponent(val).
    replace(/%40/gi, '@').
    replace(/%3A/gi, ':').
    replace(/%24/g, '$').
    replace(/%2C/gi, ',').
    replace(/%20/g, '+').
    replace(/%5B/gi, '[').
    replace(/%5D/gi, ']');
}

/**
 * Build a URL by appending params to the end
 *
 * @param {string} url The base of the url (e.g., http://www.google.com)
 * @param {object} [params] The params to be appended
 * @returns {string} The formatted url
 */
module.exports = function buildURL(url, params, paramsSerializer) {
  /*eslint no-param-reassign:0*/
  if (!params) {
    return url;
  }

  var serializedParams;
  if (paramsSerializer) {
    serializedParams = paramsSerializer(params);
  } else if (utils.isURLSearchParams(params)) {
    serializedParams = params.toString();
  } else {
    var parts = [];

    utils.forEach(params, function serialize(val, key) {
      if (val === null || typeof val === 'undefined') {
        return;
      }

      if (utils.isArray(val)) {
        key = key + '[]';
      }

      if (!utils.isArray(val)) {
        val = [val];
      }

      utils.forEach(val, function parseValue(v) {
        if (utils.isDate(v)) {
          v = v.toISOString();
        } else if (utils.isObject(v)) {
          v = JSON.stringify(v);
        }
        parts.push(encode(key) + '=' + encode(v));
      });
    });

    serializedParams = parts.join('&');
  }

  if (serializedParams) {
    url += (url.indexOf('?') === -1 ? '?' : '&') + serializedParams;
  }

  return url;
};


/***/ }),
/* 32 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

/**
 * Parse headers into an object
 *
 * ```
 * Date: Wed, 27 Aug 2014 08:58:49 GMT
 * Content-Type: application/json
 * Connection: keep-alive
 * Transfer-Encoding: chunked
 * ```
 *
 * @param {String} headers Headers needing to be parsed
 * @returns {Object} Headers parsed into an object
 */
module.exports = function parseHeaders(headers) {
  var parsed = {};
  var key;
  var val;
  var i;

  if (!headers) { return parsed; }

  utils.forEach(headers.split('\n'), function parser(line) {
    i = line.indexOf(':');
    key = utils.trim(line.substr(0, i)).toLowerCase();
    val = utils.trim(line.substr(i + 1));

    if (key) {
      parsed[key] = parsed[key] ? parsed[key] + ', ' + val : val;
    }
  });

  return parsed;
};


/***/ }),
/* 33 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs have full support of the APIs needed to test
  // whether the request URL is of the same origin as current location.
  (function standardBrowserEnv() {
    var msie = /(msie|trident)/i.test(navigator.userAgent);
    var urlParsingNode = document.createElement('a');
    var originURL;

    /**
    * Parse a URL to discover it's components
    *
    * @param {String} url The URL to be parsed
    * @returns {Object}
    */
    function resolveURL(url) {
      var href = url;

      if (msie) {
        // IE needs attribute set twice to normalize properties
        urlParsingNode.setAttribute('href', href);
        href = urlParsingNode.href;
      }

      urlParsingNode.setAttribute('href', href);

      // urlParsingNode provides the UrlUtils interface - http://url.spec.whatwg.org/#urlutils
      return {
        href: urlParsingNode.href,
        protocol: urlParsingNode.protocol ? urlParsingNode.protocol.replace(/:$/, '') : '',
        host: urlParsingNode.host,
        search: urlParsingNode.search ? urlParsingNode.search.replace(/^\?/, '') : '',
        hash: urlParsingNode.hash ? urlParsingNode.hash.replace(/^#/, '') : '',
        hostname: urlParsingNode.hostname,
        port: urlParsingNode.port,
        pathname: (urlParsingNode.pathname.charAt(0) === '/') ?
                  urlParsingNode.pathname :
                  '/' + urlParsingNode.pathname
      };
    }

    originURL = resolveURL(window.location.href);

    /**
    * Determine if a URL shares the same origin as the current location
    *
    * @param {String} requestURL The URL to test
    * @returns {boolean} True if URL shares the same origin, otherwise false
    */
    return function isURLSameOrigin(requestURL) {
      var parsed = (utils.isString(requestURL)) ? resolveURL(requestURL) : requestURL;
      return (parsed.protocol === originURL.protocol &&
            parsed.host === originURL.host);
    };
  })() :

  // Non standard browser envs (web workers, react-native) lack needed support.
  (function nonStandardBrowserEnv() {
    return function isURLSameOrigin() {
      return true;
    };
  })()
);


/***/ }),
/* 34 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


// btoa polyfill for IE<10 courtesy https://github.com/davidchambers/Base64.js

var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';

function E() {
  this.message = 'String contains an invalid character';
}
E.prototype = new Error;
E.prototype.code = 5;
E.prototype.name = 'InvalidCharacterError';

function btoa(input) {
  var str = String(input);
  var output = '';
  for (
    // initialize result and counter
    var block, charCode, idx = 0, map = chars;
    // if the next str index does not exist:
    //   change the mapping table to "="
    //   check if d has no fractional digits
    str.charAt(idx | 0) || (map = '=', idx % 1);
    // "8 - idx % 1 * 8" generates the sequence 2, 4, 6, 8
    output += map.charAt(63 & block >> 8 - idx % 1 * 8)
  ) {
    charCode = str.charCodeAt(idx += 3 / 4);
    if (charCode > 0xFF) {
      throw new E();
    }
    block = block << 8 | charCode;
  }
  return output;
}

module.exports = btoa;


/***/ }),
/* 35 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs support document.cookie
  (function standardBrowserEnv() {
    return {
      write: function write(name, value, expires, path, domain, secure) {
        var cookie = [];
        cookie.push(name + '=' + encodeURIComponent(value));

        if (utils.isNumber(expires)) {
          cookie.push('expires=' + new Date(expires).toGMTString());
        }

        if (utils.isString(path)) {
          cookie.push('path=' + path);
        }

        if (utils.isString(domain)) {
          cookie.push('domain=' + domain);
        }

        if (secure === true) {
          cookie.push('secure');
        }

        document.cookie = cookie.join('; ');
      },

      read: function read(name) {
        var match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
        return (match ? decodeURIComponent(match[3]) : null);
      },

      remove: function remove(name) {
        this.write(name, '', Date.now() - 86400000);
      }
    };
  })() :

  // Non standard browser env (web workers, react-native) lack needed support.
  (function nonStandardBrowserEnv() {
    return {
      write: function write() {},
      read: function read() { return null; },
      remove: function remove() {}
    };
  })()
);


/***/ }),
/* 36 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

function InterceptorManager() {
  this.handlers = [];
}

/**
 * Add a new interceptor to the stack
 *
 * @param {Function} fulfilled The function to handle `then` for a `Promise`
 * @param {Function} rejected The function to handle `reject` for a `Promise`
 *
 * @return {Number} An ID used to remove interceptor later
 */
InterceptorManager.prototype.use = function use(fulfilled, rejected) {
  this.handlers.push({
    fulfilled: fulfilled,
    rejected: rejected
  });
  return this.handlers.length - 1;
};

/**
 * Remove an interceptor from the stack
 *
 * @param {Number} id The ID that was returned by `use`
 */
InterceptorManager.prototype.eject = function eject(id) {
  if (this.handlers[id]) {
    this.handlers[id] = null;
  }
};

/**
 * Iterate over all the registered interceptors
 *
 * This method is particularly useful for skipping over any
 * interceptors that may have become `null` calling `eject`.
 *
 * @param {Function} fn The function to call for each interceptor
 */
InterceptorManager.prototype.forEach = function forEach(fn) {
  utils.forEach(this.handlers, function forEachHandler(h) {
    if (h !== null) {
      fn(h);
    }
  });
};

module.exports = InterceptorManager;


/***/ }),
/* 37 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);
var transformData = __webpack_require__(38);
var isCancel = __webpack_require__(12);
var defaults = __webpack_require__(6);

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
function throwIfCancellationRequested(config) {
  if (config.cancelToken) {
    config.cancelToken.throwIfRequested();
  }
}

/**
 * Dispatch a request to the server using the configured adapter.
 *
 * @param {object} config The config that is to be used for the request
 * @returns {Promise} The Promise to be fulfilled
 */
module.exports = function dispatchRequest(config) {
  throwIfCancellationRequested(config);

  // Ensure headers exist
  config.headers = config.headers || {};

  // Transform request data
  config.data = transformData(
    config.data,
    config.headers,
    config.transformRequest
  );

  // Flatten headers
  config.headers = utils.merge(
    config.headers.common || {},
    config.headers[config.method] || {},
    config.headers || {}
  );

  utils.forEach(
    ['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
    function cleanHeaderConfig(method) {
      delete config.headers[method];
    }
  );

  var adapter = config.adapter || defaults.adapter;

  return adapter(config).then(function onAdapterResolution(response) {
    throwIfCancellationRequested(config);

    // Transform response data
    response.data = transformData(
      response.data,
      response.headers,
      config.transformResponse
    );

    return response;
  }, function onAdapterRejection(reason) {
    if (!isCancel(reason)) {
      throwIfCancellationRequested(config);

      // Transform response data
      if (reason && reason.response) {
        reason.response.data = transformData(
          reason.response.data,
          reason.response.headers,
          config.transformResponse
        );
      }
    }

    return Promise.reject(reason);
  });
};


/***/ }),
/* 38 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(1);

/**
 * Transform the data for a request or a response
 *
 * @param {Object|String} data The data to be transformed
 * @param {Array} headers The headers for the request or response
 * @param {Array|Function} fns A single function or Array of functions
 * @returns {*} The resulting transformed data
 */
module.exports = function transformData(data, headers, fns) {
  /*eslint no-param-reassign:0*/
  utils.forEach(fns, function transform(fn) {
    data = fn(data, headers);
  });

  return data;
};


/***/ }),
/* 39 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Determines whether the specified URL is absolute
 *
 * @param {string} url The URL to test
 * @returns {boolean} True if the specified URL is absolute, otherwise false
 */
module.exports = function isAbsoluteURL(url) {
  // A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
  // RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
  // by any combination of letters, digits, plus, period, or hyphen.
  return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
};


/***/ }),
/* 40 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Creates a new URL by combining the specified URLs
 *
 * @param {string} baseURL The base URL
 * @param {string} relativeURL The relative URL
 * @returns {string} The combined URL
 */
module.exports = function combineURLs(baseURL, relativeURL) {
  return baseURL.replace(/\/+$/, '') + '/' + relativeURL.replace(/^\/+/, '');
};


/***/ }),
/* 41 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Cancel = __webpack_require__(13);

/**
 * A `CancelToken` is an object that can be used to request cancellation of an operation.
 *
 * @class
 * @param {Function} executor The executor function.
 */
function CancelToken(executor) {
  if (typeof executor !== 'function') {
    throw new TypeError('executor must be a function.');
  }

  var resolvePromise;
  this.promise = new Promise(function promiseExecutor(resolve) {
    resolvePromise = resolve;
  });

  var token = this;
  executor(function cancel(message) {
    if (token.reason) {
      // Cancellation has already been requested
      return;
    }

    token.reason = new Cancel(message);
    resolvePromise(token.reason);
  });
}

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
CancelToken.prototype.throwIfRequested = function throwIfRequested() {
  if (this.reason) {
    throw this.reason;
  }
};

/**
 * Returns an object that contains a new `CancelToken` and a function that, when called,
 * cancels the `CancelToken`.
 */
CancelToken.source = function source() {
  var cancel;
  var token = new CancelToken(function executor(c) {
    cancel = c;
  });
  return {
    token: token,
    cancel: cancel
  };
};

module.exports = CancelToken;


/***/ }),
/* 42 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Syntactic sugar for invoking a function and expanding an array for arguments.
 *
 * Common use case would be to use `Function.prototype.apply`.
 *
 *  ```js
 *  function f(x, y, z) {}
 *  var args = [1, 2, 3];
 *  f.apply(null, args);
 *  ```
 *
 * With `spread` this example can be re-written.
 *
 *  ```js
 *  spread(function(x, y, z) {})([1, 2, 3]);
 *  ```
 *
 * @param {Function} callback
 * @returns {Function}
 */
module.exports = function spread(callback) {
  return function wrap(arr) {
    return callback.apply(null, arr);
  };
};


/***/ }),
/* 43 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _mini_css_extract_plugin_dist_loader_js_css_loader_index_js_ref_3_1_vue_loader_lib_loaders_stylePostLoader_js_resolve_url_loader_index_js_postcss_loader_src_index_js_ref_3_3_vue_loader_lib_index_js_vue_loader_options_Vuetable_vue_vue_type_style_index_0_id_15965e3b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(3);
/* harmony import */ var _mini_css_extract_plugin_dist_loader_js_css_loader_index_js_ref_3_1_vue_loader_lib_loaders_stylePostLoader_js_resolve_url_loader_index_js_postcss_loader_src_index_js_ref_3_3_vue_loader_lib_index_js_vue_loader_options_Vuetable_vue_vue_type_style_index_0_id_15965e3b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_mini_css_extract_plugin_dist_loader_js_css_loader_index_js_ref_3_1_vue_loader_lib_loaders_stylePostLoader_js_resolve_url_loader_index_js_postcss_loader_src_index_js_ref_3_3_vue_loader_lib_index_js_vue_loader_options_Vuetable_vue_vue_type_style_index_0_id_15965e3b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_mini_css_extract_plugin_dist_loader_js_css_loader_index_js_ref_3_1_vue_loader_lib_loaders_stylePostLoader_js_resolve_url_loader_index_js_postcss_loader_src_index_js_ref_3_3_vue_loader_lib_index_js_vue_loader_options_Vuetable_vue_vue_type_style_index_0_id_15965e3b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ })
]]);
//# sourceMappingURL=vendors~content-seo.js.map
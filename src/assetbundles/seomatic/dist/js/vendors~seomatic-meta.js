/*!
 * @project        SEOmatic
 * @name           vendors~seomatic-meta.js
 * @author         Andrew Welch
 * @build          Wed, May 29, 2019 5:15 PM ET
 * @release        d1b1f623dd5b6f18e9fac99144505e4b515b6006 [develop]
 * @copyright      Copyright (c) 2019 nystudio107
 *
 */
(window.webpackJsonp=window.webpackJsonp||[]).push([[9],[function(t,e){var i=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=i)},function(t,e){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,e,i){var n=i(20)("wks"),r=i(19),o=i(0).Symbol,s="function"==typeof o;(t.exports=function(t){return n[t]||(n[t]=s&&o[t]||(s?o:r)("Symbol."+t))}).store=n},function(t,e,i){t.exports=!i(8)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},,function(t,e){var i;i=function(){return this}();try{i=i||new Function("return this")()}catch(t){"object"==typeof window&&(i=window)}t.exports=i},function(t,e,i){var n=i(16),r=i(27);t.exports=i(3)?function(t,e,i){return n.f(t,e,r(1,i))}:function(t,e,i){return t[e]=i,t}},function(t,e,i){var n=i(1);t.exports=function(t){if(!n(t))throw TypeError(t+" is not an object!");return t}},function(t,e){t.exports=function(t){try{return!!t()}catch(t){return!0}}},function(t,e){var i={}.toString;t.exports=function(t){return i.call(t).slice(8,-1)}},function(t,e){t.exports=function(t){if(null==t)throw TypeError("Can't call method on  "+t);return t}},function(t,e){var i=Math.ceil,n=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?n:i)(t)}},,,,function(t,e){var i=t.exports={version:"2.6.9"};"number"==typeof __e&&(__e=i)},function(t,e,i){var n=i(7),r=i(25),o=i(26),s=Object.defineProperty;e.f=i(3)?Object.defineProperty:function(t,e,i){if(n(t),e=o(e,!0),n(i),r)try{return s(t,e,i)}catch(t){}if("get"in i||"set"in i)throw TypeError("Accessors not supported!");return"value"in i&&(t[e]=i.value),t}},function(t,e,i){var n=i(0),r=i(6),o=i(18),s=i(19)("src"),a=i(51),u=(""+a).split("toString");i(15).inspectSource=function(t){return a.call(t)},(t.exports=function(t,e,i,a){var p="function"==typeof i;p&&(o(i,"name")||r(i,"name",e)),t[e]!==i&&(p&&(o(i,s)||r(i,s,t[e]?""+t[e]:u.join(String(e)))),t===n?t[e]=i:a?t[e]?t[e]=i:r(t,e,i):(delete t[e],r(t,e,i)))})(Function.prototype,"toString",function(){return"function"==typeof this&&this[s]||a.call(this)})},function(t,e){var i={}.hasOwnProperty;t.exports=function(t,e){return i.call(t,e)}},function(t,e){var i=0,n=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++i+n).toString(36))}},function(t,e,i){var n=i(15),r=i(0),o=r["__core-js_shared__"]||(r["__core-js_shared__"]={});(t.exports=function(t,e){return o[t]||(o[t]=void 0!==e?e:{})})("versions",[]).push({version:n.version,mode:i(52)?"pure":"global",copyright:"© 2019 Denis Pushkarev (zloirock.ru)"})},function(t,e,i){var n=i(53);t.exports=function(t,e,i){if(n(t),void 0===e)return t;switch(i){case 1:return function(i){return t.call(e,i)};case 2:return function(i,n){return t.call(e,i,n)};case 3:return function(i,n,r){return t.call(e,i,n,r)}}return function(){return t.apply(e,arguments)}}},function(t,e,i){var n=i(11),r=Math.min;t.exports=function(t){return t>0?r(n(t),9007199254740991):0}},function(t,e,i){var n=i(28),r=i(10);t.exports=function(t){return n(r(t))}},function(t,e,i){var n=i(0),r=i(15),o=i(6),s=i(17),a=i(21),u=function(t,e,i){var p,c,l,h,f=t&u.F,d=t&u.G,v=t&u.S,g=t&u.P,m=t&u.B,$=d?n:v?n[e]||(n[e]={}):(n[e]||{}).prototype,y=d?r:r[e]||(r[e]={}),k=y.prototype||(y.prototype={});for(p in d&&(i=e),i)l=((c=!f&&$&&void 0!==$[p])?$:i)[p],h=m&&c?a(l,n):g&&"function"==typeof l?a(Function.call,l):l,$&&s($,p,l,t&u.U),y[p]!=l&&o(y,p,h),g&&k[p]!=l&&(k[p]=l)};n.core=r,u.F=1,u.G=2,u.S=4,u.P=8,u.B=16,u.W=32,u.U=64,u.R=128,t.exports=u},function(t,e,i){t.exports=!i(3)&&!i(8)(function(){return 7!=Object.defineProperty(i(50)("div"),"a",{get:function(){return 7}}).a})},function(t,e,i){var n=i(1);t.exports=function(t,e){if(!n(t))return t;var i,r;if(e&&"function"==typeof(i=t.toString)&&!n(r=i.call(t)))return r;if("function"==typeof(i=t.valueOf)&&!n(r=i.call(t)))return r;if(!e&&"function"==typeof(i=t.toString)&&!n(r=i.call(t)))return r;throw TypeError("Can't convert object to primitive value")}},function(t,e){t.exports=function(t,e){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:e}}},function(t,e,i){var n=i(9);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==n(t)?t.split(""):Object(t)}},function(t,e,i){var n=i(10);t.exports=function(t){return Object(n(t))}},function(t,e,i){"use strict";var n,r,o=i(31),s=RegExp.prototype.exec,a=String.prototype.replace,u=s,p=(n=/a/,r=/b*/g,s.call(n,"a"),s.call(r,"a"),0!==n.lastIndex||0!==r.lastIndex),c=void 0!==/()??/.exec("")[1];(p||c)&&(u=function(t){var e,i,n,r,u=this;return c&&(i=new RegExp("^"+u.source+"$(?!\\s)",o.call(u))),p&&(e=u.lastIndex),n=s.call(u,t),p&&n&&(u.lastIndex=u.global?n.index+n[0].length:e),c&&n&&n.length>1&&a.call(n[0],i,function(){for(r=1;r<arguments.length-2;r++)void 0===arguments[r]&&(n[r]=void 0)}),n}),t.exports=u},function(t,e,i){"use strict";var n=i(7);t.exports=function(){var t=n(this),e="";return t.global&&(e+="g"),t.ignoreCase&&(e+="i"),t.multiline&&(e+="m"),t.unicode&&(e+="u"),t.sticky&&(e+="y"),e}},,,,,,,,,,,,,,,,,,function(t,e,i){"use strict";var n=i(24),r=i(54)(5),o=!0;"find"in[]&&Array(1).find(function(){o=!1}),n(n.P+n.F*o,"Array",{find:function(t){return r(this,t,arguments.length>1?arguments[1]:void 0)}}),i(58)("find")},function(t,e,i){var n=i(1),r=i(0).document,o=n(r)&&n(r.createElement);t.exports=function(t){return o?r.createElement(t):{}}},function(t,e,i){t.exports=i(20)("native-function-to-string",Function.toString)},function(t,e){t.exports=!1},function(t,e){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,e,i){var n=i(21),r=i(28),o=i(29),s=i(22),a=i(55);t.exports=function(t,e){var i=1==t,u=2==t,p=3==t,c=4==t,l=6==t,h=5==t||l,f=e||a;return function(e,a,d){for(var v,g,m=o(e),$=r(m),y=n(a,d,3),k=s($.length),x=0,w=i?f(e,k):u?f(e,0):void 0;k>x;x++)if((h||x in $)&&(g=y(v=$[x],x,m),t))if(i)w[x]=g;else if(g)switch(t){case 3:return!0;case 5:return v;case 6:return x;case 2:w.push(v)}else if(c)return!1;return l?-1:p||c?c:w}}},function(t,e,i){var n=i(56);t.exports=function(t,e){return new(n(t))(e)}},function(t,e,i){var n=i(1),r=i(57),o=i(2)("species");t.exports=function(t){var e;return r(t)&&("function"!=typeof(e=t.constructor)||e!==Array&&!r(e.prototype)||(e=void 0),n(e)&&null===(e=e[o])&&(e=void 0)),void 0===e?Array:e}},function(t,e,i){var n=i(9);t.exports=Array.isArray||function(t){return"Array"==n(t)}},function(t,e,i){var n=i(2)("unscopables"),r=Array.prototype;null==r[n]&&i(6)(r,n,{}),t.exports=function(t){r[n][t]=!0}},function(t,e,i){"use strict";var n=i(7),r=i(29),o=i(22),s=i(11),a=i(60),u=i(62),p=Math.max,c=Math.min,l=Math.floor,h=/\$([$&`']|\d\d?|<[^>]*>)/g,f=/\$([$&`']|\d\d?)/g;i(64)("replace",2,function(t,e,i,d){return[function(n,r){var o=t(this),s=null==n?void 0:n[e];return void 0!==s?s.call(n,o,r):i.call(String(o),n,r)},function(t,e){var r=d(i,t,this,e);if(r.done)return r.value;var l=n(t),h=String(this),f="function"==typeof e;f||(e=String(e));var g=l.global;if(g){var m=l.unicode;l.lastIndex=0}for(var $=[];;){var y=u(l,h);if(null===y)break;if($.push(y),!g)break;""===String(y[0])&&(l.lastIndex=a(h,o(l.lastIndex),m))}for(var k,x="",w=0,b=0;b<$.length;b++){y=$[b];for(var T=String(y[0]),_=p(c(s(y.index),h.length),0),E=[],A=1;A<y.length;A++)E.push(void 0===(k=y[A])?k:String(k));var C=y.groups;if(f){var I=[T].concat(E,_,h);void 0!==C&&I.push(C);var S=String(e.apply(void 0,I))}else S=v(T,h,_,E,C,e);_>=w&&(x+=h.slice(w,_)+S,w=_+T.length)}return x+h.slice(w)}];function v(t,e,n,o,s,a){var u=n+t.length,p=o.length,c=f;return void 0!==s&&(s=r(s),c=h),i.call(a,c,function(i,r){var a;switch(r.charAt(0)){case"$":return"$";case"&":return t;case"`":return e.slice(0,n);case"'":return e.slice(u);case"<":a=s[r.slice(1,-1)];break;default:var c=+r;if(0===c)return i;if(c>p){var h=l(c/10);return 0===h?i:h<=p?void 0===o[h-1]?r.charAt(1):o[h-1]+r.charAt(1):i}a=o[c-1]}return void 0===a?"":a})}})},function(t,e,i){"use strict";var n=i(61)(!0);t.exports=function(t,e,i){return e+(i?n(t,e).length:1)}},function(t,e,i){var n=i(11),r=i(10);t.exports=function(t){return function(e,i){var o,s,a=String(r(e)),u=n(i),p=a.length;return u<0||u>=p?t?"":void 0:(o=a.charCodeAt(u))<55296||o>56319||u+1===p||(s=a.charCodeAt(u+1))<56320||s>57343?t?a.charAt(u):o:t?a.slice(u,u+2):s-56320+(o-55296<<10)+65536}}},function(t,e,i){"use strict";var n=i(63),r=RegExp.prototype.exec;t.exports=function(t,e){var i=t.exec;if("function"==typeof i){var o=i.call(t,e);if("object"!=typeof o)throw new TypeError("RegExp exec method returned something other than an Object or null");return o}if("RegExp"!==n(t))throw new TypeError("RegExp#exec called on incompatible receiver");return r.call(t,e)}},function(t,e,i){var n=i(9),r=i(2)("toStringTag"),o="Arguments"==n(function(){return arguments}());t.exports=function(t){var e,i,s;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(i=function(t,e){try{return t[e]}catch(t){}}(e=Object(t),r))?i:o?n(e):"Object"==(s=n(e))&&"function"==typeof e.callee?"Arguments":s}},function(t,e,i){"use strict";i(65);var n=i(17),r=i(6),o=i(8),s=i(10),a=i(2),u=i(30),p=a("species"),c=!o(function(){var t=/./;return t.exec=function(){var t=[];return t.groups={a:"7"},t},"7"!=="".replace(t,"$<a>")}),l=function(){var t=/(?:)/,e=t.exec;t.exec=function(){return e.apply(this,arguments)};var i="ab".split(t);return 2===i.length&&"a"===i[0]&&"b"===i[1]}();t.exports=function(t,e,i){var h=a(t),f=!o(function(){var e={};return e[h]=function(){return 7},7!=""[t](e)}),d=f?!o(function(){var e=!1,i=/a/;return i.exec=function(){return e=!0,null},"split"===t&&(i.constructor={},i.constructor[p]=function(){return i}),i[h](""),!e}):void 0;if(!f||!d||"replace"===t&&!c||"split"===t&&!l){var v=/./[h],g=i(s,h,""[t],function(t,e,i,n,r){return e.exec===u?f&&!r?{done:!0,value:v.call(e,i,n)}:{done:!0,value:t.call(i,e,n)}:{done:!1}}),m=g[0],$=g[1];n(String.prototype,t,m),r(RegExp.prototype,h,2==e?function(t,e){return $.call(t,this,e)}:function(t){return $.call(t,this)})}}},function(t,e,i){"use strict";var n=i(30);i(24)({target:"RegExp",proto:!0,forced:n!==/./.exec},{exec:n})},function(t,e,i){var n=i(0),r=i(67),o=i(16).f,s=i(71).f,a=i(77),u=i(31),p=n.RegExp,c=p,l=p.prototype,h=/a/g,f=/a/g,d=new p(h)!==h;if(i(3)&&(!d||i(8)(function(){return f[i(2)("match")]=!1,p(h)!=h||p(f)==f||"/a/i"!=p(h,"i")}))){p=function(t,e){var i=this instanceof p,n=a(t),o=void 0===e;return!i&&n&&t.constructor===p&&o?t:r(d?new c(n&&!o?t.source:t,e):c((n=t instanceof p)?t.source:t,n&&o?u.call(t):e),i?this:l,p)};for(var v=function(t){t in p||o(p,t,{configurable:!0,get:function(){return c[t]},set:function(e){c[t]=e}})},g=s(c),m=0;g.length>m;)v(g[m++]);l.constructor=p,p.prototype=l,i(17)(n,"RegExp",p)}i(78)("RegExp")},function(t,e,i){var n=i(1),r=i(68).set;t.exports=function(t,e,i){var o,s=e.constructor;return s!==i&&"function"==typeof s&&(o=s.prototype)!==i.prototype&&n(o)&&r&&r(t,o),t}},function(t,e,i){var n=i(1),r=i(7),o=function(t,e){if(r(t),!n(e)&&null!==e)throw TypeError(e+": can't set as prototype!")};t.exports={set:Object.setPrototypeOf||("__proto__"in{}?function(t,e,n){try{(n=i(21)(Function.call,i(69).f(Object.prototype,"__proto__").set,2))(t,[]),e=!(t instanceof Array)}catch(t){e=!0}return function(t,i){return o(t,i),e?t.__proto__=i:n(t,i),t}}({},!1):void 0),check:o}},function(t,e,i){var n=i(70),r=i(27),o=i(23),s=i(26),a=i(18),u=i(25),p=Object.getOwnPropertyDescriptor;e.f=i(3)?p:function(t,e){if(t=o(t),e=s(e,!0),u)try{return p(t,e)}catch(t){}if(a(t,e))return r(!n.f.call(t,e),t[e])}},function(t,e){e.f={}.propertyIsEnumerable},function(t,e,i){var n=i(72),r=i(76).concat("length","prototype");e.f=Object.getOwnPropertyNames||function(t){return n(t,r)}},function(t,e,i){var n=i(18),r=i(23),o=i(73)(!1),s=i(75)("IE_PROTO");t.exports=function(t,e){var i,a=r(t),u=0,p=[];for(i in a)i!=s&&n(a,i)&&p.push(i);for(;e.length>u;)n(a,i=e[u++])&&(~o(p,i)||p.push(i));return p}},function(t,e,i){var n=i(23),r=i(22),o=i(74);t.exports=function(t){return function(e,i,s){var a,u=n(e),p=r(u.length),c=o(s,p);if(t&&i!=i){for(;p>c;)if((a=u[c++])!=a)return!0}else for(;p>c;c++)if((t||c in u)&&u[c]===i)return t||c||0;return!t&&-1}}},function(t,e,i){var n=i(11),r=Math.max,o=Math.min;t.exports=function(t,e){return(t=n(t))<0?r(t+e,0):o(t,e)}},function(t,e,i){var n=i(20)("keys"),r=i(19);t.exports=function(t){return n[t]||(n[t]=r(t))}},function(t,e){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(t,e,i){var n=i(1),r=i(9),o=i(2)("match");t.exports=function(t){var e;return n(t)&&(void 0!==(e=t[o])?!!e:"RegExp"==r(t))}},function(t,e,i){"use strict";var n=i(0),r=i(16),o=i(3),s=i(2)("species");t.exports=function(t){var e=n[t];o&&e&&!e[s]&&r.f(e,s,{configurable:!0,get:function(){return this}})}},function(t,e,i){(function(e){var i;
/*!
 * bootstrap-tokenfield
 * https://github.com/sliptree/bootstrap-tokenfield
 * Copyright 2013-2014 Sliptree and other contributors; Licensed MIT
 */
/*!
 * bootstrap-tokenfield
 * https://github.com/sliptree/bootstrap-tokenfield
 * Copyright 2013-2014 Sliptree and other contributors; Licensed MIT
 */
i=function(t,e){"use strict";var i=function(i,n){var r=this;this.$element=t(i),this.textDirection=this.$element.css("direction"),this.options=t.extend(!0,{},t.fn.tokenfield.defaults,{tokens:this.$element.val()},this.$element.data(),n),this._delimiters="string"==typeof this.options.delimiter?[this.options.delimiter]:this.options.delimiter,this._triggerKeys=t.map(this._delimiters,function(t){return t.charCodeAt(0)}),this._firstDelimiter=this._delimiters[0];var o=t.inArray(" ",this._delimiters),s=t.inArray("-",this._delimiters);o>=0&&(this._delimiters[o]="\\s"),s>=0&&(delete this._delimiters[s],this._delimiters.unshift("-"));var a=["\\","$","[","{","^",".","|","?","*","+","(",")"];t.each(this._delimiters,function(e,i){t.inArray(i,a)>=0&&(r._delimiters[e]="\\"+i)});var u,p=e&&"function"==typeof e.getMatchedCSSRules?e.getMatchedCSSRules(i):null,c=i.style.width,l=this.$element.width();p&&t.each(p,function(t,e){e.style.width&&(u=e.style.width)});var h="rtl"===t("body").css("direction")?"right":"left",f={position:this.$element.css("position")};f[h]=this.$element.css(h),this.$element.data("original-styles",f).data("original-tabindex",this.$element.prop("tabindex")).css("position","absolute").css(h,"-10000px").prop("tabindex",-1),this.$wrapper=t('<div class="tokenfield form-control" />'),this.$element.hasClass("input-lg")&&this.$wrapper.addClass("input-lg"),this.$element.hasClass("input-sm")&&this.$wrapper.addClass("input-sm"),"rtl"===this.textDirection&&this.$wrapper.addClass("rtl");var d=this.$element.prop("id")||(new Date).getTime()+""+Math.floor(100*(1+Math.random()));this.$input=t('<input type="text" class="token-input" autocomplete="off" />').appendTo(this.$wrapper).prop("placeholder",this.$element.prop("placeholder")).prop("id",d+"-tokenfield").prop("tabindex",this.$element.data("original-tabindex"));var v=t('label[for="'+this.$element.prop("id")+'"]');if(v.length&&v.prop("for",this.$input.prop("id")),this.$copyHelper=t('<input type="text" />').css("position","absolute").css(h,"-10000px").prop("tabindex",-1).prependTo(this.$wrapper),c?this.$wrapper.css("width",c):u?this.$wrapper.css("width",u):this.$element.parents(".form-inline").length&&this.$wrapper.width(l),(this.$element.prop("disabled")||this.$element.parents("fieldset[disabled]").length)&&this.disable(),this.$element.prop("readonly")&&this.readonly(),this.$mirror=t('<span style="position:absolute; top:-999px; left:0; white-space:pre;"/>'),this.$input.css("min-width",this.options.minWidth+"px"),t.each(["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],function(t,e){r.$mirror[0].style[e]=r.$input.css(e)}),this.$mirror.appendTo("body"),this.$wrapper.insertBefore(this.$element),this.$element.prependTo(this.$wrapper),this.update(),this.setTokens(this.options.tokens,!1,!1),this.listen(),!t.isEmptyObject(this.options.autocomplete)){var g="rtl"===this.textDirection?"right":"left",m=t.extend({minLength:this.options.showAutocompleteOnFocus?0:null,position:{my:g+" top",at:g+" bottom",of:this.$wrapper}},this.options.autocomplete);this.$input.autocomplete(m)}if(!t.isEmptyObject(this.options.typeahead)){var $=this.options.typeahead,y={minLength:this.options.showAutocompleteOnFocus?0:null},k=t.isArray($)?$:[$,$];k[0]=t.extend({},y,k[0]),this.$input.typeahead.apply(this.$input,k),this.typeahead=!0}this.$element.trigger("tokenfield:initialize")};i.prototype={constructor:i,createToken:function(e,i){var n=this;if("string"==typeof e&&(e={value:e,label:e}),void 0===i&&(i=!0),e.value=t.trim(e.value),e.label=e.label&&e.label.length?t.trim(e.label):e.value,e.value.length&&e.label.length&&!(e.label.length<=this.options.minLength)&&!(this.options.limit&&this.getTokens().length>=this.options.limit)){var r=t.Event("tokenfield:createtoken",{attrs:e});if(this.$element.trigger(r),r.attrs&&!r.isDefaultPrevented()){var o=t('<div class="token" />').attr("data-value",e.value).append('<span class="token-label" />').append('<a href="#" class="close" tabindex="-1">&times;</a>');this.$input.hasClass("tt-input")?this.$input.parent().before(o):this.$input.before(o),this.$input.css("width",this.options.minWidth+"px");var s=o.find(".token-label"),a=o.find(".close");return this.maxTokenWidth||(this.maxTokenWidth=this.$wrapper.width()-a.outerWidth()-parseInt(a.css("margin-left"),10)-parseInt(a.css("margin-right"),10)-parseInt(o.css("border-left-width"),10)-parseInt(o.css("border-right-width"),10)-parseInt(o.css("padding-left"),10)-parseInt(o.css("padding-right"),10),parseInt(s.css("border-left-width"),10),parseInt(s.css("border-right-width"),10),parseInt(s.css("padding-left"),10),parseInt(s.css("padding-right"),10),parseInt(s.css("margin-left"),10),parseInt(s.css("margin-right"),10)),s.text(e.label).css("max-width",this.maxTokenWidth),o.on("mousedown",function(t){if(n._disabled||n._readonly)return!1;n.preventDeactivation=!0}).on("click",function(t){return!n._disabled&&!n._readonly&&(n.preventDeactivation=!1,t.ctrlKey||t.metaKey?(t.preventDefault(),n.toggle(o)):void n.activate(o,t.shiftKey,t.shiftKey))}).on("dblclick",function(t){if(n._disabled||n._readonly||!n.options.allowEditing)return!1;n.edit(o)}),a.on("click",t.proxy(this.remove,this)),this.$element.trigger(t.Event("tokenfield:createdtoken",{attrs:e,relatedTarget:o.get(0)})),i&&this.$element.val(this.getTokensList()).trigger(t.Event("change",{initiator:"tokenfield"})),this.update(),this.$element.get(0)}}},setTokens:function(e,i,n){if(e){i||this.$wrapper.find(".token").remove(),void 0===n&&(n=!0),"string"==typeof e&&(e=this._delimiters.length?e.split(new RegExp("["+this._delimiters.join("")+"]")):[e]);var r=this;return t.each(e,function(t,e){r.createToken(e,n)}),this.$element.get(0)}},getTokenData:function(e){var i=e.map(function(){var e=t(this);return{value:e.attr("data-value"),label:e.find(".token-label").text()}}).get();return 1==i.length&&(i=i[0]),i},getTokens:function(e){var i=this,n=[],r=e?".active":"";return this.$wrapper.find(".token"+r).each(function(){n.push(i.getTokenData(t(this)))}),n},getTokensList:function(e,i,n){var r=(e=e||this._firstDelimiter)+((i=null!=i?i:this.options.beautify)&&" "!==e?" ":"");return t.map(this.getTokens(n),function(t){return t.value}).join(r)},getInput:function(){return this.$input.val()},listen:function(){var i=this;this.$element.on("change",t.proxy(this.change,this)),this.$wrapper.on("mousedown",t.proxy(this.focusInput,this)),this.$input.on("focus",t.proxy(this.focus,this)).on("blur",t.proxy(this.blur,this)).on("paste",t.proxy(this.paste,this)).on("keydown",t.proxy(this.keydown,this)).on("keypress",t.proxy(this.keypress,this)).on("keyup",t.proxy(this.keyup,this)),this.$copyHelper.on("focus",t.proxy(this.focus,this)).on("blur",t.proxy(this.blur,this)).on("keydown",t.proxy(this.keydown,this)).on("keyup",t.proxy(this.keyup,this)),this.$input.on("keypress",t.proxy(this.update,this)).on("keyup",t.proxy(this.update,this)),this.$input.on("autocompletecreate",function(){var e=t(this).data("ui-autocomplete").menu.element,n=i.$wrapper.outerWidth()-parseInt(e.css("border-left-width"),10)-parseInt(e.css("border-right-width"),10);e.css("min-width",n+"px")}).on("autocompleteselect",function(t,e){return i.createToken(e.item)&&(i.$input.val(""),i.$input.data("edit")&&i.unedit(!0)),!1}).on("typeahead:selected typeahead:autocompleted",function(t,e,n){i.createToken(e)&&(i.$input.typeahead("val",""),i.$input.data("edit")&&i.unedit(!0))}),t(e).on("resize",t.proxy(this.update,this))},keydown:function(e){if(this.focused){var i=this;switch(e.keyCode){case 8:if(!this.$input.is(document.activeElement))break;this.lastInputValue=this.$input.val();break;case 37:n("rtl"===this.textDirection?"next":"prev");break;case 38:r("prev");break;case 39:n("rtl"===this.textDirection?"prev":"next");break;case 40:r("next");break;case 65:if(this.$input.val().length>0||!e.ctrlKey&&!e.metaKey)break;this.activateAll(),e.preventDefault();break;case 9:case 13:if(this.$input.data("ui-autocomplete")&&this.$input.data("ui-autocomplete").menu.element.find("li:has(a.ui-state-focus)").length)break;if(this.$input.hasClass("tt-input")&&this.$wrapper.find(".tt-cursor").length)break;if(this.$input.hasClass("tt-input")&&this.$wrapper.find(".tt-hint").val().length)break;if(this.$input.is(document.activeElement)&&this.$input.val().length||this.$input.data("edit"))return this.createTokensFromInput(e,this.$input.data("edit"));if(13===e.keyCode){if(!this.$copyHelper.is(document.activeElement)||1!==this.$wrapper.find(".token.active").length)break;if(!i.options.allowEditing)break;this.edit(this.$wrapper.find(".token.active"))}}this.lastKeyDown=e.keyCode}function n(t){if(i.$input.is(document.activeElement)){if(i.$input.val().length>0)return;t+="All";var n=i.$input.hasClass("tt-input")?i.$input.parent()[t](".token:first"):i.$input[t](".token:first");if(!n.length)return;i.preventInputFocus=!0,i.preventDeactivation=!0,i.activate(n),e.preventDefault()}else i[t](e.shiftKey),e.preventDefault()}function r(n){if(e.shiftKey){if(i.$input.is(document.activeElement)){if(i.$input.val().length>0)return;var r=i.$input.hasClass("tt-input")?i.$input.parent()[n+"All"](".token:first"):i.$input[n+"All"](".token:first");if(!r.length)return;i.activate(r)}var o="prev"===n?"next":"prev",s="prev"===n?"first":"last";i.firstActiveToken[o+"All"](".token").each(function(){i.deactivate(t(this))}),i.activate(i.$wrapper.find(".token:"+s),!0,!0),e.preventDefault()}}},keypress:function(e){if(this.lastKeyPressCode=e.keyCode,this.lastKeyPressCharCode=e.charCode,-1!==t.inArray(e.charCode,this._triggerKeys)&&this.$input.is(document.activeElement))return this.$input.val()&&this.createTokensFromInput(e),!1},keyup:function(t){if(this.preventInputFocus=!1,this.focused){switch(t.keyCode){case 8:if(this.$input.is(document.activeElement)){if(this.$input.val().length||this.lastInputValue.length&&8===this.lastKeyDown)break;this.preventDeactivation=!0;var e=this.$input.hasClass("tt-input")?this.$input.parent().prevAll(".token:first"):this.$input.prevAll(".token:first");if(!e.length)break;this.activate(e)}else this.remove(t);break;case 46:this.remove(t,"next")}this.lastKeyUp=t.keyCode}},focus:function(t){this.focused=!0,this.$wrapper.addClass("focus"),this.$input.is(document.activeElement)&&(this.$wrapper.find(".active").removeClass("active"),this.$firstActiveToken=null,this.options.showAutocompleteOnFocus&&this.search())},blur:function(t){this.focused=!1,this.$wrapper.removeClass("focus"),this.preventDeactivation||this.$element.is(document.activeElement)||(this.$wrapper.find(".active").removeClass("active"),this.$firstActiveToken=null),!this.preventCreateTokens&&(this.$input.data("edit")&&!this.$input.is(document.activeElement)||this.options.createTokensOnBlur)&&this.createTokensFromInput(t),this.preventDeactivation=!1,this.preventCreateTokens=!1},paste:function(t){var e=this;setTimeout(function(){e.createTokensFromInput(t)},1)},change:function(t){"tokenfield"!==t.initiator&&this.setTokens(this.$element.val())},createTokensFromInput:function(t,e){if(!(this.$input.val().length<this.options.minLength)){var i=this.getTokensList();return this.setTokens(this.$input.val(),!0),i==this.getTokensList()&&this.$input.val().length?!1:(this.$input.hasClass("tt-input")?this.$input.typeahead("val",""):this.$input.val(""),this.$input.data("edit")&&this.unedit(e),!1)}},next:function(t){if(t){var e=this.$wrapper.find(".active:first");if(!(!e||!this.$firstActiveToken)&&e.index()<this.$firstActiveToken.index())return this.deactivate(e)}var i=this.$wrapper.find(".active:last").nextAll(".token:first");i.length?this.activate(i,t):this.$input.focus()},prev:function(t){if(t){var e=this.$wrapper.find(".active:last");if(!(!e||!this.$firstActiveToken)&&e.index()>this.$firstActiveToken.index())return this.deactivate(e)}var i=this.$wrapper.find(".active:first").prevAll(".token:first");i.length||(i=this.$wrapper.find(".token:first")),i.length||t?this.activate(i,t):this.$input.focus()},activate:function(e,i,n,r){if(e){if(void 0===r)r=!0;if(n)i=!0;if(this.$copyHelper.focus(),i||(this.$wrapper.find(".active").removeClass("active"),r?this.$firstActiveToken=e:delete this.$firstActiveToken),n&&this.$firstActiveToken){var o=this.$firstActiveToken.index()-2,s=e.index()-2,a=this;this.$wrapper.find(".token").slice(Math.min(o,s)+1,Math.max(o,s)).each(function(){a.activate(t(this),!0)})}e.addClass("active"),this.$copyHelper.val(this.getTokensList(null,null,!0)).select()}},activateAll:function(){var e=this;this.$wrapper.find(".token").each(function(i){e.activate(t(this),0!==i,!1,!1)})},deactivate:function(t){t&&(t.removeClass("active"),this.$copyHelper.val(this.getTokensList(null,null,!0)).select())},toggle:function(t){t&&(t.toggleClass("active"),this.$copyHelper.val(this.getTokensList(null,null,!0)).select())},edit:function(e){if(e){var i={value:e.data("value"),label:e.find(".token-label").text()},n={attrs:i,relatedTarget:e.get(0)},r=t.Event("tokenfield:edittoken",n);if(this.$element.trigger(r),!r.isDefaultPrevented()){e.find(".token-label").text(i.value);var o=e.outerWidth(),s=this.$input.hasClass("tt-input")?this.$input.parent():this.$input;e.replaceWith(s),this.preventCreateTokens=!0,this.$input.val(i.value).select().data("edit",!0).width(o),this.update(),this.$element.trigger(t.Event("tokenfield:editedtoken",n))}}},unedit:function(t){if((this.$input.hasClass("tt-input")?this.$input.parent():this.$input).appendTo(this.$wrapper),this.$input.data("edit",!1),this.$mirror.text(""),this.update(),t){var e=this;setTimeout(function(){e.$input.focus()},1)}},remove:function(e,i){if(!(this.$input.is(document.activeElement)||this._disabled||this._readonly)){var n="click"===e.type?t(e.target).closest(".token"):this.$wrapper.find(".token.active");if("click"!==e.type){if(!i)i="prev";if(this[i](),"prev"===i)var r=0===n.first().prevAll(".token:first").length}var o={attrs:this.getTokenData(n),relatedTarget:n.get(0)},s=t.Event("tokenfield:removetoken",o);if(this.$element.trigger(s),!s.isDefaultPrevented()){var a=t.Event("tokenfield:removedtoken",o),u=t.Event("change",{initiator:"tokenfield"});n.remove(),this.$element.val(this.getTokensList()).trigger(a).trigger(u),this.$wrapper.find(".token").length&&"click"!==e.type&&!r||this.$input.focus(),this.$input.css("width",this.options.minWidth+"px"),this.update(),e.preventDefault(),e.stopPropagation()}}},update:function(t){var e=this.$input.val(),i=parseInt(this.$input.css("padding-left"),10)+parseInt(this.$input.css("padding-right"),10);if(this.$input.data("edit")){if(e||(e=this.$input.prop("placeholder")),e===this.$mirror.text())return;this.$mirror.text(e);var n=this.$mirror.width()+10;if(n>this.$wrapper.width())return this.$input.width(this.$wrapper.width());this.$input.width(n)}else{if(this.$input.css("width",this.options.minWidth+"px"),"rtl"===this.textDirection)return this.$input.width(this.$input.offset().left+this.$input.outerWidth()-this.$wrapper.offset().left-parseInt(this.$wrapper.css("padding-left"),10)-i-1);this.$input.width(this.$wrapper.offset().left+this.$wrapper.width()+parseInt(this.$wrapper.css("padding-left"),10)-this.$input.offset().left-i)}},focusInput:function(e){if(!(t(e.target).closest(".token").length||t(e.target).closest(".token-input").length||t(e.target).closest(".tt-dropdown-menu").length)){var i=this;setTimeout(function(){i.$input.focus()},0)}},search:function(){this.$input.data("ui-autocomplete")&&this.$input.autocomplete("search")},disable:function(){this.setProperty("disabled",!0)},enable:function(){this.setProperty("disabled",!1)},readonly:function(){this.setProperty("readonly",!0)},writeable:function(){this.setProperty("readonly",!1)},setProperty:function(t,e){this["_"+t]=e,this.$input.prop(t,e),this.$element.prop(t,e),this.$wrapper[e?"addClass":"removeClass"](t)},destroy:function(){this.$element.val(this.getTokensList()),this.$element.css(this.$element.data("original-styles")),this.$element.prop("tabindex",this.$element.data("original-tabindex"));var e=t('label[for="'+this.$input.prop("id")+'"]');return e.length&&e.prop("for",this.$element.prop("id")),this.$element.insertBefore(this.$wrapper),this.$element.removeData("original-styles").removeData("original-tabindex").removeData("bs.tokenfield"),this.$wrapper.remove(),this.$element}};var n=t.fn.tokenfield;return t.fn.tokenfield=function(e,n){var r,o=[];Array.prototype.push.apply(o,arguments);var s=this.each(function(){var s=t(this),a=s.data("bs.tokenfield"),u="object"==typeof e&&e;"string"==typeof e&&a&&a[e]?(o.shift(),r=a[e].apply(a,o)):a||"string"==typeof e||n||s.data("bs.tokenfield",a=new i(this,u))});return void 0!==r?r:s},t.fn.tokenfield.defaults={minWidth:60,minLength:0,allowEditing:!0,limit:0,autocomplete:{},typeahead:{},showAutocompleteOnFocus:!1,createTokensOnBlur:!1,delimiter:",",beautify:!0},t.fn.tokenfield.Constructor=i,t.fn.tokenfield.noConflict=function(){return t.fn.tokenfield=n,this},i},t.exports=e.window&&e.window.$?i(e.window.$):function(t){if(!t.$&&!t.fn)throw new Error("Tokenfield requires a window object with jQuery or a jQuery instance");return i(t.$||t)}}).call(this,i(5))}]]);
//# sourceMappingURL=vendors~seomatic-meta.js.map
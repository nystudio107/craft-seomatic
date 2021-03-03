/*!
 * @project        seomatic
 * @name           seomatic-tokens.js
 * @author         Andrew Welch
 * @build          Wed Mar 03 2021 04:29:35 GMT+0000 (Coordinated Universal Time)
 * @copyright      Copyright (c) 2021 ©2020 nystudio107.com
 *
 */
(self.webpackChunkseomatic=self.webpackChunkseomatic||[]).push([[211],{858:function(e,t,n){"use strict";n(9600),n(1249),n(8309),n(4916),n(3123);var a=n(3895),i=document.querySelector(".seomatic-keywords"),s=void 0;if(i){i.value&&(s=i.value.split(",").map((function(e,t){if(""!==e)return{id:t,name:e}})));var u={el:i,addItemOnBlur:!0,addItemsOnPaste:!0,delimiters:[","]};void 0!==s&&void 0!==s[0]&&(u.setItems=s),new a.Z(u).on("change",(function(e){var t=e._vars.setItems.map((function(e){return e.name}));e.el.value=t.join(",")}))}}},0,[[858,666,216]]]);
//# sourceMappingURL=seomatic-tokens.js.map
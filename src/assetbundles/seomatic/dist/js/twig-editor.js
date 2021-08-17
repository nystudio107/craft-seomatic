/*!
 * @project        seomatic
 * @name           twig-editor.js
 * @author         Andrew Welch
 * @build          Tue Aug 17 2021 17:32:38 GMT+0000 (Coordinated Universal Time)
 * @copyright      Copyright (c) 2021 ©2020 nystudio107.com
 *
 */
(self.webpackChunkseomatic=self.webpackChunkseomatic||[]).push([[840],{7357:function(e,t,s){var i=s(8616);s(1773),s(440),$((function(){$("textarea.seomatic-twig-editor").each((function(){var e=$(this),t=$("<div>",{position:"absolute",width:"98%",height:700,class:e.attr("class")}).insertBefore(e);e.css("display","none");var s=i.edit(t[0]);s.renderer.setShowGutter(e.data("gutter")),s.getSession().setValue(e.val()),s.getSession().setMode("ace/mode/twig"),s.setTheme("ace/theme/github"),s.setFontSize(14),s.setShowPrintMargin(!1),s.setDisplayIndentGuides(!0),s.renderer.setShowGutter(!0),s.setHighlightActiveLine(!1),s.setOptions({minLines:10,maxLines:1/0}),e.closest("form").submit((function(){e.val(s.getSession().getValue())}))}))}))}},function(e){"use strict";e.O(0,[216],(function(){return t=7357,e(e.s=t);var t}));e.O()}]);
//# sourceMappingURL=twig-editor.js.map
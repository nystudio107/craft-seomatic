/*!
 * @project        seomatic
 * @name           javascript-editor.js
 * @author         Andrew Welch
 * @build          Sat Dec 19 2020 02:39:13 GMT+0000 (Coordinated Universal Time)
 * @copyright      Copyright (c) 2020 ©2020 nystudio107.com
 *
 */
(self.webpackChunkseomatic=self.webpackChunkseomatic||[]).push([[339],{9156:function(e,t,s){var i=s(8616);s(4579),s(440),$((function(){$("textarea.seomatic-javascript-editor").each((function(){var e=$(this),t=$("<div>",{position:"absolute",width:"98%",height:700,class:e.attr("class")}).insertBefore(e);e.css("display","none");var s=i.edit(t[0]);s.renderer.setShowGutter(e.data("gutter")),s.getSession().setValue(e.val()),s.getSession().setMode("ace/mode/javascript"),s.setTheme("ace/theme/github"),s.setFontSize(14),s.setShowPrintMargin(!1),s.setDisplayIndentGuides(!0),s.renderer.setShowGutter(!0),s.setHighlightActiveLine(!1),s.session.setUseWorker(!1),s.setOptions({minLines:10,maxLines:1/0}),e.closest("form").submit((function(){e.val(s.getSession().getValue())}))}))}))}},0,[[9156,666,216]]]);
//# sourceMappingURL=javascript-editor.js.map
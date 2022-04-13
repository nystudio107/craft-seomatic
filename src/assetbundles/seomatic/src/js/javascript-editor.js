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
 * @since     3.4.21
 */
// Set the __webpack_public_path__ dynamically so we can work inside of cpresources's hashed dir name
// https://stackoverflow.com/questions/39879680/example-of-setting-webpack-public-path-at-runtime
if (typeof __webpack_public_path__ !== 'string' || __webpack_public_path__ === '') {
  __webpack_public_path__ = window.seomaticBaseAssetsUrl;
}

import * as monaco from 'monaco-editor/esm/vs/editor/editor.api';
import editorTheme from 'monaco-themes/themes/Night Owl.json';
import {getCompletionItemsFromEndpoint} from '@/js/autocomplete.js';

// Set the default theme
monaco.editor.defineTheme('night-owl', editorTheme);
monaco.editor.setTheme('night-owl');

// Create the editor
function makeMonacoEditor(elementId, additionalCompletionsCacheKey) {
  const textArea = document.getElementById(elementId);
  let container = document.createElement('div');
  // Make a sibling div for the Monaco editor to live in
  container.id = elementId + '-monaco-editor';
  container.classList.add('box-content', 'py-4', 'monaco-editor-background-frame', 'w-full', 'h-full');
  textArea.parentNode.insertBefore(container, textArea);
  textArea.style.display = 'none';
  // Create the Monaco editor
  let editor = monaco.editor.create(container, {
    value: textArea.value,
    language: 'twig',
    automaticLayout: true,
    wordWrap: true,
    scrollBeyondLastLine: false,
    lineNumbersMinChars: 4,
    scrollbar: {
      vertical: 'hidden',
      horizontal: 'auto',
    },
    fontSize: 14,
    fontFamily: 'SFMono-Regular, Consolas, "Liberation Mono", Menlo, Courier, monospace',
    minimap: {
      enabled: false
    },
  });
  // Before the form is submitted, copy the changes from the editor to the field
  document.querySelector("#main-form").addEventListener("submit", function (e) {
    textArea.value = editor.getValue();
  });
  // Handle keyboard shortcuts too via beforeSaveShortcut
  Craft.cp.on('beforeSaveShortcut', () => {
    textArea.value = editor.getValue();
  });
  // Get the autocompletion items
  if (typeof additionalCompletionsCacheKey !== 'undefined' && additionalCompletionsCacheKey !== null) {
    getCompletionItemsFromEndpoint(additionalCompletionsCacheKey);
  }
  // Custom resizer to always keep the editor full-height, without needing to scroll
  let ignoreEvent = false;
  const updateHeight = () => {
    const width = editor.getLayoutInfo().width;
    const contentHeight = Math.min(1000, editor.getContentHeight());
    //container.style.width = `${width}px`;
    container.style.height = `${contentHeight}px`;
    try {
      ignoreEvent = true;
      editor.layout({width, height: contentHeight});
    } finally {
      ignoreEvent = false;
    }
  };
  editor.onDidContentSizeChange(updateHeight);
  updateHeight();
}

window.makeMonacoEditor = makeMonacoEditor;

export default makeMonacoEditor;

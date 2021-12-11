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
import * as monaco from 'monaco-editor/esm/vs/editor/editor.api'
import('monaco-themes/themes/Night Owl.json')
    .then(data => {
        monaco.editor.defineTheme('monokai', data);
        monaco.editor.setTheme('monokai');
    });
import codicon from 'monaco-editor/esm/vs/base/browser/ui/codicons/codicon/codicon.ttf';

// Create the editor
let container = document.getElementById('scripts-googleAnalytics-monaco-editor');
let editor = monaco.editor.create(container, {
    value: 'console.log("Hello, world")',
    language: 'twig',
    automaticLayout: true,
    wordWrap: true,
    scrollBeyondLastLine: false,
    lineNumbersMinChars: 4,
    fontSize: 14,
    fontFamily: 'SFMono-Regular, Consolas, "Liberation Mono", Menlo, Courier, monospace',
    minimap: {
        enabled: false
    },
});

require("@/js/autocomplete.js");

let ignoreEvent = false;
const updateHeight = () => {
    const width = editor.getLayoutInfo().width;
    const contentHeight = Math.min(1000, editor.getContentHeight());
    container.style.width = `${width}px`;
    container.style.height = `${contentHeight}px`;
    try {
        ignoreEvent = true;
        editor.layout({ width, height: contentHeight });
    } finally {
        ignoreEvent = false;
    }
};
editor.onDidContentSizeChange(updateHeight);
updateHeight();

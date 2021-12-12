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
import * as monaco from 'monaco-editor/esm/vs/editor/editor.api';
import('monaco-themes/themes/Night Owl.json')
    .then(data => {
        monaco.editor.defineTheme('night-owl', data);
        monaco.editor.setTheme('night-owl');
    });
import codicon from 'monaco-editor/esm/vs/base/browser/ui/codicons/codicon/codicon.ttf';
import { getCompletionItemsFromEndpoint } from '@/js/autocomplete.js';

// Create the editor
function makeMonacoEditor(elementId, additionalCompletionsCacheKey) {
    const textArea = document.getElementById(elementId);
    let container = document.createElement('div');
    container.id = elementId + '-monaco-editor';
    container.classList.add('py-4', 'bg-black', 'w-full', 'h-full');
    textArea.parentNode.insertBefore(container, textArea);
    textArea.style.display = 'none';
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

    // Get the autocompletion items
    getCompletionItemsFromEndpoint(additionalCompletionsCacheKey);

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

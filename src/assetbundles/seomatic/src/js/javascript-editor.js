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

monaco.languages.registerCompletionItemProvider('twig', {
    provideCompletionItems: getCompletionItems,
});

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

function getCompletionItems()
{
    let suggestions = [
        {
            label: 'sprig',
            insertText: 'sprig',
            kind: monaco.languages.CompletionItemKind.Function,
            sortText: '_sprig',
        },
    ];

    let suggestionLabels = [
        's-action=""',
        's-method=""', 's-method="post"',
        's-boost=""', 's-boost="true"',
        's-confirm=""', 's-confirm="Are you sure?"',
        's-disable=""',
        's-encoding=""', 's-encoding="multipart/form-data"',
        's-headers=""',
        's-history-elt=""',
        's-include=""',
        's-indicator=""',
        's-params=""',
        's-preserve=""', 's-preserve="true"',
        's-prompt=""',
        's-push-url=""',
        's-request=""',
        's-select=""',
        's-swap=""', 's-swap="innerHTML"', 's-swap="outerHTML"', 's-swap="beforebegin"', 's-swap="afterbegin"', 's-swap="beforeend"', 's-swap="afterend"',
        's-swap-oob=""',
        's-target=""', 's-target="this"',
        's-trigger=""', 's-trigger="click"', 's-trigger="change"', 's-trigger="submit"',
        's-val-x="1"', 's-val-y="2"',
    ];

    for (let i = 0; i < suggestionLabels.length; i++) {
        suggestions[i + 1] = {
            label: suggestionLabels[i],
            insertText: suggestionLabels[i],
            kind: monaco.languages.CompletionItemKind.Field,
        };
    }

    return {
        suggestions: suggestions,
    };
}

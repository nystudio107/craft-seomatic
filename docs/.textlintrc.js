module.exports = {
    rules: {
        '@textlint-rule/no-unmatched-pair': true,
        apostrophe: true,
        'common-misspellings': true,
        diacritics: true,
        'en-capitalization': {
            allowHeading: false
        },
        'stop-words': {
            severity: 'warning'
        },
        terminology: {
            terms: `${__dirname}/.textlint.terms.json`,
            exclude: [
                "front[- ]end(\\w*)",
                "back[- ]end(\\w*)",
                "command ?line",
                "PDF",
                "PNG",
                "JPG",
                "GIF",
                "HTML",
                "CSS",
                "ID",
                "Markdown",
                "URL",
                "walk[- ]through",
                "web[- ]?site(s)?"
            ]
        },
        'write-good': {
            severity: 'warning'
        }
    },
    filters: {
        comments: true
    }
}

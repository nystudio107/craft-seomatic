module.exports = {
    title: 'SEOmatic Plugin Documentation',
    description: 'Documentation for the SEOmatic plugin',
    base: '/docs/seomatic/',
    lang: 'en-US',
    head: [
        ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
        ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
        ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
        ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
    ],
    themeConfig: {
        repo: 'nystudio107/craft-seomatic',
        docsDir: 'docs/docs',
        docsBranch: 'develop',
        algolia: {
            appId: '4PN983E5JW',
            apiKey: '11a4ca78dc541ab3d184c4fa1ce03e44',
            indexName: 'seomatic'
        },
        editLinks: true,
        editLinkText: 'Edit this page on GitHub',
        lastUpdated: 'Last Updated',
        sidebar: [
            {text: 'SEOmatic Plugin', link: '/'},
            {text: 'SEOmatic Overview', link: '/overview.html'},
            {text: 'Issues & Upgrading', link: '/issues.html'},
            {text: 'SEO Resources', link: '/resources.html'},
            {text: 'SEO Technologies', link: '/technologies.html'},
            {text: 'Configuring SEOmatic', link: '/configuring.html'},
            {text: 'SEOmatic Fields', link: '/fields.html'},
            {text: 'Using SEOmatic', link: '/using.html'},
            {text: 'Advanced Usage', link: '/advanced.html'},
        ],
    },
};

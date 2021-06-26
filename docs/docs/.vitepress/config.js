module.exports = {
    title: 'SEOmatic Plugin Documentation',
    description: 'Documentation for the SEOmatic plugin',
    base: '/docs/seomatic/',
    lang: 'en-US',
    head: [
        ['meta', { content: 'https://github.com/nystudio107', property: 'og:see_also', }],
        ['meta', { content: 'https://www.youtube.com/channel/UCOZTZHQdC-unTERO7LRS6FA', property: 'og:see_also', }],
        ['meta', { content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also', }],
    ],
    themeConfig: {
        repo: 'nystudio107/craft-seomatic',
        docsDir: 'docs/docs',
        docsBranch: 'v3',
        algolia: {
            apiKey: '',
            indexName: 'seomatic'
        },
        editLinks: true,
        editLinkText: 'Edit this page on GitHub',
        lastUpdated: 'Last Updated',
        sidebar: [
            { text: 'SEOmatic Plugin', link: '/' },
            { text: 'SEOmatic Overview', link: '/overview' },
            { text: 'Issues & Upgrading', link: '/issues' },
            { text: 'SEO Resources', link: '/resources' },
            { text: 'SEO Technologies', link: '/technologies' },
            { text: 'Configuring SEOmatic', link: '/configuring' },
            { text: 'SEOmatic Fields', link: '/fields' },
            { text: 'Using SEOmatic', link: '/using' },
            { text: 'Advanced Usage', link: '/advanced' },
        ],
    },
};

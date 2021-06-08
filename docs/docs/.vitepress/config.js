module.exports = {
    title: 'SEOmatic Documentation',
    description: 'Documentation for the SEOmatic plugin',
    base: '/docs/seomatic/',
    lang: 'en-US',
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

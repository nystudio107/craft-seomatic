module.exports = {
    title: 'SEOmatic Documentation',
    description: 'Documentation for the SEOmatic plugin',
    base: '/docs/seomatic/',
    lang: 'en-US',
    head: [
        [
            'script',
            {},
            "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-69117511-1', 'auto');ga('require', 'displayfeatures');ga('send', 'pageview');"
        ],
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

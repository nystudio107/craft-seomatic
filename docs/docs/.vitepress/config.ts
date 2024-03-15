import {defineConfig} from 'vitepress'

export default defineConfig({
  title: 'SEOmatic Plugin',
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
    socialLinks: [
      {icon: 'github', link: 'https://github.com/nystudio107'},
      {icon: 'twitter', link: 'https://twitter.com/nystudio107'},
    ],
    logo: '/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-seomatic/edit/develop-v5/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: '4PN983E5JW',
      apiKey: '11a4ca78dc541ab3d184c4fa1ce03e44',
      indexName: 'seomatic',
      searchParameters: {
        facetFilters: ["version:v5"],
      },
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [
      {
        text: 'Getting Started',
        items: [
          {text: 'Features & Installation', link: '/'},
          {text: 'Overview', link: '/overview'},
          {text: 'Issues & Upgrading', link: '/issues'},
          {text: 'What it Does', link: '/what-it-does'},
        ],
      },
      {
        text: 'Using SEOmatic',
        items: [
          {
            text: 'Configuration',
            link: '/configuring/',
            collapsed: true,
            items: [
              {text: 'Dashboard', link: '/configuring/dashboard'},
              {text: 'Global SEO', link: '/configuring/global-seo'},
              {text: 'Content SEO', link: '/configuring/content-seo'},
              {text: 'Site Settings', link: '/configuring/site-settings'},
              {text: 'Tracking Scripts', link: '/configuring/tracking-scripts'},
              {text: 'Plugin Settings', link: '/configuring/plugin-settings'},
              {text: 'Multi-Environment Config Settings', link: '/configuring/multi-environment'},
              {text: 'Access Permissions', link: '/configuring/access-permissions'},
            ]
          },
          {
            text: 'Twig Templating',
            link: '/using/',
            collapsed: true,
            items: [
              {text: '???', link: '/using/empty-coalesce-operator'},
              {text: 'seomatic.meta', link: '/using/meta-variables'},
              {text: 'seomatic.site', link: '/using/site-variables'},
              {text: 'seomatic.config', link: '/using/config-variables'},
              {text: 'seomatic.helper', link: '/using/helper-functions'},
              {text: 'seomatic.jsonLd', link: '/using/json-ld-meta'},
              {text: 'seomatic.link', link: '/using/link-meta'},
              {text: 'seomatic.script', link: '/using/script-meta'},
              {text: 'seomatic.tag', link: '/using/tag-meta'},
              {text: 'seomatic.title', link: '/using/title-meta'},
              {text: 'Pagination', link: '/using/pagination'},
              {text: 'Meta Containers', link: '/using/meta-containers'},
            ]
          },
          {text: 'SEO Settings Field', link: '/fields'},
          {text: 'Multi-Site', link: '/multi-site'},
          {text: 'Google AMP', link: '/google-amp'},
          {text: 'Advanced Usage', link: '/advanced'},
        ],
      },
      {
        text: 'SEO Reference',
        items: [
          {text: 'Resources', link: '/resources'},
        ],
      },
    ],
    nav: [
      {text: 'Home', link: 'https://nystudio107.com/plugins/seomatic'},
      {text: 'Store', link: 'https://plugins.craftcms.com/seomatic'},
      {text: 'Changelog', link: 'https://nystudio107.com/plugins/seomatic/changelog'},
      {text: 'Issues', link: 'https://github.com/nystudio107/craft-seomatic/issues'},
      {
        text: 'v5', items: [
          {text: 'v5', link: '/'},
          {text: 'v4', link: 'https://nystudio107.com/docs/seomatic/v4/'},
          {text: 'v3', link: 'https://nystudio107.com/docs/seomatic/v3/'},
        ],
      },
    ],
  },
});

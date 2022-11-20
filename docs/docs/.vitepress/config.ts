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
    logo: '/resources/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-seomatic/edit/develop/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: '4PN983E5JW',
      apiKey: '11a4ca78dc541ab3d184c4fa1ce03e44',
      indexName: 'seomatic'
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [
      {
        text: 'Topics',
        items: [
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
      }
    ],
  },
});

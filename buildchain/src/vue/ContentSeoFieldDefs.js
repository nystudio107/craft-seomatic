// Field definitions for ContentSeoTable.vue
export default [
  {
    name: '__component:content-seo-url',
    sortField: 'sourceName',
    title: 'Name',
    titleClass: 'text-left',
    dataClass: 'text-left',
  },
  {
    name: 'entries',
    title: 'Entries',
    titleClass: 'text-right',
    dataClass: 'text-right',
  },
  {
    name: 'sourceType',
    sortField: 'sourceType',
    title: 'Type',
    titleClass: 'text-left',
    dataClass: 'text-left',
  },
  {
    name: 'title',
    title: 'Title',
    titleClass: 'text-center',
    dataClass: 'text-center',
    callback: 'settingFormatter',
  },
  {
    name: 'description',
    title: 'Description',
    titleClass: 'text-center',
    dataClass: 'text-center',
    callback: 'settingFormatter',
  },
  {
    name: 'image',
    title: 'Image',
    titleClass: 'text-center',
    dataClass: 'text-center',
    callback: 'settingFormatter',
  },
  {
    name: 'robots',
    title: 'Robots',
    titleClass: 'text-left',
    dataClass: 'text-left',
  },
  {
    name: 'sitemap',
    title: 'Sitemap',
    titleClass: 'text-center',
    dataClass: 'text-center',
    callback: 'settingFormatter',
  },
  {
    name: 'sitemapPriority',
    title: 'Priority',
    titleClass: 'text-right',
    dataClass: 'text-right',
  },
  {
    name: 'sitemapFrequency',
    title: 'Frequency',
    titleClass: 'text-left',
    dataClass: 'text-left',
  },
];

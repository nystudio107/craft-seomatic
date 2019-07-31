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
        titleClass: 'text-center',
        dataClass: 'text-center',
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
        name: 'sitemap',
        title: 'Sitemap',
        titleClass: 'text-center',
        dataClass: 'text-center',
        callback: 'settingFormatter',
    },
    {
        name: 'robots',
        title: 'Robots',
        titleClass: 'text-center',
        dataClass: 'text-center',
    },
];

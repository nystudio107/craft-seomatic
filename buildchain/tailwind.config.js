// module exports
module.exports = {
  content: [
    '../src/templates/**/*.{twig,html}',
    '../src/assetbundles/seomatic/src/**/*.{vue,html,js}',
  ],
  layers: [
    'base',
    'components',
    'utilities',
  ],
  mode: 'layers',
  options: {
    whitelist: [
      '../src/assetbundles/seomatic/src/css/components/*.css',
      './node_modules/tokenfield/dist/tokenfield.css',
      './node_modules/@riophae/vue-treeselect/dist/vue-treeselect.css'
    ],
  },
  theme: {
  },
  corePlugins: {},
  plugins: [],
};

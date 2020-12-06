// module exports
module.exports = {
  purge: {
    content: [
      '../src/templates/**/*.{twig,html}',
      '../src/assetbundles/seomatic/src/vue/**/*.{vue,html}',
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
    }
  },
  theme: {
  },
  corePlugins: {},
  plugins: [],
};

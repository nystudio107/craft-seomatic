// module exports
module.exports = {
  purge: {
    content: [
      '../cms/templates/**/*.{twig,html}',
      '../src/vue/**/*.{vue,html}',
      "./node_modules/vuetable-2/src/components/**/*.{vue,html}",
    ],
    layers: [
      'base',
      'components',
      'utilities',
    ],
    mode: 'layers',
    options: {
      whitelist: [
        '../src/css/components/**/*.{css}',
      ],
    }
  },
  theme: {
  },
  corePlugins: {},
  plugins: [],
};

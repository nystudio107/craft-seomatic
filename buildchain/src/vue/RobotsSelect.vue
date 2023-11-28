<!-- Vue SFC -->
<template>
  <div class="field">
    <div class="py-3">
      <treeselect
        ref="robotsselect"
        v-model="componentValue"
        :multiple="true"
        :flat="true"
        :disable-branch-nodes="true"
        :default-expand-level="0"
        :options="options"
        :disabled="disabled"
      >
        <div
          slot="value-label"
          slot-scope="{ node }"
        >
          {{ node.raw.customLabel }}
        </div>
      </treeselect>
    </div>
  </div>
</template>

<script>
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

const robotsValues = {
  'all': Craft.t("seomatic", "There are no restrictions for indexing or serving. (default)"),
  'noindex': Craft.t("seomatic", "Do not show this page, media, or resource in search results."),
  'nofollow': Craft.t("seomatic", "Do not follow the links on this page."),
  'none': Craft.t("seomatic", "Equivalent to noindex, nofollow."),
  'noarchive': Craft.t("seomatic", "Do not show a cached link in search results."),
  'nositelinkssearchbox': Craft.t("seomatic", "Do not show a sitelinks search box in the search results for this page."),
  'nosnippet': Craft.t("seomatic", "Do not show a text snippet or video preview in the search results for this page."),
  'indexifembedded': Craft.t("seomatic", "Google is allowed to index the content of a page if it's embedded in another page through iframes or similar HTML tags, in spite of a noindex directive."),
  'max-snippet:0': Craft.t("seomatic", "No snippet is to be shown. Equivalent to nosnippet."),
  'max-snippet:-1': Craft.t("seomatic", "Google will choose the snippet length that it believes is most effective. (default)"),
  'max-image-preview:none': Craft.t("seomatic", "No image preview is to be shown."),
  'max-image-preview:standard': Craft.t("seomatic", "A default image preview may be shown. (default)"),
  'max-image-preview:large': Craft.t("seomatic", "A larger image preview, up to the width of the viewport, may be shown."),
  'max-video-preview:0': Craft.t("seomatic", "At most, a static image may be used, in accordance to the max-image-preview setting."),
  'max-video-preview:-1': Craft.t("seomatic", "There is no limit. (default)"),
  'notranslate': Craft.t("seomatic", "Don't offer translation of this page in search results."),
  'noimageindex': Craft.t("seomatic", "Do not index images on this page."),
};
export default {
  // register the component
  components: {Treeselect},
  props: {
    value: {type: String, default: null},
    inputId: {type: String, default: null},
    disabled: {type: Boolean, default: false}
  },
  data() {
    return {
      // define the default value
      componentValue: null,
      // define options
      options: Object.entries(robotsValues).map(([value, desc]) => ({
        id: value,
        label: `${value} - ${desc}`,
        customLabel: value,
      })),
    }
  },
  computed: {
    stringValue() {
      return this.jsonValue.join(',');
    },
    jsonValue() {
      let val = this.value;
      if (typeof val === 'undefined' || val === '') {
        val = 'all';
      }
      return val.split(',');
    },
  },
  mounted() {
    this.componentValue = this.jsonValue;
    this.$refs.robotsselect.$on('input', (value) => {
      if (typeof value === 'undefined' || value.length === 0) {
        value = ['all'];
      }
      document.getElementById(this.inputId).value = value.join(',');
    });
  },
}
</script>

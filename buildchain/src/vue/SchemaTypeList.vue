<!-- Vue SFC -->
<template>
  <div class="field">
    <div class="py-3">
      <treeselect
        ref="treeselect"
        v-model="value"
        :multiple="false"
        :flat="false"
        :default-expand-level="0"
        :options="options"
        :disabled="disabled"
      />
    </div>
    <div
      v-if="schemaName !== null"
      class="heading"
    >
      <div class="instructions">
        <p>
          <a
            :href="'http://schema.org/' + schemaName"
            rel="noopener"
            target="_blank"
          >{{ schemaName }} info: </a>
          <span v-html="renderHtml(schemaDescription)" />
        </p>
        <p v-if="Object.keys(schemaRichSnippetUrls).length">
          <a
            href="https://developers.google.com/search/docs/appearance/structured-data/search-gallery"
            target="_blank"
          >
            {{ stringGoogleRichResults }}:
          </a>
          {{ stringGoogleRichResultsDescription }}:
          <ul>
            <li
              v-for="(value, name, index) in schemaRichSnippetUrls"
              :key="index"
            >
              <a
                :href="value"
                target="_blank"
              >
                {{ name }}
              </a>
            </li>
          </ul>
        </p>
        <p v-if="schemaPending">
          <a
            href="https://schema.org/docs/pending.home.html"
            target="_blank"
          >
            {{ stringPendingSchema }}:
          </a>
          {{ stringPendingSchemaDescription }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import VueAxios from 'vue-axios'
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

Vue.use(VueAxios, axios);

export default {
  // register the component
  components: {Treeselect},
  props: {
    entity: {type: String, default: null},
    disabled: {type: Boolean, default: false}
  },
  data() {
    return {
      schemaName: null,
      schemaDescription: null,
      schemaPending: false,
      schemaRichSnippetUrls: {},
      // define the default value
      value: null,
      // Translated strings
      stringPendingSchema: Craft.t('seomatic', 'Pending schema'),
      stringPendingSchemaDescription: Craft.t('seomatic', 'The Pending Section is a staging area for work-in-progress terms which have yet to be accepted into the core vocabulary. Pending terms are subject to change and should be used with caution.'),
      stringGoogleRichResults: Craft.t('seomatic', 'Google rich results'),
      stringGoogleRichResultsDescription: Craft.t('seomatic', 'Some schema types are eligible to appear as a rich result on Google search engine result pages. Related rich results'),
      // define options
      options: [],
    }
  },
  watch: {
    schemaName: function () {
      let action = 'get-type-info';
      const api = Craft.getActionUrl('seomatic/json-ld/' + action + '?schemaType=' + this.schemaName);
      this.axios.get(api).then((response) => {
        if (response.data) {
          if (response.data) {
            this.schemaDescription = response.data.schema.schemaTypeDescription;
            this.schemaPending = response.data.meta.schemaPending;
            this.schemaRichSnippetUrls = response.data.meta.schemaRichSnippetUrls;
          }
        }
      });
    }
  },
  mounted() {
    let action = 'get-type-tree';
    const api = Craft.getActionUrl('seomatic/json-ld/' + action);
    this.value = this.entity;
    this.axios.get(api).then((response) => {
      if (response.data) {
        this.options = response.data;
      }
    });
    this.$refs.treeselect.$on('input', (value) => {
      if (value === undefined) {
        this.schemaName = null;
      } else {
        let parts = value.split('.');
        this.schemaName = parts[parts.length - 1];
      }
      $(document).trigger('schema-value-changed', value);
    });
  },
  methods: {
    renderHtml(text) {
      return `${text}`;
    }
  },
}
</script>

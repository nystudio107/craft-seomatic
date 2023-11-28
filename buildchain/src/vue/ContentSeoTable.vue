<template>
  <div class="py-4">
    <vuetable-filter-bar />
    <div class="vuetable-pagination clearafter">
      <vuetable-pagination-info ref="paginationInfoTop" />
      <vuetable-pagination
        ref="paginationTop"
        @vuetable-pagination:change-page="onChangePage"
      />
    </div>
    <vuetable
      ref="vuetable"
      :api-url="apiUrl"
      :per-page="20"
      :fields="fields"
      :css="css"
      :sort-order="sortOrder"
      :append-params="moreParams"
      @vuetable:pagination-data="onPaginationData"
    />
    <div class="vuetable-pagination clearafter">
      <vuetable-pagination-info ref="paginationInfo" />
      <vuetable-pagination
        ref="pagination"
        @vuetable-pagination:change-page="onChangePage"
      />
    </div>
  </div>
</template>

<script>
import FieldDefs from '@/vue/ContentSeoFieldDefs.js';
import ContentSeoUrl from '@/vue/ContentSeoUrl.vue';
import VueTable from 'vuetable-2/src/components/Vuetable.vue';
import VueTablePagination from '@/vue/VuetablePagination.vue';
import VueTablePaginationInfo from '@/vue/VuetablePaginationInfo.vue';
import VueTableFilterBar from '@/vue/VuetableFilterBar.vue';

Vue.component('ContentSeoUrl', ContentSeoUrl);
// Our component exports
export default {
  components: {
    'vuetable': VueTable,
    'vuetable-pagination': VueTablePagination,
    'vuetable-pagination-info': VueTablePaginationInfo,
    'vuetable-filter-bar': VueTableFilterBar,
  },
  props: {
    siteId: {
      type: Number,
      default: 0,
    },
    apiUrl: {
      type: String,
      default: '',
    },
    refreshIntervalSecs: {
      type: Number,
      default: 0,
    },
  },
  data: function () {
    return {
      moreParams: {
        'siteId': this.siteId,
      },
      css: {
        tableClass: 'data fullwidth seomatic-content-seo',
        ascendingIcon: 'menubtn seomatic-menubtn-asc',
        descendingIcon: 'menubtn seomatic-menubtn-desc'
      },
      sortOrder: [
        {
          field: '__component:content-seo-url',
          sortField: 'sourceName',
          direction: 'asc'
        }
      ],
      fields: FieldDefs,
    }
  },
  mounted() {
    this.$events.$on('filter-set', eventData => this.onFilterSet(eventData));
    this.$events.$on('filter-reset', e => this.onFilterReset(e));
    // Live refresh the data
    if (this.refreshIntervalSecs) {
      setInterval(() => {
        if ((typeof this.$refs.pagination !== 'undefined') && (this.$refs.pagination.isOnFirstPage)) {
          if (typeof this.$refs.vuetable !== 'undefined') {
            this.$refs.vuetable.refresh();
          }
        }
      }, this.refreshIntervalSecs * 1000);
    }
  },
  methods: {
    onFilterSet(filterText) {
      this.moreParams = {
        'siteId': this.siteId,
        'filter': filterText,
      };
      this.$events.fire('refresh-table', this.$refs.vuetable);
    },
    onFilterReset() {
      this.moreParams = {
        'siteId': this.siteId,
      };
      this.$events.fire('refresh-table', this.$refs.vuetable);
    },
    onPaginationData(paginationData) {
      this.$refs.paginationTop.setPaginationData(paginationData);
      this.$refs.paginationInfoTop.setPaginationData(paginationData);

      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
    },
    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },
    urlFormatter(value) {
      if (value === '') {
        return '';
      }
      return `
                <a class="go" href="${value}" title="${value}" target="_blank" rel="noopener">${value}</a>
                `;
    },
    settingFormatter(value) {
      return `
                <span class='status ${value} inline-item'></span>
                `;
    },
  }
}
</script>

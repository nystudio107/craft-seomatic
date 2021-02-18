import VueEvents from 'vue-events';
import ContentSeoTable from '@vue/ContentSeoTable.vue';

Vue.use(VueEvents);
// Create our vue instance
const vm = new Vue({
    el: "#cp-nav-content",
    components: {
        'content-seo-table': ContentSeoTable,
    },
    data: {},
    methods: {
        onTableRefresh(vuetable) {
            Vue.nextTick(() => vuetable.refresh());
        }
    },
    mounted() {
        this.$events.$on('refresh-table', eventData => this.onTableRefresh(eventData));
    },
});

// Accept HMR as per: https://webpack.js.org/api/hot-module-replacement#accept
if (module.hot) {
    module.hot.accept();
}

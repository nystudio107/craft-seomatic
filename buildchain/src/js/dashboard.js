import Vue from 'vue';
import ConfettiParty from '@/vue/ConfettiParty.vue';
import DashboardMultiRadialChart from '@/vue/DashboardMultiRadialChart.vue';
import DashboardRadialChart from '@/vue/DashboardRadialChart.vue';

// Create our vue instance
new Vue({
  el: "#cp-nav-content",
  components: {
    ConfettiParty,
    'dashboard-multi-radial-chart': DashboardMultiRadialChart,
    'dashboard-radial-chart': DashboardRadialChart,
  },
  data: {},
  methods: {},
});

// Accept HMR as per: https://vitejs.dev/guide/api-hmr.html
if (import.meta.hot) {
  import.meta.hot.accept(() => {
    console.log("HMR")
  });
}

import Vue from 'vue';
import Confetti from '../vue/Confetti.vue';
import DashboardMultiRadialChart from '../vue/DashboardMultiRadialChart.vue';
import DashboardRadialChart from '../vue/DashboardRadialChart.vue';

// Create our vue instance
const vm = new Vue({
    el: "#cp-nav-content",
    components: {
        'confetti': Confetti,
        'dashboard-multi-radial-chart': DashboardMultiRadialChart,
        'dashboard-radial-chart': DashboardRadialChart,
    },
    data: {
    },
    methods: {
    },
    mounted() {
    },
});

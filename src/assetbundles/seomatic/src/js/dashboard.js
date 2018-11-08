import Vue from 'vue';
import Confetti from '../vue/Confetti.vue';
import DashboardChart from '../vue/DashboardChart.vue';

// Create our vue instance
const vm = new Vue({
    el: "#cp-nav-content",
    components: {
        'confetti': Confetti,
        'dashboard-chart': DashboardChart,
    },
    data: {
    },
    methods: {
    },
    mounted() {
    },
});

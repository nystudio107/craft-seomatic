<template>
    <apexcharts width="100%" height="200px" type="donut" :options="chartOptions" :series="series"></apexcharts>
</template>

<script>
    import ApexCharts from 'vue-apexcharts';

    // Our component exports
    export default {
        components: {
            'apexcharts': ApexCharts,
        },
        props: {
            colors: Array,
            labels: Array,
            series: Array,
        },
        methods: {
        },
        created: function() {
            console.log(this.series);
        },
        data: function() {
            return {
                chartOptions: {
                    chart: {
                        id: 'temp-chart',
                        toolbar: {
                            show: false,
                        },
                    },
                    colors: this.colors,
                    labels: this.labels,
                },
            }
        },
    }
</script>

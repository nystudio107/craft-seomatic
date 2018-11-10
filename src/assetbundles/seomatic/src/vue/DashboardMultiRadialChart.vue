<template>
    <apexcharts width="100%" height="410px" type="radialBar" :options="chartOptions" :series="series"></apexcharts>
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
            showLabels: {type: Boolean, default: false},
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
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        radialBar: {
                            dataLabels: {
                                name: {
                                    show: true
                                },
                                value: {
                                    offsetY: 5,
                                    fontSize: '24px',
                                    color: undefined,
                                    formatter: function (val) {
                                        return val + "%";
                                    }
                                }
                            },
                            hollow: {
                                margin: 0,
                                size: '32%',
                                background: '#fff',
                                position: 'front',
                            },
                            track: {
                                background: '#EEE',
                                strokeWidth: '98%',
                                margin: 5, // margin is in pixels
                            },
                        },
                    },
                    stroke: {
                        lineCap: 'round'
                    },
                    legend: {
                        verticalAlign: 'middle',
                    },
                    colors: this.colors,
                    labels: this.labels,
                },
            }
        },
    }
</script>

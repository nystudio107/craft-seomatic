<template>
    <apexcharts class="cursor-pointer" width="100%" height="300px" type="radialBar" :options="chartOptions" :series="series"></apexcharts>
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
            url: {type: String, default: ''},
        },
        methods: {
        },
        created: function() {
        },
        data: function() {
            return {
                chartOptions: {
                    chart: {
                        toolbar: {
                            show: false,
                        },
                        events: {
                            click: (event, chartContext, config) => {
                                console.log(this.url);
                                window.location = this.url;
                            }
                        },
                    },
                    plotOptions: {
                        radialBar: {
                            dataLabels: {
                                name: {
                                    show: true
                                },
                                value: {
                                    fontSize: '24px',
                                    offsetY: 5,
                                    color: undefined,
                                    formatter: function (val) {
                                        return val + "%";
                                    }
                                }
                            },
                            hollow: {
                                margin: 0,
                                size: '72%',
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

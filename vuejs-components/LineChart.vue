<template>
    <canvas></canvas>
</template>

<script>
    export default {
        data() {
            return {
                chart: {},
                datasets: []
            };
        },

        props: {
            backgrounds: {
                type: Array,
                required: true
            },

            colors: {
                type: Array,
                required: true
            },

            labels: {
                type: Array,
                required: true
            },

            legends: {
                type: Array,
                required: true
            },

            type: {
                type: String,
                default: 'line'
            },

            values: {
                type: Array,
                required: true
            }
        },

        mounted() {
            this.build();

            this.render();
        },

        methods: {
            build() {
                _.forEach(this.values, (values, index) => {
                    this.datasets.push({
                        backgroundColor: this.backgrounds[index],
                        borderColor: this.colors[index],
                        borderWidth: 2,
                        data: this.values[index],
                        label: this.legends[index],
                        pointBackgroundColor: this.colors[index],
                        pointStyle: 'rectRounded'
                    });
                });
            },

            render() {
                this.chart = new Chart(this.$el, {
                    type: this.type,
                    data: {
                        labels: this.labels,
                        datasets: this.datasets
                    },
                    options: {
                        legend: {
                            labels: {
                                boxWidth: 25
                            },
                            position: 'bottom'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    precision: 0
                                }
                            }]
                        }
                    }
                });
            }
        }
    };
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <GChart
                                type="ColumnChart"
                                :data="chartData"
                                :options="chartOptions"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { GChart } from "vue-google-charts";
    import axios from 'axios'
    export default {
        data() {
            return {
                legends: [],
                // Array will be automatically processed with visualization.arrayToDataTable function
                chartData: [
                    [this.legends]
                ],
                chartOptions: {
                    chart: {
                        title: "Company Performance",
                        subtitle: "Sales, Expenses, and Profit: 2014-2017"
                    }
                }
            };
        },

        mounted() {
            return axios.get('home').then(response=> {
                this.legends = Object.keys(response.data[0]);
                console.log(typeof this.legends)

            }).catch(error => {
                console.log(error);
            })
        }
    }
</script>

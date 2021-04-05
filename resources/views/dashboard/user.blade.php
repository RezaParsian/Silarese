@extends('dashboard.layouts.master')

@section('dashboard', 'current')
@section('title', ' کاربر')

@section('body')
    <div class="modal" id="userinfomodal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">کارکرد</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="app">
                        <chartjs-pie v-bind:labels="labels" v-bind:data="dataset" :bind="true"></chartjs-pie>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                </div>

            </div>
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered text-center table-striped table-hover table-responsive-md">
                    <thead>
                    <th>ردیف</th>
                    <th>تاریخ</th>
                    <th>منطقه زمانی</th>
                    <th>مدیریت</th>
                    </thead>
                    <tbody>
                    @foreach ($userInfo as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="ltr text-center">{{ $user->date }}</td>
                            <td>{{ $user->timezone }}</td>
                            <td>
                                <button  data-toggle="modal" onclick="makePieChart('{{$user->upright}}','{{$user->slouched}}')"
                                         data-target="#userinfomodal"
                                         class="btn
                                btn-warning
                                text-dark">نمایش</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section("ex-js")
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js'></script>
    <script src='https://unpkg.com/hchs-vue-charts@1.2.8'></script>
    <script>
        'use strict';

        Vue.use(VueCharts);
        var app = new Vue({
            el: '#app',
            data: function data() {
                return {
                    dataentry: null,
                    datalabel: null,
                    labels: ['upright', 'slouched'],
                    dataset: [1,1]
                };
            },

            methods: {
                addData: function addData() {
                    this.dataset.push(this.dataentry);
                    this.labels.push(this.datalabel);
                    this.datalabel = '';
                    this.dataentry = '';
                }
            }
        });

        function makePieChart(upright,slouched){
            app.dataset=[upright,slouched];
        }
    </script>
@endsection

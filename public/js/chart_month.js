Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Biểu đồ doanh thu theo thời gian'
    },
    subtitle: {
        align: 'left',
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Biểu đồ doanh thu theo thời gian'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.f} vnd'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: ''
        // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },
    @php
      $total = 0;
      foreach($days as $value){
        $total += $value->order_totalDiscount ?? $value->order_total;
      }
    @endphp
    
    series: [
        {
            name: "Doanh thu",
            colorByPoint: true,
            data: [
              @php
              for($i = 0; $i< count($allDay); $i++) {
              @endphp
                {             
                    name:{!! '"'.$allDay[$i].'"' !!},
                    y: {{$allTotal[$i]}},
                    drilldown: "Firefox"
                },
              @php
                }
              @endphp
                // {
                //     name: "Tháng 2",
                //     y: 10.57,
                //     drilldown: "Firefox"
                // },
                // {
                //     name: "Tháng 3",
                //     y: 10.57,
                //     drilldown: "Firefox"
                // },
                // {
                //     name: "Tháng 4",
                //     y: 10.57,
                //     drilldown: "Firefox"
                // },
                // {
                //     name: "Tháng 5",
                //     y: {{$total}},
                //     drilldown: "Chrome"
                // },
                // {
                //     name: "Tháng 6",
                //     y: 10.57,
                //     drilldown: "Firefox"
                // },
                // {
                //     name: "Tháng 7",
                //     y: 7.23,
                //     drilldown: "Internet Explorer"
                // },
                // {
                //     name: "Tháng 8",
                //     y: 5.58,
                //     drilldown: "Safari"
                // },
                // {
                //     name: "Tháng 9",
                //     y: 4.02,
                //     drilldown: "Edge"
                // },
                // {
                //     name: "Tháng 10",
                //     y: 1.92,
                //     drilldown: "Opera"
                // },
                // {
                //     name: "Tháng 11",
                //     y: 7.62,
                //     drilldown: "Opera"
                // }
                // {
                //     name: "Tháng 12",
                //     y: 7.62,
                //     drilldown: "Opera"
                // }
            ]
        }
    ],
    drilldown: {
        breadcrumbs: {
            position: {
                align: 'right'
            }
        },
        series: [
            {
                name: "Chrome",
                id: "Chrome",
                data: [
                    [
                        "v65.0",
                        0.1
                    ],
                    [
                        "v64.0",
                        1.3
                    ],
                    [
                        "v63.0",
                        53.02
                    ],
                    [
                        "v62.0",
                        1.4
                    ],
                    [
                        "v61.0",
                        0.88
                    ],
                    [
                        "v60.0",
                        0.56
                    ],
                    [
                        "v59.0",
                        0.45
                    ],
                    [
                        "v58.0",
                        0.49
                    ],
                    [
                        "v57.0",
                        0.32
                    ],
                    [
                        "v56.0",
                        0.29
                    ],
                    [
                        "v55.0",
                        0.79
                    ],
                    [
                        "v54.0",
                        0.18
                    ],
                    [
                        "v51.0",
                        0.13
                    ],
                    [
                        "v49.0",
                        2.16
                    ],
                    [
                        "v48.0",
                        0.13
                    ],
                    [
                        "v47.0",
                        0.11
                    ],
                    [
                        "v43.0",
                        0.17
                    ],
                    [
                        "v29.0",
                        0.26
                    ]
                ]
            },
            
            // {
            //     name: "Firefox",
            //     id: "Firefox",
            //     data: [
            //         [
            //             "v58.0",
            //             1.02
            //         ],
            //         [
            //             "v57.0",
            //             7.36
            //         ],
            //         [
            //             "v56.0",
            //             0.35
            //         ],
            //         [
            //             "v55.0",
            //             0.11
            //         ],
            //         [
            //             "v54.0",
            //             0.1
            //         ],
            //         [
            //             "v52.0",
            //             0.95
            //         ],
            //         [
            //             "v51.0",
            //             0.15
            //         ],
            //         [
            //             "v50.0",
            //             0.1
            //         ],
            //         [
            //             "v48.0",
            //             0.31
            //         ],
            //         [
            //             "v47.0",
            //             0.12
            //         ]
            //     ]
            // },
            // {
            //     name: "Internet Explorer",
            //     id: "Internet Explorer",
            //     data: [
            //         [
            //             "v11.0",
            //             6.2
            //         ],
            //         [
            //             "v10.0",
            //             0.29
            //         ],
            //         [
            //             "v9.0",
            //             0.27
            //         ],
            //         [
            //             "v8.0",
            //             0.47
            //         ]
            //     ]
            // },
            // {
            //     name: "Safari",
            //     id: "Safari",
            //     data: [
            //         [
            //             "v11.0",
            //             3.39
            //         ],
            //         [
            //             "v10.1",
            //             0.96
            //         ],
            //         [
            //             "v10.0",
            //             0.36
            //         ],
            //         [
            //             "v9.1",
            //             0.54
            //         ],
            //         [
            //             "v9.0",
            //             0.13
            //         ],
            //         [
            //             "v5.1",
            //             0.2
            //         ]
            //     ]
            // },
            // {
            //     name: "Edge",
            //     id: "Edge",
            //     data: [
            //         [
            //             "v16",
            //             2.6
            //         ],
            //         [
            //             "v15",
            //             0.92
            //         ],
            //         [
            //             "v14",
            //             0.4
            //         ],
            //         [
            //             "v13",
            //             0.1
            //         ]
            //     ]
            // },
            // {
            //     name: "Opera",
            //     id: "Opera",
            //     data: [
            //         [
            //             "v50.0",
            //             0.96
            //         ],
            //         [
            //             "v49.0",
            //             0.82
            //         ],
            //         [
            //             "v12.1",
            //             0.14
            //         ]
            //     ]
            // }
        ]
    }
});
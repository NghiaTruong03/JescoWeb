@extends('admin.master')

@section('title')
    <title>Trang tổng quan</title>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Trang tổng quan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tổng quan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <!-- /.content -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$current_order}}</h3>

              <p>Tổng số đơn hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('order.index') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>₫ {{ number_format($revenue,0,',','.') }}<sup style="font-size: 20px"></sup></h3>
              <p>Tổng doanh thu</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$current_user}}</h3>
              <p>Tài khoản đã đăng ký</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('account.user.index') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$current_product}}</h3>
              <p>Tổng số sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('product.index') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>



      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Kho
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab"></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab"></a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div id="donutchart" style="width: 100%; height: 410px;">
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Map card -->
          <div class="card bg-gradient-primary">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fas fa-map-marker-alt mr-1"></i>
                Địa chỉ
              </h3>
              <!-- card tools -->
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <div class="card-body">
              <div id="world-map">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.9229665979783!2d105.75529031463853!3d20.955608486037974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313452e83478d5fb%3A0xc8f31be5476832cd!2zNiBQLiBCYSBMYSwgUGjDuiBMxrDGoW5nLCBIw6AgxJDDtG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1653798745104!5m2!1svi!2s"
                  width="100%" height="400" style="border-radius:10px;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </section>
        <!-- right col -->
      </div>







      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="card card-primary" style="display: none">
            <div class="card-header">
              <h3 class="card-title">Area Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="areaChart"
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- BAR CHART -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Biểu đồ doanh thu theo danh mục</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart"
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          


        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="card card-info" style="display: none">
            <div class="card-header">
              <h3 class="card-title">Line Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart"
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- STACKED BAR CHART -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Biểu đồ số lượng sản phẩm được bán</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="stackedBarChart"
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
<!-- /.content-wrapper -->

<script src="{{ url('assets/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7'],
      datasets: [
        {
          label               : 'Áo',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.😎',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Quần',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    {{-- <p class="highcharts-description">
        Chart showing browser market shares. Clicking on individual columns
        brings up more detailed data. This chart makes use of the drilldown
        feature in Highcharts to easily switch between datasets.
    </p> --}}
</figure>

<script>
  // Create the charzt
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
</script>


@endsection
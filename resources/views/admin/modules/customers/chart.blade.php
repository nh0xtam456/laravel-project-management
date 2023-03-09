@extends('admin.master')
@section('module', 'Thống kê')
@section('action', 'Danh sách')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Lượng khách hàng đã tiếp cận</h3>
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
        <div class="chartjs-size-monitor">
          <div class="chartjs-size-monitor-expand">
            <div class=""></div>
          </div>
          <div class="chartjs-size-monitor-shrink">
            <div class=""></div>
          </div>
        </div>
        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
      </div>
    </div>
  </div>
  
  <div class="card card-danger">
    <div class="card-header">
    <h3 class="card-title">Chăm sóc khách hàng</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>
    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
    </div>
    
    </div>
@push('endjs1')
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
      labels  : @json($events2),
      datasets: [
        {
                'label' : 'Khách hàng đã tiếp cận',
                'backgroundColor'     : 'rgba(210, 214, 222, 1)',
                'borderColor'         : 'rgba(210, 214, 222, 1)',
                'pointRadius'         : false,
                'pointColor'          : 'rgba(210, 214, 222, 1)',
                'pointStrokeColor'    : '#c1c7d1',
                'pointHighlightFill'  : '#fff',
                'pointHighlightStroke': 'rgba(220,220,220,1)',
                'data'                :  @json($events1),
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
    // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    // var lineChartOptions = $.extend(true, {}, areaChartOptions)
    // var lineChartData = $.extend(true, {}, areaChartData)
    // lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    // lineChartOptions.datasetFill = false

    // var lineChart = new Chart(lineChartCanvas, {
    //   type: 'line',
    //   data: lineChartData,
    //   options: lineChartOptions
    // })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Liên hệ Not OK',
          'KH đang suy nghĩ',
          'KH đang thiếu tiền',
          'KH đã chốt đơn',
      ],
      datasets: [
        {
          data: @json($kq),
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    // var donutOptions     = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    // }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // new Chart(donutChartCanvas, {
    //   type: 'doughnut',
    //   data: donutData,
    //   options: donutOptions
    // })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    // var barChartCanvas = $('#barChart').get(0).getContext('2d')
    // var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0

    // var barChartOptions = {
    //   responsive              : true,
    //   maintainAspectRatio     : false,
    //   datasetFill             : false
    // }

    // new Chart(barChartCanvas, {
    //   type: 'bar',
    //   data: barChartData,
    //   options: barChartOptions
    // })

    // //---------------------
    // //- STACKED BAR CHART -
    // //---------------------
    // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    // var stackedBarChartData = $.extend(true, {}, barChartData)

    // var stackedBarChartOptions = {
    //   responsive              : true,
    //   maintainAspectRatio     : false,
    //   scales: {
    //     xAxes: [{
    //       stacked: true,
    //     }],
    //     yAxes: [{
    //       stacked: true
    //     }]
    //   }
    // }

    // new Chart(stackedBarChartCanvas, {
    //   type: 'bar',
    //   data: stackedBarChartData,
    //   options: stackedBarChartOptions
    // })
  })
</script>
@endpush
@endsection
@extends('admin.partials.layout')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button"
        class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi">
          <use xlink:href="#calendar3" />
        </svg>
        This week
      </button>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 my-3">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Order Pending Perbulan</h4>
          </div>
          <div class="card-body">
            <h3 class="card-text text-center">{{ $orderPending }}</h3>
          </div>
          <div class="card-footer" style="background-color: orange">

          </div>
        </div>
      </div>
      <div class="col-lg-4 my-3">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Order Selesai Perbulan</h4>
          </div>
          <div class="card-body">
            <h3 class="card-text text-center">{{ $orderSelesai }}</h3>
          </div>
          <div class="card-footer" style="background-color: green">

          </div>
        </div>
      </div>
      <div class="col-lg-4 my-3">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Order Cancel Perbulan</h4>
          </div>
          <div class="card-body">
            <h3 class="card-text text-center">{{ $orderCancel }}</h3>
          </div>
          <div class="card-footer" style="background-color: red">

          </div>
        </div>
      </div>
    </div>
    <div class="my-5" id="chart"></div>
  </div>
</main>
<script>
  var options = {
          series: [{
            name: "Total :",
            data: @json($dataTotalOrders)
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Data Penjualan Setiap Bulan',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: @json($dataBulan),
        },
        yaxis: {
          labels: {
            formatter: function(value) {
              return value.toLocaleString('id-ID', {
                style : 'currency',
                currency : "IDR",
                minimumFractionDigits: 0
              }) 
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
@endsection
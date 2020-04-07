@extends('layouts.admin')
@section('content')

{{-- {{ dd($months) }} --}}
<div class="content">

    <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark"><small class="text-muted">Login User : {{ $current_user }} </small></h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $dminute['total_announcements'] }}</h3>

              <p>Total Minutes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $dminute['total_minute'] }}</h3>

                <p>Total Minutes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $dminute['total_verify'] }}</h3>

                <p>Verified Minutes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $dminute['total_users'] }}</h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
    </div>
</div>

<!-- AREA CHART -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Area Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="bar-chart" width="800" height="250"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>

<script>
    var monthLabel = @json($monthLabel);
    monthLabel.reverse();
    var movements = @json($movements);
    movements.reverse();

// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: monthLabel,
      datasets: [
        {
          label: "Movements",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: movements,
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Staff movements in 7 months'
      }
    }
});
</script>

        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection

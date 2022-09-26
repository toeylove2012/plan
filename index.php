<?php 
session_start();
if(!isset($_SESSION["username"]))
{
 header("location: login.php");
}
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>งานวางแผนและงบประมาณ</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="libs/css/adminlte.min.css">
<style>
  .avatar {
    vertical-align: middle;
    width: 35px;
    height: 35px;
    border-radius: 50%; 
}
.info-tooltip,.info-tooltip:focus,.info-tooltip:hover{
    background:unset;
    border:unset;
    padding:unset;
  }
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">หน้าแรก</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="dropdown user user-menu open">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
      <img src="imgs/profile/profile.png" alt="Avatar" class="avatar">
      <span class="hidden-xs"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">
          <i class="fas fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i> Sign out
          </a>
          <div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="imgs/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BNCC Budgetplan</span>
</div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <?php include 'sidebarmenu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">รายงาน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">งบประมาณคงเหลือ</span>
                <span class="info-box-number text-right">
                <?php 
                    $cur_bul = $con->query("SELECT sum(balance) as total FROM `money_detail` WHERE status = 	1 ")->fetch_assoc()['total'];
                    echo number_format($cur_bul);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col-12 col-sm-6 col-md-3 -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-calendar-day"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">รับงบประมาณวันนี้</span>
                <span class="info-box-number text-right">
                  <?php
                    $today_budget = $con->query("SELECT sum(amount) as total FROM `running_balance` where md_id in (SELECT md_id FROM money_detail where status =1) and date(date_created) = '".(date("Y-m-d"))."' and balance_type = 1 ")->fetch_assoc()['total'];
                    echo number_format($today_budget);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col-12 col-sm-6 col-md-3 -->
          <!-- /.col-12 col-sm-6 col-md-3 -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-day"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ใช้งบประมาณวันนี้</span>
                <span class="info-box-number text-right">
                <?php
                    $today_budget = $con->query("SELECT sum(amount) as total FROM `running_balance` where md_id in (SELECT md_id FROM money_detail where status =1) and date(date_created) = '".(date("Y-m-d"))."' and balance_type = 2 ")->fetch_assoc()['total'];
                    echo number_format($today_budget);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col-12 col-sm-6 col-md-3 -->
        </div>
        <?php 
        //budget
        $sqlQuery = "SELECT sum(balance) as total FROM money_detail where status = 1 UNION SELECT sum(amount) as total FROM money_detail  INNER JOIN running_balance ON money_detail.md_id = running_balance.md_id where status = 1 AND balance_type = 2";
        $result = mysqli_query($con,$sqlQuery);
            while ($row = mysqli_fetch_array($result)) { 
    
                $total[]  = $row['total'];
            }
    
        ?>
        <!-- moneytype -->
        <?php 
        $sqlQuery2 = "SELECT mt_name FROM money_type ";
        $result2 = mysqli_query($con,$sqlQuery2);
            while ($row2 = mysqli_fetch_array($result2)) { 
    
                $label[]  = $row2['mt_name'];
            }
    
        ?>
        <!-- sum งบประมาณ หมวดงบ -->
        <?php 
        $sqlQuery3 = "SELECT mt_id,SUM(balance) As SumTotal FROM money_detail where status = 1 GROUP BY mt_id ";
        $result3 = mysqli_query($con,$sqlQuery3);
            while ($row3 = mysqli_fetch_array($result3)) { 
    
                $summoneytype[]  = $row3['SumTotal'];
            }
    
        ?>
        <!-- sum เบิกจ่ายงบประมาณ หมวดงบ -->
        <?php 
        $sqlQuery4 = "SELECT mt_id, sum(amount) as SumExpense FROM money_detail  INNER JOIN running_balance ON money_detail.md_id = running_balance.md_id where status = 1 AND balance_type = 2 GROUP BY mt_id ";
        $result4 = mysqli_query($con,$sqlQuery4);
            while ($row4 = mysqli_fetch_array($result4)) { 
    
                $sumexpensemt[]  = $row4['SumExpense'];
            }
    
        ?>
        <!-- Donut CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">งบประมาณคงเหลือและเบิกจ่ายทั้งหมด</h3>

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
              <h2 class="page-header text-center" >งบประมาณคงเหลือและเบิกจ่ายทั้งหมด</h2>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- BAR CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">หมวดงบคงเหลือและการเบิกจ่าย</h3>

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
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <!-- /.row -->
        <div class="row">
  <div class="col-lg-12">
    <h4>งบประมาณโครงการ/รายการ</h4>
    <hr>
  </div>
</div>
<div class="col-md-12 d-flex justify-content-center">
  <div class="input-group mb-3 col-md-5">
  </div>
</div>
<div class="row row-cols-12 row-cols-sm-1 row-cols-md-12 row-cols-lg-12">
  <?php 
  $categories = $con->query("SELECT *FROM `money_detail` WHERE status = 	1 ORDER BY md_id ASC");
    while($row = $categories->fetch_assoc()):
  ?>
  <div class="col p-0 cat-items">
    <div class="callout callout-info">
      <span class="float-right ml-1">
        <B><?php echo number_format($row['balance']) ?></B>
      </span>
      <p class="mr-2"><b><?php echo $row['md_name'] ?></b></p>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<div class="col-md-12">
  <h3 class="text-center" id="noData" style="display:none">ไม่พบข้อมูล.</h3>
</div>
</div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- active nav-link -->
<script src="libs/js/activenavlink.js"></script>
<!-- Bootstrap 4 -->
<script src="libs/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="libs/js/adminlte.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script>
  $(function () {
      //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels:['งบคงเหลือ','เบิกจ่าย'],
      datasets: [
        {
          data:<?php echo json_encode($total); ?>,
          backgroundColor : ['#0055ff', '#ff0000', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

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
                });
    </script>
      <script>
    $(function () {
//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels  : <?php echo json_encode($label); ?>,
      datasets: [
        {
          label               : 'เบิกจ่าย',
          backgroundColor     : '#ff0000',
          borderColor         : '#ff0000',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($sumexpensemt); ?>
        },
        {
          label               : 'งบคงเหลือ',
          backgroundColor     : '#0055ff',
          borderColor         : '#0055ff',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php echo json_encode($summoneytype); ?>
        },
      ]
    }
    var temp0 = barChartData.datasets[0]
    var temp1 = barChartData.datasets[1]
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

                });
    </script>
</body>
</html>

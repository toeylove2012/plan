<?php 
session_start();
if(!isset($_SESSION["username"]))
{
 header("location: login.php");
}
$date_start = isset($_GET['date_start']) ? $_GET['date_start'] :  date("Y-m-d",strtotime(date("Y-m-d")." -7 days")) ;
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] :  date("Y-m-d") ;
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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="libs/css/adminlte.min.css">
<style>
  .avatar {
    vertical-align: middle;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">ว่าง</a>
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
              <li class="breadcrumb-item active">รายงานงบประมาณ</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title">รายงาน</h5>
    </div>
    <div class="card-body">
        <form id="filter-form">
            <div class="row align-items-end">
                <div class="form-group col-md-3">
                    <label for="date_start">เริ่มวันที่</label>
                    <input type="date" class="form-control form-control-sm" name="date_start" value="<?php echo date("Y-m-d",strtotime($date_start)) ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="date_start">สิ้นสุดวันที่</label>
                    <input type="date" class="form-control form-control-sm" name="date_end" value="<?php echo date("Y-m-d",strtotime($date_end)) ?>">
                </div>
                <div class="form-group col-md-1">
                    <button class="btn btn-flat btn-block btn-primary btn-sm"><i class="fa fa-filter"></i> กรอง</button>
                </div>
                <div class="form-group col-md-1">
                    <button class="btn btn-flat btn-block btn-success btn-sm" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </form>
        <hr>
        <div id="printable">
            <div>
                <h4 class="text-center m-0"><?php //echo $_settings->info('name') ?></h4>
                <h3 class="text-center m-0"><b>รายงานงบประมาณ</b></h3>
                <hr style="width:15%">
                <p class="text-center m-0">ระหว่างวันที่ <b><?php echo date("M d, Y",strtotime($date_start)) ?> ถึงวันที่ <?php echo date("M d, Y",strtotime($date_end)) ?></b></p>
                <hr>
            </div>
            <table class="table table-bordered">
                 <colgroup>
                    <col width="5%">                
                    <col width="10%">                
                    <col width="">                
                    <col width="8%">                
                    <col width="20%">                
                </colgroup>
                <thead>
                    <tr class="bg-gray-light">
                        <th class="text-center">#</th>
                        <th>วันที่</th>
                        <th>โครงการ/รายการ</th>
                        <th>จำนวน</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'connect.php'; 
                    $i = 1;
                    $total = 0;
                        $qry = $con->query("SELECT * from `running_balance` inner join `money_detail` on running_balance.md_id = money_detail.md_id where money_detail.status=1 and running_balance.balance_type = 2 and date(running_balance.date_created) between '{$date_start}' and '{$date_end}' order by unix_timestamp(running_balance.date_created) asc");
                        while($row = $qry->fetch_assoc()):
                            $row['remarks'] = (stripslashes(html_entity_decode($row['remarks'])));
                            $total += $row['amount'];
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td><?php echo date("M d, Y",strtotime($row['date_created'])) ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td class="text-right"><?php echo number_format($row['amount']) ?></td>
                        <td><div><?php echo $row['remarks'] ?></div></td>
                    </tr>
                    <?php endwhile; ?>
                    <?php if($qry->num_rows <= 0): ?>
                    <tr>
                        <td class="text-center" colspan="5">ไม่พบข้อมูล...</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right px-3" colspan="3"><b>ทั้งหมด</b></td>
                        <td class="text-right"><b><?php echo number_format($total) ?></b></td>
                        <td class="bg-gray"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- active nav-link -->
<script src="libs/js/activenavlink.js"></script>
<!-- Bootstrap 4 -->
<script src="libs/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="libs/js/adminlte.min.js"></script>
</body>
</html>
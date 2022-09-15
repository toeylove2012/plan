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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="budget.php" class="nav-link">
            <i class="nav-icon fas fa-wallet"></i>
              <p>
                ตั้งงบประมาณ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="expense.php" class="nav-link">
            <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                เบิกจ่ายงบประมาณ
              </p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="report_budget.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                งบประมาณทั้งหมด
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report_expense.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                เบิกจ่ายงบประมาณทั้งหมด
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="table-budget.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                ตารางงบประมาณ
              </p>
            </a>
          </li>
          <li class="nav-header">Maintenance</li>
          <li class="nav-item">
            <a href="maint_category.php" class="nav-link">
              <i class="nav-icon fas fa-th-list "></i>
              <p>
                จัดการโครงการ
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
                    $cur_bul = $con->query("SELECT sum(mv_price) as total FROM `money_detail` INNER JOIN `money_value` ON money_detail.md_id = money_value.md_id WHERE status = 	1 ")->fetch_assoc()['total'];
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
                <span class="info-box-number text-right">1,410</span>
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
                <span class="info-box-number text-right">1,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col-12 col-sm-6 col-md-3 -->
        </div>
        <!-- /.row -->
        <div class="row">
  <div class="col-lg-12">
    <h4>งบประมาณโครงการ/รายการ</h4>
    <hr>
  </div>
</div>
<div class="col-md-12 d-flex justify-content-center">
  <div class="input-group mb-3 col-md-5">
    <input type="text" class="form-control" id="search" placeholder="ค้นหา...">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-search"></i></span>
    </div>
  </div>
</div>
<div class="row row-cols-12 row-cols-sm-1 row-cols-md-12 row-cols-lg-12">
  <?php 
  $categories = $con->query("SELECT *FROM `money_detail` INNER JOIN `money_value` ON money_detail.md_id = money_value.md_id WHERE status = 	1 ORDER BY money_detail.md_id ASC");
    while($row = $categories->fetch_assoc()):
  ?>
  <div class="col p-0 cat-items">
    <div class="callout callout-info">
      <span class="float-right ml-1">
        <B><?php echo number_format($row['mv_price']) ?></B>
      </span>
      <p class="mr-2"><b><?php echo $row['md_name'] ?></b></p>
      <p class="mr-2 text-right"><b>งวด&nbsp;</b><b><?php echo $row['mv_installment'] ?></b></p>
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
</body>
</html>

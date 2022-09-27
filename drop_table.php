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
            <h1 class="m-0">Database</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
              <li class="breadcrumb-item active">Database</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
		<div class="card-body">
การจัดการล้างข้อมูลงบประมาณ จะทำให้ข้อมูลงบประมาณโครงการทั้งหมดในระบบสูญหาย เป็นการเริ่มต้นระบบใหม่ (กระทำเมื่อสิ้นปีงบประมาณ)	

<?php 
if(isset($_POST['submit']))
{
  $db = $_POST['db'];
  if($db=="clean"){		
//ติดต่อฐานข้อมูล
require_once 'connect.php';
$con->set_charset('utf8');
if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
	$con->query("DROP TABLE `running_balance`");
	$con->query("TRUNCATE TABLE `money_detail` ");
	//นำเข้า Table DB
			$pa='database/database_drop/running_balance.sql';
			$filePath = file_get_contents($pa);
			$con->multi_query($filePath);
	
		echo "<span class='badge badge-warning'>ล้างข้อมูล โครงการต่างๆ ในระบบเรียบร้อยแล้ว ดำเนินการตั้งค่าโครงการได้ที่เมนู</span> > <a href='?page=maintenance/category'><span class='badge badge-success'>จัดการโครงการ</span></a>";
	exit;		
		}
mysqli_close($con);

	}
}
?>
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alert1">
  ล้างข้อมูล
</button>
				
				</div>
			</div>
		</div>

  <div class="modal fade" id="alert1" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <font color="red"><b>ล้างข้อมูลโครงการ</b></font>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
<form name="test" action="drop_table.php" method="post">
<input type="hidden" name="db" value="clean">
        <div class="modal-body pl">
          การกระทำนี้จะทำให้ข้อมูลโครงการสูญหายเป็นการเริ่มต้นระบบใหม่
        </div>
        <div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="ตกลง">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        </div>
</form>
      </div>
  
   <!-- jQuery -->
   <script src="plugins/jquery/jquery.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- active nav-link -->
    <script src="libs/js/activenavlink.js"></script>
    <!-- Bootstrap 4 -->
    <script src="libs/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="libs/js/adminlte.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="libs/js/sweetalert2.all.js"></script>
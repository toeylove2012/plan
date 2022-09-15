<?php 
session_start();
if(!isset($_SESSION["username"]))
{
 header("location: login.php");
}
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
th.rotated-text {
  position: relative;
  height: 140px;
  white-space: nowrap;
  padding: 0 !important;
}

th.rotated-text>div {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: rotate(-90deg) translateY(-50%);
  transform-origin: 0 0;
}

th.rotated-text>div>span {
  display: inline-block;
  padding: 0px 15px;
  padding-left: 5px;
}
@media print{
  @page {size: landscape}
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
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="dropdown user user-menu open">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
      <img src="img/profile.png" alt="Avatar" class="avatar">
      <span class="hidden-xs"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">
          <i class="fas fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout" class="dropdown-item">
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
      <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <h1 class="m-0">ตารางงบประมาณ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
              <li class="breadcrumb-item active">ตารางงบประมาณ</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
Table-Budget
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>รายการ</th>
                  <?php 
													for($i=1;$i<=12;$i++){
														echo "<th class='rotated-text'>";
                            echo "<div><span>งวด&nbsp;$i</span></div></th>";
													}
													?>
                  </tr>
                  </thead>
                  <tbody>
              <?php require 'connect.php';
				$query = $con->query("SELECT * FROM `money_type`");
				while($fetch = $query->fetch_array()){
          $mt_id = $fetch['mt_id']
					?>
                    <tr>
                    <th class="no-sort" colspan="0"><?php echo $fetch['mt_name']?></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                    <th style="display:none;"></th>
                  </tr>
                <?php $sql = "SELECT md_id,md_name FROM `money_detail` WHERE mt_id = $mt_id"; 
		  $result = mysqli_query($con,$sql);
		  if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$md_id = $row["md_id"];
		  ?>
                    <tr>
                    <td> <?php echo $row["md_name"]?></td>
                    <?php 
      $r=1;
		  //$sql1 = "SELECT sum(mv_price) as total FROM `money_value` WHERE md_id = $md_id";
      $sql1 = "SELECT mv_price,mv_installment FROM `money_value` WHERE md_id = $md_id"; 
		  $result1 = mysqli_query($con,$sql1);
      
			while($row1 = mysqli_fetch_assoc($result1)) {
      $mv_installment = $r;
        $sql2 = "SELECT sum(mv_price) as total FROM `money_value` WHERE md_id = $md_id AND mv_installment = $mv_installment";
        $result2 = mysqli_query($con,$sql2);
        while($row2 = mysqli_fetch_assoc($result2)) {
        $sum = $row2['total'];
		  ?>          
      <td><?php 
      //echo number_format($sum,2)</td>
      echo $row2['total'];
      //echo number_format($sum,2);
      echo "T";
      ?></td>
                    <?php }
                $r++;  
                }
                  while($r<=12)
                  {
                    echo "<td>-</td>";
                    $r++;
                  }
                  
                  } ?>
                  
                    </tr> 
                    <?php }} ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>รวม</th>
                    <?php 
													for($i=1;$i<=12;$i++){
                            $cur_bul = $con->query("SELECT sum(mv_price) as total FROM `money_value` WHERE mv_installment = $i")->fetch_assoc()['total']; 
														echo "<th>";
                            echo number_format($cur_bul,2);
                            echo "</th>";
                          }
													?>
                  </tr>
                  </tfoot>
                </table>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

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
<!--PDF Font & Datatable-->
<script>
  pdfMake.fonts = {
  Roboto: {
    normal: 'THSarabunNew.ttf',
    bold: 'THSarabunNew Bold.ttf',
    italics: 'THSarabunNew Italic.ttf',
    bolditalics: 'THSarabunNew BoldItalic.ttf'
  }
};
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"order": [],"ordering": false,
      "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }],
      buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fas fa-copy"></i> คัดลอก',
                titleAttr: 'Copy'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> Excel',
                titleAttr: 'Excel'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv"></i> CSV',
                charset: 'UTF-8',
                bom: true,
                titleAttr: 'CSV'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                titleAttr: 'Print'
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns"></i> Columns',
                titleAttr: 'Colvis'
            }
 
        ],
        language: {
            "zeroRecords": "ไม่พบข้อมูล",
            "info": "แสดงข้อมูล _START_ ถึง _END_ (รวมทั้งหมด _TOTAL_ ข้อมูล)",
            "infoEmpty": "ข้อมูลว่างเปล่า",
          paginate: {
      previous: '<i class="fas fa-angle-left"></i>',
      next: '<i class="fas fa-angle-right"></i>'
    },
            buttons: {
                copyTitle: 'คัดลอกไปที่คลิปบอร์ด',
                copySuccess: {
                    _: 'คัดลอก %d แถวไปยังคลิปบอร์ด',
                    1: 'คัดลอก 1 แถวไปยังคลิปบอร์ด'
                }
              }
            }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

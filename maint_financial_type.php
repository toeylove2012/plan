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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
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
                        <img src="imgs/profile/profile.png" alt="Avatar" class="avatar">
                        <span
                            class="hidden-xs"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></span>
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
            <?php include 'logo.php';?>

            <!-- Sidebar -->
            <div class="sidebar">
                <?php include 'sidebarmenu.php';?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">จัดการค่าอื่นๆ</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
                                        <li class="breadcrumb-item active">จัดการค่าอื่นๆ</li>
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
                                            Maintenance/category
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-primary" name="add" id="add"
                                                    data-toggle="modal" data-target="#add_data_Modal">
                                                    <span><i class="fas fa-plus"></i></span>
                                                    เพิ่มข้อมูล
                                                </button>
                                                <div id="budget_table">
                                                    <div id="dataModal" class="modal fade" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modal title</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="add_data_Modal" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">เพิ่มข้อมูล</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" id="insert_form">
                                                                        <div class="form-group">
                                                                            <label for="md-name"
                                                                                class="col-form-label">ชื่อค่าต่างๆ/อื่นๆ</label>
                                                                            <input type="text" class="form-control"
                                                                                id="f_name" name="f_name" require>
                                                                        </div>
                                                                        <input type="hidden" name="f_id" id="f_id" />
                                                                        <input type="submit" name="insert" id="insert"
                                                                            value="Insert" class="btn btn-success" />
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>วันที่</th>
                                                        <th>ค่าอื่นๆ</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php require 'connect.php';
				$query = $con->query("SELECT * FROM financial_type");
                $row = 1;
				while($fetch = $query->fetch_array()){
					?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $row?></td>
                                                        <td><?php echo $fetch['date_created']?></td>
                                                        <td><?php echo $fetch['f_name']?></td>
                                                        <td class="text-center"><span>
                                                                <button
                                                                    class='btn btn-primary btn-sm edit btn-flat edit_data'
                                                                    name="edit" value="Edit"
                                                                    id="<?php echo $fetch['f_id']?>"><i
                                                                        class='fa fa-edit'></i> </button>
                                                                <button
                                                                    class='btn btn-danger btn-sm delete btn-flat delete_data'
                                                                    name="delete" value="delelte"
                                                                    id="<?php echo $fetch['f_id']?>"><i
                                                                        class='fa fa-trash'></i> </button>
                                                            </span>
                                        </div>
                                        </td>
                                        </tr>
                                        <?php $row++;
                  }?>
                                        </tbody>
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
            <?php include 'footer.php';?>
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
    <!-- Sweetalert2 -->
    <script src="libs/js/sweetalert2.all.js"></script>
    <script>
    $(document).ready(function() {
        $('input[type="text"]').change(function() {
            this.value = $.trim(this.value);
        });
        $('#add').click(function() {
            $('#insert').val("เพิ่มข้อมูล");
            $('#insert_form')[0].reset();
            $('#f_id').val("");
        });
        $(document).on('click', '.edit_data', function() {
            var f_id = $(this).attr("id");
            $.ajax({
                url: "maint_financial_type_data.php",
                method: "POST",
                data: {
                    f_id: f_id
                },
                dataType: "json",
                success: function(data) {
                    $('#f_id').val(data.f_id);
                    $('#f_name').val(data.f_name);
                    $('#insert').val("อัพเดท/แก้ไข");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#f_name').val() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณากรอกค่าอื่นๆ!',
                })
            } 
             else {
                $.ajax({
                    url: "maint_financial_type_add.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#budget_table').html(data);
                        setTimeout(location.reload.bind(location), 800);
                    }
                });
            }
        });
        $(document).on('click', '.delete_data', function() {
            var f_id = $(this).attr("id");
            if (f_id != '') {
                swal.fire({
                    title: 'คุณแน่ใจรึเปล่า?',
                    text: "คุณจะไม่สามารถย้อนกลับได้!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่, ลบมัน!',
                    cancelButtonText: 'ยกเลิก',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "maint_financial_type_delete.php",
                            method: "POST",
                            data: {
                                f_id: f_id
                            },
                            dataType: "json"
                        })
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 800
                        })
                        setTimeout(location.reload.bind(location), 800);
                    }
                });
            }
        })
    });
    </script>
    <!-- Datatable-->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "order": [],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            language: {
                "zeroRecords": "ไม่พบข้อมูล",
                "info": "แสดงข้อมูล _START_ ถึง _END_ (รวมทั้งหมด _TOTAL_ ข้อมูล)",
                "infoEmpty": "ข้อมูลว่างเปล่า",
                paginate: {
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>'
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
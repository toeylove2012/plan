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
            <div class="brand-link">
                <img src="imgs/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">BNCC Budgetplan</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
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
                                    <h1 class="m-0">เบิกจ่ายงบประมาณ</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                                        <li class="breadcrumb-item active">เบิกจ่ายงบประมาณ</li>
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
                                            Report/Expense a budget
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#completeModal">
                                                    <span><i class="fas fa-plus"></i></span>
                                                    เพิ่มข้อมูล
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="completeModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    เบิกจ่ายงบประมาณ</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="form-group">
                                                                    <label for="moneytype"
                                                                        class="col-form-label">ชื่อหมวดงบ</label>
                                                                    <select name="mt_id" id="mt_id"
                                                                        class="custom-select selevt">
                                                                        <?php require 'connect.php';
				                       $sql = "SELECT * FROM `money_type`";
				                       $query = mysqli_query($con, $sql);?>
                                                                        <option value="" selected hidden>
                                                                            เลือกหมวดงบ</option>
                                                                        <?php while($result = mysqli_fetch_assoc($query)): ?>
                                                                        <option value="<?=$result['mt_id']?>">
                                                                            <?=$result['mt_name']?></option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="moneytype"
                                                                        class="col-form-label">โครงการ/รายการ</label>
                                                                    <select name="md_id" id="md_id"
                                                                        class="custom-select selevt">
                                                                        <option value="" selected hidden>เลือกรายการ
                                                                        </option>
                                                                        <?php require 'connect.php';
				                       $query = "SELECT * FROM `money_detail` where `balance` > 0 order by md_name asc";
				                       $result2 = mysqli_query($con, $query);
                               $options = "";
                               while($row2 = mysqli_fetch_array($result2))
                               {
                               $md_id = $row2['md_id'];
                               $balance = $row2['balance'];
                               $options = $options."<option value='$md_id'>$row2[2] [$balance]</option>";
                               }
					                   ?>
                                                                        <?php echo $options;?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="md-name"
                                                                        class="col-form-label">จำนวนเงิน</label>
                                                                    <input inputmode="numeric"
                                                                        oninput="this.value = this.value.replace(/\D+/g, '')"
                                                                        class="form-control text-right number"
                                                                        id="amount" name="amount" require
                                                                        pattern="[0-9]+" min="0" max="<?php echo $balance ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="remarks-text"
                                                                        class="col-form-label">รายละเอียด</label>
                                                                    <textarea class="form-control" id="remarks"
                                                                        name="remarks"></textarea>
                                                                </div>
                                                                <input type="hidden" name="md_id" id="md_id" />
                                                                <input type="hidden" name="balance_type"
                                                                    id="balance_type" value="2" />
                                                                    <input type="hidden" name="balance" id="balance" value="<?php echo $balance ?>"/>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                    onclick="adddata()">บันทึก</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">ปิด</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- update modal -->
                                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            แก้ไข</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="moneytype"
                                                                class="col-form-label">โครงการ/รายการ</label>
                                                            <select name="updatemd_id" id="updatemd_id"
                                                                class="custom-select selevt">
                                                                <?php require 'connect.php';
				                       $query = "SELECT * FROM `money_detail`";
				                       $result2 = mysqli_query($con, $query);
                               $options = "";
                               while($row2 = mysqli_fetch_array($result2))
                               {
                               $md_id = $row2['md_id'];
                               $options = $options."<option value='$md_id' selected>$row2[2]</option>";
                               }
					                   ?>
                                                                <?php echo $options;?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="md-name"
                                                                class="col-form-label">จำนวนเงิน</label>
                                                            <input inputmode="numeric"
                                                                oninput="this.value = this.value.replace(/\D+/g, '')"
                                                                class="form-control text-right number" id="updateamount"
                                                                name="updateamount" require pattern="[0-9]+" min="0">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="remarks-text"
                                                                class="col-form-label">รายละเอียด</label>
                                                            <textarea class="form-control" id="updateremarks"
                                                                name="updateremarks"></textarea>
                                                        </div>
                                                        <input type="hidden" name="updateid" id="updateid" />
                                                        <input type="hidden" name="updatemd_id" id="updatemd_id" />
                                                        <input type="hidden" name="updatebalance_type"
                                                            id="updatebalance_type" value="2" />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="updatedata()">อัพเดท</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ปิด</button>
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
                                            <th>โครงการ/รายการ</th>
                                            <th>จำนวน</th>
                                            <th>รายละเอียด</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require 'connect.php';
				$query = $con->query("SELECT * FROM `running_balance` INNER JOIN `money_detail` ON running_balance.md_id = money_detail.md_id WHERE money_detail.status=1 and running_balance.balance_type=2 order by unix_timestamp(running_balance.date_created) desc");
        $row = 1;
				while($fetch = $query->fetch_array()){
					?>
                                        <tr>
                                            <td class="text-center"><?php echo $row?></td>
                                            <td><?php echo $fetch['date_created']?></td>
                                            <td><?php echo $fetch['md_name']?></td>
                                            <td><?php
                    $amount = $fetch['amount'];
                    echo number_format($amount,2); ?></td>
                                            <td><?php echo $fetch['remarks']?></td>
                                            <td class="text-center"><span>
                                                    <button class='btn btn-primary btn-sm edit btn-flat'
                                                        onclick="GetDetails('<?php echo $fetch['id']?>')"><i
                                                            class='fa fa-edit'></i>
                                                    </button>
                                                    <button class='btn btn-danger btn-sm delete btn-flat'
                                                        onclick="DeleteBudget('<?php echo $fetch['id']?>')"><i
                                                            class=' fa fa-trash'></i> </button>
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
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
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
    <!-- Sweetalert2 -->
    <script src="libs/js/sweetalert2.all.js"></script>
    <!--  -->
            <script>
    $(function() {
                var moneytypeObject = $('#mt_id');
                var moneydetailObject = $('#md_id');

                // on change province
                moneytypeObject.on('change', function() {
                    var moneytypeId = $(this).val();

                    moneydetailObject.html('<option value="">เลือกโครงการ</option>');

                    $.get('get_moneydetail.php?mt_id=' + moneytypeId, function(data) {
                        var result = JSON.parse(data);
                        $.each(result, function(index, item) {
                            moneydetailObject.append(
                                $('<option></option>').val(item.md_id).html(item.md_name)
                            );
                        });
                    });
                });
            });
    </script>
    <script>
    $(document).ready(function() {
        $('input[inputmode="numeric"]').change(function() {
            this.value = $.trim(this.value);
        });
    });
    </script>
    <script>
    function adddata() {
        var md_idAdd = $('#md_id').val();
        var balance_typeAdd = $('#balance_type').val();
        var amountAdd = $('#amount').val();
        var balanceAdd = $('#balance').val();
        var remarksAdd = $('#remarks').val();
        if (md_idAdd === "") {
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกโครงการ/รายการ'
                })
        }
        else if(amountAdd === ""){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกใส่จำนวนให้เงินครบ'
                })
        }
        else if(amountAdd > balanceAdd){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาใส่ราคาเบิกเท่าที่งบมี'
                })
        }
        else if(amountAdd <= 0){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาใส่ราคาเบิกที่ถูกต้อง'
                })
        }
        else{
        $.ajax({
            url: "expense_add.php",
            type: 'post',
            data: {
                md_idSend: md_idAdd,
                balance_typeSend: balance_typeAdd,
                amountSend: amountAdd,
                remarksSend: remarksAdd
            },
            success: function(data) {
                //function display data;
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 800
                })
                setTimeout(location.reload.bind(location), 800);
            }
        })
    }
}

    function DeleteBudget(deleteid) {
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
                    url: "expense_delete.php",
                    type: 'post',
                    data: {
                        deletesend: deleteid
                    },
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 800
                        })
                        setTimeout(location.reload.bind(location), 800);
                    }
                })
            }
        });
    }

    function GetDetails(updateid) {
        $('#hiddendata').val(updateid);
        $.ajax({
            url: "expense_data.php",
            method: "POST",
            data: {
                updateid: updateid
            },
            dataType: "json",
            success: function(data) {
                $('#updateid').val(data.id);
                $('#updateamount').val(data.amount);
                $('#updatemd_id').val(data.md_id);
                $('#updateremarks').val(data.remarks);
                $('#updateModal').modal('show');

            }
        })
    }

    function updatedata() {
        var idupdate = $('#updateid').val();
        var md_idUpdate = $('#updatemd_id').val();
        var balance_typeUpdate = $('#updatebalance_type').val();
        var amountUpdate = $('#updateamount').val();
        var remarksUpdate = $('#updateremarks').val();

        $.ajax({
            url: "expense_update.php",
            type: 'post',
            data: {
                idSend: idupdate,
                md_idSend: md_idUpdate,
                balance_typeSend: balance_typeUpdate,
                amountSend: amountUpdate,
                remarksSend: remarksUpdate
            },
            success: function(data) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 800
                })
                //setTimeout(location.reload.bind(location), 800);
            }
        })
    }
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

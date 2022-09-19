<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ล็อคอินเข้าสู่ระบบ</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="libs/css/adminlte.min.css">
  <link rel="stylesheet" href="libs/css/spinnerloading.css">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <img src="imgs/logo.png">

        </div>
        <!-- /.login-logo -->
        <div class="box">
        <div class="card">
          <div class="card-body login-card-body">
          <h3>งานวางแผนและงบประมาณ</h3>
            <p class="login-box-msg">เข้าสู่ระบบ</p>
      
            <form method="post">
              <div class="input-group mb-3">
                <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้" require>
                <div class="input-group-append">
                  <div class="input-group-text">
                  <span class="fas fa-address-card"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน" require>
                <div class="input-group-append">
                  <div class="input-group-text">
                      <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
                </div>
              </div>
                <!-- /.col -->
                <div class="col-4">
                <button type="button" class="btn btn-primary btn-block" name="login" id="login">
                <span class="button__text"><i class="fas fa-sign-in-alt"></i></span>
                </button>
                
                </div>
                <!-- /.col -->
                
              </div>
            </form>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
</div>
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>

    <!-- REQUIRED SCRIPTS -->
    <!--PressEnter-->
    <script>
      var input = document.getElementById("password");
      input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("login").click();
      }
    });
    </script>

<!-- Ajax-->
<script>
$(document).ready(function(){
 $('#login').click(function(){
  var username = $('#username').val();
  var password = $('#password').val();
  if($.trim(username).length > 0 && $.trim(password).length > 0)
  {
   $.ajax({
    url:"check.php",
    method:"POST",
    data:{username:username, password:password},
    cache:false,
    beforeSend:function(){
     $('#login').addClass('button--loading');
    },
    success:function(data)
    {
     if(data ==1)
     {
              $(function(){
              $("body").fadeOut(2000,function(){
              window.location = "index.php"
              })
           });
     }
     else
     {
      $('#login').removeClass('button--loading');
      Swal.fire({
         title: 'ชื่อผู้ใช้หรือรหัสผ่านผิด!',
         text: 'โปรดลองใหม่อีกครั้ง',
         icon: 'error',
         confirmButtonText: 'ยืนยัน',
         heightAuto: false
})
     }
    }
   });
  }
 });
});
</script> 
<!-- ShowPWD-->
<script src="libs/js/showpwd.js"></script>
<!-- Bootstrap 4 -->
<script src="libs/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="libs/js/adminlte.min.js"></script>
<!-- Sweetalert2 -->
<script src="libs/js/sweetalert2.all.js"></script>

</body>
</html>

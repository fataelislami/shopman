<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/assets/images/favicon.png">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url() ?>/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo base_url() ?>/assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="<?php echo base_url()."login/Resetpassword/resetPass_act" ?>">
                    <h3 class="box-title m-b-20">Recover Password</h3>
                    <h4 id="txtPsw1" class="box-title m-b-20">Password Tidak Sama</h4>
                    <h4 id="txtPsw2" class="box-title m-b-20">Password Sama</h4>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input id="psw1" class="form-control" type="Password" name="psw1" required="" placeholder="Masukan Password Baru">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <input id="psw2" class="form-control" type="Password" name="psw2" required="" placeholder="Masukan Ulang Password ">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <input id="rand" class="form-control" type="text" name="rand" required="" value="<?php echo  $rand ?>">
                      </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button id="btn1" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" disabled>Reset</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <script>
        
        $(document).ready(function(){
            $("#txtPsw1").hide();
            $("#txtPsw2").hide();
            $("#psw2").keyup(function(){
                var psw1=$("#psw1").val();
                var psw2=$("#psw2").val();
                if(psw1!=psw2){
                    $("#txtPsw1").show();
                    $("#btn1").attr("disabled","disabled");
                    $("#txtPsw2").hide();
                }else{
                    $("#txtPsw2").show();
                    $("#txtPsw1").hide();
                    $("#btn1").removeAttr("disabled");

                }
            });
        });
    </script>
    <!-- ============================================================== -->

    <script src="<?php echo base_url() ?>/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
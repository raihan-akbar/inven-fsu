<?php
if(isset($_GET['con'])){
		if($_GET['con'] == "fail"){
			$color = 'danger';
			$flash = "Username atau Password Salah!";
		}
		else if($_GET['con'] == "!login"){
			$color = 'orange';
			$flash = "Silahkan Login Terlebih Dahulu";
		}
		else if($_GET['con'] == "out"){
			$color = 'success';
			$flash = "Log out Berhasil";
		}
		else{
			$color = 'inverse';
			$flash = "Silahkan Login Untuk Melanjutkan";
		}
}
else{
	$color = 'inverse';
	$flash = "Silahkan Login Untuk Melanjutkan";
}

include 'config.php';
 
error_reporting(0);
session_start();
 
if (isset($_SESSION['status'])) {
    header("Location: dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
 
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['role'] == 'Admin') {
            $_SESSION['status'] = '1';
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");   
        }
   else if ($row['role'] == 'Staff') {
            $_SESSION['status'] = '1';
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            header("Location: staff.php");   
        }
    } else {
        header("location:signin.php?con=fail");
    }
}
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Zircos - Responsive Admin Dashboard Template</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-dark" style="background-image: url('assets/images/bg-login.jpg');background-repeat: no-repeat; background-size: 100%;">
    	<div class="alert alert-transparent" role="alert">
        	<?php echo $_SESSION['error']?>
    	</div>
        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <!-- <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><img src="assets/images/logo.png" alt="" height="36"></span>
                                        </a>
                                    </h2> -->
                                    <h3 class="font-bold text-white m-b-0">CV. Famili Sejahtera Utama</h3>
                                </div>
                                <div class="bg-white account-content">
                                    <form class="form-horizontal" method="POST">
                                    	<p class="text-center text-<?php echo $color;?>"><i class="text-white">.</i><b><?php echo $flash; ?></b></p>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                            	<label>Username</label>
                                                <input class="form-control" type="text" required="" placeholder="Username" name="username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            	<label>Password</label>
                                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <hr>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn col-md-12 btn-lg btn-bordered btn-primary waves-effect waves-light" type="submit" name="submit">Sign in</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
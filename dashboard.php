<?php include 'check.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '_include/top.php'; ?>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

        <?php include '_include/navbar.php'; ?>
            
        <?php include '_include/admin_sidebar.php'; ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Starter Page </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li>
                                            <a href="#">Pages </a>
                                        </li>
                                        <li class="active">
                                            Blank Page
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-lg-3 col-md-6">
                                    <div class="card-box widget-box-two widget-two-success">
                                        <i class="fa fa-gavel widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Alat</p>
                                            <h2><span data-plugin="counterup">0</span></h2>
                                            <p class="text-muted m-0"><b>Jumlah Total</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card-box widget-box-two widget-two-primary">
                                        <i class="fa fa-cubes widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Bahan</p>
                                            <h2><span data-plugin="counterup">0</span></h2>
                                            <p class="text-muted m-0"><b>Jumlah Total</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card-box widget-box-two widget-two-orange">
                                        <i class="fa fa-hand-paper-o widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Pengembalian</p>
                                            <h2><span data-plugin="counterup">0</span></h2>
                                            <p class="text-muted m-0"><b>Pending</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card-box widget-box-two widget-two-purple">
                                        <i class="fa fa-edit widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Permintaan</p>
                                            <h2><span data-plugin="counterup">0</span></h2>
                                            <p class="text-muted m-0"><b>Pending</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="card-box widget-box-two widget-two-info">
                                        <i class="fa fa-user widget-two-icon"></i>
                                        <div class="wigdet-two-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Profile</p>
                                            <h3><?php echo $_SESSION['name']?></h3>
                                            <p class="text-muted m-0"><b><?php echo $_SESSION['role']?></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-box widget-box-two widget-two-default col-lg-12">
                                        <div class="col-lg-6">
                                            <h4><b>22</b> Permintaan Membutuhkan Konfimasi</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="permintaan.php" class="btn btn-block btn-primary waves-effect w-md waves-light m-b-5">Konfimasi Permintaan Sekarang <i class="mdi mdi-arrow-top-right"></i></a>
                                        </div>
                                        <hr style="height: 10px;">
                                        <div class="col-lg-6">
                                            <h4><b>22</b> Pengembalian Membutuhkan Konfimasi</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="permintaan.php" class="btn btn-block btn-primary waves-effect w-md waves-light m-b-5">Konfimasi Pengembalian Sekarang <i class="mdi mdi-arrow-top-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    <?=date('Y') ?> ©
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <?php include '_include/bottom.php' ?>

    </body>
</html>
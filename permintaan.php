 <?php include 'check.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '_include/top.php'; ?>
        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
                                    <h4 class="page-title">Permintaan </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Permintaan
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>List Permintaan</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        Daftar List Semua Permintaan.
                                    </p>
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center" width="1px">No</th>
                                            <th>Kepala Proyek</th>
                                            <th>Tanggal Permintaan</th>
                                            <th>Alat</th>
                                            <th>Jumlah Alat</th>
                                            <th>Bahan</th>
                                            <th>Jumlah Bahan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center"><i class="fa fa-cog"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        include 'config.php';
                                        $query = mysqli_query($conn, 'SELECT * FROM permintaan,detail_permintaan,alat,detail_alat,bahan,detail_bahan,user WHERE permintaan.id_permintaan=detail_permintaan.id_permintaan AND alat.id_alat=detail_permintaan.id_alat AND bahan.id_bahan=detail_permintaan.id_bahan AND bahan.id_bahan=detail_bahan.id_bahan AND alat.id_alat=detail_alat.id_alat AND user.id_user=detail_permintaan.id_user;');
                                        $result = array(); 
						                while ($data = mysqli_fetch_array($query)){$result[]=$data;}
						                foreach ($result as $i) {
						                	$no++ ;
										?>
										<tr>
											<td class="text-center"><?php echo $no ?></td>
                                            <td><?php echo $i['name'] ?></td>
                                            <td><?php echo $i['tgl_permintaan'] ?></td>
                                            <td><?php echo $i['nama_alat'] ?></td>
                                            <td><?php echo $i['jumlah_alat'].' '.$i['unit_alat'] ?></td>
                                            <td><?php echo $i['nama_bahan'] ?></td>
                                            <td><?php echo $i['jumlah_bahan'].' '.$i['unit_bahan'] ?></td>
                                            <td class="text-center font-bold"><?php echo $i['status'] ?></td>
											<td class="text-center"><a href="profile.php?acc=<?php echo $i['username'] ?>">Details <i class="mdi mdi-arrow-top-right"></i></a></td>
                                        </tr>
										<?php } ?>
                                        </tbody>
                                    </table>
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
        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "assets/plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>


    </body>
</html>
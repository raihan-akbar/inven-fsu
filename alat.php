<?php include 'check.php'; ?>
<?php 
include 'config.php';

if (isset($_POST['add_alat'])) {
    $nama_alat = $_POST['nama_alat'];
    $stock_alat = $_POST['stock_alat'];
    $unit_alat = $_POST['unit_alat'];

    $insert_alat = "INSERT INTO alat VALUES(NULL,'$nama_alat','$stock_alat')";

    if ($conn->query($insert_alat) === TRUE) {
        $get_id_alat = "SELECT * FROM alat ORDER BY id_alat DESC LIMIT 1";
        $result = mysqli_query($conn, $get_id_alat);
        if ($result->num_rows == 0) {
            $id_alat = 1;
        }else{
            $row = mysqli_fetch_assoc($result);
            $id_alat = $row['id_alat'];
        }

        $insert_detail_alat = "INSERT INTO detail_alat VALUES(NULL,'$id_alat','$nama_alat','$unit_alat','Layak')";
        if ($conn->query($insert_detail_alat) === TRUE) {
            header('Location:alat.php?insert=11');
        }else{
            header('Location:alat.php');
        }
    }else{
        header('Location:alat.php?insert=01');

    }

}

?>
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
                                    <h4 class="page-title">Persediaan </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Persediaan
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box table-responsive">
                                                        <div class="col-md-12 text-right">
                                                            <button data-toggle="modal" data-target="#add-alat-modal" class="btn btn-primary btn-sm">
                                                                Tambah Alat <i class="mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                        <h4 class="m-t-0 header-title"><b>List Alat</b></h4>
                                                        <p class="text-muted font-13 m-b-30">
                                                            Daftar List Semua Alat.
                                                        </p>
                                                        <table id="datatable-responsive"
                                                               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                                               width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center" width="1px">No</th>
                                                                <th>Nama Alat</th>
                                                                <th>Jumlah Stock</th>
                                                                <th>Unit</th>
                                                                <th>Status Kelayakan</th>
                                                                <th class="text-center"><i class="fa fa-cog"></i></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            include 'config.php';
                                                            $query = mysqli_query($conn, 'SELECT * FROM alat,detail_alat WHERE alat.id_alat=detail_alat.id_alat ORDER BY alat.id_alat ASC');
                                                            $result = array(); 
                                                            while ($data = mysqli_fetch_array($query)){$result[]=$data;}
                                                            foreach ($result as $i) {
                                                                $no++ ;
                                                            ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no ?></td>
                                                                <td><?php echo $i['nama_alat'] ?></td>
                                                                <td><?php echo $i['stock_alat'] ?></td>
                                                                <td><?php echo $i['unit_alat'] ?></td>
                                                                <td><?php echo $i['status_kelayakan'] ?></td>
                                                                <td class="text-center"><a href="profile.php?acc=<?php echo $i['username'] ?>">Details <i class="mdi mdi-arrow-top-right"></i></a></td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </div>

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

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
        <!-- Modal-Effect -->
        <script src="assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="assets/plugins/custombox/js/legacy.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-responsive-2').DataTable();
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

<div id="add-alat-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tambah Item Alat <i class="mdi mdi-plus"></i> </h4>
            </div>
            <form method="POST" action="persediaan.php" data-parsley-validate novalidate>
            <div class="modal-body">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Alat</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Alat" required name="nama_alat" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Jumlah Stock</label>
                            <input type="number" min="0" class="form-control" placeholder="Jumlah Stock" required name="stock_alat" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Unit</label>
                            <input type="text" class="form-control" placeholder="Satuan Unit Stock" required name="unit_alat" />
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" name="add_alat" class="btn btn-primary waves-effect waves-light">Tambahkan <i class="mdi mdi-plus"></i> </button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- /.modal -->
</div>

<script type="text/javascript">
         $(document).ready(function() {
            $('form').parsley();
         });
            $(function () {
                $('#add_form').parsley().on('field:validated', function () {
                    var ok = $('.parsley-error').length === 0;
                    $('.alert-info').toggleClass('hidden', !ok);
                    $('.alert-warning').toggleClass('hidden', ok);
                })
                .on('form:submit', function () {
                    return false;
                });
            });
      </script>
    </body>
</html>
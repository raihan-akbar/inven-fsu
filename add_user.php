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
                           <h4 class="page-title">Add New User Account <i class="mdi mdi-plus"></i> </h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="user.php">User</a>
                              </li>
                              <li class="active">
                                 Add New User
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="p-20">
                     <form id="add_form" action="add_user" method="post" data-parsley-validate novalidate>
                        <div class="form-group">
                           <label>Register</label>
                           <input type="date" name="name" disabled="disabled" value="<?php echo date('Y-m-d') ?>" parsley-trigger="change" required placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                           <label>Nama Lengkap<span class="text-danger">*</span></label>
                           <input type="text" name="name" parsley-trigger="change" required placeholder="Masukan Nama Lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                           <label>Username <span class="text-danger">*</span><span class="text-default" id="result"></span></label>
                           <input type="text" name="name" id="username" parsley-trigger="change" required placeholder="Set Username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                           <label>Email <span class="text-danger">*</span><span class="text-default" id="result2"></span></label>
                           <input type="email" name="email" id="email" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                           <label>Role<span class="text-danger">*</span></label>
                           <select class="form-control">
                              <option class="bg-dark" disabled="disabled" selected="selected">
                                  - - Pilih Role
                              </option>
                              <option value="Admin">
                                 Admin
                              </option>
                              <option value="Staff">
                                 Staff
                              </option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Set New Password<span class="text-danger">*</span></label>
                           <input type="password" name="password" id="pass1" parsley-trigger="change" required placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                           <label>New Password Cofirmation<span class="text-danger">*</span></label>
                           <input type="password" name="pass2" data-parsley-equalto="#pass1" id="pass2" parsley-trigger="change" required placeholder="Password Confirmation" class="form-control">
                        </div>
                        <div class="form-group text-right m-b-0">
                           <a href="user.php" name="delete" class="text-primary waves-effect waves-light" type="submit">
                           <i class="mdi mdi-chevron-left"></i> Back to User
                           </a>
                           <button type="submit" name="add" id="add" class="btn btn-success waves-effect m-l-5" disabled>
                           Add User <i class=" mdi mdi-check"></i>
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- container -->
            </div>
            <!-- content -->
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
      <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>

      <script type="text/javascript">
         $(document).ready(function() {
             $('#username').keyup(function() {
                 var uname = $('#username').val();
                 if(uname == 0) {
                     $('#result').text('');
                 }
                 else {
                     $.ajax({
                            url: 'username_checker.php',
                            type: 'POST',
                            data: 'username='+uname,
                            success: function(hasil) {
                                if(hasil == 1) {
                                    $('#result').text(' | Tidak Tersedia');
                                    document.getElementById('result').style.color = 'Orange';
                                    document.getElementById('username').style.borderColor = "red";
                                    document.getElementById("add").disabled = true;
                                }
                                else {
                                    $('#result').text(' | Tersedia');
                                    document.getElementById('result').style.color = 'green';
                                    document.getElementById('username').style.borderColor = "#e3e3e3";
                                    document.getElementById("add").disabled = false;

                                }
                            }
                     });
                 }
             });
         });
         </script>

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
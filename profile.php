<?php include 'check.php'; ?>
<?php 
   if(isset($_GET['acc'])){
       $get_uname = $_GET['acc'];
       $sql = "SELECT * FROM user WHERE username='$get_uname'";
       $result = mysqli_query($conn, $sql);
       if ($result->num_rows == 1) {
           $data = mysqli_fetch_assoc($result);
       }else{
       header('Location:user.php');  
       }
   }
   else{
       header('Location:user.php');
   }
   ?>
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
                           <h4 class="page-title"><?php echo $data['name']; ?></h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="user.php">User</a>
                              </li>
                              <li>
                                 <a href="#">Profile </a>
                              </li>
                              <li class="active">
                                 <?php echo $data['username']; ?>
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="p-20">
                     <form action="#" data-parsley-validate novalidate>
                        <div class="form-group">
                           <label for="userName">Resgitered At</label>
                           <input type="text" name="name" disabled="disabled" value="<?php echo $data['register']; ?>" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                           <label for="userName">Full Name<span class="text-danger">*</span></label>
                           <input type="text" name="name" value="<?php echo $data['name']; ?>" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                           <label for="userName">Email Address<span class="text-danger">*</span></label>
                           <input type="text" name="name" value="<?php echo $data['email']; ?>" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                           <label for="userName">Role<span class="text-danger">*</span></label>
                           <select class="form-control">
                              <option class="bg-dark" disabled="disabled" selected="selected" value="<?php echo $data['role']; ?>">
                                 <?php echo $data['role']; ?>
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
                           <label for="userName">Set New Password<span class="text-danger">*</span></label>
                           <input type="password" name="name" parsley-trigger="change" required placeholder="Set New Password" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                           <label for="userName">New Password Cofirmation<span class="text-danger">*</span></label>
                           <input type="password" name="name" parsley-trigger="change" required placeholder="New Password Confirmation" class="form-control" id="userName">
                        </div>
                        <div class="form-group text-right m-b-0">
                           <a type="submit" name="delete" class="text-danger waves-effect waves-light" type="submit">
                           Delete User <i class="fa fa-trash-o"></i>
                           </a>
                           <button type="submit" name="update" class="btn btn-success waves-effect m-l-5">
                           Update <i class=" mdi mdi-check"></i>
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
   </body>
</html>
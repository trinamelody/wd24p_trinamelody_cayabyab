<?php include('../includes/authentication.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | CK Travel and Tours</title>
   <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="../../../assets/cktravel_logo.png" />
  <?php // include('../includes/css_dependencies.php') ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/dist/css/adminlte.min.css">

  <!-- Modals -->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/toastr/toastr.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include('../includes/preloader.php') ?>
    <!-- ============================================================== -->
	<!-- Navbar -->
	<!-- ============================================================== -->
    <?php include('../includes/navbar.php') ?>
    <!-- ============================================================== -->
	<!-- End of Navbar -->
	<!-- ============================================================== -->

    <!-- ============================================================== -->
	<!-- Sidebar -->
	<!-- ============================================================== -->
    <?php include('../includes/sidebar.php') ?>
    <!-- ============================================================== -->
	<!-- End of Sidebar -->
	<!-- ============================================================== -->


  <!-- ============================================================== -->
	<!-- Content Wrapper -->
	<!-- ============================================================== -->
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Administrator</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Administrator</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg"> <i class="fas fa-plus"></i> Add new admin</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="records"></tbody>
                  <tfoot>
                  <tr>
                    <th colspan="6">
                        <br>
                    </th>
                  </tr>
                  </tfoot>
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
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form id="quickForm" onsubmit="return store()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" id="fname" class="form-control" placeholder="Enter First Name" minlength="5" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" id="mname" class="form-control" placeholder="Enter Middle Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" id="lname" class="form-control" placeholder="Enter Last Name" minlength="5" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter Username" minlength="5" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter email" minlength="5" maxlength="30" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" minlength="5" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" id="confirm_password" class="form-control" placeholder="Confirm password" minlength="5" maxlength="20" required>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="add_btn" class="btn btn-primary" data-dismiss="">Submit</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <!-- /.content -->
  </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
	<!-- Navbar -->
	<!-- ============================================================== -->
    <?php include('../includes/footer.php') ?>
    <!-- ============================================================== -->
	<!-- End of Navbar -->
	<!-- ============================================================== -->

    
    <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


</body>
<?php // include('../includes/script_dependencies.php') ?>

<!-- jQuery -->
<script src="../../AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="../../AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE-3.2.0/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
   
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

<script src="../logout.js"></script>
<script src="scripts.js"></script>
</html>

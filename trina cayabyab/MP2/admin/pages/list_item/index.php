<?php include('../includes/authentication.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | CK Travel and Tours</title>
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
            <h1>List of Destinations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Destinations</li>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg"> <i class="fas fa-plus"></i> Add new destination</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th width="200px;">Name</th>
                    <th width="350px;">Description</th>
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
              <h4 class="modal-title">New Destination</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" id="destination" class="form-control" placeholder="Enter Destination Name" minlength="5" maxlength="20" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <input type="hidden" id="user_id" value="">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="add_btn" class="btn btn-primary" onclick="store()" data-dismiss="">Submit</button>
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

<!-- Block UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<!-- ****** -->

<script src="script.js"></script>
<script src="../logout.js"></script>
</html>

<?php include('../includes/authentication.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | CK Travel and Tours</title>
  <?php include('../includes/css_dependencies.php') ?>

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
    <?php // include('../includes/content_wrapper.php') ?>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Booked</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Booked</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    <!-- /.row -->
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="records"></tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
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
<?php include('../includes/script_dependencies.php') ?>
<script src="../logout.js"></script>
<script src="scripts.js"></script>
</html>

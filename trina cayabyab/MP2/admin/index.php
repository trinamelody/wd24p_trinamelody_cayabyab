<?php
    include_once("../api/login.php");

    if(empty($_SESSION['username'])){
        header('Location: ./login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | CK Travel and Tours</title>
  <?php include('./includes/css_dependencies.php') ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <?php include('./includes/preloader.php') ?>
    <!-- ============================================================== -->
	<!-- Navbar -->
	<!-- ============================================================== -->
    <?php include('./includes/navbar.php') ?>
    <!-- ============================================================== -->
	<!-- End of Navbar -->
	<!-- ============================================================== -->

    <!-- ============================================================== -->
	<!-- Sidebar -->
	<!-- ============================================================== -->
    <?php  include('./includes/sidebar.php') ?>
    <!-- ============================================================== -->
	<!-- End of Sidebar -->
	<!-- ============================================================== -->


    <!-- ============================================================== -->
	<!-- Content Wrapper -->
	<!-- ============================================================== -->
    <?php include('./includes/content_wrapper.php') ?>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
	<!-- Navbar -->
	<!-- ============================================================== -->
    <?php include('./includes/footer.php') ?>
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
<?php include('./includes/script_dependencies.php') ?>
<script src="scripts.js"></script>
<script src="js/logout.js"></script>
</html>

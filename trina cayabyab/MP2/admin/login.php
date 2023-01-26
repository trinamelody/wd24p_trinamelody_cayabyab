<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/thp-logo.png">
  <title>Control Panel Login</title>
  <?php include './pages/load_on_page_start.php' ?>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
      <div class="inner-panel">
        <a href="javascript:void(0)" class="p-20 di"><img src="../assets/cktravel_logo.png" width="100px" height="auto"></a>
        <div class="lg-content">
          <h2>CK TRAVEL & TOURS</h2>
          <p class="text-muted">Find Your Best Holiday</p>
        </div>
      </div>
    </div>
    <div class="new-login-box">
      <div class="white-box">
        <h3 class="box-title m-b-0">Sign In to CK Travel Admin Dashboard</h3>
        <small>Enter your details below</small>
        <form class="form-horizontal new-lg-form"></form>
          <div class="form-group  m-t-20">
            <div class="col-xs-12">
              <label>Username or Email</label>
              <input class="form-control" type="text" required="" placeholder="Username or email" id="username" name="username">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <label>Password</label>
              <input class="form-control" type="password" required="" placeholder="Password" id="password" name="password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12 ">
              <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
            </div>
          </div>
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" onclick="login()" type="submit">Log In</button>
            </div>
          </div>
        </form>
      </div>
    </div>


  </section>
  
  <?php include './pages/load_on_page_end.php' ?>
  <script src="./js/log-in.js"></script>

</body>

</html>
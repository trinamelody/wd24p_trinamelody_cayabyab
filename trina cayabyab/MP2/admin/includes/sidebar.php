  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../admin" class="brand-link">
      <img src="../assets/cktravel_logo.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">Travel and Tours</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" id="admin_name"></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/pre_register" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pre-register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/paid_dp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Downn Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/fully_paid" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fully Paid</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/booked" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booked</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/list_item" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/list_item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Destinations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/add_item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Destinations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/expired_item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expired Destinations</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item">
            <a href="pages/admin_list" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
                Adminintrators
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/admin_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/active_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/deactivated_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deactivated Admins</p>
                </a>
              </li>
            </ul> -->
          </li>       
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="logout()">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>    
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
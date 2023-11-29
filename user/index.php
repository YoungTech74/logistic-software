<?php 
 
  include_once '../connection.php';
  include_once './header.php'; 
  include_once './navbar.php'; 
  include_once './sidebar.php'; 

  
   
    $username = $_SESSION['user'];
    $sender_name = $_SESSION['fullname'];

// ------------------------------fetch total packages from db for login user -----------------------
    $totalPackages = "SELECT COUNT(sender_name) AS total FROM packages WHERE sender_name = '$sender_name'" or die(mysqli_error($conn));
    $query = mysqli_query($conn, $totalPackages);
    while($row = mysqli_fetch_assoc($query)){
      $total = $row['total'];
    }

    $totalPackages = "SELECT COUNT(sender_name) AS accept FROM packages WHERE sender_name = '$sender_name' && accept = 1 && seen = 1" or die(mysqli_error($conn));
    $query2 = mysqli_query($conn, $totalPackages);
    while($row = mysqli_fetch_assoc($query2)){
      $accept = $row['accept'];
    }

    $totalPackages = "SELECT COUNT(sender_name) AS decline FROM packages WHERE sender_name = '$sender_name' && accept = 0 && seen = 1" or die(mysqli_error($conn));
    $query3 = mysqli_query($conn, $totalPackages);
    while($row = mysqli_fetch_assoc($query3)){
      $decline = $row['decline'];
    }

    $totalComplaint = "SELECT SUM(inbox_count) AS complaint FROM complaints WHERE username = '$username'" or die(mysqli_error($conn));
    $query4 = mysqli_query($conn, $totalComplaint);
    while($row = mysqli_fetch_assoc($query4)){
      $complaint = $row['complaint'];
    }

    $gifted_card = 0;
    $get_gifted_card = mysqli_query($conn, "SELECT COUNT(gift_card)  AS gifted_card FROM users WHERE email = '$_SESSION[email]' && seen = 0");
    
    if(mysqli_num_rows($get_gifted_card) > 0){
      while($gift = mysqli_fetch_assoc($get_gifted_card)){
        $gifted_card = $gift['gifted_card'];
      }
      // $gifted_card = ;
    }else {
   
  }
?>
  <title>User Dashboard</title>
  
 

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info text-center">
              <div class="inner">
                <h5>Packages Sent</h5>

                <!-- <p>New Orders</p> -->
                <br>
                <p><?php echo $total ; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="./view_package_list.php" class="small-box-footer">View &nbsp; <i class="fas fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">


            <!-- small box -->
            <div class="small-box bg-success text-center">
              <div class="inner">
                <h5>Packages Accepted</h5><br>

                <p><?php echo $accept ;?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="Accepted_package.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">


            <!-- small box -->
            <div class="small-box bg-danger text-center">
              <div class="inner">
                <h5>Packages Declined</h5><br>

                <p><?php echo $decline ; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="declined_package.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">


            <!-- small box -->
            <div class="small-box bg-warning text-white text-center">
              <div class="inner">
                <h5 class="text-white">Inbox</h5><br>

                <p class="text-white"><?php echo $complaint + $gifted_card; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="view_message.php" class="small-box-footer"><span class="text-white">View</span>  <i class="fas fa-arrow-circle-right text-white"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  <!-------------------------- footer secton starts ----------------------- -->
  <?php include_once './footer.php'; ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="include/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="include/js/pages/dashboard.js"></script>
</body>
</html>

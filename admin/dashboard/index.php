<?php 
error_reporting(0);
include_once './header.php';     
include_once '../../connection.php';
include_once './navbar_view_parcel.php'; 
    
   include_once './sidebar.php';
   

 

$username = $_SESSION['admin_user'];
$id = $_SESSION['admin_user'];
// ------------------------------fetch total packages from db for login user -----------------------
$totalPackages = "SELECT COUNT(courier_name) AS total FROM packages WHERE  '$username' != sender_name" or die(mysqli_error($conn));
$query = mysqli_query($conn, $totalPackages);
while($row = mysqli_fetch_assoc($query)){
  $total = $row['total'];
}

$totalPackages = "SELECT COUNT(courier_name) AS accept FROM packages WHERE  '$username' != sender_name && seen = 1 && accept = 1" or die(mysqli_error($conn));
$query2 = mysqli_query($conn, $totalPackages);
while($row = mysqli_fetch_assoc($query2)){
  $accept = $row['accept'];
}

$totalPackages = "SELECT COUNT(courier_name) AS decline FROM packages WHERE '$username' != sender_name && seen = 1 && accept = 0" or die(mysqli_error($conn));
$query3 = mysqli_query($conn, $totalPackages);
while($row = mysqli_fetch_assoc($query3)){
  $decline = $row['decline'];
}

$totalPackages = "SELECT COUNT(username) AS complaint FROM complaints" or die(mysqli_error($conn));
$query4 = mysqli_query($conn, $totalPackages);
while($row = mysqli_fetch_assoc($query4)){
  $complaint = $row['complaint'];
}


$totalPackages = "SELECT COUNT(full_name) AS user FROM users WHERE user_type = 0" or die(mysqli_error($conn));
$query4 = mysqli_query($conn, $totalPackages);
while($row = mysqli_fetch_assoc($query4)){
  $user = $row['user'];
}

$getMsg = "SELECT * FROM admin_messages";
$result = mysqli_query($conn, $getMsg);
if($result){
  $sum = "SELECT SUM(new_messages) AS sumMsg FROM admin_messages";
  $querySum = mysqli_query($conn, $sum);
  while($rowSum = mysqli_fetch_assoc($querySum)){
    $newMsg = $rowSum['sumMsg'];
  }
}
?>
  <title>Dashboard</title>
  
 

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
                <h5>All Packages</h5><br>

                <p><?php echo $total; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="./parcel_list.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success text-center">
              <div class="inner">
                <h5>Packages Accepte</h5><br>

                <p><?php echo $accept; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="parcel_accepted.php" class="small-box-footer">View<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger text-center">
              <div class="inner">
                <h5>Packages Declined</h5><br>

                <p><?php echo $decline; echo $_SESSION['admin_message'];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="parcel_declined.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning text-center">
              <div class="inner">
                <h5>All Complaints</h5><br>

                <p><?php echo $complaint; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="view_complaint.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger text-center">
              <div class="inner">
                <h5>All Customers</h5><br>

                <p><?php echo $user; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="view_customer.php" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
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
  <?php include_once './footer.php'; 
        include_once './include/js_libraries.php';
  ?>

</body>
</html>

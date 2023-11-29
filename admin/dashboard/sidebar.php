<?php
include_once '../../connection.php'; 


?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
  <img src="include/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="">
  <h2 class="brand-text font-weight-light">Logistics</h2>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">

    <?php 
      if(isset($_SESSION['admin_user'])){
        $id = $_SESSION['admin_user'];

        $sql = "SELECT * FROM users" or die(mysqli_error($conn));
        $result = mysqli_query($conn, $sql);
        if($row = mysqli_fetch_assoc($result)){
          $userImaage = $row['image'];
        ?>
        <div style="margin: auto">
          <div class="image" >
           
            <img src="../../images/<?php echo $userImaage; ?>" class="img-circle elevation-2" style="width: 40px; height: 40px; border: 2px solid grey;" alt="User Image">
            
              </div><br>
              <div class="info">
                <a href="index.php" class="d-block"><?php echo $_SESSION['admin_user']; ?></a>
              </div>
          </div>
          </div>
        <?php
}
      }else {?>

          <div class="image">
                <img src="../../images/scientist.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="index.php" class="d-block"><?php echo $_SESSION['admin_user']; ?></a>
              </div>
            </div>
        <?php
      }

    ?>
   

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
            
          </p>
        </a>
        <ul class="nav nav-treeview">
        </ul>
      </li>

      
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Customer 
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="./view_customer.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>View Customers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./gift_card.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Gift Card</p>
            </a>
          </li>

        </ul>
      </li>
   
<!------------------------------------- branch staff section starts --------------------------- -->
      
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Parcels
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="./parcel_list.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>View All List</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="parcel_accepted.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Accepted</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="parcel_declined.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Declined</p>
            </a>
          </li>


        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Complaints 
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
          </p>
        </a>
        <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="view_complaint.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>View Complaints</p>
            </a>
          </li>

        </ul>
      </li><br><br>
       
    </ul>
  </nav>
</div>
</aside>
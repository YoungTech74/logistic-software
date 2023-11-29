 <?php

  include_once '../../connection.php';
  
  if(!isset($_SESSION['admin_user'])){

    header('location: ../../login.php');
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

<style>
        .dropdown-btn {
            background:  rgb(223, 216, 216);
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
           
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background: black;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgb(0,0,0,0.2);
            z-index: 1;
            text-align: center;
            margin-left: -25px;
            border-radius: 10px;
            

        }
        .dropdown-content a {
            color: green;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background: pink;
            color: black;
            border-radius: 10px;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropdown-btn {
            background: rgb(141, 139, 139);

        }

        .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
      }
      .btn-rounded{
            border-radius: 50px;
      }
    </style>

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./index.php" class="nav-link bg-info me-3 text-white" style="border-radius: 5px;">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./contact.php" class="nav-link bg-info  text-white" style="border-radius: 5px;">Contact</a>
      </li>


      <?php
        if(isset($_SESSION['admin_user'])){

          $qu = "SELECT * FROM admin_messages";
          $result = mysqli_query($conn, $qu);
         
          while($row = mysqli_fetch_assoc($result)){
          if($row['new_messages'] == 0){?>
                <li class="nav-item ">
                  <a class="nav-link"  href="new_messages.php">
                    <i class="far fa-comments"></i>
                    <span id="new_message" class="badge badge-danger navbar-badge"></span>
                  </a> 
                </li>
            <?php
          }else {?>
              <li class="nav-item ">
                <a class="nav-link"  href="new_messages.php">
                  <i class="far fa-comments"></i>
                  <span id="new_message" class="badge badge-danger navbar-badge"><?php echo  $newMsg; 
                  ?></span>
                </a> 
              </li>
          <?php
            
          }
        }
      }
      ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
            <div class="btn-group nav-link me-3">
                  <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                   
                    <span style="font-size: 15px;" class="me- p-3"><?php echo $_SESSION['admin_fullname']; ?></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>


                  <div class="dropdown-menu ms-3" role="menu">
                    <a class="dropdown-item" href="update_profile.php"><span class="fa fa-user"></span> My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
                  </div>

              </div>
          </li>
     
    </ul>

    
  </nav>
  <!-- /.navbar -->
<?php 
include_once '../connection.php';
 include_once './header.php';
 include_once './navbar.php';
 include_once './sidebar.php'; 
 

 $success = "";


 ?>
  <title>Message Menu</title>
  
 

  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 80%;
    margin: auto;
  }

  .msg {
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            width: 110px;
        }
</style>
<div class="main_container content-wrapper">
  <div class="col-lg-12 content-wrappe">
    <div class="card card-outline card-primary"><br>
    <span id="getMessages"><?php echo $success; ?></span>
      <div class="card-body">

        <form action="" id="manage-branch" method="POST">
          <h1 class="text-center">Your Inbox</h1>

          <div class="row">


           <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"></h4> <span class="float-right"><a href="./dashboard.php"><i class="fa fa-arrow-left text-white" style="margin-top: -20px;"></i></a></span>
                            </div>


                            
                            <!----------------------- display gifted card new messages here  -------------->
                            <?php
                          $adminDetail = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 1");
                          while($admin = mysqli_fetch_assoc($adminDetail)){
                              $adminName = $admin['username'];
                          }
                            $gift_card = mysqli_query($conn, "SELECT * FROM users WHERE seen = 0 && username = '$_SESSION[user]' ORDER BY id DESC");
                            if(mysqli_num_rows($gift_card) > 0){
                                while($gift_message = mysqli_fetch_assoc($gift_card)){?>
                                    <a href="message_body.php?gifted_id=<?php echo $gift_message['id']; ?>">
                                        <div class="row" style="margin: 0px 20px 20px 20px; padding-top: 30px; background: rgb(245, 203, 139);">

                                            <div class="col-md-12 ">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px; background: rgb(245, 203, 139);"> <span style="margin-top: -30px;  color: red;">New</span>
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-white">Sender: <?php echo $adminName; ?></h5>
                                                        
                                                            <p class="m-b-0 msg"><?php echo $gift_message['gift_card']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                        <?php
                                    
                                    }
        
                                ?>
                    

                    <?php
                            }
                            //--------------------------------- display gifted card old messages for the login user 
                            $gift_card_empty = mysqli_query($conn, "SELECT * FROM users WHERE seen = 1  && username = '$_SESSION[user]' && email = '$_SESSION[email]'");
                                while($gift = mysqli_fetch_assoc($gift_card_empty)){?>

                                  <a href="message_body.php?gifted_id=<?php echo $gift['id']; ?>">
                                        <div class="row" style="margin: 0px 20px 20px 20px; padding-top: 30px; background: rgb(188, 186, 183);">

                                            <div class="col-md-12 ">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px; background: rgb(188, 186, 183);">
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-white">Sender: <?php echo $adminName; ?></h5>
                                                            <p class="m-b-0 msg"><?php echo $gift['gift_card']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                        <?php
                                    
                                    }
        
                                ?>
                                <?php
                            // }
                        ?>


                            <?php
                            //------------------------------ get new messages for the login user 
                            $adminDetail = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 1");
                            while($admin = mysqli_fetch_assoc($adminDetail)){
                                $adminName = $admin['username'];
                            }
                            $check_message = mysqli_query($conn, "SELECT * FROM complaints WHERE inbox_count = 1 && username = '$_SESSION[user]' ORDER BY id DESC");
                            if(mysqli_num_rows($check_message) > 0){
                                while($message = mysqli_fetch_assoc($check_message)){?>
                                    <a href="message_body.php?mgs_content_id=<?php echo $message['id']; ?>">
                                        <div class="row" style="margin: 0px 20px 20px 20px; padding-top: 30px; background: rgb(245, 203, 139);">

                                            <div class="col-md-12 ">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px; background: rgb(245, 203, 139);"> <span style="margin-top: -30px;  color: red;">New</span>
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-white">Sender: <?php echo $adminName; ?></h5>
                                                            <p class="m-b-0 msg"><?php echo $message['message']; ?></p>
                                                            <span class="float-right text-white" style="margin-bottom: -40px;"><?php echo $message['date_created'];?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                        <?php
                                    
                                    }
        
                                ?>

                                <?php
                            }
                            //--------------------------------- display old messages for the login user 
                            $get_message = mysqli_query($conn, "SELECT * FROM complaints WHERE inbox_count = 0  && username = '$_SESSION[user]'");
                                while($msg = mysqli_fetch_assoc($get_message)){?>

                                  <a href="message_body.php?mgs_content_id=<?php echo $msg['id']; ?>">
                                        <div class="row" style="margin: 0px 20px 20px 20px; padding-top: 30px; background: rgb(188, 186, 183);">

                                            <div class="col-md-12 ">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px; background: rgb(188, 186, 183);">
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-white">Sender: <?php echo $adminName; ?></h5>
                                                            <p class="m-b-0 msg"><?php echo $msg['message']; ?></p>
                                                            <span class="float-right text-white" style="margin-bottom: -40px;"><?php echo $msg['date_created'];?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                        <?php
                                    
                                    }
        
                                ?>
                                <?php
                            // }
                        ?>

                        
          </div>
        </form>
      </div>
      
     

    </div>
  </div>    
</section>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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

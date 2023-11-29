<?php 
include_once '../connection.php';
 include_once './header.php';
 include_once './navbar.php';
 include_once './sidebar.php'; 
 
 if(isset($_GET['mgs_content_id'])){
        
    $msg_content_id = $_GET['mgs_content_id'];

    mysqli_query($conn, "UPDATE complaints SET inbox_count = 0 WHERE id = '$msg_content_id'");

    $get_message = mysqli_query($conn, "SELECT * FROM complaints WHERE id = '$msg_content_id' LIMIT 1");

}
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
          
             inline-size: 750px;
            overflow-wrap: break-word;
        }
</style>
<div class="main_container content-wrapper">
  <div class="col-lg-12 content-wrappe">
    <div class="card card-outline card-primary"><br>
    <span id="getMessages"><?php echo $success; ?></span>
      <div class="card-body">

        <form action="" id="manage-branch" method="POST">

          <div class="row">


           <div class="col-lg-12">
                        <div class="card card-outline-primary bg-">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Your Inbox</h4> <span class="float-right"><a href="./dashboard.php"><i class="fa fa-arrow-left text-white" style="margin-top: -20px;"></i></a></span>
                            </div>

                            <?php
                            //------------------------------ display body messages from complaint table-------------- 
                            //------------------------------- admin incoming messages -------------------------
                            if(isset($_GET['mgs_content_id'])){
                              $msg_content_id = $_GET['mgs_content_id'];
                               $adminDetail = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 1");
                            while($admin = mysqli_fetch_assoc($adminDetail)){
                                $adminName = $admin['username'];
                            }
                            $check_message = mysqli_query($conn, "SELECT * FROM complaints WHERE id = '$msg_content_id' && username = '$_SESSION[user]' ORDER BY id DESC");
                            if(mysqli_num_rows($check_message) > 0){
                                while($message = mysqli_fetch_assoc($check_message)){?>
                                    <div style="background:  padding-top: 20px;">

                                        <div class="row" style="margin: 0px 20px 20px 20px;width: 90%; padding-top: 30px;  float: left;">

                                            <div class="col-md-12 " style="width: 50%;">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px;">
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-dark ml-3"><?php echo $adminName; ?></h5>
                                                            <p class="m-b-0 msg ml-3"><?php echo $message['reply']; ?>
                                                            <span class="float-right text-dark " style="margin-top: 40px; margin-right: 10px; font-size: 12px;"><?php echo $message['date_created'];?></span>
                                                        </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!------------------------------ sender outgoing messages  -------------------------->
                                        <?php
                                        $adminDetail = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 0 && username = '$_SESSION[user]'");
                                            while($admin = mysqli_fetch_assoc($adminDetail)){
                                                $userName = $admin['username'];
                                        }
                                        ?>
                                          <div class="row" style="margin: 0px 20px 20px 20px;width: 90%; padding-top: 30px; float: right;">

                                            <div class="col-md-12 " style="width: 50%;">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px; margin-top: -70px; ">
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-dark ml-3"><?php echo $userName; ?></h5>
                                                            <p class="m-b-0 msg me-3 float-right"><?php echo $message['message']; ?>
                                                            <span class="float-right text-dark" style="margin-top: 40px; margin-right: 10px; font-size: 12px; float: left;"><?php echo $message['date_created'];?></span>
                                                        </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        </div>

                                        <?php
                                    
                                    }
        
                                ?>

                                <?php
                            }
                            
                          //------------------------------- display messages for gifted card ----------------------
                            }else if(isset($_GET['gifted_id'])){
                              $gifted_id = $_GET['gifted_id'];

                               $adminDetail = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 1");
                            while($admin = mysqli_fetch_assoc($adminDetail)){
                                $adminName = $admin['username'];
                            }

                            $gift_message = mysqli_query($conn, "SELECT * FROM users WHERE id = '$gifted_id' && username = '$_SESSION[user]' ORDER BY id DESC");
                            if(mysqli_num_rows($gift_message) > 0){
                                while($gift_msg = mysqli_fetch_assoc($gift_message)){?>
                                    <div style="background:  padding-top: 20px;">

                                        <div class="row" style="margin: 0px 20px 20px 20px;width: 90%; padding-top: 30px;  float: left;">

                                            <div class="col-md-12 " style="width: 50%;">
                                                <div class="card p-30" style="margin: 0px 20px 30px 20px;">
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h5 class="text-dark ml-3"><?php echo $adminName; ?></h5>
                                                            <p class="m-b-0 msg ml-3"><?php echo $gift_msg['gift_card']; ?>
                                                        </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        </div>

                                        <?php
                                    
                                    }

                                    mysqli_query($conn, "UPDATE users SET seen = 1 WHERE id = '$gifted_id'");
        
                                ?>

                                <?php
                            }
                            
                          
                            }
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

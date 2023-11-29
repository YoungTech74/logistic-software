<?php 
 include_once '../../connection.php';
 include_once './header.php'; 
 include_once './navbar_view_parcel.php'; 
 include_once './sidebar.php'; 

 
 $success = "";
$com_id = $_GET['msg_id'];

 $getUser = mysqli_query($conn, "SELECT * FROM complaints WHERE id = '$com_id'");
 while($row = mysqli_fetch_assoc($getUser)){
    $username = $row['username'];
 }
if(isset($_POST['make_complaint_btn'])){

    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));


    // $query = "INSERT INTO complaints VALUES(0, '$username', '$description', current_timestamp());" or die(mysqli_error($conn));
    $query = mysqli_query($conn, "UPDATE complaints SET reply = '$description', inbox_count = 1 WHERE id = '$com_id'");
    
    if($query){
      
        $success = '<div class="alert alert-success alert-dismissible fade show text-white me-3 ml-3" style="background: green;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Message sent Successfully. Thank You!
      </div>';
      ?>
        <script>
          setTimeout(() => {
            window.location.href = window.location.href;
            document.getElementById('getMessage').style.display = 'none';
          }, 3000);
        </script>
        <?php
    }
}

 ?>
  <title>Reply to a Complaint</title>
  
 

  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 80%;
    margin: auto;
  }
</style>
<div class="main_container content-wrapper">
  <div class="col-lg-12 content-wrappe">
    <div class="card card-outline card-primary"><br>
    <span id="getMessages"><?php echo $success; ?></span>
      <div class="card-body">

        <form action="" id="manage-branch" method="POST">
          <h1 class="text-center">Reply to <?php echo $username; ?>'s message</h1>
<center>
          <div class="row" style="width: 50%;">
            <div class="col-md-12">
              <div id="msg" class=""></div>

              <div class="row">

                <div class="col-sm-12 form-group ">
                  <label for="" class="control-label">Description</label>
                  <textarea name="description" id="" cols="30" rows="2" class="form-control" required><?php echo isset($street) ? $street : '' ?></textarea>
                </div>

                <div class="card-footer border-top border-info">
                <div class="d-flex w-100 justify-content-center align-items-center">
                    <button class="btn btn-flat  bg-gradient-primary mx-2" name="make_complaint_btn">Submit</button>
                    <a class="btn btn-flat bg-gradient-secondary mx-2" href="./view_complaint.php">Cancel</a>
                </div>
            </div>

              </div>
          </div>
          </center>
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

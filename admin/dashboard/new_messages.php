<?php 
// session_start();
// error_reporting(0);
 include_once '../../connection.php';
 include_once './header.php'; 
//  include_once './navbar.php'; 
 include_once './navbar_view_parcel.php'; 
 include_once './sidebar.php'; 



if(isset($_SESSION['admin_user'])){
	$id = $_SESSION['admin_user'];

	$fetchNewMessages = "SELECT * FROM packages WHERE seen = 0 ORDER BY package_id DESC"or die(mysqli_error($conn));
	$query = mysqli_query($conn, $fetchNewMessages);
   

    $upadteReadMessages = "UPDATE admin_messages SET read_messages = read_messages + new_messages, new_messages = 0" or die(mysqli_error($conn));
    $query2 = mysqli_query($conn, $upadteReadMessages);

	

}

 ?>
  <title>New Messages</title>
  
 
  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 100%;
  }
</style>

<div class="main_container content-wrapper">
<h2 style="padding: 10px;" class="text-center">List of New Messages</h2>

<?php

	if($row = mysqli_num_rows($query) == 0){?>
		<h3 class="text-center">No New Messages!</h3>
		<?php
	}else {?>
		<div class="col-lg-12">
	<div class="card card-outline card-primary">
	
		<div class="card-body">
			
                        <table class="table tabe-hover table-bordered" id="list">
                      
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Sender Name</th>
                                <th>Receiver Name</th>
                                <th>Courier Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                     <?php
					while ($row = mysqli_fetch_assoc($query)) {
                       
						?>
					
						<td width="20%" ><b><?php echo $row['company_name']; ?></b></td>
						<td width="20%" ><b><?php echo $row['sender_name'];  ?></b></td>
						<td width="20%" ><b><?php echo $row['receiver_name']; ?></b></td>
						<td width="20%" ><b><?php echo $row['courier_name']; ?></b></td>
						<td class="text-center">

            <ul class="navbar-nav ml-auto">
							<li class="nav-item">
									<div class="btn-group nav-link me-3">
										<button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
										
											<span style="font-size: 15px;" class="me- p-3">Action</span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>


										<div class="dropdown-menu me-4" role="menu" style="width: 30px;">
											<a class="dropdown-item" href="view_new_messages.php?parcel_id=<?php echo $row['package_id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
											<div class="dropdown-divider"></div>
										
											<a class="dropdown-item ms-" href="delete_parcel.php?delete_id=<?php echo $row['package_id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
										</div>

									</div>
								</li>
						</ul>
						</td>
					</tr>	
				<?php }
                
                ?>
				</tbody>
			</table>
		</div>
		<?php
	}
?>
	</div>
</div>
</div>





  <?php include_once 'footer.php'; ?>
</div>
	<?php include_once './include/js_libraries.php'; ?>
</body>
</html>

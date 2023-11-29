<?php 

 include_once '../connection.php';
 include_once './header.php'; 
 include_once './navbar.php'; 
 include_once './sidebar.php'; 


if(isset($_SESSION['fullname'])){
	$user = $_SESSION['fullname'];
	$package = "SELECT * FROM packages WHERE accept = 0 && seen = 1 && sender_name = '$user' ORDER BY package_id DESC"or die(mysqli_error($conn));
	$query = mysqli_query($conn, $package);
	
	

}
 ?>
  <title>Declined Package</title>
  
 
  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 100%;
  }

  .search_container {
	padding-top: 5px;
	/* margin: auto; */
	
  }
  .search_container  input {
	width: 40%;
	outline: none;
	margin-left: 200px;
	padding-top: 3px;
	padding-bottom: 5px;
  }
  .search_container button {
	margin-left: -4px;
	padding-left: 40px;
	border-radius: 0px 5px 5px 0px;
  }
</style>

<div class="main_container content-wrapper">
<h2 style="padding: 10px;" class="text-center">All Declined Packages</h2>
<div class="col-lg-12">
	<?php
		if($empty = mysqli_num_rows($query) == 0){?>
			<h2 style="padding: 10px;" class="text-center">There is NO Records!</h2>
			<?php
		}else {?>
			<div class="card card-outline card-primary">
		
			<!-- --------------------search section starts ----------------------->
		<div class="search_container">
			<form action="" method="POST">
				<input type="text" name="search" placeholder="Search by firstname, lastname or username">
				<button name="searchBtn" type="submit" class="btn btn-primary"><i class="fa fa-search text-center"></i></button>
			</form>
		</div>

		<div class="card-body">
			
				<?php
		//----------------------------search query-------------------------
	if(isset($_POST['searchBtn'])){
		$sql = mysqli_query($conn, "SELECT * FROM `packages` WHERE company_name like '%$_POST[search]%' && accept = 0 && sender_name = '$user' ORDER BY packages.package_id ASC");
		
		if(mysqli_num_rows($sql) == 0){?>
			<h4 style="margin-left: 20%;">Sorry, There is no match for your search! please try again</h4>
		<?php
			
		}else {?>
		<table class='table table-bordered table-hover'>
	
			<tr  style='background-color: #6db6b9e6;'>
				<th>Company Name</th>
				<th>Sender Name</th>
				<th>Receiver Name</th>
				<th>Courier Name</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		<?php

		while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
	
				<td width="20%" ><b><?php echo $row['company_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['sender_name'];  ?></b></td>
				<td width="20%" ><b><?php echo $row['receiver_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['courier_name']; ?></b></td>
				<td width="13%" ><b><?php echo $row['staus']; ?></b></td>
				<td>
				<?php
				?>
				<td>
			<ul class="navbar-nav ml-auto">
			<li class="nav-item">
					<div class="btn-group nav-link me-3">
						<button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
						
							<span style="font-size: 15px;" class="me- p-3">Action</span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>


						<div class="dropdown-menu me-4" role="menu" style="width: 30px;">
							<a class="dropdown-item" href="view_details.d.php?parcel_id=<?php echo $row['package_id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
							<div class="dropdown-divider"></div>
							
							<a onclick='javacript: declinePackage(event); return false;' class="dropdown-item ms-" href="delete_parcel.d.php?delete_id=<?php echo $row['package_id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
						</div>

					</div>
				</li>
				</ul>
				</td>
			<?php
		echo "</tr>";
	}
	echo "</table>";
		}
	}else {

		// -------------------if button is not pressed.-----------------------

		$package = "SELECT * FROM packages WHERE accept = 0 && seen = 1 && sender_name = '$user' ORDER BY package_id DESC"or die(mysqli_error($conn));
		$query = mysqli_query($conn, $package);
		?>
	<table class='table table-bordered table-hover'>
		<tr style='background-color: #6db6b9e6;'>

				<th>Company Name</th>
				<th>Sender Name</th>
				<th>Receiver Name</th>
				<th>Courier Name</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		<?php
	while($row = mysqli_fetch_assoc($query)){?>
		<tr>

			<td width="20%" ><b><?php echo $row['company_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['sender_name'];  ?></b></td>
				<td width="20%" ><b><?php echo $row['receiver_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['courier_name']; ?></b></td>
				<td width="13%" ><b><?php echo $row['status']; ?></b></td>
				
			<td>
			<ul class="navbar-nav ml-auto">
			<li class="nav-item">
					<div class="btn-group nav-link me-3">
						<button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
						
							<span style="font-size: 15px;" class="me- p-3">Action</span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>


						<div class="dropdown-menu me-4" role="menu" style="width: 30px;">
							<a class="dropdown-item" href="view_details.d.php?parcel_id=<?php echo $row['package_id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
							<div class="dropdown-divider"></div>
							
							<a onclick='javacript: declinePackage(event); return false;' class="dropdown-item ms-" href="delete_parcel.d.php?delete_id=<?php echo $row['package_id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
						</div>

					</div>
				</li>
				</ul>
			</td>
			<?php

			
		echo "</tr>";
	}
	echo "</table>";
}
			?>
		</div>
	</div>
			<?php
		}
	?>
	
</div>
</div>



  <?php include_once './footer.php'; ?>

</div>
	<?php include_once './include/js_libraries.php'; ?>


	<!-------------------------- confirmation function before deleting package  -------------------->
	<script>
		function declinePackage(e){
			var confirmDelete = confirm("Are you sure you want to decline this package?");
			if(confirmDelete){
				window.location = e.attr("href");
			}
		}
	</script>

</body>
</html>

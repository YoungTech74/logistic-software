<?php 
 include_once '../../connection.php';
 include_once './header.php'; 
 include_once './navbar_view_parcel.php'; 
 include_once './sidebar.php'; 



 ?>
  <title>Parcel accepted</title>
  
 
  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 100%;
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
	  .search_container {
	padding-top: 5px;
	/* margin: auto; */
	
  	}

	.search_container  input {
		width: 35%;
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
<h2 style="padding: 10px;" class="text-center">All Accepted Packages</h2>

<div class="col-lg-12">
	<div class="card card-outline card-primary">

	<!-- --------------------search section starts ----------------------->
	<div class="search_container">
			<form action="" method="POST">
				<input type="text" name="search" placeholder="Search by Company Name">
				<button name="searchBtn" type="submit" class="btn btn-primary"><i class="fa fa-search text-center"></i></button>
			</form>
		</div>

		
		<div class="card-body">
			<?php
		//----------------------------search query-------------------------
	if(isset($_POST['searchBtn'])){
		$sql = mysqli_query($conn, "SELECT * FROM `packages` WHERE company_name like '%$_POST[search]%' ORDER BY packages.package_id ASC");
		if(mysqli_num_rows($sql) == 0){?>
			<h4 style="margin-left: 20%;">Sorry, There is no match for your search! please try again</h4>
		<?php
			
		}else {?>
		<table class="table tabe-hover table-bordered" id="list">

		<thead>
			<tr>
				<th>Company Name</th>
				<th>Sender Name</th>
				<th>Receiver Name</th>
				<th>Courier Name</th>
				<th>Action</th>
			</tr>
		<?php

		while($row = mysqli_fetch_assoc($sql)){?>
			<tr>
	
				<td width="20%" ><b><?php echo $row['company_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['sender_name'];  ?></b></td>
				<td width="20%" ><b><?php echo $row['receiver_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['courier_name']; ?></b></td>
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
							<a class="dropdown-item" href="view_details.a.php?parcel_id=<?php echo $row['package_id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
							<div class="dropdown-divider"></div>
							
							<a onclick='javacript: acceptedPackage(event); return false;' class="dropdown-item ms-" href="delete_accepted_parcel.php?delete_id=<?php echo $row['package_id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
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
		// if button is not pressed.

	$sql = mysqli_query($conn, "SELECT * FROM `packages` WHERE accept = 1  ORDER BY packages.package_id DESC;");
		?>
	<table class='table table-bordered table-hover'>
	

			<tr style='background-color: #6db6b9e6;'>
				<th>Company Name</th>
				<th>Sender Name</th>
				<th>Receiver Name</th>
				<th>Courier Name</th>
				<th>Action</th>
			</tr>
		<?php
	while($row = mysqli_fetch_assoc($sql)){?>
		<tr>

			<td width="20%" ><b><?php echo $row['company_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['sender_name'];  ?></b></td>
				<td width="20%" ><b><?php echo $row['receiver_name']; ?></b></td>
				<td width="20%" ><b><?php echo $row['courier_name']; ?></b></td>
				
			<td>
			<ul class="navbar-nav ml-auto">
			<li class="nav-item">
					<div class="btn-group nav-link me-3">
						<button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
						
							<span style="font-size: 15px;" class="me- p-3">Action</span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>


						<div class="dropdown-menu me-4" role="menu" style="width: 30px;">
							<a class="dropdown-item" href="view_details.a.php?parcel_id=<?php echo $row['package_id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
							<div class="dropdown-divider"></div>
							
							<a onclick='javacript: acceptedPackage(event); return false;' class="dropdown-item ms-" href="delete_accepted_parcel.php?delete_id=<?php echo $row['package_id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
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
</div>
</div>

<!----------------------------------- delete function by target id  ------------------------>
<script>
	function acceptedPackage(e){
		var confirmBeforDelete = confirm("Are you sure you want to delete this package?");
		if(confirmBeforDelete){
			window.location = e.attr("href");
		}
	}
</script>

  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>

</div>
<?php include_once './include/js_libraries.php';?>
</body>
</html>

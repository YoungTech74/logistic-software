<?php 

 include_once '../connection.php';
 include_once './header.php'; 
 include_once './navbar.php';  
 include_once './sidebar.php'; 


if(isset($_SESSION['user'])){
	$id = $_SESSION['user'];

	$package = "SELECT * FROM complaints WHERE username = '$id'  ORDER BY id DESC"or die(mysqli_error($conn));
	$query = mysqli_query($conn, $package);
	

}
 ?>
  <title>List of Complaints</title>
  
 
  <style>
  textarea{
    resize: none;
  }
  .main_container {
    width: 100%;
  }

 
        .dropdown-btn {
            background: red;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
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

        }
        .dropdown-content a {
            color: green;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background: pink;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropdown-btn {
            background: purple;

        }
        .search_container {
	padding-top: 5px;
	padding-bottom: 5px;
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
<h2 style="padding: 10px;" class="text-center">List of Complaints</h2>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		
    	<!-- --------------------search section starts ----------------------->
		<div class="search_container">
			<form action="" method="POST">
				<input type="text" name="search" placeholder="Search by Username">
				<button name="searchBtn" type="submit" class="btn btn-primary"><i class="fa fa-search text-center"></i></button>
			</form>
		</div>



		<div class="card-body">
		
        <?php
		//----------------------------search query-------------------------
			if(isset($_POST['searchBtn'])){
				$sql = mysqli_query($conn, "SELECT * FROM `complaints` WHERE username like '%$_POST[search]%' && username = '$id' ORDER BY complaints.id DESC");
				if(mysqli_num_rows($sql) == 0){?>
					<h4 style="margin-left: 20%;">Sorry, There is no match for your search! please try again</h4>
				<?php

            }else {?>
			<table class="table table-bordered table-hover" id="list">
			
				<thead>
					<tr style='background-color: #6db6b9e6;'>
						<th>Username</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					 
                     while($row = mysqli_fetch_assoc($sql)){?>
						<tr>
					
						<td width="15%" ><b><?php echo $row['username']; ?></b></td>
						<td width="30%" ><b><?php echo $row['message']; ?></b></td>
						
						<td width="10%" class="text-center">
                       
                        <ul class="navbar-nav ml-auto">
							<li class="nav-item">
									<div class="btn-group nav-link me-3">
										<button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
										
											<span style="font-size: 15px;" class="me- p-3">Action</span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>


										<div class="dropdown-menu me-4" role="menu" style="width: 30px;">
											<!-- <a class="dropdown-item" href="accepted_list.php?parcel_id=<?php echo $row['id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
											<div class="dropdown-divider"></div> -->
											<a onclick='javascript: viewComplaint(event); return false;' class="dropdown-item ms-" href="delete_complaint.php?delete_id=<?php echo $row['id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
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
                    if(isset($_SESSION['user'])){
                        $id = $_SESSION['user'];
                    
                        $package = "SELECT * FROM complaints WHERE username = '$id'  ORDER BY id DESC"or die(mysqli_error($conn));
                        $query = mysqli_query($conn, $package);
                        
                    
                    }
                
                    ?>
                <table class="table table-bordered table-hover">
                <tr style='background-color: #6db6b9e6;'>
                    <th>Username</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>

            <?php
            while($row = mysqli_fetch_assoc($query)){?>

            </tr>
            <td width="15%" ><b><?php echo $row['username']; ?></b></td>
                <td width="30%" ><b><?php echo $row['message']; ?></b></td>
                
                <td width="10%" class="text-center">
               
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <div class="btn-group nav-link me-3">
                                <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                
                                    <span style="font-size: 15px;" class="me- p-3">Action</span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>


                                <div class="dropdown-menu me-4" role="menu" style="width: 30px;">
                                    <!-- <a class="dropdown-item" href="accepted_list.php?parcel_id=<?php echo $row['id'] ?>">View &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user" style=""></span></a>
                                    <div class="dropdown-divider"></div> -->
                                    <a onclick='javascript: viewComplaint(event); return false;' class="dropdown-item ms-" href="delete_complaint.php?delete_id=<?php echo $row['id'] ?>">Delete &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-trash text-danger"></span></a>
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




  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>

 
</div>

<?php include_once './include/js_libraries.php';?>


<!--------------------------- confirmation message before deleting complaint  ------------------------>
<script>
    function confirmDeletion(e){
        var confirmDelete = confirm("Are you sure you want to delete this record?");
        if(confirmDelete){
            window.location = e.attr("href");
        }
    }
</script>
</body>
</html>

<?php 

 include_once './header.php';
include_once './navbar_view_parcel.php';
 include_once './sidebar.php'; 

 

 ?>
  <title>customers List</title>
  <style>
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
 
  
  <body>
  <div class="main_container content-wrapper">
<div class="col-lg-12">
  			<div class="row containe m-aut">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-left: 38%;">User Information</h3>
                            </div>
                        </div>
                        

		<!-- --------------------search section starts ----------------------->
		<div class="search_container">
			<form action="" method="POST">
				<input type="text" name="search" placeholder="Search by Username">
				<button name="searchBtn" type="submit" class="btn btn-primary"><i class="fa fa-search text-center"></i></button>
			</form>
		</div>


		<?php
		//----------------------------search query-------------------------
			if(isset($_POST['searchBtn'])){
				$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE username like '%$_POST[search]%' && user_type = 0 ORDER BY users.id ASC");
				
				if(mysqli_num_rows($sql) == 0){?>
					<h4 style="margin-left: 20%;">Sorry, There is no match for your search! please try again</h4>
				<?php
				
			}else {?>
				<div class="row pb-5 containe m-auto" style="">
					<?php
							while($row = mysqli_fetch_assoc($sql)){
							$image = $row['image'];
							$fullname = $row['full_name'];
							$username = $row['username'];
							$email = $row['email'];
							$phone = $row['phone_number'];	
					?>
					<div class="card-body col-lg- col-12" style="margin-right: 10px; width: 80%; margin-bottom: 30px; border-radius: 10px; box-shadow: 5px 2px 7px rgb(174, 173, 173), -5px 2px 7px rgb(174, 173, 173);">

					<div class="row">
						<div>
							<p  class="text-cente"><img style="width: 200px; height: 150px;" src="../../images/<?= $image; ?>"></p>

						</div>
					</div>
					<div class="row" style="">
						<div class="card-body">
							<span style="font-size: 12px; font-style: italic; color: black;" >Full Name: </span> <span style="font-size: 12px; float: right; margin-right: 30px;"><?php echo $fullname; ?></span><hr>
							<span style="font-size: 12px; font-style: italic; color: black;" >Username: </span> <span style="font-size: 12px; float: right; margin-right: 50px;"><?php echo $username; ?></span><hr>
							<span style="font-size: 12px; font-style: italic; color: black;" >Email: </span> <span style="font-size: 12px; float: right;"   class="text-cente"><?php echo $email; ?></span><hr>
							<span style="font-size: 12px; font-style: italic; color: black;" >Phone Number: </span> <span style="font-size: 12px; float: right; margin-right: 20px;"><?php echo $phone; ?></span><hr>
						</div>
					</div>
					</div>
			<?php
			 }?>
			</div>
			<?php
			}

			//-------------------- if search buton is not pressed------------------------- 
		}else {
			if(isset($_SESSION['admin_user'])){

				$sql = "SELECT * FROM users WHERE user_type = 0" or die(mysqli_error($conn));
				$result = mysqli_query($conn, $sql);?>

			<div class="row pb-5 containe m-auto" style="">
				<?php
						while($row = mysqli_fetch_assoc($result)){
						$image = $row['image'];
						$fullname = $row['full_name'];
						$username = $row['username'];
						$email = $row['email'];
						$phone = $row['phone_number'];	
				?>
				<div class="card-body col-lg- col-12" style="margin-right: 10px; width: 80%; margin-bottom: 30px; border-radius: 10px; box-shadow: 5px 2px 7px rgb(174, 173, 173), -5px 2px 7px rgb(174, 173, 173);">

				<div class="row">
					<div>
						<p  class="text-cente"><img style="width: 200px; height: 150px;" src="../../images/<?= $image; ?>"></p>

					</div>
				</div>

				<div class="row" style="">
					<div class="card-body">
						<span style="font-size: 12px; font-style: italic; color: black;" >Full Name: </span> <span style="font-size: 12px; float: right; margin-right: 30px;"><?php echo $fullname; ?></span><hr>
						<span style="font-size: 12px; font-style: italic; color: black;" >Username: </span> <span style="font-size: 12px; float: right; margin-right: 50px;"><?php echo $username; ?></span><hr>
						<span style="font-size: 12px; font-style: italic; color: black;" >Email: </span> <span style="font-size: 12px; float: right;"   class="text-cente"><?php echo $email; ?></span><hr>
						<span style="font-size: 12px; font-style: italic; color: black;" >Phone Number: </span> <span style="font-size: 12px; float: right; margin-right: 20px;"><?php echo $phone; ?></span><hr>
					</div>
				</div>
				</div>
		<?php

		} 	?>				
		<?php
			 }?>
			</div>
			<?php
			}

           ?>         
			</div>
		</div>
	</div>
									

              
      

  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>


</div>
<?php include_once './include/js_libraries.php'; ?>
</body>
</html>

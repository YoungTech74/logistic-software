<?php

include_once '../connection.php';
include_once './header.php';
include_once './navbar.php';
include_once './sidebar.php';

if ($_SESSION['user']) {
    $viewData = "SELECT * FROM users WHERE user_type = 1;" or die(mysqli_error($conn));
    $query = mysqli_query($conn, $viewData);
    while ($row = mysqli_fetch_assoc($query)) {
        $courierFullName = $row['full_name'];
        $courierName = $row['username'];
        $courierEmail = $row['email'];
        $courierPhone = $row['phone_number'];
        $courierImage = $row['image'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Courier</title>
</head>
<body>
<div class="main_container content-wrapper">
    <div class="row container m-auto">
        <div class="row">
                <div class="card card-info">
                    <div class="card-header ">
                    <h3 class="card-title " style="margin-left: 40%;">Order a Courier</h3>
                    
              </div>
        </div>


        <div class="row">

            <div class="col-sm-12">
                
               <div class="row">

                    <div class="">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-left: 50px;">Courier Image</h3>
                                <h3 class="card-title" style="margin-left: 600px;">Courier Information</h3>
                            </div>
                        <!-- /.card-header -->

                        <div class="row mt-4">
                            <div class="card-body col-sm-6">
                                <p  class="text-cente" style="font-siz: 12px; font-style: italic;"><img style="width: 400px; height: 290px;"  src="<?php echo $courierImage; ?>"></p>
                            </div>

                            <div class="card-body col-sm-6" style="border: 1px solid grey; margin-right: -10px;">
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Courier Full Name: </span> <span style="font-size: 18px; margin-left: 70px;"   class="text-cente"><?php echo $courierFullName; ?></span><br>
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Courier Username: </span> <span style="font-size: 18px; margin-left: 70px;"   class="text-cente"><?php echo $courierName; ?></span><br>
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Courier Email: </span> <span style="font-size: 18px; margin-left: 100px;"   class="text-cente"><?php echo $courierEmail; ?></span><br>
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Courier Phone: </span> <span style="font-size: 18px; margin-left: 90px;"   class="text-cente"><?php echo $courierPhone; ?></span><br>
                            </div>

                            <div class="row">
                                <div class="card-body col-sm-6 p-4" style="margin-left: 50%;">
                                    <a href="send_package.php" class="btn btn-info">Send Package</a>
                                </div>
                            </div>
                        </div>
                
                    </div>

                    

                </div>
            </div>
        </div>       
    </div>
    </div>
    <?php include_once 'include/js_libraries.php';?>
</body>
</html>
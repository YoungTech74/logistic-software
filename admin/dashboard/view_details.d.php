<?php
include_once '../../connection.php';
include_once './header.php';
include_once './navbar_view_parcel.php';
include_once './sidebar.php';

if(isset($_GET['parcel_id'])){
    $id = $_GET['parcel_id'];


    $viewData = "SELECT * FROM packages WHERE package_id = '$id';" or die(mysqli_error($conn));
    $query = mysqli_query($conn, $viewData);
    while($row = mysqli_fetch_assoc($query)){
        
        $image = $row['product_image'];
        $senderName = $row['sender_name'];
        $senderEmail = $row['sender_email'];
        $senderPhone = $row['sender_phone'];
        $receiverName = $row['receiver_name'];
        $receiverEmail = $row['receiver_email'];
        $receiverPhone = $row['receiver_phone'];
        $courierName = $row['courier_name'];
        $courierEmail = $row['courier_email'];
        $courierPhone = $row['courier_phone'];
        $companyName = $row['company_name'];

       
    
    }

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
</head>
<body>
<div class="main_container content-wrapper">
  <div class="col-lg-12 content-wrappe">
    <div class="row container m-aut">
        <div class="row">
                <div class="card card-info ">
                    <div class="card-header">
                    <h3 class="card-title">Package Details</h3> 
                   <div style="float: right;">
                      <a href="parcel_declined.php" class="btn btn-dark">Back</a>
                        
                    </div>
              </div>

        </div>

        <div class="row">

            <div class="col-sm-12" style="">
                 <!-- general form elements -->
               <div class="row">

                    <div class="">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-left: 5px;">Product Image</h3>
                                <h3 class="card-title" style="margin-left: 100px;">Company Information</h3>
                                <h3 class="card-title" style="margin-left: 80px;">Courier Information</h3>
                                <h3 class="card-title" style="margin-left: 100px;">Receiver Information</h3>
                            </div>
                        <!-- /.card-header -->
                        <div class="row">
                            <div class="card-body col-sm-3">
                                <p  class="text-cente"><img style="width: 200px; height: 150px; margin-right: -14px;" src="../../images/<?= $image; ?>"></p>
                            </div>

                            <div class="card-body col-sm-3" style="border: 1px solid grey;">
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Company Name: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $companyName; ?></span><br>
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Sender Name: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $senderName; ?></span><br>
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Sender Email: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $senderEmail; ?></span><br>
                                <span style="font-siz: 12px; font-style: italic; color: black;" >Sender Phone: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $senderPhone; ?></span><br>
                            </div>

                            <div class="card-body col-sm-3" style="border: 1px solid grey;">
                                <span style=" font-style: italic; color: black;" >Courier Name: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $courierName; ?></span><br>
                                <span style=" font-style: italic; color: black;" >Courier Email: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $courierEmail; ?></span><br>
                                <span style=" font-style: italic; color: black;" >Courier Phone: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $courierPhone; ?></span><br>
                            </div>

                            <div class="card-body col-sm-3" style="border: 1px solid grey;">
                                <span style=" font-style: italic; color: black;" >Receiver Name: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $receiverName; ?></span><br>
                                <span style=" font-style: italic; color: black;" >Receiver Email: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $receiverEmail; ?></span><br>
                                <span style=" font-style: italic; color: black;" >Receiver Phone: </span> <span style="font-size: 12px;"   class="text-cente"><?php echo $receiverPhone; ?></span><br>
                            </div>
                        </div>
               
                    </div>

                    

                </div>
            </div>
        </div>       
    </div>
    </div>
    <?php include_once './footer.php'; ?>
    </div>
    <?php include_once 'include/js_libraries.php';?>
</body>
</html>
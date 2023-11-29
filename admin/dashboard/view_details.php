<?php
include_once '../../connection.php';
include_once './header.php';
include_once './navbar_view_parcel.php';
include_once './sidebar.php';





// $query3 = "SELECT * FROM packages WHERE seen = 0 && status = '$pendingPackage'; ";

if(isset($_GET['parcel_id'])){
    $id = $_GET['parcel_id'];

    $acceptRecord = '<p style="background: green; padding: 5px; border-radius: 8px; text-align: center; color: white">Accepted</p>';
    $inProgress = '<p class="bg-warning text-white" style="padding: 5px; border-radius: 8px; text-align: center; color: white;"><span class="text-white">In Progress</span> <i class="fa fa-cog fa-spin text-white"  aria-hidden="true" ></i></p>';
    $pendingPackage = '<p style="background: blue; padding: 5px; border-radius: 8px; text-align: center; color: white">Pending</p>';



    $viewData = "SELECT * FROM packages WHERE package_id = '$id' AND (status = '$pendingPackage' || status = '$inProgress' || status = '$acceptRecord');" or die(mysqli_error($conn));
    $query = mysqli_query($conn, $viewData);
    $count = mysqli_num_rows($query);

    if($count){
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

        $updateNewMessage = "UPDATE packages SET  seen = 1 WHERE package_id = '$id'" or die(mysqli_error($conn));
        $query = mysqli_query($conn, $updateNewMessage);?>
            
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
    <div class="row container m-auto">
        <div class="row">
                <div class="card card-info ">
                    <div class="card-header">
                    <h3 class="card-title">Package Details</h3> 
                   <div style="float: right;">
                      <a onclick='return confirm("Are you sure you want to accept this package?")' href="accept.php?parcel_d=<?php echo $id; ?>" class="btn btn-primary me-3">Accept</a>
                      <a onclick='return confirm("Are you sure about this action?")' href="delivered.php?parcel_d=<?php echo $id; ?>" class="btn btn-success me-3">Delivered</a>
                      <a onclick='return confirm("Are you sure about this action?")' href="in_progress.php?parcel_d=<?php echo $id; ?>" class="btn btn-warning me-3">In Progress <span class="fa fa-cog fa-spin"  aria-hidden="true" ></span></a>
                      <a onclick='return confirm("Are you sure you want to decline this package?")' href="decline.php?parcel_d=<?php echo $id; ?>" class="btn btn-danger me-3">Declined</a>
                      <a href="parcel_list.php" class="btn btn-dark">Back</a>
                        
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
                <!-- /.card-body -->
                    </div>

                    

                </div>
            </div>
        </div>       
    </div>
    </div>
    <?php include_once './include/js_libraries.php'; ?>
        <?php
        
    }else {
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

        // $updateNewMessage = "UPDATE packages SET  seen = 1 WHERE package_id = '$id'" or die(mysqli_error($conn));
        // $query = mysqli_query($conn, $updateNewMessage);?>
            
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
    <div class="row container m-auto">
        <div class="row">
                <div class="card card-info ">
                    <div class="card-header">
                    <h3 class="card-title">Package Details</h3> 
                   <div style="float: right;">
                      <a onclick='javascript: confirmBeforeAccept(event); return false;' href="accept.php?parcel_d=<?php echo $id; ?>" class="btn btn-primary me-3" style="display: none;">Accept</a>
                      <a onclick='javascript: confirmBeforeDecline(event); return false;' href="decline.php?parcel_d=<?php echo $id; ?>" class="btn btn-danger me-3" style="display: none;">Declined</a>
                      <a href="parcel_list.php" class="btn btn-dark">Back</a>
                        
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
                <!-- /.card-body -->
                    </div>

                    

                </div>
            </div>
        </div>       
    </div>
    </div>
    <?php include_once './include/js_libraries.php'; ?>
        <?php
    }
    
  

   
}

?>


    <!----------------------- confirm function before accept item  ------------------------>
    <script>
        function confirmBeforeAccept(e){
            var confirmAccept = confirm("Are you sure you want to Accept this package?");
            if(confirmAccept){
                window.location = e.attr("href");
            }
        }

        function confirmBeforeDecline(e){
            var confirmAccept = confirm("Are you sure you want to Decllne this package?");
            if(confirmAccept){
                window.location = e.attr("href");
            }
        }
    </script>
    
    <?php include_once './footer.php'; ?>

    
</body>
</html>
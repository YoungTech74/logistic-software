<?php
include_once '../../connection.php';

        if(isset($_GET['delete_id'])){
            $id = $_GET['delete_id'];

            $sql = "DELETE FROM packages WHERE package_id = '$id';" or die(mysqli_error($conn));
            $deleteData = mysqli_query($conn, $sql);

            if($deleteData){?>
                <script>
                    alert("Record deleted successfully.");
                    window.location = './parcel_list.php';
                </script>
            <?php

            }
            
        }
        
   
                  
?>



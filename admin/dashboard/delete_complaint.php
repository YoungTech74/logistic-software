<?php
include_once '../../connection.php';

        if(isset($_GET['delete_id'])){
            $id = $_GET['delete_id'];

            $sql = "DELETE FROM complaints WHERE id = '$id';" or die(mysqli_error($conn));
            $deleteData = mysqli_query($conn, $sql);

            if($deleteData){?>
                <script>
                    alert("Record deleted successfully.");
                    window.location = './view_complaint.php';
                </script>
            <?php

            }
            
        }
        
   
                  
?>
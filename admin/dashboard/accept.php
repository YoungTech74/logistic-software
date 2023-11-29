<?php
    include_once '../../connection.php';

    
                    if(isset($_GET['parcel_d'])){

                        $accept_package = $_GET['parcel_d'];

                        $sql = "UPDATE packages SET accept = 1 WHERE package_id = '$accept_package'" or die(mysqli_error($conn));
                        $result = mysqli_query($conn, $sql);
                    if($result){?>
                        <script>
                            alert("Package Accepted!");
                            window.location = 'parcel_list.php';
                        </script>
                    <?php
                        $acceptRecord = '<p style="background: green; padding: 5px; border-radius: 8px; text-align: center; color: white">Accepted</p>';
                        $updateStatus = mysqli_query($conn, "UPDATE packages SET status = '$acceptRecord' WHERE package_id = $accept_package") or die(mysqli_error($conn));
                    }else {
                        ?>
                            <script>
                                alert('error')
                            </script>
                        <?php
                    }

                }

?>

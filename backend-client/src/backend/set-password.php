<?php
    $id = $_REQUEST["id"];
    $fromChange = $_REQUEST["formChange"];

    $password = base64_encode(trim($_REQUEST["password1"]));

    // Connect DB.
    include 'connectDB.php';

    if($fromChange == true) {
        // Update Password DIS_USER table.
        $query = 'UPDATE DIS_USER SET password="'.$password.'" WHERE id="'.$id.'"';
        $objQuery = mysqli_query($conn,$query);
        mysqli_close($conn);
        
        if(!$objQuery) {
            $save = false;
            header("location: /dis/backend-client/changePassword.php?status=".$save);
        } else {
            header("location: /dis/backend-client/index.php");
        }
    } else {
        // Update Password DIS_USER table.
        $query = 'UPDATE DIS_USER SET password="'.$password.'", group_status="2" WHERE id="'.$id.'"';
        $objQuery2 = mysqli_query($conn,$query);

        mysqli_close($conn);

        // header("location: /dis/backend-client/listUser.php?status=".$save);
        if($objQuery2) {
            header("location: ../../../index.php");
        } else {
            $save = 0;
            header("location: /dis/backend-client/setPassword.php?status=".$save);
        }
    }
?>
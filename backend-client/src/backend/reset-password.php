<?php
    session_start(); 

    $id = $_GET["id"];
    $genPass = base64_encode(trim($_GET["gen"]));

    // Connect DB.
    include 'connectDB.php';

    // Update Password DIS_USER table.
    $query = 'UPDATE DIS_USER SET password="'.$genPass.'", group_status="3" WHERE id="'.$id.'"';
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    header("location: /dis/backend-client/listUser.php?status=".$save);
    if(!$objQuery) {
        $save = false;
        header("location: /dis/backend-client/listUser.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listUser.php?status=1");
    }
?>
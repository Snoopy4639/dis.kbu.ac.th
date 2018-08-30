<?php
    session_start();

    // Data from listBannerr.php
    $id = $_REQUEST["ID"];

    // Connect DB.
    include 'connectDB.php';

    // Remove data in NEWS_BANNER table.
    $query = 'DELETE FROM NEWS_BANNER';
    $query .= 'WHERE id="'.$id.'"'; 
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/listBanner.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listBanner.php?status=view");
    }
?>

<?php
    session_start();

    // Data from editBanner.php
    $bannerTitleInput = trim($_REQUEST["bannerTitleInput"]);
    $bannerDetailInput = trim($_REQUEST['bannerDetailInput']);
    $id = $_REQUEST["idStatus"];

    // Connect DB.
    include 'connectDB.php';

    // Update NEWS_BANNER table.
    $query = 'UPDATE NEWS_BANNER SET banner_title="'.$bannerTitleInput.'", banner_detail="'.$bannerDetailInput.'" ';
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

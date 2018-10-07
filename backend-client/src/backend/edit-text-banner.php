<?php
    session_start();

    // Data from editBanner.php
    $bannerTitleInput = trim($_REQUEST["text_title"]);
    $userCreate = $_SESSION["username"];

    // Replace date format !
    $dateRecord = date("Y-m-d");
    $Day = substr($dateRecord,8,2);
    $Month = substr($dateRecord,5,2);
    $Year = substr($dateRecord,0,4) + 543;
    $newDate = $Year."-".$Month."-".$Day;

    // echo($bannerTitleInput);
    // echo($userCreate);

    // Connect DB.
    include 'connectDB.php';

    // Update NEWS_TEXT_BANNER table.
    $query = 'UPDATE NEWS_TEXT_BANNER SET banner_text="'.$bannerTitleInput.'", banner_date="'.$newDate.'", banner_create_by="'.$userCreate.'"';
    // $query .= 'WHERE id= "1"'; 
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/listBanner.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listBanner.php?status=view");
    }
?>

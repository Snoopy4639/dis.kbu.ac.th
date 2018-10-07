<?php
    session_start();

    // Data from addBanner.php
    $bannerTitleInput = trim($_REQUEST["bannerTitleInput"]);
    $bannerDetailInput = trim($_REQUEST['bannerDetailInput']);
    $userCreate = $_SESSION["username"];

    // Upload item_image .jpg/.png/.jpeg
    $type = pathinfo(basename($_FILES['itemPicUpload']['name']), PATHINFO_EXTENSION);
    if($type == "jpg" || $type == "jpeg" || $type == "PNG" || $type == "png") {
        $generateName = 'img_'.uniqid().'.'.$type;
        $folderPath = 'upload/banner/';
        $uploadPath = $folderPath.$generateName;
        $uploadProfile = move_uploaded_file($_FILES['itemPicUpload']['tmp_name'], $uploadPath);
        if ($uploadProfile === TRUE) {
            $profileURL = $generateName;
        }
        // echo("OK !");
    } else {
        // echo($type);
        header("location: /dis/backend-client/addBanner.php?status=unformat");
    }

    // Replace date format !
    $dateRecord = date("Y-m-d");
    $Day = substr($dateRecord,8,2);
    $Month = substr($dateRecord,5,2);
    $Year = substr($dateRecord,0,4) + 543;
    $newDate = $Year."-".$Month."-".$Day;

    // Connect DB.
    include 'connectDB.php';

    // Insert NEWS_BANNER table.
    $query = "INSERT INTO NEWS_BANNER (banner_title, banner_detail, banner_date, banner_pic_path, banner_create_by)";
    $query .= "VALUES ('".$bannerTitleInput."','".$bannerDetailInput."','".$newDate."','".$profileURL."','".$userCreate."')";
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/addBanner.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listBanner.php?status=view");
    }
?>

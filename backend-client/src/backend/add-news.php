<?php
    session_start();

    // Data from addNews.php
    $newsTitleInput = trim($_REQUEST["newsTitleInput"]);
    $newsDetailInput = trim($_REQUEST['newsDetailInput']);
    $userCreate = $_SESSION["username"];

    // Upload item_image
    $type = pathinfo(basename($_FILES['itemPicUpload']['name']), PATHINFO_EXTENSION);
    $generateName = 'img_'.uniqid().'.'.$type;
    $folderPath = 'upload/news/';
    $uploadPath = $folderPath.$generateName;
    $uploadProfile = move_uploaded_file($_FILES['itemPicUpload']['tmp_name'], $uploadPath);
    if ($uploadProfile === TRUE) {
        $profileURL = $generateName;
    } else {
        $profileURL = 'None.png';
    }

    // Replace date format !
    $dateRecord = date("Y-m-d");
    $Day = substr($dateRecord,8,2);
    $Month = substr($dateRecord,5,2);
    $Year = substr($dateRecord,0,4) + 543;
    $newDate = $Year."-".$Month."-".$Day;

    // Connect DB.
    include 'connectDB.php';

    // Insert NEWS table.
    $query = "INSERT INTO NEWS (news_title, news_detail, news_date, news_type, news_pic_path, news_create_by)";
    $query .= "VALUES ('".$newsTitleInput."','".$newsDetailInput."','".$newDate."',1,'".$profileURL."','".$userCreate."')";
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/addNews.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listNews.php?status=view");
    }
?>

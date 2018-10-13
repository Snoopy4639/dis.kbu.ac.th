<?php
    session_start();

    // Data from addLostAndFound.php
    $itemName = trim($_REQUEST["itemNameInput"]);
    $locationItemInput = trim($_REQUEST['locationFoundInput']);
    $itemDetailInput = trim($_REQUEST["itemDetailInput"]);
    $nameFoundInput = trim($_REQUEST["nameFoundInput"]);
    $phoneFoundInput = trim($_REQUEST["phoneFoundInput"]);
    $itemStatus = 1;
    $userCreate = $_SESSION["username"];

    // Upload item_image
    $type = pathinfo(basename($_FILES['itemPicUpload']['name']), PATHINFO_EXTENSION);
    $generateName = 'img_'.uniqid().'.'.$type;
    $folderPath = 'upload/lost_and_found_A/';
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

    // Insert LOST_AND_FOUND_A table.
    $query = "INSERT INTO LOST_AND_FOUND_A (item_name, item_detail, item_location_found, item_status, item_date_found, item_pic_path, name_found_item";
    $query .= ", phonenumber_found_item, create_by) VALUES ('".$itemName."','".$itemDetailInput."','".$locationItemInput."','".$itemStatus."','".$newDate."',";
    $query .= "'".$profileURL."','".$nameFoundInput."','".$phoneFoundInput."','".$userCreate."')";
    $objQuery = mysqli_query($conn,$query);

    // Insert SUM_REPORT_ITEM table.
    $querySum = "INSERT INTO SUM_REPORT_ITEM (date_record, item_type, total) ";
    $querySum .= "VALUES ('".$newDate."', 1, 1 ) ";
    $objQuerySum = mysqli_query($conn,$querySum);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/addLostAndFound_A.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listStudent.php?status=view");
    }
?>

<?php
    session_start();

    // Data from addLostAndFound.php
    $itemName = trim($_REQUEST["itemNameInput"]);
    $locationItemInput = trim($_REQUEST['locationLostInput']);
    $itemDetailInput = trim($_REQUEST["itemDetailInput"]);
    $nameLostInput = trim($_REQUEST["nameLostInput"]);
    $phoneLostInput = trim($_REQUEST["phoneLostInput"]);
    $dateLost = $_REQUEST["dateLost"];
    $itemStatus = 3;
    $userCreate = $_SESSION["username"];
    $nameLostInput = trim($_REQUEST["nameLostInput"]);
    $phoneLostInput = trim($_REQUEST["phoneLostInput"]);

    // Replace date format !
    $dateRecord = date("Y-m-d");
    $Day = substr($dateRecord,8,2);
    $Month = substr($dateRecord,5,2);
    $Year = substr($dateRecord,0,4) + 543;
    $newDate = $Year."-".$Month."-".$Day;

    $DayLost = substr($dateLost,0,2);
    $MonthLost = substr($dateLost,3,2);
    $YearLost = substr($dateLost,6,4);
    $newDateLost = $YearLost."-".$MonthLost."-".$DayLost;

    // Connect DB.
    include 'connectDB.php';

    // Insert LOST_AND_FOUND_B table.
    $query = "INSERT INTO LOST_AND_FOUND_B (item_name_lost, item_detail_lost, item_location_lost, item_status, date_lost, date_record, name_lost_item, phonenumber_lost_item, create_by)";
    $query .= "VALUES ('".$itemName."','".$itemDetailInput."','".$locationItemInput."','".$itemStatus."','".$newDateLost."',";
    $query .= "'".$newDate."','".$nameLostInput."','".$phoneLostInput."','".$userCreate."')";
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/addLostAndFound_B.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listLostAndFound_B.php?status=view");
    }
?>

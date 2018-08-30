<?php
    // Data from editLostAndFound.php
    $itemName = trim($_REQUEST["itemNameInput"]);
    $locationItemInput = trim($_REQUEST['locationLostInput']);
    $itemDetailInput = trim($_REQUEST["itemDetailInput"]);
    $nameLostInput = trim($_REQUEST["nameLostInput"]);
    $phoneLostInput = trim($_REQUEST["phoneLostInput"]);
    $itemStatus = $_REQUEST["itemStatus"];
    $id = $_REQUEST["idStatus"];

    // Replace new Date format
    $dateLost = $_REQUEST["dateLost"];
    $DayLost = substr($dateLost,0,2);
    $MonthLost = substr($dateLost,3,2);
    $YearLost = substr($dateLost,6,4);
    $newDateLost = $YearLost."-".$MonthLost."-".$DayLost;

    // Connect DB.
    include 'connectDB.php';

    // Update LOST_AND_FOUND_B table.
    $query = 'UPDATE LOST_AND_FOUND_B SET item_name_lost="'.$itemName.'", item_detail_lost="'.$itemDetailInput.'" , item_location_lost="'.$locationItemInput.'", item_status="'.$itemStatus.'"';
    $query .= ', name_lost_item="'.$nameLostInput.'", phonenumber_lost_item ="'.$phoneLostInput.'", date_lost ="'.$newDateLost.'" WHERE id="'.$id.'"'; 
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        header("location: /dis/backend-client/listLostAndFound_B.php?status=0");
    } else {
        header("location: /dis/backend-client/listLostAndFound_B.php?status=1");
    }
    

?>

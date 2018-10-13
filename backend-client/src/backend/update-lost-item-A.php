<?php
    // Data from addLostAndFound.php
    $itemName = trim($_REQUEST["itemNameInput"]);
    $locationItemInput = trim($_REQUEST['locationFoundInput']);
    $itemDetailInput = trim($_REQUEST["itemDetailInput"]);
    $nameFoundInput = trim($_REQUEST["nameFoundInput"]);
    $phoneFoundInput = trim($_REQUEST["phoneFoundInput"]);
    $itemStatus = $_REQUEST["itemStatus"];
    $id = $_REQUEST["idStatus"];

    // Connect DB.
    include 'connectDB.php';

    // Update LOST_AND_FOUND_A table.
    $query = 'UPDATE LOST_AND_FOUND_A SET item_name="'.$itemName.'", item_detail="'.$itemDetailInput.'" , item_location_found="'.$locationItemInput.'", item_status="'.$itemStatus.'"';
    $query .= ', name_found_item="'.$nameFoundInput.'", phonenumber_found_item ="'.$phoneFoundInput.'" WHERE id="'.$id.'"'; 
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        header("location: /dis/backend-client/listLostAndFound_A.php?status=0");
    } else {
        header("location: /dis/backend-client/listLostAndFound_A.php?status=1");
    }
    

?>

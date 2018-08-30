<?php
    $id = $_REQUEST["idStatus"];

    $groupStatus = $_REQUEST["statusInput"];
    $firstNameInput = trim($_REQUEST["nameInput"]);
    $lastNameInput = trim($_REQUEST["lastNameInput"]);
    $emailInput = trim($_REQUEST["emailInput"]);
    $phoneNumberInput = trim($_REQUEST["phoneInput"]);

    // Connect DB.
    include 'connectDB.php';

    // Insert DIS_USER_INFO table.
    $query = 'UPDATE DIS_USER_INFO SET first_name="'.$firstNameInput.'", last_name="'.$lastNameInput.'", email="'.$emailInput.'", phone_number="'.$phoneNumberInput.'" WHERE id="'.$id.'"';
    $objQuery = mysqli_query($conn,$query);

    $query = 'UPDATE DIS_USER SET group_status="'.$groupStatus.'" WHERE id="'.$id.'"';
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    $save = true;
    header("location: /dis/backend-client/listUser.php?status=".$save);
?>

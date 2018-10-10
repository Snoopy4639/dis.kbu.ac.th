<?php
    // Data from register.html
    $userNameInput = trim($_REQUEST["usernameInput"]);
    $passwordInput = $_REQUEST['passwordFirstTime'];
    $firstNameInput = trim($_REQUEST["nameInput"]);
    $lastNameInput = trim($_REQUEST["lastNameInput"]);
    $emailInput = trim($_REQUEST["emailInput"]);
    $phoneNumberInput = trim($_REQUEST["phoneInput"]);

    // ---------------------------------------------------------------------------------------------
    // Group Status Lavel !
    // 0 : God Mode (SuperAdmin), 1: Admin, 2: Staff, 3: First Login (Default), 4: Block (Dont'use)
    // ----------------------------------------------------------------------------------------------
    $group_status = 3;

    // Upload Profile_image
    $type = pathinfo(basename($_FILES['profileUpload']['name']), PATHINFO_EXTENSION);
    $generateName = 'img_'.uniqid().'.'.$type;
    $folderPath = 'upload/';
    $uploadPath = $folderPath.$generateName;
    $uploadProfile = move_uploaded_file($_FILES['profileUpload']['tmp_name'], $uploadPath);
    if ($uploadProfile === TRUE) {
        $profileURL = $generateName;
    } else {
        $profileURL = 'None.png';
    }

    // Connect DB.
    include 'connectDB.php';

    // Check exist username.
    $sql = 'SELECT * FROM dis_user WHERE username = "'.$userNameInput.'"';
    $query = mysqli_query($conn,$sql);
    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        if($result['username'] == $userNameInput) {
            $save = 'exist';
            return header("location: /backend-client/register_User.php?status=".$save);
        }
    }

    // Insert DIS_USER table.
    $query1 = "INSERT INTO dis_user (username, password, group_status) VALUES ('".$userNameInput."','".$passwordInput."','".$group_status."')";
    $objQuery1 = mysqli_query($conn,$query1);

    // Insert DIS_USER_INFO table.
    $query2 = "INSERT INTO dis_user_info (first_name, last_name, email, phone_number, profile_pic) VALUES ('".$firstNameInput."','".$lastNameInput."','".$emailInput."','".$phoneNumberInput."','".$profileURL."')";
    $objQuery2 = mysqli_query($conn,$query2);

    mysqli_close($conn);

    if (!$objQuery1 or !$objQuery2){
        $save = 'error';
        header("location: ../../register_User.php?status=".$save);
    } else {
        header("location: ../../listUser.php?status=view");
    }
    

?>

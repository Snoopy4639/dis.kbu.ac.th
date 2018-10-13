<?php
    session_start();
    $createBy = $_SESSION["id_user"];

    // Data from register_student.html
    $studentID = trim($_REQUEST["studentIdInput"]);
    $facultyInput = $_REQUEST['facultyInput'];
    $firstNameInput = trim($_REQUEST["nameInput"]);
    $lastNameInput = trim($_REQUEST["lastNameInput"]);
    $DOBInput = trim($_REQUEST["dobInput"]);
    $phoneNumberInput = trim($_REQUEST["phoneInput"]);
    $addressInput = $_REQUEST["addressInput"];
    $score = 100;

    // Upload Profile_image
    $type = pathinfo(basename($_FILES['profileUpload']['name']), PATHINFO_EXTENSION);
    $generateName = 'img_'.uniqid().'.'.$type;
    $folderPath = 'upload/student/';
    $uploadPath = $folderPath.$generateName;
    $uploadProfile = move_uploaded_file($_FILES['profileUpload']['tmp_name'], $uploadPath);
    if ($uploadProfile === TRUE) {
        $profileURL = $generateName;
    } else {
        $profileURL = 'None.png';
    }

    // Replace date format !
    $DayBirthday = substr($DOBInput,0,2);
    $MonthBirthday = substr($DOBInput,3,2);
    $YearBirthDay = substr($DOBInput,6,4);
    $newBirthday = $YearBirthDay."-".$MonthBirthday."-".$DayBirthday;

    // Connect DB.
    include 'connectDB.php';

    // Check exist studentID.
    $sql = 'SELECT * FROM STUDENT_INFO WHERE student_id = "'.$studentID.'"';
    $query = mysqli_query($conn,$sql);
    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        if($result['student_id'] == $studentID) {
            $save = 'exist';
            return header("location: ../../register_student.php?status=".$save);
        }
    }

    // Insert STUDENT_INFO table.
    $query = "INSERT INTO STUDENT_INFO (student_id, student_first_name, student_last_name, student_birthday, student_faculty, student_address, student_mobile_number";
    $query .= ", student_score, student_pic, created_by) VALUES ('".$studentID."','".$firstNameInput."','".$lastNameInput."','".$newBirthday."','".$facultyInput."',";
    $query .= "'".$addressInput."','".$phoneNumberInput."','".$score."','".$profileURL."','".$createBy."')";
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: ../../register_student.php?status=".$save);
    } else {
        header("location: ../../listStudent.php?status=view");
    }
    

?>

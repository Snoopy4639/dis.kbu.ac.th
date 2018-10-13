<?php
    $id = trim($_REQUEST["idInput"]);
    $facultyInput = $_REQUEST["facultyInput"];
    $studentIdInput = trim($_REQUEST["studentIdInput"]);
    $nameInput = trim($_REQUEST["nameInput"]);
    $lastNameInput = trim($_REQUEST["lastNameInput"]);
    $birthdayInput = trim($_REQUEST["dobInput"]);
    $phoneNumberInput = trim($_REQUEST["phoneInput"]);
    $addressInput = trim($_REQUEST["addressInput"]);

    // Replace date format !
    $DayBirthday = substr($birthdayInput,0,2);
    $MonthBirthday = substr($birthdayInput,3,2);
    $YearBirthDay = substr($birthdayInput,6,4);
    $newBirthday = $YearBirthDay."-".$MonthBirthday."-".$DayBirthday;

    // Connect DB.
    include 'connectDB.php';

    // Insert STUDENT_INFO table.
    $query = 'UPDATE STUDENT_INFO SET student_id="'.$studentIdInput.'", student_first_name="'.$nameInput.'" , student_last_name="'.$lastNameInput.'", student_birthday="'.$newBirthday.'"';
    $query .= ', student_faculty="'.$facultyInput.'", student_address="'.$addressInput.'", student_mobile_number="'.$phoneNumberInput.'" WHERE id="'.$id.'"'; 
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    $save = true;
    header("location: /dis/backend-client/listStudent.php?status=".$save);
?>

           
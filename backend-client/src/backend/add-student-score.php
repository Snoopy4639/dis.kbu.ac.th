<?php
    // Data from addScoreStudent.php
    $id = trim($_REQUEST["id"]);
    $studentID = $_REQUEST["studentID"];
    $dateReport = $_REQUEST["dateReport"];
    $locationInput = trim($_REQUEST["locationInput"]);
    $typeBehaviorInput = $_REQUEST["typeBehaviorInput"];
    $behaviorDetailInput = trim($_REQUEST["behaviorDetailInput"]);
    $oldScore = $_REQUEST["oldScore"];
    $addScoreInput = trim($_REQUEST["addScoreInput"]);
    $nameRecordInput = $_REQUEST["nameRecordInput"];
    $faculty_record = $_REQUEST["faculty_record"];

    // Replace date format !
    $Day = substr($dateReport,8,2);
    $Month = substr($dateReport,5,2);
    $Year = substr($dateReport,0,4) + 543;
    $newDate = $Year."-".$Month."-".$Day;

    // Connect DB.
    include 'connectDB.php';

    $totalScore = $oldScore + $addScoreInput;
    if($totalScore > 100) {
        header("location: /dis/backend-client/editStudent.php?ID=".$id."&Status=3");
    } else {
        // get id from DIS_USER for save record !
        $sql = 'SELECT id FROM DIS_USER WHERE username = "'.$nameRecordInput.'"';
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
        $nameRecordInput = $result["id"];

        // Insert STUDENT_BEHAVIOR_INFO  table.
        $query = "INSERT INTO STUDENT_BEHAVIOR_INFO (student_id, user_record, behavior_type, date_record, location_record, detail_record, add_score_record, faculty_record) ";
        $query .= "VALUES ('".$studentID."','".$nameRecordInput."','".$typeBehaviorInput."','".$newDate."','".$locationInput."',";
        $query .= "'".$behaviorDetailInput."','".$addScoreInput."','".$faculty_record."')";
        $objQueryInsert = mysqli_query($conn,$query);

        if($objQueryInsert) {
            //  Update student score in STUDENT_INFO table !
            $updateScore = 'UPDATE STUDENT_INFO SET student_score="'.$totalScore.'" WHERE id="'.$id.'" ';
            $objQueryUpdate = mysqli_query($conn,$updateScore);
        }
        
        mysqli_close($conn);

        if ((!$objQueryInsert) || (!$objQueryUpdate)){
            $save = 'false';
            // echo($query);
            // echo("<br>");
            // echo($updateScore);
            header("location: /dis/backend-client/listStudent.php?status=".$save);
        } else {
            header("location: /dis/backend-client/listStudent.php?status=view");
        }
    }
?>

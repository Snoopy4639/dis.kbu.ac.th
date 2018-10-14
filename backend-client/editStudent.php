<!DOCTYPE html>
<html>
<head>
    <?php
        session_start(); 
        if($_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
            header("location: /dis/backend-client/index.php");
        }

        $id = $_REQUEST["ID"];
        $status = $_REQUEST["Status"];

        include 'src/backend/connectDB.php';
        $sql = 'SELECT * FROM STUDENT_INFO AS a1 INNER JOIN DIS_USER_INFO AS a2 ON (a1.created_by = a2.id) WHERE a1.id="'.$id.'"';
        $query = mysqli_query($conn,$sql);

    ?>
    <title>DIS System : ข้อมูลนักศึกษา</title>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
    <link rel="stylesheet" type="text/css" href="css/src.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/menuBar.js"></script>
    <script src="/dis/js/includeHTML.js"></script>
    <script src="src/js/form-register-student.js"></script>
	<!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Date Picker -->
    <link type="text/css" href="src/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
    <script type="text/javascript" src="src/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="src/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
    <script type="text/javascript" src="src/js/date-picker.js"></script>
    <link type="text/css" rel="stylesheet" href="src/css/date-picker.css"/>
</head>
<body>
    <div w3-include-html="header.php"></div>
    <div w3-include-html="menuBar.php"></div>
    <form action="src/backend/update-student.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
            enctype="multipart/form-data" id="registerForm">
    <div class="container-fluid">
        <div class="col-12">
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>

                <?php if($status == 3) { ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;ไม่สามารถเพิ่มคะแนนนักศึกษาได้เกิน 100 หรือลบคะแนนเกิน 100 คะแนนได้ !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-12">&nbsp;</div>
                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                <label class="header"><?php echo($result['student_first_name']." ".$result['student_last_name']);?></label>
                <label class="w3-right header text-danger">
                <?php if($status == 1 || $status == 3) { echo('แก้ไขข้อมูล'); }
                    else if($status == 2) { echo('ดูข้อมูล'); }?>    
                </label>
                    <div class="w3-card-4 w3-light-gray">
                        <div class="col-12">&nbsp;</div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="w3-card-2 w3-white">
                                        <div class="col-12">&nbsp;</div>
                                        <img id="profile_image" src="src/backend/upload/student/<?php echo($result['student_pic']);?>" class="img-fluid upload-profile">
                                        <div class="col-12">&nbsp;</div>
                                    </div>
                                    <div class="col-12">&nbsp;</div>
                                    <label class="detail"><font size="+1">ข้อมูลเกี่ยวกับฝ่ายวินัย</font></label>
                                    <table class="w3-table-all text-center w3-card-4">
                                        <tr>
                                            <?php
                                                $currentYear = date("Y") +543;
                                                $age = $currentYear - substr($result["student_birthday"],0,4);
                                            ?>
                                            <td width="40%" class="w3-amber text-center"><label class="detail">อายุ<td>
                                            <td><label class="detail"><?=$age?> ปี</label></td>
                                        </tr>
                                        <tr>
                                            <?php
                                                $score = $result["student_score"];
                                                if($score >= 79) { $scoreMessage = "(ปกติ)";}
                                                else if($score >= 49) { $scoreMessage = "(ต่ำกว่าเกณฑ์)";}
                                                else { $scoreMessage = "(ไม่ผ่านเกณฑ์)";}
                                            ?>
                                            <td width="40%" class="w3-amber text-center"><label class="detail">คะแนนวินัย<td>
                                            <td><label class="detail"><?=$score." ". $scoreMessage?></label></td>
                                        </tr>
                                        <tr>
                                            <td width="40%" class="w3-amber text-center"><label class="detail">ผู้บันทึกข้อมูล<td>
                                            <td>
                                                <label class="detail"><?php echo($result["first_name"]);?></label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-8">
                                    <div class="w3-card-2 w3-white">
                                        <div class="container-fluid">
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">รหัสนักศึกษา <font class="text-danger"><?php if($status == 1) { echo('*');}?></font></label>
                                                    <input name="studentIdInput" class="w3-input w3-white" type="text" value="<?=$result["student_id"]?>" minlength="12" maxlength="12" required
                                                    disabled>
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">คณะ</label>
                                                    <select class="form-control w3-white" name="facultyInput" <?php if($status == 2) { echo('disabled'); }?>>
                                                        <?php switch($result['student_faculty']) {
                                                                case 1: ?>
                                                                    <option value="1" selected>บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                <?php 
                                                                break;
                                                                case 2:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2" selected>นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                <?php 
                                                                break;
                                                                case 3:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3" selected>นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                <?php 
                                                                break;
                                                                case 4:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4" selected>วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                <?php 
                                                                break;
                                                                case 5:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5" selected>สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                <?php 
                                                                break;
                                                                case 6:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6" selected>ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 7:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7" selected>วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 8:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8" selected>จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 9:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9" selected>หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 10:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10" selected>สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 11:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11" selected>วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 12:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12" selected>พยาบาลศาสตร์</option>
                                                                    <option value="13">อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                case 13:
                                                                ?>
                                                                    <option value="1">บริหารธุรกิจ</option>
                                                                    <option value="2">นิติศาสตร์</option>
                                                                    <option value="3">นิเทศศาสตร์</option>
                                                                    <option value="4">วิศวกรรมศาสตร์</option>
                                                                    <option value="5">สถาปัตยกรรมศาสตร์</option>
                                                                    <option value="6">ศิลปกรรมศาสตร์</option>
                                                                    <option value="7">วิทยาศาสตร์และเทคโนโลยี</option>
                                                                    <option value="8">จิตวิทยา</option>
                                                                    <option value="9">หลักสูตรนานาชาติ</option>
                                                                    <option value="10">สถาบันพัฒนาบุคคลากรการบิน</option>
                                                                    <option value="11">วิทยาศาสตร์การกีฬา</option>
                                                                    <option value="12">พยาบาลศาสตร์</option>
                                                                    <option value="13" selected>อื่นๆ</option>
                                                                    <?php 
                                                                break;
                                                                } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">ชื่อ</label>
                                                    <input name="nameInput" class="w3-input w3-white" type="text" value="<?=$result["student_first_name"]?>" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">นามสกุล</label>
                                                    <input name="lastNameInput" class="w3-input w3-white" type="text" value="<?=$result["student_last_name"]?>" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">วันเกิด</label>
                                                    <input name="dobInput" class="w3-input w3-white" type="text" id="datepicker" value="<?=$result["student_birthday"]?>" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">เบอร์โทรศัพท์มือถือ</label>
                                                    <input name="phoneInput" class="w3-input w3-white" type="text" value="<?=$result["student_mobile_number"]?>" minlength="10" maxlength="10" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <label class="detail">ที่อยู่ที่สามารถติดต่อได้</label>
                                                <input name="addressInput" class="w3-input w3-white" type="text" value="<?=$result["student_address"]?>" autocomplete="off" required
                                                <?php if($status == 2) { echo('disabled'); }?>>
                                            </div>
                                            <div class="col-12">
                                                <label class="detail text-danger">
                                                * คือข้อมูลที่ไม่สามารถแก้ไขได้
                                                </label>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12 text-center">
                                <?php if($status == 1 || $status == 3) {?>
                                        <input type="hidden" value="<?=$id?>" name="idInput">
                                        <button class="w3-button w3-green" type="submit">
                                            <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;แก้ไขข้อมูลนักศึกษา
                                        </button>
                                        <button class="w3-button w3-blue" type="button" onclick="openTab('addStudentReport')">
                                            <i class="fa fa-pencil-square-o icon-detail"></i>&nbsp;&nbsp;เพิ่มข้อมูลประวัติ (กระทำความผิด)
                                        </button>
                                        <button class="w3-button w3-orange" type="button" onclick="openTab('addScoreStudent')">
                                            <i class="fa fa-pencil-square-o icon-detail"></i>&nbsp;&nbsp;เพิ่มข้อมูลประวัติ (แก้ไขความผิด)
                                        </button>
                                        <a href="listStudent.php?status=view"><button class="w3-button w3-gray" type="button">
                                            <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ยกเลิก
                                        </button></a>
                                    <?php } if($status == 2) {?>
                                        <button class="w3-button w3-blue" type="button" onclick="openTab('viewStudentReport')">
                                            <i class="fa fa-search"></i>&nbsp;&nbsp;ดูข้อมูลประวัติพฤติกรรม
                                        </button>
                                        <a href="listStudent.php?status=view"><button class="w3-button w3-green" type="button">
                                            <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;ย้อนกลับ
                                        </button></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                    </div>
                    <div id="confirmSave" class="w3-modal">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('confirmSave').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                <label class="header"><font size="+3">ยืนยันการเพิ่มข้อมูลนักศึกษา</font></label><br>
                                <label class="detail text-danger">อย่าลืมตรวจสอบข้อมูลก่อนสมัคร เพื่อผลประโยชน์ของระบบ</label>
                            </div>
                            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                            ยืนยันการเพิ่มข้อมูล</button>
                        </div>
                    </div>
                <?php 
                $studentID = $result["student_id"];
                } 
                ?>
            </div>
        </div>
    </div>
    </form>

    <div id="addStudentReport" class="w3-container  openTab" style="display:none">
        <div w3-include-html="<?php echo('src/addReportStudent.php?id=').$id?>"></div>
    </div>
    <div id="viewStudentReport" class="w3-container openTab" style="display:none">
        <div w3-include-html="<?php echo('src/viewReportStudent.php?id=').$studentID?>"></div>
    </div>
    <div id="addScoreStudent" class="w3-container openTab" style="display:none">
        <div w3-include-html="<?php echo('src/addScoreStudent.php?id=').$id?>"></div>
    </div>

    <div class="col-12">&nbsp;</div>
    <div class="col-12">&nbsp;</div>
	<div class="container-fluid">
		<div class="text-right">
			<a href="#"><button type="button" class="btn btn-outline-dark">
				<label class="detail">กลับไปด้านบน</label>&nbsp;
				<i class="fa fa-angle-double-up"></i>
			</button></a>
		</div>
	</div>
    <div w3-include-html="foother.html"></div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- include html -->
    <script>
        includeHTML();
    </script>
</body>
</html>
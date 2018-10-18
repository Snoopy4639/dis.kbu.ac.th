<?php session_start(); ?>
<?php ob_start();?>
<!DOCTYPE html>
<?php
    if($_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }

    $id = $_GET["id"];

    include 'backend/connectDB.php';
    $sql2 = 'SELECT * FROM STUDENT_INFO WHERE id="'.$id.'"';
    $query2 = mysqli_query($conn,$sql2);
?>
<html>
<head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/headerDIS.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/menuBar.js"></script>
	<!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="src/backend/add-student-score.php" method="POST">
        <?php while($result2=mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
        <div class="container-fluid">
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>
                <label class="header">เพิ่มข้อมูลประวัติแก้ไขพฤติกรรม</label>
                <div class="w3-card-4 w3-orange">
                    <div class="container">
                        <div class="col-12">&nbsp;</div>
                        <div class="w3-card-2 w3-white">
                            <div class="col-12">&nbsp;</div>
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <label class="detail"><i class="fa fa-calendar icon-detail"></i>&nbsp;&nbsp;วันที่ <font class="text-danger">*</font></label>
                                    <input class="w3-input w3-white" value="<?=date("Y-m-d")?>" type="text"  disabled/>
                                    <input type="hidden" value="<?=date("Y-m-d")?>" name="dateReport" />
                                </div>
                                <div class="w3-third">
                                    <label class="detail"><i class="fa fa-map-marker icon-detail"></i>&nbsp;&nbsp;สถานที่ <font class="text-danger">*</font></label>
                                    <input class="w3-input" name="locationInput" type="text" autocomplete="off" required>
                                </div>
                                <div class="w3-third">
                                    <label class="detail"><i class="fa fa-caret-down icon-detail"></i>&nbsp;&nbsp;ประเภทการแก้ไข <font class="text-danger">*</font></label>
                                    <select class="form-control w3-white" name="typeBehaviorInput" autocomplete="off" required>
                                        <option value="" selected disabled>เลือก</option>
                                        <option value="7">รายงานตัว</option>
                                        <option value="8">เป็นผู้ช่วยงานอาจารย์</option>
                                        <option value="9">ทำบอร์ดประชาสัมพันธ์</option>
                                        <option value="10">ทำ Poster</option>
                                        <option value="11">เข้าร่วมกิจกรรม</option>
                                        <option value="12">อื่นๆ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">&nbsp;</div>
                            <div class="w3-row-padding">
                                <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดการแก้ไข <font class="text-danger">*</font></label>
                                <textarea name="behaviorDetailInput" class="w3-input w3-border" rows="5" col="5" resize="none" autocomplete="off" required></textarea>
                            </div>
                            <div class="col-12">&nbsp;</div>
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <label class="detail"><i class="fa fa-calendar-o icon-detail"></i>&nbsp;&nbsp;คะแนนที่มีอยู่</label>
                                    <input class="w3-input w3-white" type="text" value="<?=$result2["student_score"]?>" disabled>
                                    <input type="hidden" name="oldScore" value="<?=$result2["student_score"]?>">
                                </div>
                                <div class="w3-third">
                                    <label class="detail"><i class="fa fa-calendar-minus-o icon-detail"></i>&nbsp;&nbsp;คะแนนที่ต้องการเพิ่ม <font class="text-danger">*</font></label>
                                    <input class="w3-input w3-white" name="addScoreInput" type="number" min="1" max="100" autocomplete="off" required >
                                </div>
                                <div class="w3-third">
                                    <label class="detail"><i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;ผู้บันทึกข้อมูล</label>
                                    <input class="w3-input w3-white" type="text" value="<?=$_SESSION["username"]?>" disabled>
                                    <input type="hidden"name="nameRecordInput" value="<?=$_SESSION["username"]?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="detail text-danger">
                                    กรุณากรอกข้อมูลช่อง * ให้ครบถ้วนทุกช่อง
                                </label>
                            </div>
                            <div class="col-12">&nbsp;</div>
                            <div class="text-center">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="faculty_record" value="<?=$result2["student_faculty"]?>">
                                <input type="hidden" name="studentID" value="<?=$result2["student_id"]?>">
                                <button class="w3-button w3-green" type="button" onclick="document.getElementById('confirmSaveReport2').style.display='block'">
                                    <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;บันทึกข้อมูลพฤติกรรม
                                </button>
                                <button class="w3-button w3-gray" type="reset">
                                    <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ล้าง
                                </button>
                            </div>
                            <div class="col-12">&nbsp;</div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                        <div id="confirmSaveReport2" class="w3-modal">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('confirmSaveReport2').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                <label class="header"><font size="+3">ยืนยันการเพิ่มข้อมูลและเพิ่มคะแนน</font></label><br>
                                <label class="detail text-danger">อย่าลืมตรวจสอบข้อมูลก่อนสมัคร เพื่อผลประโยชน์ของระบบ</label>
                            </div>
                            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                            ยืนยันการเพิ่มข้อมูล</button>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </form>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<!-- Icon -->
	<script>
      feather.replace()
    </script>
    <!-- include html -->
    <script>
        includeHTML();
    </script>
</body>
</html>



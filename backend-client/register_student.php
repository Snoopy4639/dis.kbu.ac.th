<!DOCTYPE html>
<?php
    session_start();
    if($_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }
?>
<html>
<head>
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
    <div class="container-fluid">
        <div class="col-12">
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>
                <div class="col-12">&nbsp;</div>
                <label class="header">เพิ่มข้อมูลนักศึกษา</label>
                <form action="src/backend/register-student.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
                    enctype="multipart/form-data" id="registerForm"> 
                    <?php if($_GET["status"] == "error") { ?>
                        <div class="alert alert-danger" role="alert">
                            ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } if($_GET["status"] == "exist") { ?>
                        <div class="alert alert-danger" role="alert">
                            ไม่สามารถเพิ่มข้อมูลได้ เนื่องจากมี "นักศึกษา" นี้แล้วในระบบแล้ว
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="w3-card-4 w3-light-gray">
                        <div class="col-12">&nbsp;</div>
                        <div id="Error_Message_Image" class="error_Message" style="display: none">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <label>รูปโปรไฟล์ที่สามารถอัพโหลดได้ต้องเป็น .jpg/.png/.jpeg เท่านั้น</label>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="Error_Message_Username" class="error_Message" style="display: none">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <label>Username ต้องเป็นภาษาอังกฤษหรือตัวเลขเท่านั้น !</label>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="Error_Message_Phone" class="error_Message" style="display: none">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <label>เบอร์โทรศัพท์ ต้องเป็นตัวเลขเท่านั้น !</label>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="w3-card-2 w3-white">
                                        <div class="col-12">&nbsp;</div>
                                        <img id="profile_image" src="src/image/ProfileRegister.png" class="img-fluid upload-profile">
                                        <div class="col-12">&nbsp;</div>
                                        <label class="w3-button w3-block w3-blue detail" style="padding-top: 5%; padding-bottom: 5%">
                                            <i class="fa fa-cloud-upload icon-detail"></i>&nbsp;&nbsp;
                                            Upload รูปโปรไฟล์
                                            <input name="profileUpload" type="file" hidden onchange="preview_image(event)" id="profile_image_upload">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="w3-card-2 w3-white">
                                        <div class="container-fluid">
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">รหัสนักศึกษา <font class="text-danger">*</font></label>
                                                    <input name="studentIdInput" class="w3-input" type="text" minlength="12" maxlength="12" autocomplete="off" required placeholder="xxxxxxxxxxxx">
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">คณะ <font class="text-danger">*</font></label>
                                                    <select class="form-control" name="facultyInput">
                                                        <option value="0" selected disabled>เลือก</option>
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
                                                        <option value="13">อื่นๆ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">ชื่อ <font class="text-danger">*</font></label>
                                                    <input name="nameInput" class="w3-input" type="text" autocomplete="off" required>
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">นามสกุล <font class="text-danger">*</font></label>
                                                    <input name="lastNameInput" class="w3-input" type="text" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">วันเกิด <font class="text-danger">*</font></label>
                                                    <input name="dobInput" class="w3-input" type="text" id="datepicker" autocomplete="off" required>
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">เบอร์โทรศัพท์มือถือ <font class="text-danger">*</font></label>
                                                    <input name="phoneInput" class="w3-input" type="text" placeholder="08XXXXXXXX" minlength="10" maxlength="10" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <label class="detail">ที่อยู่ที่สามารถติดต่อได้ <font class="text-danger">*</font></label>
                                                <input name="addressInput" class="w3-input" type="text" autocomplete="off" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="detail text-danger">
                                                    กรุณากรอกข้อมูลช่อง * ให้ครบถ้วนทุกช่อง
                                                </label>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12 text-center">
                                    <button class="w3-button w3-green" type="button" onclick="document.getElementById('confirmSave').style.display='block'">
                                        <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;เพิ่มข้อมูลนักศึกษา
                                    </button>
                                    <a href="listStudent.php?status=view"><button class="w3-button w3-gray" type="button">
                                        <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ยกเลิก
                                    </button></a>
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
                </form>
            </div>
        </div>
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
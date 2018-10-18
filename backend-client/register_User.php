<?php session_start(); ?>
<?php ob_start();?>
<!DOCTYPE html>
<?php
	if($_SESSION["permission"] == 2 || $_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
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
    <script src="js/includeHTML.js"></script>
	<!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="src/js/form-register.js"></script>
</head>
<body>
    <div w3-include-html="header.php"></div>
	<div w3-include-html="menuBar.php"></div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>
                <label class="header">สมัครสมาชิก</label>
                <form action="src/backend/register.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
                    enctype="multipart/form-data" id="registerForm"> 
                    <div class="w3-card-4 w3-amber">
                        <div class="container">
                            <div class="col-12">
                                <label class="detail"><font size="+1">ขั้นตอนการสมัครสมาชิก</font></label>
                                <p class="detail">
                                    1. Admin กรอกข้อมูลเบื้องต้นให้กับผู้สมัครโดยกรอกข้อมูลให้ครบและถูกต้อง<br>
                                    2. เมื่อสมัครสำเร็จ Admin จะได้ Password ชั่วคราวแก่ User <br>
                                    3. User เข้าระบบด้วย  Username และ Password ชั่วคราวที่ได้จาก Admin <br>
                                    4. User ทำการเปลี่ยนรหัสผ่าน
                                </p>
                            </div>
                            <div class="col-12">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-12">&nbsp;</div>
                    <?php if($_GET["status"] == "error") { ?>
                        <div class="alert alert-danger" role="alert">
                            ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } if($_GET["status"] == "exist") { ?>
                        <div class="alert alert-danger" role="alert">
                            ไม่สามารถเพิ่มข้อมูลได้ เนื่องจากมี Username นี้แล้วในระบบ
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
                                                    <i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;
                                                    <label class="detail">Username <font class="text-danger">*</font></label>
                                                    <input name="usernameInput" class="w3-input" type="text" minlength="4" maxlength="6" placeholder="ตัวเลขหรืออักษร A-Z จำนวน 4-6 ตัว" autocomplete="off" required>
                                                </div>
                                                <?php
                                                    $firstTimePassword = rand(1111,9999);
                                                ?>
                                                <div class="w3-half">
                                                    <i class="fa fa-lock icon-detail"></i>&nbsp;&nbsp;
                                                    <label class="detail">Password <font class="text-danger">*</font></label>
                                                    <input name="passwordInput" value="<?= $firstTimePassword?>" class="w3-input w3-white" disabled type="text">
                                                    <input type="hidden" name="passwordFirstTime" value="<?php echo($firstTimePassword);?>">
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
                                                    <label class="detail">E-mail <font class="text-danger">*</font></label>
                                                    <input name="emailInput" class="w3-input" type="email" placeholder="xxxxxx@kbu.ac.th" autocomplete="off" required>
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">เบอร์โทรศัพท์มือถือ <font class="text-danger">*</font></label>
                                                    <input name="phoneInput" class="w3-input" type="text" placeholder="08XXXXXXXX" minlength="10" maxlength="10" autocomplete="off" required>
                                                </div>
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
                                        <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;สมัครสมาชิก
                                    </button>
                                    <a href="listUser.php?status=view/"><button class="w3-button w3-gray" type="button">
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
                                <label class="header w3-red"><font size="+3">&nbsp;&nbsp;<?=$firstTimePassword?>&nbsp;&nbsp;</font></label><br>
                                <div class="col-12">&nbsp;</div>
                                <label class="header">โปรดนำตัวเลข 4 หลักด้านบน</label><br>
                                <label class="header">ให้แก่ผู้สมัครเพื่อใช้งานระบบในครั้งแรก</label><br>
                                <label class="detail text-danger">อย่าลืมตรวจสอบข้อมูลก่อนสมัคร เพื่อผลประโยชน์ของระบบ</label>
                            </div>
                            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                            ยืนยันการสมัครสมาชิก</button>
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- include html -->
    <script>
        includeHTML();
    </script>
</body>
</html>
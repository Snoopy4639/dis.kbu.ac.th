<!DOCTYPE html>
<?php
    session_start();
    
	if($_SESSION["permission"] == 2 || $_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }
?>
<html>
<head>
    <title>DIS System : เพิ่มข้อมูลรายการของหาย</title>
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
</head>
<body>
    <div w3-include-html="header.php"></div>
	<div w3-include-html="menuBar.php"></div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>
                <div class="col-12">&nbsp;</div>
                <label class="header">เพิ่มภาพเคลื่อนไหวในหน้าแรก</label>
                <form action="src/backend/add-banner.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
                    enctype="multipart/form-data" id="registerForm"> 
                    <?php if($_GET["status"] == "error") { ?>
                        <div class="alert alert-danger" role="alert">
                            ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if($_GET["status"] == "unformat") { ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <label>รูปภาพที่สามารถอัพโหลดได้ต้องเป็น .jpg/.png/.jpeg เท่านั้น</label>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="w3-card-4 w3-light-gray">
                        <div class="col-12">&nbsp;</div>
                        <div id="Error_Message_Image" class="error_Message" style="display: none">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <label>รูปภาพที่สามารถอัพโหลดได้ต้องเป็น .jpg/.png/.jpeg เท่านั้น</label>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="w3-card-2 w3-white">
                                        <div class="col-12">&nbsp;</div>
                                        <img id="profile_image" src="../photo/index/800x400.png" class="img-fluid">
                                        <div class="col-12">&nbsp;</div>
                                        <label class="mini-header text-danger">คำแนะนำ : ควรใช้รูปภาพขนาด 800 x 400 px. เพื่อความสวยงาม</label>
                                        <div class="col-12">&nbsp;</div>
                                        <label class="w3-button w3-block w3-blue mini-header" style="padding-top: 1%; padding-bottom: 1%">
                                            <i class="fa fa-cloud-upload icon-detail"></i>&nbsp;&nbsp;
                                            Upload รูปภาพประชาสัมพันธ์
                                            <input name="itemPicUpload" type="file" hidden onchange="preview_image(event)" id="profile_image_upload" required>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">
                                    <div class="w3-card-2 w3-white">
                                        <div class="container-fluid">
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <label class="detail"><i class="fa fa-list icon-detail"></i>&nbsp;&nbsp;ชื่อหัวข้อภาพ</label>
                                                <input name="bannerTitleInput" class="w3-input" type="text" autocomplete="off">
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดของภาพ</label>
                                                <textarea name="bannerDetailInput" class="w3-input w3-border" rows="5" col="5" resize="none" autocomplete="off"></textarea>
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
                                        <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;เพิ่มภาพเคลื่อนไหวในหน้าแรก
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
                                <label class="header"><font size="+3">ยืนยันการเพิ่มภาพเคลื่อนไหว</font></label><br>
                                <label class="detail text-danger">อย่าลืมตรวจสอบข้อมูลก่อนเพิ่มเข้าสู่ระบบ เพื่อผลประโยชน์ของระบบ</label>
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
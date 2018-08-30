<!DOCTYPE html>
<html>
<head>
    <?php
        session_start(); 
        $id = $_REQUEST["ID"];
        $status = $_REQUEST["Status"];

        include 'src/backend/connectDB.php';
        $sql = 'SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id WHERE DIS_USER.id="'.$id.'"';
        $query = mysqli_query($conn,$sql);
    ?>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/src.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="/dis/js/includeHTML.js"></script>
    <script src="src/js/form-update.js"></script>
    <script src="js/menuBar.js"></script>
	<!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div w3-include-html="header.php"></div>
    <div w3-include-html="menuBar.php"></div>
    <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
    <form action="src/backend/updateUser.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
        enctype="multipart/form-data" id="registerForm"> 
    <div class="container-fulid">
        <div class="col-12">
            <div class="col-12">&nbsp;</div>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <label class="header"><?php echo($result['first_name']." ".$result['last_name']);?></label>
                <label class="w3-right header text-danger">
                    <?php if($status == 1) { echo('แก้ไขข้อมูล'); }
                    if($status == 2) { echo('ดูข้อมูล'); }?>    
                </label>
                <div class="w3-card-4 w3-light-gray">
                        <div class="col-12">&nbsp;</div>
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
                                        <img id="profile_image" src="src/backend/upload/<?php echo($result['profile_pic']);?>" class="img-fluid upload-profile">
                                        <div class="col-12">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="col-8">
                                
                                    <div class="w3-card-2 w3-white">
                                        <div class="container-fluid">
                                            <div class="col-12">&nbsp;</div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;
                                                        <label class="detail">Username <font class="text-danger"><?php if($status == 1) { echo('*');}?></font></label>
                                                        <input name="usernameInput" class="w3-input w3-white" type="text" value="<?=$result['username'];?>" disabled>
                                                    </div>
                                                    <div class="col-6">
                                                        <i class="fa fa-key icon-detail"></i>&nbsp;&nbsp;
                                                        <label class="detail">สถานะในระบบ</label>
                                                        <select class="form-control" name="statusInput" <?php if($status == 2) { echo('disabled'); }?> > 
                                                            <?php switch($result['group_status']) {
                                                                case 0: ?>
                                                                    <option value="0" selected >God Mode</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">ปกติ</option>
                                                                    <option value="3" >รอเข้าระบบครั้งแรก</option>
                                                                    <option value="4">ยกเลิก</option>
                                                                    <option value="5">รอเปลี่ยนรหัสผ่าน</option>
                                                                <?php 
                                                                break;
                                                                case 1:
                                                                ?>
                                                                    <option value="1" selected>Admin</option>
                                                                    <option value="2">ปกติ</option>
                                                                    <option value="4">ยกเลิก</option>
                                                                    <option value="3" disabled>รอเข้าระบบครั้งแรก</option>
                                                                    <option value="5" disabled>รอเปลี่ยนรหัสผ่าน</option>
                                                                <?php 
                                                                break;
                                                                case 2:
                                                                ?>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2" selected>ปกติ</option>
                                                                    <option value="4">ยกเลิก</option>
                                                                    <option value="3" disabled>รอเข้าระบบครั้งแรก</option>
                                                                    <option value="5"disabled>รอเปลี่ยนรหัสผ่าน</option>
                                                                <?php 
                                                                break;
                                                                case 3:
                                                                ?>
                                                                    <option value="3" selected>รอเข้าระบบครั้งแรก</option>
                                                                <?php 
                                                                break;
                                                                case 4:
                                                                ?>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">ปกติ</option>
                                                                    <option value="4" selected>ยกเลิก</option>
                                                                    <option value="3" disabled>รอเข้าระบบครั้งแรก</option>
                                                                    <option value="5" disabled>รอเปลี่ยนรหัสผ่าน</option>
                                                                <?php 
                                                                break;
                                                                case 5:
                                                                ?>
                                                                    <option value="5" selected>รอเปลี่ยนรหัสผ่าน</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">ชื่อ</label>
                                                    <input name="nameInput" class="w3-input w3-white" type="text" value="<?=$result['first_name']?>" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?> >
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">นามสกุล</label>
                                                    <input name="lastNameInput" class="w3-input w3-white" type="text" value="<?=$result['last_name']?>" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?> >
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-half">
                                                    <label class="detail">E-mail</label>
                                                    <input name="emailInput" class="w3-input w3-white" type="email" value="<?=$result['email']?>" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?> >
                                                </div>
                                                <div class="w3-half">
                                                    <label class="detail">เบอร์โทรศัพท์มือถือ</label>
                                                    <input name="phoneInput" class="w3-input w3-white" type="text" value="<?=$result['phone_number']?>" minlength="10" maxlength="10" autocomplete="off" required
                                                    <?php if($status == 2) { echo('disabled'); }?> >
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <?php if($status == 1) {?>
                                            <div class="col-12">
                                                <label class="detail text-danger">
                                                    * คือข้อมูลที่ไม่สามารถแก้ไขได้
                                                </label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-12">&nbsp;</div>
                                    <?php if ($result['group_status'] == 5) {?>
                                        <?php
                                            $firstTimePassword = rand(1111,9999);
                                        ?>
                                        <div class="w3-card-2 w3-red" style="padding-top:1%; padding-bottom:1%">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-8" style="padding-top:1%">
                                                        <label class="mini-header">Username นี้มีการแจ้งต้องการ Reset Password คลิ๊กปุ่มทางขวาเพื่อดำเนินต่อ ></label>
                                                    </div>
                                                    <div class="col-4 w3-right">
                                                        <button class="w3-button w3-white" type="button" onclick="document.getElementById('resetPassword').style.display='block'" <?php if($status == 2) { echo('disabled'); }?>>
                                                            <i class="fa fa-repeat"></i>&nbsp;&nbsp;ทำการ Reset Password
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="resetPassword" class="w3-modal">
                                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                                <div class="container-fluid">
                                                    <div class="w3-center"><br>
                                                        <span onclick="document.getElementById('resetPassword').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                                        <label class="header w3-red"><font size="+3">&nbsp;&nbsp;<?=$firstTimePassword?>&nbsp;&nbsp;</font></label><br>
                                                        <div class="col-12">&nbsp;</div>
                                                        <label class="header">โปรดนำตัวเลข 4 หลักด้านบน</label><br>
                                                        <label class="header">ให้แก่ผู้ขอ Reset Password เพื่อใช้งานระบบและแก้ไขรหัสผ่านในครั้งถัดไป</label><br>
                                                    </div>
                                                </div>
                                                <a href="<?php echo('src/backend/reset-password.php?gen='.$firstTimePassword.'&id='.$result['id'])?>"><button class="w3-button w3-block w3-green w3-section w3-padding" type="button">
                                                    <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;ยืนยันการ Reset Password !
                                                </button></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <input type="hidden" value="<?=$id?>" name="idStatus">
                                <div class="col-12 text-center">
                                    <?php if($status == 1) {?>
                                    <button class="w3-button w3-green" type="submit">
                                        <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;แก้ไข
                                    </button>
                                    <a href="listUser.php?status=view/"><button class="w3-button w3-gray" type="button">
                                       <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ยกเลิก
                                    </button></a>
                                    <?php } if($status == 2) {?>
                                        <a href="listUser.php?status=view/"><button class="w3-button w3-green" type="button">
                                            <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;ย้อนกลับ
                                        </button></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <div class="col-12">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php } ?>

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
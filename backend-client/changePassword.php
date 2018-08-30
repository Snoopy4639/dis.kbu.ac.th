<!DOCTYPE html>
<?php
	session_start();

	include 'src/backend/connectDB.php';
	$sql = 'SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id WHERE DIS_USER.username="'.$_SESSION["username"].'"';
    $query = mysqli_query($conn,$sql);
?>
<html>
<head>
	<title>DIS System : เปลี่ยนรหัสผ่าน</title>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/src.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="js/includeHTML.js"></script>
	<script src="js/menuBar.js"></script>
	<script src="src/js/form-register.js"></script>	
	<!-- Icon -->
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div w3-include-html="header.php"></div>
    <div w3-include-html="menuBar.php"></div>
	<div class="col-12">
	<div class="container-fluid">
		<div class="col-12">&nbsp;</div>
		<div class="col-12">&nbsp;</div>
		<?php if ($_GET['status'] == 0) { ?>
			<div class="col-12">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;ไม่สามารถแก้ไขข้อมูลได้ กรุณาติดต่อ Admin
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div class="col-12">&nbsp;</div>
		<?php } ?>
        <div class="col-12">
            <div class="col-10 offset-1">
			<?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
				<label class="header">เปลี่ยนรหัสผ่าน</label>
				<div class="w3-card-4 w3-light-gray">
					<form action="src/backend/set-password.php" method="POST" name="SetPassword" OnSubmit="return checkNewPassword();">
						<div class="container">
							<div class="col-12">&nbsp;</div>
							<div class="w3-center"><img src="src/image/password.png" class="image-fluid" style="width: 20%"></div>
							<div class="col-12">&nbsp;</div>
							<div class="w3-row-padding">
								<div class="w3-third">
									<label class="detail"><i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;Username (ไม่สามารถแก้ไขได้) <font class="text-danger">*</font></label>
									<input class="w3-input w3-light-gray" type="text" value="<?=$result["username"]?>" disabled>
								</div>
								<div class="w3-third">
									<label class="detail"><i class="fa fa-lock icon-detail"></i>&nbsp;&nbsp;Password ใหม่ที่ต้องการ <font class="text-danger">*</font></label>
									<input class="w3-input w3-light-gray" type="password" name="password1" placeholder="ตัวเลขหรืออักษร A-Z จำนวน 4-6 ตัว" minlength="4" maxlength="6" required>
								</div>
								<div class="w3-third">
									<label class="detail"><i class="fa fa-lock icon-detail"></i>&nbsp;&nbsp;Password ใหม่ที่ต้องการอีกครั้ง <font class="text-danger">*</font></label>
									<input class="w3-input w3-light-gray" type="password" name="password2" placeholder="รหัสผ่านต้องตรงกันทั้งคู่" minlength="4" maxlength="6" required>
								</div>
							</div>
							<div class="col-12">&nbsp;</div>
							<div class="col-12 text-center">
								<button class="w3-button w3-green" type="button" onclick="document.getElementById('confirmSave').style.display='block'">
									<i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;ยืนยันรหัสผ่าน
								</button>
								<a href="index.php"><button type="button" class="w3-button w3-red" style="padding-top:1%">
									<i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ยกเลิก
                                </button></a>
							</div>
							<div class="col-12">&nbsp;</div>
						</div>
						<div id="confirmSave" class="w3-modal">
							<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
								<div class="w3-center"><br>
                                    <input type="hidden" name="id" value="<?=$result["id"]?>">
                                    <input type="hidden" name="formChange" value="true">
									<?php $password4 = base64_decode($result["password"])?>
									<input type="hidden" name="password4" value="<?=$password4?>">
									<span onclick="document.getElementById('confirmSave').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
									<label class="header"><font size="+3">ยืนยันการตั้งรหัสผ่าน</font></label><br>
									<label class="detail text-danger">อย่าลืมตรวจสอบข้อมูลก่อนแก้ไข เพื่อผลประโยชน์ต่อตัวท่านเอง</label>
									<label class="detail">** กรุณาใส่รหัสผ่านปัจจุบันเพื่อยืนยันการแก้ไข **</label>
									<div class="w3-row-padding">
										<div class="w3-half">
											<label class="detail"><i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;Username (ไม่สามารถแก้ไขได้) <font class="text-danger">*</font></label>
											<input class="w3-input w3-white" type="text" value="<?=$result["username"]?>" disabled>
										</div>
										<div class="w3-half">
											<label class="detail"><i class="fa fa-lock icon-detail"></i>&nbsp;&nbsp;Password ปัจจุบันที่ใช้งานอยู่ <font class="text-danger">*</font></label>
											<input class="w3-input w3-white" type="password" name="password3" required>
										</div>
									</div>
									<div class="col-12">&nbsp;</div>
								</div>
								<button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
								ยืนยันการตั้งรหัสผ่าน</button>
							</div>
						</div>
					</form>
				</div>
			<?php } ?>
			</div>
			<div id="passwordNull" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('passwordNull').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<label class="header"><font size="+3">รหัสผ่านผิด !</font></label><br>
						<label class="detail text-danger">กรุณากรอกรหัสผ่านทั้ง 2 ช่อง โดยรหัสผ่านทั้ง 2 ช่องต้องตรงกัน</label>
						<button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('passwordNull').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
						เข้าใจแล้ว ! ข้าขอโทษ</button>
					</div>
				</div>
			</div>
			<div id="passwordNotMatch" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('passwordNotMatch').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<label class="header"><font size="+3">รหัสผ่านผิด !</font></label><br>
						<label class="detail text-danger">กรุณากรอกรหัสผ่านทั้ง 2 ช่อง ให้ตรงกัน</label>
						<button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('passwordNotMatch').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
						เข้าใจแล้ว ! ข้าขอโทษ มันจะไม่เกิดขึ้นอีกเป็นครั้งที่สอง</button>
					</div>
				</div>
			</div>
			<div id="oldPasswordNotMatch" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('oldPasswordNotMatch').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<label class="header"><font size="+3">รหัสผ่านผิด !</font></label><br>
						<label class="detail text-danger">กรุณาใส่รหัสผ่านปัจจุบันให้ถูกต้อง เพื่อยืนยันและแก้ไขรหัสผ่าน</label>
						<button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('oldPasswordNotMatch').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
						เข้าใจแล้ว ! ข้าขอโทษ มันจะครั้งสุดท้าย</button>
					</div>
				</div>
			</div>
			<div id="passwordChaError" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('passwordChaError').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<label class="header"><font size="+3">รหัสผ่านผิด !</font></label><br>
						<label class="detail text-danger">รหัสผ่านใหม่ จะต้องเป็น "ตัวเลขหรืออักษร A-Z จำนวน 4-6 ตัว"</label>
						<button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('passwordChaError').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
						เข้าใจแล้ว ! ข้าขอโทษ ข้าอ่านภาษาไทยไม่ค่อยออก</button>
					</div>
				</div>
			</div>
			<div id="passwordExist" class="w3-modal">
				<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
					<div class="w3-center"><br>
						<span onclick="document.getElementById('passwordExist').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
						<label class="header"><font size="+3">รหัสผ่านผิด !</font></label><br>
						<label class="detail text-danger">รหัสผ่านใหม่ จะต้องไม่ซ้ำกับรหัสผ่านที่ใช้อยู่ในปัจจุบัน</label>
						<button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('passwordExist').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
						เข้าใจแล้ว ! ข้าขอโทษ ข้าอ่านภาษาไทยไม่ค่อยออก อีกครั้ง</button>
					</div>
				</div>
			</div>
			<!-- <div id="logout" class="w3-modal">
                    <div class="w3-container">
                        <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:600px">
                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('logout').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                <img src="src/image/password.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                                <div class="col-12">&nbsp;</div>
                                <label class="header"><font size="+3">ออกจากระบบ</font></label><br>
                                <label class="detail text-danger">คุณแน่ใจใช่ไหมที่ต้องการออกจากระบบ<br>โดยการเข้าระบบครั้งต่อไปคุณต้องตั้งค่ารหัสผ่านใหม่อีกครั้ง</label>
                                <br>
                                <a href="src/backend/logout.php"><button class="w3-button w3-red w3-section w3-padding" type="submit"><i class="fa fa-sign-out icon-detail"></i>&nbsp;&nbsp;
                                ออกจากระบบ</button></a>
                                <button class="w3-button w3-green w3-section w3-padding" type="button" onclick="document.getElementById('logout').style.display='none'"><i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;
                                อยู่ในระบบต่อไป</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            <div class="col-12">&nbsp;</div>
        </div>
    </div>
    <div class="col-12">&nbsp;</div>
	</div>
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
	<script src="src/js/setPassword.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
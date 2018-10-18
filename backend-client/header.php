<?php session_start(); ?>
<?php ob_start();?>
<!DOCTYPE html>
<?php
    include 'src/backend/connectDB.php';
	$sql = 'SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id WHERE DIS_USER.username="'.$_SESSION["username"].'"';
    $query = mysqli_query($conn,$sql);
?>
<html>
<head>
    <title>DIS System : หน้าหลัก</title>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/headerDIS.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/includeHTML.js"></script>
	<!-- Icon -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <div class="w3-amber">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">&nbsp;</div>
                <div class="col-md-2 col-12 text-center">
                    <md-body>
                        <img src="/dis/photo/logo2.png" class="img-fluid logo-img-md">                        
                    </md-body>
                    <sm-body>
                        <img src="/dis/photo/logo2.png" class="img-fluid logo-img-sm">
                    </sm-body>
                </div>
                <div class="col-md-9">
                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                    <div class="col-12">&nbsp;</div>
                    <md-body>
                        <label class="header"><font size="+3">แผนกวินัยนักศึกษา</font> มหาวิทยาลัยเกษมบัณฑิต</label>
                        <div class="w3-card-4 w3-white">
                            <div class="w3-bar">
                                <p class="detail w3-left" style="padding-top:1%">
                                     <?php echo($result["username"]." : ".$result["first_name"]." ".$result["last_name"])?>
                                </p>
                                <button onclick="document.getElementById('logout').style.display='block'" class="w3-bar-item w3-button w3-red w3-right bar-button" style="padding-top:1%">
                                    <p class="detail">ออกจากระบบ</p>
                                </button>
                                <?php if($_SESSION["permission"] != 3) {?>
                                    <a href="<?php echo('changePassword.php?id='.$result['id'].'&status=1');?>" class="w3-bar-item w3-button w3-right bar-button" style="padding-top:1%"><p class="detail">เปลี่ยนรหัสผ่าน</p></a>
                                    <a href="<?php echo('myProfile.php?id='.$result['id'].'&status=1');?>" class="w3-bar-item w3-button w3-right bar-button" style="padding-top:1%"><p class="detail">ข้อมูลส่วนตัว</p></a>
                                <?php } ?>
                            </div>
                        </div>
                    </md-body>
                <?php } ?>
                </div>
                <div class="col-12">&nbsp;</div>
                <div id="logout" class="w3-modal">
                    <div class="w3-container">
                        <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:600px">
                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('logout').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                <img src="src/image/password.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                                <div class="col-12">&nbsp;</div>
                                <label class="header"><font size="+3">ออกจากระบบ</font></label><br>
                                <label class="detail text-danger">คุณแน่ใจใช่ไหมที่ต้องการออกจากระบบ</label>
                                <br>
                                <a href="src/backend/logout.php"><button class="w3-button w3-red w3-section w3-padding" type="submit"><i class="fa fa-sign-out icon-detail"></i>&nbsp;&nbsp;
                                ออกจากระบบ</button></a>
                                <button class="w3-button w3-green w3-section w3-padding" type="button" onclick="document.getElementById('logout').style.display='none'"><i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;
                                อยู่ในระบบต่อไป</button>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            </div>            
        </div>
    </div>
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
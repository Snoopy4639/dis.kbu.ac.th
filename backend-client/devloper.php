<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["permission"] == 5 || $_SESSION["permission"] == 3) {
		header("location: /dis/backend-client/setPassword.php?status=1");
	}

	include 'src/backend/connectDB.php';
	$sql = 'SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id WHERE DIS_USER.username="'.$_SESSION["username"].'"';
    $query = mysqli_query($conn,$sql);
?>
<html>
<head>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/indexDIS.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="js/includeHTML.js"></script>
	<script src="js/menuBar.js"></script>
	<script src="src/js/form-register.js"></script>	
	<!-- Icon -->
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
</head>
<body>
	<div w3-include-html="header.php"></div>
	<div w3-include-html="menuBar.php"></div>
	<div class="col-12">
	<div class="container">
        <div class="col-12">&nbsp;</div>
        <div class="col-12">&nbsp;</div>
        <label class="header">เกี่ยวกับผู้พัฒนาระบบ</label>
        <div class="w3-card-4 w3-light-gray">
            <div class="w3-padding-large">
                <div class="col-12">&nbsp;</div>
                <div class="text-center">
                    <img src="src/image/developer.jpg" class="img-fluid" style="width:50%">
                </div>
                <div class="col-12">&nbsp;</div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="w3-card-2 w3-amber">
                                <div class="w3-padding-large">
                                    <div class="text-center">
                                        <label class="header"><u>อาจารย์ที่ปรึกษาโครงงาน</u></label><br>
                                        <h4>อ.ศุธพัฒน์ สรรพจักร</h4>
                                        <h6>อาจารย์ประจำคณะวิทยาศาสตร์และเทคโนโลยี <br> มหาวิทยาลัยเกษมบัณฑิต</h6>
                                        <div class="col-12">&nbsp;</div>
                                        <a href="mailto:sutapat.sap@kbu.ac.th"><button class="w3-button w3-block w3-blue" type="button">
                                            <i class="fa fa-envelope-o icon-detail"></i>&nbsp;&nbsp;<font size="+1">E-mail ติดต่อ</font>
                                        </button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                        <div class="col-6">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-padding-large">
                                    <div class="text-center">
                                        <label class="header"><u>ผู้พัฒนาและออกแบบระบบ</u></label><br>
                                        <h4>นายวีรวัฒน์ ทองนุช</h4>
                                        <h6>รหัสนักศึกษา : 57-07024-21583</h6>
                                        <h6>นักศึกษาคณะวิทยาศาสตร์และเทคโนโลยี <br> มหาวิทยาลัยเกษมบัณฑิต</h6>
                                        <div class="col-12">&nbsp;</div>
                                        <button class="w3-button w3-block w3-green" type="button">
                                            <i class="fa fa-envelope-o icon-detail"></i>&nbsp;&nbsp;<font size="+1">E-mail ติดต่อ</font>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="w3-card-2 w3-white">
                                <div class="w3-padding-large">
                                    <div class="text-center">
                                        <label class="header"><u>ผู้พัฒนาและออกแบบระบบ</u></label><br>
                                        <h4>นายทวีพร อารีพันธ์</h4>
                                        <h6>รหัสนักศึกษา : 57-07024-21684</h6>
                                        <h6>นักศึกษาคณะวิทยาศาสตร์และเทคโนโลยี <br> มหาวิทยาลัยเกษมบัณฑิต</h6>
                                        <div class="col-12">&nbsp;</div>
                                        <button class="w3-button w3-block w3-green" type="button">
                                            <i class="fa fa-envelope-o icon-detail"></i>&nbsp;&nbsp;<font size="+1">E-mail ติดต่อ</font>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                    </div>
                </div>
            </div>
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
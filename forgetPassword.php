<!DOCTYPE html>
<html>
<head>
    <?php include 'backend-client/src/backend/connectDB.php'; ?>
    <title>แผนกวินัยนักศึกษา มหาวิทยาลัยเกษมบัณฑิต</title>
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
	<!-- Icon -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>
<body>
    <div w3-include-html="header.html"></div>
    <div class="w3-amber">
        <div class="container-fluid">
            <div class="w3-card-4 w3-light-gray" style="padding:1% 1% 1% 1%">  
                <div class="col-12">
                    <label class="header">ขั้นตอนการ Reset Password !</label>
                    <p class="detail">
                        1. กรอกข้อมูลให้ถูกต้อง<br>
                        2. แจ้งให้ Admin ทราบเพื่อให้รับ Password ชั่วคราวในการเข้าใช้งานและตั้งรหัสผ่านต่อไป
                    </p>
                    <div class="col-12">&nbsp;</div>
                    <div class="col-12">
                        <div class="w3-card-2 w3-white" style="padding:1% 1% 1% 1%">
                            <form action="src/forget-password.php" method="POST" name="SetPassword">
                                <div class="container">
                                    <div class="col-12">&nbsp;</div>
                                    <div class="w3-center"><img src="photo/index/login_icon.png" class="image-fluid" style="width: 20%"></div>
                                    <div class="col-12">&nbsp;</div><div class="col-12">&nbsp;</div>
                                    <div class="w3-row-padding">
                                        <div class="w3-third">
                                            <label class="detail"><i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;Username <font class="text-danger">*</font></label>
                                            <input class="w3-input w3-white" type="text" name="usernameInput">
                                        </div>
                                        <div class="w3-third">
                                            <label class="detail"><i class="fa fa-phone icon-detail"></i>&nbsp;&nbsp;เบอร์โทรศัพท์ ที่สมัครไว้ในระบบ <font class="text-danger">*</font></label>
                                            <input name="phoneInput" class="w3-input w3-white" type="text" placeholder="08XXXXXXXX" minlength="10" maxlength="10" autocomplete="off" required>
                                        </div>
                                        <div class="w3-third">
                                            <label class="detail"><i class="fa fa-envelope icon-detail"></i>&nbsp;&nbsp;Email ที่สมัครไว้ในระบบ <font class="text-danger">*</font></label>
                                            <input name="emailInput" class="w3-input w3-white" type="email" placeholder="xxxxxx@kbu.ac.th" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-12">&nbsp;</div>
                                    <div class="col-12 text-center">
                                        <button class="w3-button w3-green" type="button" onclick="document.getElementById('confirmSave').style.display='block'">
                                            <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;Reset Password
                                        </button>
                                        <a href="index.php"><button type="button" class="w3-button w3-red">
                                            <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ย้อนกลับ
                                        </button></a>
                                        <!-- <a href="listUser.php?status=view/"><button class="w3-button w3-red" type="button">
                                            <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ออกจากระบบ
                                        </button></a> -->
                                    </div>
                                    <div class="col-12">&nbsp;</div>
                                </div>
                                <div id="confirmSave" class="w3-modal">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                        <div class="w3-center"><br>
                                            <span onclick="document.getElementById('confirmSave').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                            <label class="header"><font size="+3">ยืนยันการ Reset Password</font></label><br>
                                            <label class="detail text-danger">เมื่ออยู่ในขั้นตอนการ Reset Password รหัสผ่านเก่าจะถูกยกเลิกในทันที</label>
                                            <label class="detail text-danger">แน่ใจใช่ไหม ในการ Reset Password ในครั้งนี้</label>
                                        </div>
                                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                                        ยืนยันการ Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">&nbsp;</div>
    </div>

    <div w3-include-html="footer.html"></div>
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
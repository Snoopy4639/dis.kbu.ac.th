<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/sideBar.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/menuBar.js"></script>
	<!-- Icon -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        $Permission = $_SESSION['permission'];
        $Username = $_SESSION['username'];
    ?>
    <div class="w3-bar w3-gray">
        <a href="index.php"><button class="w3-bar-item w3-button">
            <i class="fa fa-home icon-detail"></i>&nbsp;
            <label class="detail">หน้าแรก</label>
        </button></a>
        <?php if ($Permission == 0 || $Permission == 1) {?>
            <div class="w3-dropdown-hover">
                <button class="w3-button">
                    <i class="fa fa-user icon-detail"></i>&nbsp;
                    <label class="detail">จัดการสมาชิก</label>&nbsp;
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="register_User.php?status=0" class="w3-bar-item w3-button w3-border">
                        <label class="detail">สมัครสมาชิก</label>
                    </a>
                    <a href="listUser.php?status=view" class="w3-bar-item w3-button w3-border">
                        <label class="detail">แก้ไขสมาชิก</label>
                    </a>
                </div>
            </div>
            <div class="w3-dropdown-hover">
                <button class="w3-button">
                    <i class="fa fa-file-text icon-detail"></i>&nbsp;&nbsp;
                    <label class="detail">ดูรายงาน</label>&nbsp;
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="#" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">รายงานนักศึกษา</label>
                    </a>
                    <a href="#" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">รายงานของหาย</label>
                    </a>
                </div>
            </div>
            <div class="w3-dropdown-hover">
                <button class="w3-button">
                    <i class="fa fa-bullhorn icon-detail"></i>&nbsp;&nbsp;
                    <label class="detail">จัดการข่าวประชาสัมพันธ์</label>&nbsp;
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="addNews.php?status=0" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">เพิ่มข่าวประชาสัมพันธ์</label>
                    </a>
                    <a href="listNews.php?status=view" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">แก้ไขข่าวประชาสัมพันธ์</label>
                    </a>
                </div>
            </div>
        <?php } ?>
        <?php if ($Permission != 4) { ?>
            <div class="w3-dropdown-hover">
                <button class="w3-button">
                    <i class="fa fa-users icon-detail"></i>&nbsp;&nbsp;
                    <label class="detail">จัดการข้อมูลนักศึกษา</label>&nbsp;
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="register_student.php?status=0" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">เพิ่มประวัตินักศึกษา</label>
                    </a>
                    <a href="listStudent.php?status=view" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">แก้ไขประวัตินักศึกษา</label>
                    </a>
                </div>
            </div>
            <div class="w3-dropdown-hover">
                <button class="w3-button">
                    <i class="fa fa-archive icon-detail"></i>&nbsp;&nbsp;
                    <label class="detail">จัดการข้อมูลของหาย</label>&nbsp;
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="addLostAndFound_A.php?status=0" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">เพิ่มรายการของหาย</label>
                    </a>
                    <a href="listLostAndFound_A.php?status=view" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">แก้ไขรายการของหาย</label>
                    </a>
                    <a href="addLostAndFound_B.php?status=0" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">เพิ่มประกาศของหาย</label>
                    </a>
                    <a href="listLostAndFound_B.php?status=view" class="w3-bar-item w3-button w3-border" onclick="openTab('Home', 'Fade')">
                        <label class="detail">แก้ไขประกาศของหาย</label>
                    </a>
                </div>
            </div>
        <?php } ?>
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
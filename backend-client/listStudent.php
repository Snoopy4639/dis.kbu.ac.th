<!DOCTYPE html>
<?php
    session_start(); 
    ob_start(); 
    // if (!$_SESSION['permission'] == 0 or !$_SESSION['permission'] == 1) {
    //     header("location: /backend-client/index.php");
    // } else {
?>
<html>
<head>
    <title>DIS System : รายชื่อนักศึกษา</title>
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
    <script src="js/menuBar.js"></script>
	<!-- Icon -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div w3-include-html="header.php"></div>
	<div w3-include-html="menuBar.php"></div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="col-12">&nbsp;</div>
            <?php if ($_GET['status'] == 1) { ?>
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลสำเร็จ
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php
                        header("Refresh:5; location: /dis/backend-client/listStudent.php?status="."showall");
                    ?>
            <?php } if ($_GET['status'] == false) { ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลไม่สำเร็จ กรุณาแจ้งผู้ดูแลระบบ
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
            <?php } if($_GET['status'] == 'view') {}?>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <label class="header">รายชื่อนักศึกษา</label>
                <div class="w3-card-4 w3-amber">
                    <div class="col-12">
                        <label class="detail"><font size="+1">ค้นหารายชื่อนักศึกษา</font></label>
                        <form action="listStudent.php" method="GET"> 
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp;<label class="detail">ค้นหาจากรหัสนักศึกษา</label>
                                    <input name="idSearch" class="w3-input" type="text">
                                </div>
                                <div class="w3-third">
                                    <i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp;<label class="detail">ค้นหาจากชื่อนักศึกษา</label>
                                    <input name="nameSearch" class="w3-input" type="text">
                                </div>
                                <div class="w3-third">
                                    <input type="hidden" name="status" value="search">
                                    <label class="detail">&nbsp;</label>
                                    <button class="w3-button w3-block w3-green" type="submit"><i class="fa fa-search"></i>&nbsp;&nbsp;ค้นหา</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">&nbsp;</div>
                </div>
                <div class="col-12">&nbsp;</div>
                <div class="w3-card-4 w3-light-gray">
                    <div class="container">
                        <?php if($_REQUEST['status'] == 'view') { ?>
                            <div class="col-12">&nbsp;</div>
                            <div class="text-center">
                                <label class="header">กรุณาค้นหาข้อมูลหรือกดปุ่มด้านล่างเพื่อแสดงทั้งหมด</label>
                                <div class="col-12">&nbsp;</div>
                                <a href="listStudent.php?status=showall"><button class="w3-button w3-green"><i class="fa fa-search"></i>&nbsp;&nbsp;แสดงข้อมูลทั้งหมด</button></a>
                                <div class="col-12">&nbsp;</div>
                            </div>
                        <?php } ?>
                        <?php if($_GET["status"] == "null") {?>
                            <div class="col-12">&nbsp;</div>
                            <div class="text-center">
                                <i class="fa fa-exclamation-circle icon-alert"></i>
                                <label class="alert">กรุณาใส่ รหัสนักศึกษา หรือ ชื่อนักศึกษา อย่างน้อยหนึ่งอย่างในการค้นหาข้อมูล</label>
                                <br>
                                <label class="header">กรุณาค้นหาข้อมูลหรือกดปุ่มด้านล่างเพื่อแสดงทั้งหมด</label>
                                <div class="col-12">&nbsp;</div>
                                <a href="listStudent.php?status=showall"><button class="w3-button w3-green"><i class="fa fa-search"></i>&nbsp;&nbsp;แสดงข้อมูลทั้งหมด</button></a>
                                <div class="col-12">&nbsp;</div>
                            </div>
                        <?php } else if($_GET['status'] == 'showall') { ?>
                        <div class="col-12">&nbsp;</div>
                        <?php
                            include 'src/backend/connectDB.php';
                            $sql = 'SELECT * FROM STUDENT_INFO';
                            $query = mysqli_query($conn,$sql);
                        ?>
                        <div class="col-12">
                            <a href="listStudent.php?status=view"><button class="w3-button w3-gray" type="button"><i class="fa fa-repeat"></i>&nbsp;&nbsp;ล้างการค้นหา</button></a>
                            <label class="header w3-right">แสดงข้อมูลทั้งหมด</label>
                            <div class="col-12">&nbsp;</div>
                            <table class="w3-table-all w3-hoverable text-center">
                                <thead class="text-center">
                                    <tr class="w3-amber">
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">รหัสนักศึกษา</font></label></th>
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">ชื่อ-นามสกุล</font></label></th>
                                        <th width="30%" class="text-center"><label class="detail"><font size="+0.5">คณะ</font></label></th>
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">แก้ไข / ดูข้อมูล</font></label></th>
                                    </tr>
                                </thead>
                                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['student_id']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['student_first_name'].' '.$result['student_last_name']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5">
                                        <?php
                                            if($result['student_faculty'] == 1) { echo 'บริหารธุรกิจ';}
                                            else if($result['student_faculty'] == 2) { echo 'นิติศาสตร์';}
                                            else if($result['student_faculty'] == 3) { echo 'นิเทศศาสตร์';}
                                            else if($result['student_faculty'] == 4) { echo 'วิศวกรรมศาสตร์';}
                                            else if($result['student_faculty'] == 5) { echo 'สถาปัตยกรรมศาสตร์';}
                                            else if($result['student_faculty'] == 6) { echo 'ศิลปกรรมศาสตร์';}
                                            else if($result['student_faculty'] == 7) { echo 'วิทยาศาสตร์และเทคโนโลยี';}
                                            else if($result['student_faculty'] == 8) { echo 'จิตวิทยา';}
                                            else if($result['student_faculty'] == 9) { echo 'หลักสูตรนานาชาติ';}
                                            else if($result['student_faculty'] == 10) { echo 'สถาบันพัฒนาบุคคลากรการบิน';}
                                            else if($result['student_faculty'] == 11) { echo 'วิทยาศาสตร์การกีฬา';}
                                            else if($result['student_faculty'] == 12) { echo 'พยาบาลศาสตร์';}
                                            else if($result['student_faculty'] == 13) { echo 'อื่นๆ';}
                                        ?>
                                        </font></label>
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col text-right">
                                                <form action="editStudent.php" method="GET">
                                                    <input type="hidden" value="<?=$result['id']?>" name="ID">
                                                    <input type="hidden" value="1" name="Status">
                                                    <button type="submit" class="btn btn-link" value="submit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col text-left">
                                                <form action="editStudent.php" method="GET">
                                                    <input type="hidden" value="<?=$result['id']?>" name="ID">
                                                    <input type="hidden" value="2" name="Status">
                                                    <button type="submit" class="btn btn-link" value="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <div class="col-12">&nbsp;</div>
                        </div>
                        <?php }
                        if($_GET["status"] == "search") {
                            $idSearch = trim($_GET['idSearch']);
                            $nameSearch = trim($_GET['nameSearch']);
                            if($idSearch) { 
                                if($nameSearch) { 
                                    include 'src/backend/connectDB.php';
                                    $sql = 'SELECT * FROM STUDENT_INFO WHERE student_id LIKE "%'.$idSearch.'%" AND student_first_name LIKE "%'.$nameSearch.'%"';
                                    $query = mysqli_query($conn,$sql);
                                    $searchBy = "รหัสนักศึกษา : ".$idSearch." และ ชื่อ : ".$nameSearch;  
                                } 
                                include 'src/backend/connectDB.php';
                                $sql = 'SELECT * FROM STUDENT_INFO WHERE student_id LIKE "%'.$idSearch.'%"';
                                $query = mysqli_query($conn,$sql);
                                $searchBy = "รหัสนักศึกษา : ".$idSearch;
                            } else if($nameSearch) {
                                include 'src/backend/connectDB.php';
                                $sql = 'SELECT * FROM STUDENT_INFO WHERE student_first_name LIKE "%'.$nameSearch.'%"';
                                $query = mysqli_query($conn,$sql); 
                                $searchBy = "ชื่อ : ".$nameSearch;
                            } else {
                                header("location: /dis/backend-client/listStudent.php?status=null");
                            }?>
                        <div class="col-12">&nbsp;</div>
                        <div class="col-12">
                            <a href="listStudent.php?status=view"><button class="w3-button w3-gray" type="button"><i class="fa fa-repeat"></i>&nbsp;&nbsp;ล้างการค้นหา</button></a>
                            <label class="detail w3-right">ผลการค้นหาของ <?=$searchBy?></label>
                            <div class="col-12">&nbsp;</div>
                            <table class="w3-table-all w3-hoverable text-center">
                                <thead class="text-center">
                                    <tr class="w3-amber">
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">รหัสนักศึกษา</font></label></th>
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">ชื่อ-นามสกุล</font></label></th>
                                        <th width="30%" class="text-center"><label class="detail"><font size="+0.5">คณะ</font></label></th>
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">แก้ไข / ดูข้อมูล</font></label></th>
                                    </tr>
                                </thead>
                                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['student_id']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['student_first_name'].' '.$result['student_last_name']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5">
                                        <?php
                                            if($result['student_faculty'] == 1) { echo 'บริหารธุรกิจ';}
                                            else if($result['student_faculty'] == 2) { echo 'นิติศาสตร์';}
                                            else if($result['student_faculty'] == 3) { echo 'นิเทศศาสตร์';}
                                            else if($result['student_faculty'] == 4) { echo 'วิศวกรรมศาสตร์';}
                                            else if($result['student_faculty'] == 5) { echo 'สถาปัตยกรรมศาสตร์';}
                                            else if($result['student_faculty'] == 6) { echo 'ศิลปกรรมศาสตร์';}
                                            else if($result['student_faculty'] == 7) { echo 'วิทยาศาสตร์และเทคโนโลยี';}
                                            else if($result['student_faculty'] == 8) { echo 'จิตวิทยา';}
                                            else if($result['student_faculty'] == 9) { echo 'หลักสูตรนานาชาติ';}
                                            else if($result['student_faculty'] == 10) { echo 'สถาบันพัฒนาบุคคลากรการบิน';}
                                            else if($result['student_faculty'] == 11) { echo 'วิทยาศาสตร์การกีฬา';}
                                            else if($result['student_faculty'] == 12) { echo 'พยาบาลศาสตร์';}
                                            else if($result['student_faculty'] == 13) { echo 'อื่นๆ';}
                                        ?>
                                        </font></label>
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col text-right">
                                                <form action="editStudent.php" method="GET">
                                                    <input type="hidden" value="<?=$result['id']?>" name="ID">
                                                    <input type="hidden" value="1" name="Status">
                                                    <button type="submit" class="btn btn-link" value="submit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col text-left">
                                                <form action="editStudent.php" method="GET">
                                                    <input type="hidden" value="<?=$result['id']?>" name="ID">
                                                    <input type="hidden" value="2" name="Status">
                                                    <button type="submit" class="btn btn-link" value="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <div class="col-12">&nbsp;</div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
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
<?php 
    ob_end_flush();
//} ?>
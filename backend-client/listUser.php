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
            <?php } elseif ($_GET['status'] == false) { ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลไม่สำเร็จ กรุณาแจ้งผู้ดูแลระบบ
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
            <?php } elseif($_GET['status'] == 'view') {}?>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <label class="header">รายชื่อสมาชิกในระบบ DIS</label>
                <div class="w3-card-4 w3-light-gray">
                    <div class="container">
                        <div class="col-12">&nbsp;</div>
                        <?php
                            include 'src/backend/connectDB.php';
                            $sql = 'SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id';
                            $query = mysqli_query($conn,$sql);
                        ?>
                        <div class="col-12">
                            <table class="w3-table-all w3-hoverable text-center">
                                <thead class="text-center">
                                    <tr class="w3-amber">
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">Username</font></label></th>
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">ชื่อ-นามสกุล</font></label></th>
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">สถานะในระบบ</font></label></th>
                                        <th width="25%" class="text-center"><label class="detail"><font size="+0.5">แก้ไข / ดูข้อมูล</font></label></th>
                                    </tr>
                                </thead>
                                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['username']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['first_name'].' '.$result['last_name']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5">
                                        <?php
                                            if($result['group_status'] == 0) { echo 'God Mode';}
                                            elseif($result['group_status'] == 1) { echo 'Admin';}
                                            elseif($result['group_status'] == 2) { echo 'Staff';}
                                            elseif($result['group_status'] == 3) { echo 'First Login';}
                                            elseif($result['group_status'] == 4) { echo 'Block';}
                                            elseif($result['group_status'] == 5) { echo 'Reset Password';}
                                            elseif($result['group_status'] == 6) { echo 'Wait Reset Password';}
                                        ?>
                                        </font></label>
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col text-right">
                                                <form action="editUser.php" method="GET">
                                                    <input type="hidden" value="<?=$result['id']?>" name="ID">
                                                    <input type="hidden" value="1" name="Status">
                                                    <button type="submit" class="btn btn-link" value="submit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col text-left">
                                                <form action="editUser.php" method="GET">
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
<?php //} ?>
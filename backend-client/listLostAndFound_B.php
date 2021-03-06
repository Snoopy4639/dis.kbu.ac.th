<?php session_start(); ?>
<?php ob_start();?>
<!DOCTYPE html>
<?php
    if($_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }
?>
<html>
<head>
    <title>DIS System : รายการสิ่งของที่พบ</title>
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
                <label class="header">รายการสิ่งของที่กำลังตามหา</label>
                <div class="w3-card-4 w3-light-gray">
                    <div class="container">
                        <div class="col-12">&nbsp;</div>
                        <?php
                            include 'src/backend/connectDB.php';
                            $sql = 'SELECT * FROM LOST_AND_FOUND_B';
                            $query = mysqli_query($conn,$sql);
                            $num_rows = mysqli_num_rows($query);

                            $per_page = 10;
                            $page  = 1;

                            if(isset($_GET["Page"])) {
                                $page = $_GET["Page"];
                            }

                            $prev_page = $page-1;
                            $next_page = $page+1;

                            $row_start = (($per_page*$page)-$per_page);
                            if($num_rows<=$per_page) {
                                $num_pages =1;
                            }
                            else if(($num_rows % $per_page)==0) {
                                $num_pages =($num_rows/$per_page) ;
                            }
                            else {
                                $num_pages =($num_rows/$per_page)+1;
                                $num_pages = (int)$num_pages;
                            }
                            $row_end = $per_page * $page;
                            if($row_end > $num_rows) {
                                $row_end = $num_rows;
                            }
                            
                            $sql .=" order by id DESC LIMIT $row_start ,$row_end";
                            $query = mysqli_query($conn,$sql);
                        ?>
                        <div class="col-12">
                            <table class="w3-table-all w3-hoverable text-center">
                                <thead class="text-center">
                                    <tr class="w3-amber">
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">ลำดับที่</font></label></th>
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">สิ่งของตามหา</font></label></th>
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">ชื่อเจ้าของ</font></label></th>
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">วันที่แจ้ง</font></label></th>
                                        <th width="20%" class="text-center"><label class="detail"><font size="+0.5">แก้ไข / ดูข้อมูล</font></label></th>
                                    </tr>
                                </thead>
                                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                                <tr>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['id']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['item_name_lost']; ?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['name_lost_item'];?></font></label></td>
                                    <td class="text-center"><label class="detail"><font size="+0.5"><?php echo $result['date_lost'];?></font></label></td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col text-right">
                                                <form action="editLostAndFound_B.php" method="GET">
                                                    <input type="hidden" value="<?=$result['id']?>" name="ID">
                                                    <input type="hidden" value="1" name="Status">
                                                    <button type="submit" class="btn btn-link" value="submit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col text-left">
                                                <form action="editLostAndFound_B.php" method="GET">
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
                            <div class="w3-center w3-bar">
                                <label class="mini-header text-danger">ระบบจะแสดงรายการหน้าละ 10 รายการเท่านั้น</label>
                                <br>
                                <?php if($prev_page) { ?>
                                    <a href=<?php echo("$_SERVER[SCRIPT_NAME]?status=view&Page=$prev_page");?> class="w3-button">&laquo;&nbsp;ย้อนกลับ</a>
                                <?php 
                                }
                                for($i=1; $i<=$num_pages; $i++) {
                                    if($i != $page) { ?>
                                    <a href=<?php echo("$_SERVER[SCRIPT_NAME]?status=view&Page=$i");?> class="w3-button"><?php echo($i);?></a>
                                <?php } else { ?>
                                    <a href=<?php echo("$_SERVER[SCRIPT_NAME]?status=view&Page=$i");?> class="w3-button w3-amber"><?php echo($i);?></a>
                                <?php }
                                }
                                if($page!=$num_pages) { ?>
                                    <a href=<?php echo("$_SERVER[SCRIPT_NAME]?status=view&Page=$next_page");?> class="w3-button">ถัดไป&nbsp;&raquo;</a>
                                <?php } ?>
                            </div>
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
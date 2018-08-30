<!DOCTYPE html>
<?php
    session_start(); 
    // if (!$_SESSION['permission'] == 0 or !$_SESSION['permission'] == 1) {
    //     header("location: /backend-client/index.php");
    // } else {

    include 'src/backend/connectDB.php';
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
    <script src="src/js/form-register-student.js"></script>
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
            <?php } elseif ($_GET['status'] == 'view') {}?>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <label class="header">ข้อความเคลื่อนไหวในหน้าหลัก</label>
                <?php
                    $sqlTextBanner = 'SELECT * FROM NEWS_TEXT_BANNER';
                    $queryTextBanner = mysqli_query($conn,$sqlTextBanner);
                ?>
                <div class="w3-card-4 w3-light-gray" style="padding-top:1%; padding-bottom:1%">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <?php while($result=mysqli_fetch_array($queryTextBanner,MYSQLI_ASSOC)) { ?>
                                    <marquee><?php echo('-- '.$result["banner_text"].' --');?></marquee>
                                    <!-- <marquee>--- แผนกวินัยนักศึกษา มหาวิทยาลัยเกษมบัณฑิต ยินดีต้อนรับนักศึกษาทุกท่าน เข้าสู่รั้วมหาวิทยาลัยเกษมบัณฑิต ---</marquee> -->
                                <?php } ?>
                            </div>
                        </div>
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="openTab('addStudentReport')">
                            <i class="fa fa-edit icon-detail"></i>&nbsp;&nbsp;แก้ไขข้อความเคลื่อนไหว
                        </button>
                    </div>
                    <div id="addStudentReport" class="w3-container openTab" style="display:none">
                        <div w3-include-html="<?php echo('src/editTextBanner.php')?>"></div>
                        <div class="col-12">&nbsp;</div>
                    </div>
                </div>
                
                <div class="col-12">&nbsp;</div>
                <label class="header">รายการภาพเคลื่อนไหวในหน้าหลัก</label>
                <?php
                    $sqlBanner = 'SELECT * FROM NEWS_BANNER';
                    $queryBanner = mysqli_query($conn,$sqlBanner);
                    $numBanner_rows = mysqli_num_rows($queryBanner);

                    $i = 1;
                ?>
                <div class="w3-card-4 w3-light-gray" style="padding-top:1%; padding-bottom:1%">
                    <div class="container">
                        <div class="col-12">&nbsp;</div>
                        <label class="mini-header text-danger">Website DIS สามารถแสดงภาพเคลื่อนไหวในหน้าแรกได้แค่ <strong>3</strong> ภาพเท่านั้น</label>
                        <div class="col-12">&nbsp;</div>
                        <div class="col-12">
                            <?php while($result=mysqli_fetch_array($queryBanner,MYSQLI_ASSOC)) { ?>
                                <label class="header">ภาพเคลื่อนไหวภาพที่ : <?php echo($i." ".$result["banner_title"]);?></label><br>
                                <div class="row">
                                    <form action="editBanner.php" method="GET">
                                        <input type="hidden" value="<?=$result['id']?>" name="ID">
                                        <input type="hidden" value="1" name="Status">
                                        <button class="w3-button w3-green" type="submit">
                                            <i class="fa fa-edit icon-detail"></i>&nbsp;&nbsp;แก้ไขรายละเอียด
                                        </button>
                                    </form>
                                    &nbsp;
                                    <form action="editBanner.php" method="GET">
                                        <input type="hidden" value="<?=$result['id']?>" name="ID">
                                        <input type="hidden" value="2" name="Status">
                                        <button class="w3-button w3-blue" type="submit">
                                            <i class="fa fa-search icon-detail"></i>&nbsp;&nbsp;ดูรายละเอียด
                                        </button>
                                    </form>
                                    &nbsp;
                                    <form action="src/backend/remove-banner.php" method="POST">
                                        <input type="hidden" value="<?=$result['id']?>" name="ID">
                                        <button class="w3-button w3-red" type="button" onclick="document.getElementById('confirmRemove').style.display='block'">
                                            <i class="fa fa-trash icon-detail"></i>&nbsp;&nbsp;ลบภาพเคลือนไหว
                                        </button>
                                        <div id="confirmRemove" class="w3-modal">
                                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                                <div class="w3-center"><br>
                                                    <span onclick="document.getElementById('confirmRemove').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                                    <label class="header"><font size="+3">ยืนยันการลบภาพเคลื่อนไหว</font></label><br>
                                                    <label class="detail text-danger">อย่าลืมตรวจสอบภาพให้ถูกต้อง เพื่อผลประโยชน์ของระบบ</label>
                                                </div>
                                                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                                                ยืนยันการลบภาพเคลื่อนไหว</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="col-12">&nbsp;</div>
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-fluid" src="src/backend/upload/banner/<?php echo($result["banner_pic_path"]);?>" style="width:800px; height:400px">
                                    <?php if(($result["banner_title"] != "") || ($result["banner_detail"] != "")) {?>
                                        <div class="w3-display-bottomleft w3-container w3-padding-16 w3-black">
                                            <?php if($result["banner_title"] != "") { ?>
                                                <label class="mini-header"><?php echo($result["banner_title"]);?></label><br>
                                            <?php }?>
                                            <?php if($result["banner_detail"] != "") { ?>
                                                <label class="detail"><?php echo($result["banner_detail"]);?></label>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <?php $i = $i + 1; ?>
                            <?php } ?>
                        </div>
                        <?php if($numBanner_rows == 3) {?>
                            <div class="text-center">
                                <button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('errorAddBanner').style.display='block'">
                                    <i class="fa fa-cloud-upload icon-detail"></i>&nbsp;&nbsp;เพิ่มภาพเคลื่อนไหว
                                </button>
                            </div>
                            <div id="errorAddBanner" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                    <div class="w3-center"><br>
                                        <span onclick="document.getElementById('errorAddBanner').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                        <label class="header"><font size="+3">คำเตือน</font></label><br>
                                        <label class="detail text-danger">ไม่สามารถเพิ่มภาพเคลื่อนไหวได้ เนื่องจากเกินจำนวนที่กำหนดไว้<br> 
                                        คุณต้องลบภาพเดิมออกก่อน ถึงจะสามารถเพิ่มใหม่ได้อีกครั้ง</label>
                                    </div>
                                    <button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('errorAddBanner').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                                    เข้าใจแล้ว</button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="text-center">
                                <a href="addBanner.php?status=0"><button class="w3-button w3-block w3-green w3-section w3-padding" type="button">
                                    <i class="fa fa-cloud-upload icon-detail"></i>&nbsp;&nbsp;เพิ่มภาพเคลื่อนไหว
                                </button></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12">&nbsp;</div>
            </div>
        </div>
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
<?php //} ?>
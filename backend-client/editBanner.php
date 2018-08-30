<!DOCTYPE html>
<?php
    session_start();
    
	if($_SESSION["permission"] == 2 || $_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }
?>
<html>
<head>
    <?php
        session_start(); 
        $id = $_REQUEST["ID"];
        $status = $_REQUEST["Status"];

        include 'src/backend/connectDB.php';
        $sql = 'SELECT * FROM NEWS_BANNER WHERE id="'.$id.'"';
        $query = mysqli_query($conn,$sql);
    ?>
	<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
	<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
	<!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/headerDIS.css">
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
    <form action="src/backend/update-banner.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
        enctype="multipart/form-data" id="registerForm"> 
    <div class="container-fulid">
        <div class="col-12">
            <div class="col-12">&nbsp;</div>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <label class="header">รายการข่าวประชาสัมพันธ์ : <?php echo($result['banner_title']);?></label>
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
                            <div class="col-md-12 text-center">
                                <div class="w3-card-2 w3-white">
                                    <div class="container-fluid">
                                        <div class="col-12">&nbsp;</div>
                                        <img class="d-block w-100 img-fluid" src="src/backend/upload/banner/<?php echo($result["banner_pic_path"]);?>" style="width:800px; height:400px">
                                        <div class="col-12">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">
                                <div class="w3-card-2 w3-white">
                                    <div class="container-fluid">
                                        <div class="col-12">&nbsp;</div>
                                        <div class="w3-row-padding">
                                            <label class="detail"><i class="fa fa-list icon-detail"></i>&nbsp;&nbsp;ชื่อหัวข้อภาพ</label>
                                            <input name="bannerTitleInput" class="w3-input w3-white" type="text" autocomplete="off" value="<?=$result["banner_title"]?>" <?php if($status == 2) { echo('disabled'); }?>>
                                        </div>
                                        <div class="col-12">&nbsp;</div>
                                        <div class="w3-row-padding">
                                            <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดของภาพ</label>
                                            <textarea name="bannerDetailInput" class="w3-input w3-border w3-white" rows="5" col="5" resize="none" autocomplete="off" <?php if($status == 2) { echo('disabled'); }?>><?=$result["banner_detail"]?></textarea>
                                        </div>
                                        <div class="col-12">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-12">&nbsp;</div>
                                <input type="hidden" value="<?=$id?>" name="idStatus">
                                <div class="col-12 text-center">
                                    <?php if($status == 1) {?>
                                    <button class="w3-button w3-green" type="submit">
                                        <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;แก้ไข
                                    </button>
                                    <a href="listNews.php?status=view/"><button class="w3-button w3-gray" type="button">
                                       <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ยกเลิก
                                    </button></a>
                                    <?php } if($status == 2) {?>
                                        <a href="listNews.php?status=view/"><button class="w3-button w3-green" type="button">
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
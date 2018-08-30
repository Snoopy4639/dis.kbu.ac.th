<!DOCTYPE html>
<html>
<head>
    <?php
        session_start(); 
        $id = $_REQUEST["ID"];
        $status = $_REQUEST["Status"];

        include 'src/backend/connectDB.php';
        $sql = 'SELECT * FROM LOST_AND_FOUND_B INNER JOIN LOST_AND_FOUND_ITEM_STATUS ON LOST_AND_FOUND_B.item_status = LOST_AND_FOUND_ITEM_STATUS.id WHERE LOST_AND_FOUND_B.id="'.$id.'"';
        $query = mysqli_query($conn,$sql);
    ?>
    <title>DIS System : ข้อมูลสิ่งของที่กำลังตามหา</title>
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
    <!-- Date Picker -->
    <link type="text/css" href="src/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
    <script type="text/javascript" src="src/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="src/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
    <script type="text/javascript" src="src/js/date-picker.js"></script>
    <link type="text/css" rel="stylesheet" href="src/css/date-picker.css"/>
</head>
<body>
    <div w3-include-html="header.php"></div>
    <div w3-include-html="menuBar.php"></div>
    <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
    <form action="src/backend/update-lost-item-B.php" method="POST" name="registerForm" onSubmit="JavaScript:return checkSubmit();"
        enctype="multipart/form-data" id="registerForm"> 
    <div class="container-fulid">
        <div class="col-12">
            <div class="col-12">&nbsp;</div>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
                <label class="header">รายการสิ่งของที่ประกาศตามหา : <?php echo($result['item_name_lost']);?></label>
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
                                <div class="col-12">
                                    <div class="w3-card-2 w3-white">
                                        <div class="container-fluid">
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-third">
                                                    <label class="detail"><i class="fa fa-list icon-detail"></i>&nbsp;&nbsp;ชื่อสิ่งของ</label>
                                                    <input name="itemNameInput" value="<?=$result["item_name_lost"]?>" class="w3-input w3-white" type="text" autocomplete="off"  required <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                                <div class="w3-third">
                                                    <label class="detail"><i class="fa fa-map-marker icon-detail"></i>&nbsp;&nbsp;สถานที่ที่คาดว่าของหาย</label>
                                                    <input name="locationLostInput" value="<?=$result["item_location_lost"]?>" class="w3-input w3-white" type="text" autocomplete="off" required <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                                <div class="w3-third">
                                                <label class="detail"><i class="fa fa-caret-down icon-detail"></i>&nbsp;&nbsp;สถานะ</label>
                                                    <select class="form-control w3-white" name="itemStatus" <?php if($status == 2) { echo('disabled'); }?>>
                                                        <option value="3" <?php if($result["item_status"] == 3){ echo('selected');}?>>กำลังตามหา</option>
                                                        <option value="4" <?php if($result["item_status"] == 4){ echo('selected');}?>>เจอของที่หายแล้ว</option>
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดสิ่งของที่พบ</label>
                                                <textarea name="itemDetailInput" class="w3-input w3-border w3-white" rows="5" col="5" resize="none" autocomplete="off" required <?php if($status == 2) { echo('disabled'); }?>><?php echo($result['item_detail_lost']);?></textarea>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="w3-row-padding">
                                                <div class="w3-third">
                                                    <label class="detail"><i class="fa fa-calendar icon-detail"></i>&nbsp;&nbsp;วันที่ที่คาดว่าของหาย <font class="text-danger">*</font></label>
                                                    <input name="dateLost" class="w3-input" value="<?=$result["date_lost"]?>" type="text" id="datepicker" autocomplete="off" required>
                                                </div>
                                                <div class="w3-third">
                                                    <label class="detail">ชื่อเจ้าของ</label>
                                                    <input name="nameLostInput" value="<?=$result["name_lost_item"]?>" class="w3-input w3-white" type="text" id="datepicker" autocomplete="off" required <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
                                                <div class="w3-third">
                                                    <label class="detail">เบอร์โทรศัพท์มือถือเจ้าของ</label>
                                                    <input name="phoneLostInput" value="<?=$result["phonenumber_lost_item"]?>" class="w3-input w3-white" type="text" placeholder="08XXXXXXXX" minlength="10" maxlength="10" autocomplete="off" required <?php if($status == 2) { echo('disabled'); }?>>
                                                </div>
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
                                    <a href="listLostAndFound_A.php?status=view/"><button class="w3-button w3-gray" type="button">
                                       <i class="fa fa-close icon-detail"></i>&nbsp;&nbsp;ยกเลิก
                                    </button></a>
                                    <?php } if($status == 2) {?>
                                        <a href="listLostAndFound_A.php?status=view/"><button class="w3-button w3-green" type="button">
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
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
</head>
<body>
    <div w3-include-html="header.html"></div>
    <div class="w3-amber">
        <div class="container-fluid">
            <div class="w3-card-4 w3-white">
                <div class="text-center w3-gray">
                    <label class="header">รายการประกาศของหายทั้งหมด</label>
                </div>
                <?php
                    $sql = 'SELECT * FROM LOST_AND_FOUND_B';
                    $query = mysqli_query($conn,$sql);
                    $num_rows = mysqli_num_rows($query);

                    $per_page = 15;
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

                    $n = 1;
                ?>
                <div class="container-fluid">
                    <div class="row">
                    <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                        <div class="col-md-4 col-4 text-center w3-hover-gray w3-border" style="padding-bottom: 1%; padding-top: 1%">
                            <label class="detail" style="margin-top: 5%">
                                <?php if($result['item_status'] == 3) { ?>
                                    <div class="col-12 w3-green">
                                       <label class="header">กำลังตามหา</label>
                                    </div>
                                <?php } ?>
                                <?php if($result['item_status'] == 4) { ?>
                                    <div class="col-12 w3-red">
                                       <label class="header">หาพบแล้ว</label>
                                    </div>
                                <?php } ?>
                                <br>
                                สื่งของ : <?php echo($result["item_name_lost"])?><br>
                                สถานที่ทำหาย : <?php echo($result["item_location_lost"])?><br>
                                วันที่คาดว่าหาย : <?php echo($result["date_lost"])?><br>
                            </label>
                            <div class="col-12">&nbsp;</div>
                            <button class="w3-button w3-block w3-blue" type="button" onclick="return document.getElementById('<?php echo('infoItem').$n?>').style.display='block'">
                                <i class="fa fa-search"></i>&nbsp;&nbsp;ดูรายละเอียด
                            </button>
                        </div>
                        <div id="<?php echo('infoItem').$n?>" class="w3-modal">
                            <div class="container">
                                <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:auto">
                                    <div class="container">
                                        <div class="col-12">&nbsp;</div>
                                        <div class="text-center w3-gray">
                                            <label class="header">รายการประกาศของหายทั้งหมด</label>
                                        </div>
                                        <div class="col-12">&nbsp;</div>
                                        <div class="col-12">&nbsp;</div>
                                        <div class="w3-row-padding">
                                            <div class="w3-third">
                                                <label class="detail"><i class="fa fa-list icon-detail"></i>&nbsp;&nbsp;ชื่อสิ่งของ</label>
                                                <input name="itemNameInput" value="<?=$result["item_name_lost"]?>" class="w3-input w3-white" type="text" autocomplete="off" disabled>
                                            </div>
                                            <div class="w3-third">
                                                <label class="detail"><i class="fa fa-map-marker icon-detail"></i>&nbsp;&nbsp;สถานที่ที่คาดว่าของหาย</label>
                                                <input name="locationLostInput" value="<?=$result["item_location_lost"]?>" class="w3-input w3-white" type="text" autocomplete="off" disabled>
                                            </div>
                                            <div class="w3-third">
                                                <label class="detail"><i class="fa fa-calendar icon-detail"></i>&nbsp;&nbsp;วันที่ที่คาดว่าของหาย</label>
                                                <input name="dateLost" class="w3-input w3-white" value="<?=$result["date_lost"]?>" type="text" id="datepicker" autocomplete="off" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12">&nbsp;</div>
                                        <div class="w3-row-padding">
                                            <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดสิ่งของที่พบ</label>
                                            <textarea name="itemDetailInput" class="w3-input w3-border w3-white" rows="5" col="5" resize="none" autocomplete="off" disabled><?php echo($result['item_detail_lost']);?></textarea>
                                        </div>
                                        <div class="col-12">&nbsp;</div>
                                        <label class="detail text-danger">ผู้ใดพบเห็นสิ่งของดังกล่าว ขอให้กรุณารีบแจ้งฝ่ายวินัยมหาวิทยาลัยเกษมบัณฑิต ทราบในทันที</label>
                                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('<?php echo('infoItem').$n?>').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                                        ปิด</button>
                                        <div class="col-12">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $n = $n+1; 
                        } 
                    ?>
                    </div>
                    <div class="col-12">&nbsp;</div>
                    <div class="text-center">
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
            <div class="col-12">&nbsp;</div>
        </div>
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
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

    <!-- <style>
        body {
            font-family: 'Prompt', sans-serif;
        }
    </style> -->
</head>
<body>
    <md-body>
        <div class="w3-amber">
            <div w3-include-html="header.html"></div>
            <!-- <div class="row">
                <div class="col-10">
                    <div w3-include-html="header.html"></div>
                    <div class="col-12">&nbsp;</div>
                    <div class="col-12">&nbsp;</div>
                </div>
                <div class="col-2">
                    <img src="photo/index/students.png" class="img-fluid" style="width:150%; margin-top: 40%; margin-right: 20%">
                </div>
            </div> -->

            <div class="container-fluid"> 
                <?php if($_GET != NULL) {?>
                    <?php if($_GET["Status"] == 0) {?>
                    <div id="alert-loginFail" class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;Username หรือ Password ผิดพลาด กรุณาลองใหม่อีกครั้งหรือติดต่อ Admin
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php }?>
                    <?php if($_GET["Status"] == 1) {?>
                    <div id="alert-loginFail" class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-info-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;Reset Password เรียบร้อยกรุณาติดต่อ Admin เพื่อดำเนินการต่อไป
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php }?>
                    <?php if($_GET["Status"] == 2) {?>
                    <div id="alert-loginFail" class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;Username / เบอร์โทรศัพท์ / E-mail ผิดพลาด ไม่สามารถ Reset Password ได้ กรุณาลองใหม่อีกครั้งหรือติดต่อ Admin
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php }?>
                    <?php if($_GET["Status"] == 3) {?>
                    <div id="alert-loginFail" class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times-circle icon-detail"></i>&nbsp;&nbsp;&nbsp;คุณได้ทำการ Reset-Password กรุณาติดต่อ Admin
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php }?>
                <?php } ?>
                <!-- <div class="w3-padding w3-display-topright">
                    <img src="photo/index/students.png" class="img-fluid" style="width:20%">
                </div> -->

                <div class="w3-card-4 w3-light-gray" style="padding:2% 2% 2% 2%">
                    <?php
                        $sqlBanner = 'SELECT * FROM NEWS_BANNER';
                        $queryBanner = mysqli_query($conn,$sqlBanner);
                        $numBanner_rows = mysqli_num_rows($queryBanner);

                        $i = 1;
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="container-fluid">   
                                <div id="PRbanner" class="carousel slide" data-ride="carousel" style="max-width: auto; max-height:auto">
                                    <div class="carousel-inner">
                                        <?php while($result=mysqli_fetch_array($queryBanner,MYSQLI_ASSOC)) { ?>
                                        <div class="carousel-item <?php if($i == 1) {echo('active');}?>">
                                            <img class="d-block w-100 img-fluid" src="backend-client/src/backend/upload/banner/<?php echo($result["banner_pic_path"]);?>" style="width:800px; height:400px">
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
                                        <!-- Add Photo Banner in here ! -->
                                        <?php $i = $i + 1; ?>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#PRbanner" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#PRbanner" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="container-fluid">
                                <div class="card">
                                    <?php
                                        $sqlTextBanner = 'SELECT * FROM NEWS_TEXT_BANNER';
                                        $queryTextBanner = mysqli_query($conn,$sqlTextBanner);
                                    ?>
                                    <div class="card-body">
                                        <?php while($result=mysqli_fetch_array($queryTextBanner,MYSQLI_ASSOC)) { ?>
                                            <marquee><?php echo('-- '.$result["banner_text"].' --');?></marquee>
                                            <!-- <marquee>--- แผนกวินัยนักศึกษา มหาวิทยาลัยเกษมบัณฑิต ยินดีต้อนรับนักศึกษาทุกท่าน เข้าสู่รั้วมหาวิทยาลัยเกษมบัณฑิต ---</marquee> -->
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <div class="w3-card" style="max-width: auto; max-height:auto">
                                    <ul class="w3-ul w3-border w3-hoverable">
                                        <li class="w3-blue w3-padding-large"><label class="header">ข่าวประชาสัมพันธ์</label>
                                            <a href="listNewsAll.php" class="w3-right" style="margin-top: 1%">
                                                <button class="btn btn-outline-light" type="button">
                                                    <i class="fa fa-search"></i>&nbsp;&nbsp;อ่านเพิ่มเติม
                                                </button>
                                            </a>
                                        </li>
                                        <?php
                                            $sql = 'SELECT * FROM NEWS WHERE news_type LIKE 2 order by id DESC';
                                            $query = mysqli_query($conn,$sql);
                                            while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                                        ?>
                                            <a href="<?php echo('newsInfo.php?id='.$result['id']);?>"><li class="w3-padding-large">
                                                <?php echo($result["news_title"]);?>
                                                <label class="w3-right"><?php echo($result["news_date"]);?></label>
                                            </li></a>

                                            <!-- <a href="#"><li class="w3-padding-large">
                                                ประกาศผลรางวัล "คณะขี้เหล้าดีเด่น ประจำปี พ.ศ.2560"
                                                <label class="w3-right">13-07-2561</label>
                                            </li></a>
                                            <a href="#"><li class="w3-padding-large">
                                                รายชื่อนักศึกษาหนีราชการทหารปี พ.ศ.2561
                                                <label class="w3-right">13-07-2561</label>
                                            </li></a>
                                            <a href="#"><li class="w3-padding-large">
                                                คณะวิทยาศาสตร์และเทคโนโลยี คณะดีเด่นแห่งยุคนี้ !
                                                <label class="w3-right">13-07-2561</label>
                                            </li></a>
                                            <a href="#"><li class="w3-padding-large">
                                                เกษมใจดี ให้กัญชาเสรีกับ นศ.
                                                <label class="w3-right">13-07-2561</label>
                                            </li></a>
                                            <a href="#"><li class="w3-padding-large">
                                                ขอเชิญร่วมงาน ซื้อ-ขาย อาวุธประจำปี ของมหาวิทยาลัย
                                                <label class="w3-right">13-07-2561</label>
                                            </li></a> -->
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">&nbsp;</div>
        </div>
    </md-body>

    <?php
        $sql = 'SELECT * FROM LOST_AND_FOUND_A WHERE item_status NOT LIKE 2';
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);

        $per_page = 4;
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
        $i = 1;
    ?>
    <div class="w3-amber">
        <div class="container-fluid">
            <div class="w3-card-4 w3-gray" style="padding:2% 2% 2% 2%">
                <div class="row">
                    <div class="col-12">
                        <div class="w3-card-4">
                            <header class="w3-container w3-light-gray w3-padding-large  text-center">
                                <label class="header2">ของหายอยากได้คืน</label>
                            </header>
                            <div class="w3-container w3-white">
                                <div class="row">
                                    <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                                        <div class="col-md-3 col-6 text-center w3-hover-gray"style="padding-bottom: 1%; padding-top: 1%">
                                            <img src="<?php echo("backend-client/src/backend/upload/lost_and_found_A/".$result["item_pic_path"])?>" class="img-fluid lost-and-found-A">
                                            <br>
                                            <label class="detail" style="margin-top: 5%">
                                                <?php if($i == 1){echo('<span class="w3-tag w3-red"><font>ใหม่</font></span>&nbsp;&nbsp;');}?>
                                                <?php echo($result["item_name"])?>
                                            </label>
                                            <div class="col-12">&nbsp;</div>
                                            <button class="w3-button w3-block w3-blue" type="button" onclick="return document.getElementById('<?php echo('infoItem').$i?>').style.display='block'">
                                                <i class="fa fa-search"></i>&nbsp;&nbsp;ดูรายละเอียด
                                            </button>
                                        </div>

                                        <div id="<?php echo('infoItem').$i?>" class="w3-modal">
                                            <div class="container">
                                                <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:auto">
                                                    <div class="container">
                                                        <div class="col-12">&nbsp;</div>
                                                        <div class="text-center w3-gray">
                                                            <label class="header">รายละเอียดสิ่งของที่พบ</label>
                                                        </div>
                                                        <div class="col-12">&nbsp;</div>
                                                        <div class="col-12">&nbsp;</div>
                                                        <div class="w3-row-padding">
                                                            <div class="w3-third">
                                                                <label class="detail"><i class="fa fa-list icon-detail"></i>&nbsp;&nbsp;ชื่อสิ่งของ</label>
                                                                <input name="itemNameInput" value="<?=$result["item_name"]?>" class="w3-input w3-white" type="text" autocomplete="off" disabled>
                                                            </div>
                                                            <div class="w3-third">
                                                                <label class="detail"><i class="fa fa-map-marker icon-detail"></i>&nbsp;&nbsp;สถานที่ที่พบสิ่งของ</label>
                                                                <input name="locationLostInput" value="<?=$result["item_location_found"]?>" class="w3-input w3-white" type="text" autocomplete="off" disabled>
                                                            </div>
                                                            <div class="w3-third">
                                                                <label class="detail"><i class="fa fa-calendar icon-detail"></i>&nbsp;&nbsp;วันที่พบสิ่งของ</label>
                                                                <input name="dateLost" class="w3-input w3-white" value="<?=$result["item_date_found"]?>" type="text" id="datepicker" autocomplete="off" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">&nbsp;</div>
                                                        <div class="w3-row-padding">
                                                            <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดสิ่งของที่พบ</label>
                                                            <textarea name="itemDetailInput" class="w3-input w3-border w3-white" rows="5" col="5" resize="none" autocomplete="off" disabled><?php echo($result['item_detail']);?></textarea>
                                                        </div>
                                                        <div class="col-12">&nbsp;</div>
                                                        <label class="detail text-danger">ผู้ใดเป็นเจ้าของ นำบัตรนักศึกษา / บัตรประชาชน มายื่นเพือรับสิ่งของคืน ที่แผนกวินัยมหาวิทยาลัยเกษมบัณฑิต ในเวลาทำการ</label>
                                                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="button" onclick="document.getElementById('<?php echo('infoItem').$i?>').style.display='none'"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                                                        ปิด</button>
                                                        <div class="col-12">&nbsp;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i = $i-1; } ?>
                                </div>
                            </div>
                            <a href="listLostAndFound_A.php"><button class="w3-btn w3-block w3-white w3-hover-gray w3-padding-large" type="button">
                                คลิ๊กเพื่อดูเพิ่มเติม&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                            </button></a>
                        </div>

                        <div class="col-12">&nbsp;</div>
                        <div class="w3-card-4">
                            <?php
                                // include 'backend-client/src/backend/connectDB.php';
                                $sql = 'SELECT * FROM LOST_AND_FOUND_B WHERE item_status NOT LIKE 4';
                                $query = mysqli_query($conn,$sql);
                                $num_rows = mysqli_num_rows($query);

                                $per_page = 5;
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
                            <ul class="w3-ul w3-hoverable w3-white">
                                <li class="w3-orange w3-padding-large text-center"><label class="header">รายการประกาศของหาย</label></li>
                                <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                                    <li class="w3-padding-large">
                                        <span class="w3-tag w3-green"><font size="-1">กำลังตามหา</font></span><label>&nbsp;&nbsp;</label><?php echo($result["item_name_lost"])?>
                                        <div class="w3-right">
                                            <?php echo($result["date_record"])?>&nbsp;&nbsp;&nbsp;
                                            <button class="w3-button w3-amber w3-small" type="button" onclick="return document.getElementById('<?php echo('infoItem').$n?>').style.display='block'">
                                                <i class="fa fa-search"></i>&nbsp;&nbsp;ดูรายละเอียด
                                            </button>
                                        </div>
                                    </li>
                                    <div id="<?php echo('infoItem').$n?>" class="w3-modal">
                                        <div class="container">
                                            <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:auto">
                                                <div class="container">
                                                    <div class="col-12">&nbsp;</div>
                                                    <div class="text-center w3-gray">
                                                        <label class="header">รายการประกาศของหาย</label>
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
                                    $n = $n +1;
                                    } 
                                ?>
                            <a href="listLostAndFound_B.php"><button class="w3-button w3-white w3-block w3-center w3-hover-gray w3-padding-large">
                                คลิ๊กเพื่อดูเพิ่มเติม&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                            </button></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">&nbsp;</div>
    </div>

    <div  w3-include-html="footer.html"></div>

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
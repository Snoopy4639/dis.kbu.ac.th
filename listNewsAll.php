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
            <div class="w3-card-4 w3-light-gray">
                <div class="text-center w3-gray">
                    <label class="header">ข่าวประชาสัมพันธ์ทั้งหมด</label>
                </div>
                <?php
                    $sqlBanner = 'SELECT * FROM NEWS_BANNER';
                    $queryBanner = mysqli_query($conn,$sqlBanner);
                    $numBanner_rows = mysqli_num_rows($queryBanner);

                    $i = 1;
                ?>
                <div class="col-12">&nbsp;</div>
                <div class="col-10 offset-1">
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
                <div class="col-12">&nbsp;</div>
                <?php
                    $sql = 'SELECT * FROM NEWS';
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
                    $i = 1;
                ?>
                <div class="col-10 offset-1 w3-white">
                    <ul class="w3-ul w3-hoverable">
                        <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                            <a href="<?php echo('newsInfo.php?id='.$result['id']);?>"><li class="w3-padding-large">
                                <?php echo($result["news_title"]);?>
                                <label class="w3-right"><?php echo($result["news_date"]);?></label>
                            </li></a>
                        <?php } ?>
                    </ul>
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
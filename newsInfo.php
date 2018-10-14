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
                    <label class="header">ข่าวประชาสัมพันธ์</label>
                </div>
                <?php
                    $sqlBanner = 'SELECT * FROM NEWS_BANNER';
                    $queryBanner = mysqli_query($conn,$sqlBanner);
                    $numBanner_rows = mysqli_num_rows($queryBanner);

                    $i = 1;
                ?>
                <div class="col-12">&nbsp;</div>
                <?php
                    $id = $_GET['id'];
                                            
                    $sql = 'SELECT * FROM NEWS WHERE id="'.$id.'"';
                    $query = mysqli_query($conn,$sql);
                ?>
                <div class="col-10 offset-1 w3-card-4 w3-white">
                    <div class="w3-padding-large">
                        <div class="col-12">&nbsp;</div>
                        <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                        <div class="col-12 text-center">
                            <img class="img-fluid" src="backend-client/src/backend/upload/news/<?php echo($result["news_pic_path"]);?>" style="max-width: 400px">
                        </div>
                        <div class="col-12">&nbsp;</div>
                        <div class="col-12">&nbsp;</div>
                        <div class="w3-card-2 w3-amber">
                            <div class="w3-padding">
                                <label class="header"><?php echo($result["news_title"]);?></label>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                        <p class="detail"><?php echo($result["news_detail"]);?></p>
                        <div class="col-12">&nbsp;</div>
                        <div class="text-right">
                            <label class="detail">อัพเดทเมื่อวันที่ : <?=$result["news_date"]?></label>
                        </div>
                        <?php } ?>
                        <div class="col-12">&nbsp;</div>
                    </div>
                </div>
                <div class="col-12">&nbsp;</div>
                <div class="text-center">
                    <a href="listNewsAll.php"><button class="w3-button w3-blue w3-padding w3-section"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;ย้อนกลับ</button></a>
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
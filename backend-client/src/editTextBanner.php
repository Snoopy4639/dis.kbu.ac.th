<?php session_start(); ?>
<?php ob_start();?>
<!DOCTYPE html>
<?php
	if($_SESSION["permission"] == 2 || $_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }

    include 'backend/connectDB.php';
    $sql = 'SELECT * FROM NEWS_TEXT_BANNER';
    $query = mysqli_query($conn,$sql);
?>
<html>
<head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <!-- CN css -->
	<link rel="stylesheet" type="text/css" href="css/headerDIS.css">
	<!--Bootstap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/menuBar.js"></script>
	<!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="src/backend/edit-text-banner.php" method="POST">
        <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        <div class="container-fluid">
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>
                <label class="header">แก้ไขข้อความเคลื่อนไหว</label>
                <div class="w3-card-4 w3-amber">
                    <div class="container">
                        <div class="col-12">&nbsp;</div>
                        <div class="w3-card-2 w3-white">
                            <div class="col-12">&nbsp;</div>
                            <div class="w3-row-padding">
                                <label class="detail">&nbsp;&nbsp;<i class="fa fa-info-circle icon-detail"></i>&nbsp;&nbsp;ข้อความ <font class="text-danger">*</font></label>
                                <input class="w3-input w3-white" value="<?php echo($result["banner_text"]);?>" type="text"  name="text_title" require/>
                            </div>
                            <div class="col-12">
                                <label class="detail text-danger">
                                    กรุณากรอกข้อมูลช่อง * ให้ครบถ้วนทุกช่อง
                                </label>
                            </div>
                            <div class="col-12">&nbsp;</div>
                            <div class="text-center">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="studentID" value="<?=$result["student_id"]?>">
                                <button class="w3-button w3-green" type="button" onclick="document.getElementById('confirmSaveReport').style.display='block'">
                                    <i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;แก้ไขข้อมูล
                                </button>
                            </div>
                            <div class="col-12">&nbsp;</div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                        <div id="confirmSaveReport" class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                <div class="w3-center"><br>
                                    <span onclick="document.getElementById('confirmSaveReport').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                    <label class="header"><font size="+3">ยืนยันการแก้ไขข้อความเคลื่อนไหว</font></label><br>
                                    <label class="detail text-danger">อย่าลืมตรวจสอบข้อมูลแก้ไข เพื่อผลประโยชน์ของระบบ</label>
                                </div>
                                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"><i class="fa fa-check icon-detail"></i>&nbsp;&nbsp;
                                ยืนยันการแก้ไขข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </form>

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



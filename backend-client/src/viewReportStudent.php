<!DOCTYPE html>
<?php
    session_start(); 
    if($_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }

    $studentID = $_GET["id"];

    include 'backend/connectDB.php';
    $sql = 'SELECT * FROM STUDENT_BEHAVIOR_INFO INNER JOIN STUDENT_INFO ON STUDENT_BEHAVIOR_INFO.student_id = STUDENT_INFO.student_id WHERE STUDENT_BEHAVIOR_INFO.student_id="'.$studentID.'"';
    $query = mysqli_query($conn,$sql);

    $SQLbehavior_type = 'SELECT * FROM STUDENT_BEHAVIOR_TYPE';
    $queryBehaviorType = mysqli_query($conn,$SQLbehavior_type);
    $i = 1;
    while($behaviorTypes=mysqli_fetch_array($queryBehaviorType,MYSQLI_ASSOC)) { 
        $behaviorType[$i] = $behaviorTypes["name_type"];
        // echo($i." : ".$behaviorType[$i]."<br>");
        $i = $i+1;
    }

    $n = 1;
?>
<html>
<head>
    <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport">
	<!-- Font ! -->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <!-- CN css -->
    <link rel="stylesheet" type="text/css" href="css/src.css">
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
    <div class="container-fluid">
        <div class="col-12">&nbsp;</div>
        <div class="col-10 offset-1">
            <div class="col-12">&nbsp;</div>
            <label class="header">รายงานข้อมูลประวัติพฤติกรรม</label>
                <div class="w3-card-4 w3-light-gray">
                    <div class="container-fluid">
                        <div class="col-12">&nbsp;</div>
                        <?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                            <div class="w3-card-4
                                        <?php
                                            if($result["remove_score_record"] != 0) { echo("w3-pale-red");} 
                                            else { echo("w3-pale-green");}
                                        ?>
                                        w3-hover-gray" 
                                style="padding-top:1%">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label class="detail"><i class="fa fa-calendar icon-detail"></i>&nbsp;&nbsp;วันที่ : <?php echo($result["date_record"]);?></label>
                                        </div>
                                        <div class="col">
                                            <label class="detail"><i class="fa fa-map-marker icon-detail"></i>&nbsp;&nbsp;สถานที่ : <?php echo($result["location_record"]);?></label>
                                        </div>
                                        <div class="col">
                                            <label class="detail"><i class="fa fa-list-ul icon-detail"></i>&nbsp;&nbsp;ประเภท : 
                                                <?php echo($behaviorType[$result["behavior_type"]]); ?>
                                            </label>
                                        </div>
                                        <div class="w3-right">
                                            <button class="btn btn-link"onclick="document.getElementById('<?php echo('reportModal').$n?>').style.display='block'"><label class="detail"><i class="fa fa-search icon-detail"></i>&nbsp;&nbsp;คลิ๊กเพื่อดูรายละเอียด</label></button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="<?php echo('reportModal').$n?>" class="w3-modal">
                                    <div class="w3-container">
                                        <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:auto">
                                            <div class="w3-center w3-amber" style="padding-bottom:1%"><br>
                                                <label class="mini-header">รายงานข้อมูลประวัติพฤติกรรม</label>
                                                <span onclick="document.getElementById('<?php echo('reportModal').$n?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                            <div class="container">
                                                <label class="mini-header">รหัสนักศึกษา : <?php echo($result["student_id"])?></label><br>
                                                <label class="mini-header">ชื่อนักศึกษา : <?php echo($result["student_first_name"]." ".$result["student_last_name"])?></label><br>
                                                <div class="col-12">&nbsp;</div>
                                                <div class="w3-row-padding">
                                                    <div class="w3-third">
                                                        <label class="detail"><i class="fa fa-calendar icon-detail"></i>&nbsp;&nbsp;วันที่</label>
                                                        <input class="w3-input w3-white" value="<?php echo($result["date_record"]);?>" type="text" disabled/>
                                                    </div>
                                                    <div class="w3-third">
                                                        <label class="detail"><i class="fa fa-map-marker icon-detail"></i>&nbsp;&nbsp;สถานที่</label>
                                                        <input class="w3-input w3-white" value="<?php echo($result["location_record"]);?>" type="text" disabled>
                                                    </div>
                                                    <div class="w3-third">
                                                        <label class="detail"><i class="fa fa-caret-down icon-detail"></i>&nbsp;&nbsp;ประเภทความผิด</label>
                                                        <select class="form-control w3-white" name="typeBehaviorInput" disabled>
                                                            <option selected> <?php echo($behaviorType[$result["behavior_type"]]); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w3-row-padding">
                                                    <label class="detail">&nbsp;&nbsp;<i class="fa fa-pencil icon-detail"></i>&nbsp;&nbsp;รายละเอียดพฤติกรรม</label>
                                                    <textarea class="w3-input w3-border w3-white" rows="5" col="5" resize="none" disabled><?php echo($result["detail_record"])?></textarea>
                                                </div>
                                                <div class="col-12">&nbsp;</div>
                                                <div class="w3-row-padding">
                                                    <div class="w3-half">
                                                        <?php if($result["remove_score_record"] != 0) { ?>
                                                            <label class="detail"><i class="fa fa-calendar-minus-o icon-detail"></i>&nbsp;&nbsp;คะแนนที่หัก : </label>
                                                            <input class="w3-input w3-white" value="<?php echo($result["remove_score_record"]);?>" type="number" min="1" max="100" disabled >
                                                        <?php } else { ?>
                                                            <label class="detail"><i class="fa fa-calendar-plus-o icon-detail"></i>&nbsp;&nbsp;คะแนนที่เพิ่ม : </label>
                                                            <input class="w3-input w3-white" value="<?php echo($result["add_score_record"]);?>" type="number" min="1" max="100" disabled >
                                                        <?php } ?>
                                                    </div>
                                                    <div class="w3-half">
                                                        <label class="detail"><i class="fa fa-user icon-detail"></i>&nbsp;&nbsp;ผู้ลงบันทึก : </label>
                                                        <?php
                                                            $SQLuser = 'SELECT * FROM DIS_USER_INFO WHERE id="'.$result["user_record"].'"';
                                                            $queryUser = mysqli_query($conn,$SQLuser);
                                                            while($Users=mysqli_fetch_array($queryUser,MYSQLI_ASSOC)) { ?>
                                                        <input class="w3-input w3-white" value="<?php echo($Users["first_name"]);?>" type="text" disabled/>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-12">&nbsp;</div>
                        <?php 
                            $n = $n+1;
                        }
                        ?>
                    </div>
                </div>
            <div class="col-12">&nbsp;</div>
        </div>
    </div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- include html -->
    <script>
        includeHTML();
    </script>
</body>
</html>



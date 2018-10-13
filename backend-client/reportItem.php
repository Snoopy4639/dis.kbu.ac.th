<!DOCTYPE html>
<?php
    session_start();
    if($_SESSION["permission"] == 3 || $_SESSION["permission"] == 4 || $_SESSION["permission"] == 5) {
        header("location: /dis/backend-client/index.php");
    }

    ob_start(); 
?>
<html>
<?php include('src/backend/connectDB.php'); ?>
<head>
    <title>DIS System : รายชื่อนักศึกษา</title>
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
            <div class="col-10 offset-1">
                <div class="col-12">&nbsp;</div>
                <label class="header">รายงานของหาย</label>
                <div class="col-12">&nbsp;</div>
                <div class="col-12">
                    <form action="reportItem.php" method ="GET"> 
                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <label class="mini-header">ประเภทของหาย</label>
                                    <select class="form-control" name="typeSearch" required>
                                        <option value="" selected disabled>เลือก</option>
                                        <option value="1">รายงานแจ้งของหาย</option>
                                        <option value="2">รายงานพบของหาย</option>
                                    </select>
                                </div>
                                <div class="w3-half">
                                    <?php
                                        $sqlYear = "SELECT DATE_FORMAT(date_record, '%Y') AS Year FROM STUDENT_BEHAVIOR_INFO ORDER BY Year";
                                        $resultYear = mysqli_query($conn, $sqlYear);
                                    ?>
                                    <label class="mini-header">ปีการศึกษา</label>
                                    <select class="form-control" name="yearSearch" required>
                                        <option value="" selected disabled>เลือก</option>
                                        <?php 
                                            $year = array();
                                            $i = 0;
                                        ?>
                                        <?php while($result = mysqli_fetch_array($resultYear)) { ?>
                                            <?php array_push($year, $result["Year"]); ?>
                                            <?php if($year[$i] != $year[$i-1]) { ?>
                                                <option value="<?=$year[$i]?>"><?php echo($year[$i]);?></option>
                                                <?php $i = $i + 1;?>
                                            <?php } else { 
                                                $i = $i + 1;
                                            ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="hidden" value="2" name="view">
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>
                        <button class="w3-block w3-blue w3-button" type="submit"><i class="fa fa-search icon-detail"></i>&nbsp;&nbsp;ค้นหาข้อมูล</button>
                    </form>
                    <div class="text-center">
                        <label class="text-danger detail">*หมายเหตุ* กรอกข้อมูลที่ต้องการค้นหาให้ครบทั้ง 3 ช่อง</label>
                    </div>
   
                    <?php if($_GET["view"]) { ?>
                        <?php if($_GET["view"] == "1") { ?>
                            <div class="col-12">
                                <div class="w3-card-4 w3-light-gray">
                                    <div class="w3-padding-large">
                                        <div class="text-center">
                                            <label class="mini-header"><u>จำนวนข้อมูลทั้งหมด</u></label>
                                            <div class="col-12">&nbsp;</div>
                                        </div>
                                        <div class="w3-row-padding text-center">
                                            <div class="w3-third">
                                                <img src="src/image/student.jpg" class="img-fluid" style="width:200px">
                                                <div class="col-12">&nbsp;</div>
                                                <label>ข้อมูลนักศึกษาทั้งหมด : 500 คน</label>
                                            </div>
                                            <div class="w3-third">
                                                <img src="src/image/document.png" class="img-fluid" style="width:200px">
                                                <div class="col-12">&nbsp;</div>
                                                <label>ข้อมูลรายงานพฤติกรรมทั้งหมด : 500 รายงาน</label>
                                            </div>
                                            <!-- <div class="w3-third">
                                                <img src="src/image/student.jpg" class="img-fluid" style="width:200px">
                                                <div class="col-12">&nbsp;</div>
                                                <label>ข้อมูล : 500 คน</label>
                                            </div> -->
                                            <div class="col-12">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if($_GET["view"] == "2") { ?>
                            <?php
                            $typeSearch = $_REQUEST["typeSearch"];
                            $typeShow = "";
                            if($typeSearch == 1) { $typeShow = 'รายงานแจ้งของหาย';}
                            else if($typeSearch == 2) { $typeShow = 'รายงานพบของหาย';}

                            $yearSearch = $_REQUEST["yearSearch"];

                            $sqlChart = "SELECT SUM(total) AS total, DATE_FORMAT(date_record, '%M') AS month FROM SUM_REPORT_ITEM ";
                            $sqlChart .= "WHERE item_type LIKE $typeSearch AND DATE_FORMAT(date_record, '%Y') LIKE '$yearSearch' GROUP BY DATE_FORMAT(date_record, '%M%')";
                            // echo($sqlChart);

                            $resultchart = mysqli_query($conn, $sqlChart);
                            
                            $month = array();
                            $total = array();
                            
                            while($rs = mysqli_fetch_array($resultchart)) { 
                                $month[] = "\"".$rs['month']."\""; 
                                $total[] = "\"".$rs['total']."\"";
                            }

                            $month = implode(",", $month); 
                            $total = implode(",", $total); 
                            ?>
                            <div class="col-12">
                                <div class="w3-card-4 w3-amber">
                                    <div class="w3-padding-large">
                                        <label class="header">ผลการค้นหา</label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="w3-card-4 w3-white">
                                                    <div class="w3-padding-large">
                                                        <div class="text-center">
                                                            <label class="mini-header">ประเภทที่ค้นหา</label><br>
                                                            <label><?=$typeShow?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="w3-card-4 w3-white">
                                                    <div class="w3-padding-large">
                                                        <div class="text-center">
                                                            <label class="mini-header">ปีการศึกษาที่ค้นหา</label><br>
                                                            <label><?=$yearSearch?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
                            <div class="col-12">
                                <div class="w3-card-4 w3-light-gray">
                                    <div class="w3-padding-large">
                                        <canvas id="myChart" width="800px" height="300px"></canvas>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById("myChart").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: [<?php echo ($month);?>],
                                            datasets: [{
                                                label: '<?php echo($typeShow);?> (รายงาน)',
                                                data: [<?php echo $total;?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero:true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>  
                            </div>
                        <?php } ?>
                    <?php } ?>
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
<?php 
    ob_end_flush();
//} ?>
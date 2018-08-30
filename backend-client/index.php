<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["permission"] == 5 || $_SESSION["permission"] == 3) {
		header("location: /dis/backend-client/setPassword.php?status=1");
	}

	include 'src/backend/connectDB.php';
	$sql = 'SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id WHERE DIS_USER.username="'.$_SESSION["username"].'"';
    $query = mysqli_query($conn,$sql);
?>
<html>
<head>
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
	<script src="js/menuBar.js"></script>
	<script src="src/js/form-register.js"></script>	
	<!-- Icon -->
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
</head>
<body>
	<div w3-include-html="header.php"></div>
	<div w3-include-html="menuBar.php"></div>
	<div class="col-12">
	<div class="container-fluid">
        <div class="col-12 text-center">
            <div class="col-12">&nbsp;</div>
            <div class="col-12">&nbsp;</div>
            <div class="col-10 offset-1">
				<?php while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
					<div class="w3-card-4 w3-light-gray">
						<div class="col-12 text-center" style="padding-top: 2%">
							<label class="header">ยินดีต้อนรับ</label>
						</div>
						<div class="col-4 offset-4">
							<img src="<?php echo('src/backend/upload/'.$result["profile_pic"])?>" class="img-fluid w3-border">
						</div>
						<div class="col-12">&nbsp;</div>
						<label class="header">อาจารย์<?php echo($result["first_name"]." ". $result["last_name"])?></label>
						<div class="col-12">&nbsp;</div>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
    <div class="col-12">&nbsp;</div>
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
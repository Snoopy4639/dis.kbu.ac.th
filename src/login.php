<?php
    session_start();

    // Data from login.html
    $username = $_REQUEST["userNameLoginInput"];
    $password = base64_encode($_REQUEST["passwordLoginInput"]);

    // Connect DB.
    // $conn = mysqli_connect('localhost', 'root', 'password', 'dis') or die ('Error'.mysqli_connect_error());
    $conn = mysqli_connect('localhost', 'root', '', 'dis') or die ('Error'.mysqli_connect_error());
    mysqli_set_charset($conn,"utf8");

    // $query = "SELECT * FROM DIS_USER WHERE username LIKE '%".$username."%' AND password LIKE '%".$password."%'";
    $query = "SELECT * FROM DIS_USER WHERE username = '$username' AND password = '$password'";
    $checkStatus = mysqli_query($conn, $query);

    if(mysqli_num_rows($checkStatus)==1) {
        $row = mysqli_fetch_array($checkStatus);
        $_SESSION["username"] = $row["username"];
        $_SESSION["permission"] = $row["group_status"];
        if($_SESSION["permission"] == 0) {
            // God Mode !
            header("location: /dis/backend-client/index.php");
        }
        elseif($_SESSION["permission"] == 1) {
            // Admin Mode !
            header("location: /dis/backend-client/index.php");
        }
        elseif($_SESSION["permission"] == 2) {
            // Normal Mode !
            header("location: /dis/backend-client/index.php");
        }
        elseif($_SESSION["permission"] == 3) {
            // First Login Mode !
            header("location: /dis/backend-client/setPassword.php?status=1");
        }
        elseif($_SESSION["permission"] == 4) {
            // Block Mode !
            header("location: /dis/backend-client/index.php");
        }
    } else {
        // If Login Fail !

        // echo "<script>";
        //     echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
        //     echo "window.history.back()";
        // echo "</script>";
        header("location: /dis/index.php?Status=0");
    }

    mysqli_close($conn);

?>

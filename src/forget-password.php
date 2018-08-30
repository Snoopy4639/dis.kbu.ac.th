<?php
    session_start();

    // Data from forgetPassword.php
    $username = $_REQUEST["usernameInput"];
    $phoneNumber = $_REQUEST["phoneInput"];
    $emailInput = $_REQUEST["emailInput"];

    echo($username);
    echo("<br>");
    echo($phoneNumber);
    echo("<br>");
    echo($emailInput);
    // Connect DB.
    // $conn = mysqli_connect('localhost', 'root', 'password', 'dis') or die ('Error'.mysqli_connect_error());
    $conn = mysqli_connect('localhost', 'root', '', 'dis') or die ('Error'.mysqli_connect_error());
    mysqli_set_charset($conn,"utf8");

    // $query = "SELECT * FROM DIS_USER WHERE username LIKE '%".$username."%' AND password LIKE '%".$password."%'";
    $sql = "SELECT * FROM DIS_USER INNER JOIN DIS_USER_INFO ON DIS_USER.id = DIS_USER_INFO.id WHERE DIS_USER.username = '$username' AND DIS_USER_INFO.phone_number = '$phoneNumber' AND DIS_USER_INFO.email = '$emailInput'";
    $checkStatus = mysqli_query($conn, $sql);

    if(mysqli_num_rows($checkStatus) ==1) {
        $row = mysqli_fetch_array($checkStatus);

        // Update Password DIS_USER table.
        $query = 'UPDATE DIS_USER SET group_status="5" WHERE id="'.$row['id'].'"';
        $objQuery = mysqli_query($conn,$query);

        echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
        echo "</script>";
        header("location: /dis/index.php?Status=1");
    } else {
        // If Login Fail !

        // echo "<script>";
        //     echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
        //     echo "window.history.back()";
        // echo "</script>";
        header("location: /dis/index.php?Status=2");
    }

    mysqli_close($conn);

?>

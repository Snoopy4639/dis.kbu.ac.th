<?php
    $conn = mysqli_connect('localhost', 'root', 'password', 'dis') or die ('Error'.mysqli_connect_error());
    // $conn = mysqli_connect('localhost', 'root', '', 'dis') or die ('Error'.mysqli_connect_error());
    mysqli_set_charset($conn,"utf8");
?>
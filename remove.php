<?php
    session_start();
    session_destroy();

    echo("Session Expire ! ...");
    echo("<br>");
    echo("<a href='index.php'>OK ! </a>");
?>  
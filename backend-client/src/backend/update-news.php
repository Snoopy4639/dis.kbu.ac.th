<?php
    session_start();

    // Data from editNews.php
    $newsTitleInput = trim($_REQUEST["newsTitleInput"]);
    $newsDetailInput = trim($_REQUEST['newsDetailInput']);
    $id = $_REQUEST["idStatus"];

    // Connect DB.
    include 'connectDB.php';

    // Update NEWS table.
    $query = 'UPDATE NEWS SET news_title="'.$newsTitleInput.'", news_detail="'.$newsDetailInput.'" ';
    $query .= 'WHERE id="'.$id.'"'; 
    $objQuery = mysqli_query($conn,$query);

    mysqli_close($conn);

    if (!$objQuery){
        $save = 'error';
        header("location: /dis/backend-client/listNews.php?status=".$save);
    } else {
        header("location: /dis/backend-client/listNews.php?status=view");
    }
?>

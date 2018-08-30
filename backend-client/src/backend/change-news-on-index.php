<?php
    // Data from listNews.php
    $id = $_REQUEST["ID"];
    $status = $_REQUEST["status"];

    // Connect DB.
    include 'connectDB.php';

    // Update NEWS table.
    if($status == 1) {
        $query = 'UPDATE NEWS SET news_type="2"';
        $query .= 'WHERE id="'.$id.'"'; 
        $objQuery = mysqli_query($conn,$query);
    } else {
        $query = 'UPDATE NEWS SET news_type="1"';
        $query .= 'WHERE id="'.$id.'"'; 
        $objQuery = mysqli_query($conn,$query); 
    }

    mysqli_close($conn);

    if (!$objQuery){
        header("location: /dis/backend-client/listNews.php?status=0");
    } else {
        header("location: /dis/backend-client/listNews.php?status=1");
    }
    

?>

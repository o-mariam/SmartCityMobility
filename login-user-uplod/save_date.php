<?php
    session_start();
    include 'database.php';

    $last_upload = $_POST['last_upload'];
    $user_id = $_SESSION['name'];

    $sql = "UPDATE accounts SET last_upload = $last_upload WHERE username = $user_id";

    if (mysqli_query($conn, $sql)){
        echo json_encode(array("statusCode"=>200));
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
    
    mysqli_close($conn);
?>
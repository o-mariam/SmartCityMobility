<?php 
    session_start();
    include 'connection.php';
    $user= '';
    $sql = "SELECT COUNT(username) FROM accounts";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user =  $row['COUNT(username)'];
        }
    }else{
        echo 'There are no users!';
    }
    $user = intval($user);
    echo json_encode($user);
    $conn->close();
?>
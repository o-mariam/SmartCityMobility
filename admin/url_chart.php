<?php 
    session_start();
    include 'connection.php';
    $url= '';
    $sql = "SELECT COUNT(DISTINCT url) FROM entrie";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $url = $row['COUNT(DISTINCT url)'];
        }
    }else{
        echo 'There are no domains!';
    }
    $url = intval($url);
    echo  json_encode($url);
    $conn->close();
?>
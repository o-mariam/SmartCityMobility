<?php 
    session_start();
    include 'connection.php';
    $isp = '';
    $sql = "SELECT COUNT(DISTINCT isp) FROM entrie";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $isp = $row['COUNT(DISTINCT isp)'];
        }
    }else{
        echo 'There are no ISPs!';
    }
    $isp = intval($isp);
    echo  json_encode($isp);
    $conn->close();
?>
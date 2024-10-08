<?php 
    include "connection.php";
    
    header('Content-Type: application/json');

    $content_types = $_POST['content_types'];
    $isp = $_POST['isp'];
    

    $sql = "SELECT cache_control, DATEDIFF(expires, startedDateTime)*24*3600 as expired,
    DATEDIFF(startedDateTime,last_modified)*0.1*24*3600 as lastmod,COUNT(id) as total from entrie
    where content_type in $content_types and isp in $isp and not (expires='' OR last_modified='') group by cache_control, expired, lastmod";

    $query = mysqli_query($conn,$sql);
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
            $result [] = [$row['cache_control'], $row['expired'], $row['lastmod'], $row['total']];
    }
    
    $conn->close();
    echo json_encode($result);                             
?>   
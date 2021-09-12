<?php 
    session_start();

    include "config.php";

    $content_type = $_POST['content_types'];
    $http_method = $_POST['methods'];
    $day_of_the_week = $_POST['days'];
    $telephone_provider = $_POST['isp'];

    
    $sql = "SELECT HOUR(StartedDateTime) AS hour, 
        Round(AVG(wait),2) AS avg 
    FROM entries
    WHERE DAYNAME(StartedDateTime) IN $day_of_the_week
        AND method IN $http_method
        AND content_type IN $content_type
        AND isp IN $telephone_provider 
    GROUP BY HOUR(StartedDateTime)";

    $query = mysqli_query($link,$sql);
    $result = [];
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { 
        $result [] = [$row['hour'],$row['avg']];
    }
    mysqli_close($link);
    header('Content-Type: application/json');
    echo json_encode($result);
?>
<?php 
    include "connection.php";
    header('Content-Type: application/json');
    
    $content_types = $_POST['content_types'];
    $isp = $_POST['isp'];
    $result = [];

    

    $sql1 = "SELECT (SELECT COUNT(*) FROM entrie WHERE FIND_IN_SET('public',cache_control) AND content_type IN $content_types AND isp IN $isp)/(SELECT count(*) FROM entrie WHERE content_type IN $content_types AND isp IN $isp)AS public_result";
    $sql2 = "SELECT (SELECT COUNT(*) FROM entrie WHERE FIND_IN_SET('private',cache_control) AND content_type IN $content_types AND isp IN $isp)/(SELECT count(*) FROM entrie WHERE content_type IN $content_types AND isp IN $isp) AS private_result";
    $sql3 = "SELECT (SELECT COUNT(*) FROM entrie WHERE FIND_IN_SET('no-cache',cache_control) AND content_type IN $content_types AND isp IN $isp)/(SELECT count(*) FROM entrie WHERE content_type IN $content_types AND isp IN $isp) AS no_cache_result";
    $sql4 = "SELECT (SELECT COUNT(*) FROM entrie WHERE FIND_IN_SET('no-store',cache_control) AND content_type IN $content_types AND isp IN $isp)/(SELECT count(*) FROM entrie WHERE content_type IN $content_types AND isp IN $isp) AS no_store_result";

    $query1 = mysqli_query($conn, $sql1);
    $query2 = mysqli_query($conn, $sql2);
    $query3 = mysqli_query($conn, $sql3);
    $query4 = mysqli_query($conn, $sql4);
   
    while ($row1 = $query1->fetch_array(MYSQLI_ASSOC)){
        while ($row2 = $query2->fetch_array(MYSQLI_ASSOC)){
            while ($row3 = $query3->fetch_array(MYSQLI_ASSOC)){
                while ($row4 = $query4->fetch_array(MYSQLI_ASSOC)){
                    $result [] = $row1['public_result']." ".$row2['private_result']." ".$row3['no_cache_result']." ".$row4['no_store_result']." ";
                }
            }
        }
    }

    $conn->close();
    echo json_encode($result);
?>
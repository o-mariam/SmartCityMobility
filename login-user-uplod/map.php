<?php

include("database.php");
//include("session.php");
session_start();
$db=$conn;
$name=$_SESSION['name'];
$result_array = [];

$sql = "SELECT latitude, longitude FROM entries WHERE user_id=?"; // SQL with parameters
$stmt = $db->prepare($sql); 
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result(); 

while($user = $result->fetch_assoc())
{          
        $result_array [] = [$user['latitude'],$user['longitude']];        
}
mysqli_close($db);
header('Content-Type: application/json', 'charset=utf-8');
echo json_encode($result_array);

?>
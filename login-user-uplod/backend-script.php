<?php
    include("database.php");
    include("session.php");
    $db=$conn;
    $name=$_SESSION['name'];

    $sql = "SELECT number_of_records FROM accounts WHERE username=?"; // SQL with parameters
    $stmt = $db->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); 

    
 
    while($user = $result->fetch_assoc())
    {          
        echo "
        <table class='echotable'>
            <tr>
                <th>Number of records:</th>
                <td> $user[number_of_records] </td>
            </tr>
        </table>";          
    }

    $sql2 = "SELECT MAX(uploadDate) as uplDate FROM `file` WHERE userN=?"; // SQL with parameters
    $stmt2 = $db->prepare($sql2); 
    $stmt2->bind_param("s", $name);
    $stmt2->execute();
    $result2 = $stmt2->get_result(); 
 
    while($user2 = $result2->fetch_assoc())
    {          
        echo "
        <table class='echotable2'>
            <tr>
                <th>Last Upload:</th>
                <td> $user2[uplDate] </td>
            </tr> 
        </table>";          
    }

    $db->close();   

?>
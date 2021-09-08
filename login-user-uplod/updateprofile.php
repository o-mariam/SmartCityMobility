<?php
include("session.php");
include("database.php");

if( ( $_POST['username'] == $_SESSION['name'] & empty($_POST['password']) & empty($_POST['confrimpassword']) ) || 
( empty($_POST['username']) & empty($_POST['password']) & empty($_POST['confirmpassword']) ) ){
	// One or more values are empty.
    header("Refresh:0; url=homenew.php");
    echo"<script>alert('Change your info to submit..');</script>";
    die;
} 

//USERNAME UPDATED
elseif ( empty($_POST['password']) & empty($_POST['confrimpassword']) & $_POST['username'] != $_SESSION['name'] )
{
    $userName = $_POST['username'];
    $sql = "UPDATE accounts SET username='$userName' WHERE email=?"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    //$result = $stmt->get_result();
    $_SESSION['name'] = $userName;
    header("Refresh:0; url=homenew.php?");//msg");
    echo"<script>alert('Updated username');</script>";
    die;
}

//BOTH UPDATED
elseif( $_POST['username'] != $_SESSION['name']  &  $_POST['password'] == $_POST['confrimpassword']  )
{ 
    if(empty($_POST['username'])){
        header("Refresh:0; url=homenew.php?");//msg");
        echo"<script>alert('Do not leave your username blank');</script>";
        die;
    }
    $uppercase = preg_match('@[A-Z]@', $_POST['password']);
    $lowercase = preg_match('@[a-z]@', $_POST['password']);
    $number = preg_match('@[0-9]@', $_POST['password']);

    if(!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) 
    {
        header("Refresh:0; url=homenew.php");
        echo"<script>alert('Password must have one uppercase letter one lowercase letter, one number and one character like *, # etc. Lenght must be at least 8 characters long');</script>";
        die;
    }
    else
    {
        $userName = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE accounts SET username='$userName', password='$password' WHERE email=?"; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        //$result = $stmt->get_result();
        $_SESSION['name'] = $userName;
        header("Refresh:0; url=homenew.php?");//msg");
        echo"<script>alert('Updated username and password');</script>";
        die;

    }

}

//PASSWORD ONLY
elseif ( !empty($_POST['username']) == $_SESSION['name'] )
{
    if( $_POST['password'] == $_POST['confrimpassword'] )
    {
        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number = preg_match('@[0-9]@', $_POST['password']);
        if(!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {

            header("Refresh:0; url=homenew.php");
            echo"<script>alert('Password must have one uppercase letter one lowercase letter, one number and one character like *, # etc. Lenght must be at least 8 characters long');</script>";
            die;
        }
        else
        {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE accounts SET password='$password' WHERE email=?"; // SQL with parameters
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("s", $_SESSION['email']);
            $stmt->execute();
            header("Refresh:0; url=homenew.php?");//msg");}
            echo"<script>alert('Updated password');</script>";
            die;
        }
        
    }
    else
    {
        header("Refresh:0; url=homenew.php");
        echo"<script>alert('Passwords do not much!');</script>";
        die;

    }
    
   
}


?>
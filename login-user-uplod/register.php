<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'web';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {

    //if (strlen($_POST['password']) < 8) {
        //exit('Password must be between 5 and 20 characters long!');
    //}
    

    $uppercase = preg_match('@[A-Z]@', $_POST['password']);
    $lowercase = preg_match('@[a-z]@', $_POST['password']);
    $number = preg_match('@[0-9]@', $_POST['password']);

    if(!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {

        header("Refresh:0; url=register.html");
        echo"<script>alert('Password must have one uppercase letter one lowercase letter, one number and one character like *, # etc. Lenght must be at least 8 characters logn');</script>";
        die;
        //echo "NOT";
        //header("Location:http://localhost/phplogin/register.html");
        //exit();
        //exit('Password must be between 5 and 20 characters long!');
    }

    //$_SESSION['Error'] = (preg_match('@[A-Z]@', $_POST['password']) || preg_match('@[a-z]@', $_POST['password']) || preg_match('@[0-9]@', $_POST['password'])) ;
    //if( $_SESSION['Error'] || strlen($password) < 8) 
    //{
        //echo $_SESSION['Error'];

        //unset($_SESSION['Error']);

    //}

	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		//echo 'Username exists, please choose another!';
        header("Refresh:0; url=register.html");
        echo"<script>alert('Username exists, please choose another!');</script>";
        die;
	} else {
		// Insert new account
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
	        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	        $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
	        $stmt->execute();
	        //echo 'You have successfully registered, you can now login!';
            header("Refresh:0; url=index.html");
            echo"<script>alert('You have successfully registered, you can now login!');</script>";
            die;
        }else {
	        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	        echo 'Could not prepare statement!';
        }
    }
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
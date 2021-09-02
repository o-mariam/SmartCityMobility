<?php
include("session.php");

//if(isset($_GET['msg']))
    //{
        //$Message = "Some error occured please try after some time";
        //echo $Message;
    //}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page</title>
		<link href="homestyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body class="loggedin">
    <input type="checkbox" id="check">
    <header>
        
      <label for="check">
        <i class="fa fa-bars" id="sidebar_btn"></i>
      </label>

      <div class="left_area">
        <h3>WebSite<span>Title</span></h3>
      </div>

      <div class="right_area">
        <a href="logout.php" class="logout_btn"> <i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>

    </header>
    
    <div class="sidebar">
      <center>
        <img src="logo.png" class="profile_image" alt="">
      </center>
      <a class="home" href="homenew.php"><i class="fa fa-desktop"></i><span>HomePage</span></a>
      
  

      <!---Button PROFILE--->
        
      
      <button type="submit" class="openbutton" id="showData"><i class="fa fa-cogs"></i>Your Profile</button>
      <div class= "form-popup2" id="Profilenfo">

        <form action="updateprofile.php" method="post" autocomplete="off">

          <h6 class="heading-small">User information</h6> 
          <div class="row">
            <div class="column"> 
              <label class="form-control-label" for="input-username">Username</label>
              <input type="text" id="input-username" name="username" class="form-control form-control-alternative" placeholder="Username" value= <?=$_SESSION['name']?>>
            </div>

            <div class="column">
              <label class="form-control-label" for="input-password">Password</label>
              <input type="password" id="input-password" name="password" class="form-control form-control-alternative" placeholder="Password">
            </div>
                
            <div class="column">
              <label class="form-control-label" for="input-email">Email address</label>
              <input type="text" id="input-email" name="email" class="form-control form-control-alternative" disabled="disabled" placeholder="Email" value=<?=$_SESSION['email']?>>
            </div>

            <div class="column">
              <label class="form-control-label" for="input-confirmpassword"> Verify Password</label>
              <input type="password" id="input-confrimpassword" name="confrimpassword" class="form-control form-control-alternative" placeholder="Confirm password"> 
            </div>

          </div>

          <div class="row">
            <input type="submit" id="submitbut" value="Submit changes">
          </div>

          <hr>
          <h6 class="heading-small" id="aboutMe">About me</h6>

          <div class="row" id="table-container"></div>
      
        </form>

      </div>


      <!--Button UPLOAD FILE-->
        
      <button class="open-button" onclick="openForm()"><i class="fa fa-file"></i>Upload Data</button>
      <div class="form-popup" id="UploadForm">
        <div id="uploadModal" class="modal">
          <div class="modal-content">
            <input type="file" id="file_to_Upload" class="modal_file" accept=".har">
            <div class="modal_check">
              <u>
                <li><label><input type="checkbox" id="saveToServer"/>Save to Server</label>
                <li><label><input type="checkbox" id="saveLocally"/>Save Locally</label>
              </u>
              <button type="button" class="modal_btn" id="submitFile">Submit File</button>
            </div>
          </div>
        </div>
      </div>
      
      <!---<div class="form-popup" id="UploadForm">
        <form action="/action_page.php" class="form-container">
          <h1>Upload a file</h1>

          <label for="email"><b>Choose file:</b></label>
          <input type="file" name="UploadFile" required>--->

          <!---<label for="psw"><b>Κωδικός Πρόσβασης</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>--->
          <!---<button type="submit" class="btn">Upload&excl;</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close form</button>
        </form>
      </div>--->
  
    </div>
    

		<div class="content">
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>

    <script src="scripts/upload.js"></script>
    <script src="har_parser.js"></script>

    <script>
      function openForm() {
        closeProfile();
        document.getElementById("UploadForm").style.display = "block";
      }

      function closeProfile(){
        document.getElementById("Profilenfo").style.display = "none";
      }
    </script>
    
    
  </body>
</html>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
        <a href="logout.php" class="logout_btn"> <i class="fas fa-sign-out-alt" ></i> Logout</a>
      </div>

    </header>
    
    <div class="sidebar">
      <center>
        <img src="logo.png" class="profile_image" alt="">
      </center>


      
      <!---Button PROFILE--->

  
      <button class="openbbutton" href="#analytics" onclick="openForm()"><i class="fa fa-line-chart" aria-hidden="true"></i>Analytics</button>
     
     
      

         
        
      <button class="openbutton"  ><i class="fa fa-map" aria-hidden="true"></i>Map of IPs</button>

      <button class="open-button" ><i class="fa fa-file"></i>HTTP Files</button>
   

    </div>

    
  


    
		<div class="content">
			<p>Welcome back</p>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script src="chartUsers.js"></script>


    <script>
      function openForm() {
        document.getElementById("analytics").style.display = "block";
      }
      function closeProfile(){
        document.getElementById("Profilenfo").style.display = "none";
      }


    </script>

    
        
      
     

     
    
    
  </body>
</html>

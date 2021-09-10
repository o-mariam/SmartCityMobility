
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

      <a href="analytics.php">
        <button class="openbbutton"  onclick="openForm()"><i class="fa fa-line-chart" aria-hidden="true"></i>Analytics</button>
      </a>
      <!-- <div class="content-wrapper"  id="analytics">
                <div class="graph-items-wrapper">
                    <div class="graph-item-wrapper" >
                        <div class="buttonsLayout">
                            <button class="selectButton" id="buttonUsers">Registered users</button>
                            <button class="selectButton" id="buttonMethods">Records Per Methods</button>
                            <button class="selectButton" id="buttonStatus">Records Per Status</button>
                            <button class="selectButton" id="buttonDomains">Distinct Domains</button>
                            <button class="selectButton" id="buttonISP">ISP</button>
                            <button class="selectButton" id="buttonAge">Average Age Per content-type</button>
                        </div>
                        <div class="canvas-item" id="canvas-item">
                            <canvas class="chart" id="myChart"></canvas>
                        </div>
                    </div>   
                </div> 
      </div> -->
      

         
      <a href="adminheaders.php">
        <button class="openbutton" href="adminmap.php"><i class="fa fa-map" aria-hidden="true"></i>Map of IPs</button>
      </a>


      <a href="adminheaders.php">
        <button class="open-button" href="adminheaders.php" ><i class="fa fa-file"></i>HTTP Files</button>
      </a>   

   

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
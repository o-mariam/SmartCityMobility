<?php
include("session.php");
//include("database.php");
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page</title>


    <!--- CSS stylesheets --->
		<link href="homestyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!--- For the map--->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin="">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/geojson/0.5.0/geojson.min.js"></script>
    <script type="text/javascript" src="geojson.min.js"></script>
  
    <script type="text/javascript" src="leaflet-heat.js"></script>
    

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


      <!--- starting page - HeatMap --->
      <a class="home" href="homenewtest.php"><i class="fa fa-desktop"></i><span>HomePage</span></a>

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
            <h1>Upload a file</h1>
            <label><b>Choose file:</b></label>
            <input type="file" id="file_to_Upload">

            <pre id="output"></pre>
            <br>
            <div class="ckeck">
                <input type="checkbox" id="saveToServer"/>Save to Server</label>
                <input type="checkbox" id="saveLocally"/>Save Locally</label>
            </div>

            <button id="submitFile">Upload</button>
        
        </div>
  
    </div>

    <div class="content">
			<!---<p>Welcome back, ?=$_SESSION['name']?>!</p>--->
      <div id="map"></div>

      <button id="mapData">Show my data</button>
      <script>

        var mymap = L.map('map').setView([26.0198, 32.2778], 2);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(mymap);
       

        var popup = L.popup();

        function onMapClick(e) {
          popup
          .setLatLng(e.latlng)
          .setContent("You clicked at " + e.latlng.toString())
          .openOn(mymap);
        }

        mymap.on('click', onMapClick);

        var ajax_arr = [];

        document.querySelector("#mapData").addEventListener('click', function(){
          $.get("map.php", function(data){
            ajax_arr= data;
            //console.log(data);
            showHeatmap();

          })

        });

        function showHeatmap(){
          var geojson = GeoJSON.parse(ajax_arr, {Point: ['0', '1']});
          //console.log(geojson);
          

          geoJson2heat = function(geojson, intensity) {
                        return geojson.features.map(function(feature) {
                        return [parseFloat(feature.geometry.coordinates[1]), 
                                parseFloat(feature.geometry.coordinates[0]), intensity];
                        });
          };

          var putin_map = geoJson2heat(geojson, 50);
          var heatMap = L.heatLayer(putin_map,{ radius: 25, maxZoom: 11 ,maxOpacity: 0.8});//, scaleRadius: false, useLocalExtrema: false, valueField: 'count'});
          mymap.addLayer(heatMap);

        }
      </script>
		</div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script type="text/javascript" src="harnew.js"></script>
  
    
    
    <script>
      function openForm() {
        closeProfile();
        closemap();
        document.getElementById("UploadForm").style.display = "block";
        document.getElementById("mapData").style.display = "none";
      }

      function closeProfile(){
        document.getElementById("Profilenfo").style.display = "none";
      }

      function closemap(){
        document.getElementById("map").style.display = "none";
      }
    </script>
    

  </body>
</html>
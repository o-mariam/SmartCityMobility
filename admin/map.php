<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


                <!-- Charts -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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
        
      <label for="check" >
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
        <button class="openbbutton"  ><i class="fa fa-line-chart" aria-hidden="true"></i>Analytics</button>
      </a>

      <a href="map.php">
        <button class="openbutton" href="map.php"><i class="fa fa-map" aria-hidden="true"></i>Map of IPs</button>
      </a>

      <a href="adminheaders.php">
        <button class="open-button" href="adminheaders.php" ><i class="fa fa-file" aria-hidden="true"></i>HTTP Files</button>
      </a>   

   

    </div>




<div class="content">
        
    <div class="admin_map_box">
        <div id="map"></div>
        

        <script type="text/javascript">


                let mymap = L.map("map",{
                    minZoom : 1.5
                });
                let osmUrl = "https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}.png'";
                let osmAttrib =
                'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
                let osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });
                mymap.addLayer(osm);
                mymap.setView([11,11],2);

                var map_coords = [];

                $.ajax({
                    url: "mapdata.php",
                    type: "POST",
                    success: function(data){
                        map_coords = data;//πίνακας κάθε γραμμή με lat long 0 kai 1 αντιστοιχα gia user & 2 kai 3 server 4 ποσοστό εμφάνισης
                                          //για να μην ζωγραφίσει πολλές φορές την ίδια γραμμή αλλά με βάση αυτό κανονικοποιείται το πάχος γραμμής
                        show_polylines();
                    }
                })

                function show_polylines(){

                    var userIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                        iconSize: [30, 50],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });


                    for (i=0; i<map_coords.length; i++){
                        latlngs = [[map_coords[i][0], map_coords[i][1]], [map_coords[i][2], map_coords[i][3]]];
                        marker1 = L.marker([map_coords[i][0], map_coords[i][1]], {icon: userIcon} ).addTo(mymap);//χρήστη
                        marker2 = L.marker([map_coords[i][2], map_coords[i][3]]).addTo(mymap);//σερβερ
                        var thickness;
                        
                        //κανονικοποίηση πάχους γραμμών
                        if(map_coords[i][4] < 1){//αν λιγότερο από 1%
                            thickness = 0.25;
                        }else if(map_coords[i][4] >= 1 && map_coords[i][4] < 5){//αν ανάμεσα από 1 και 5%
                            thickness = 0.5;
                        }else{
                            thickness = map_coords[i][4]/10;//αλλιώς πάχος γραμμής = ποσοστό/10(πχ 45% -> 4.5 πάχος)
                        }

                        // console.log(thickness);
                        var polyline = L.polyline(latlngs, {color: 'blue', weight: thickness, smoothFactor: 0.5}).addTo(mymap);
                    }
                }

            </script>
        </div>

    
</div>




</body>
</html>


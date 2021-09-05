<?php
include("session.php");

if(isset($_GET['msg']))
    {
        $Message = "Some error occured please try after some time";
        echo $Message;
    }

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
		</div>

    <!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script type="text/javascript" src="harnew.js"></script>
    <!---<script type="text/javascript" src="geojson.min.js"></script>--->
    
    
    <script>
      function openForm() {
        closeProfile();
        document.getElementById("UploadForm").style.display = "block";
      }

      function closeProfile(){
        document.getElementById("Profilenfo").style.display = "none";
      }
    </script>
    
    <script>
      // geojson.js - v0.4.1
      // (c) 2019 Casey Cesari, MIT License
      !function(d){function m(){var r=1<=arguments.length?[].slice.call(arguments,0):[],e=r.shift(),t=r.shift();Error.apply(this,r),this.message=this.message||"Invalid Geometry: item: "+JSON.stringify(e)+", params: "+JSON.stringify(t)}d.version="0.4.1",d.defaults={doThrows:{invalidGeometry:!1},removeInvalidGeometries:!1},m.prototype=Error,d.errors={InvalidGeometryError:m},d.isGeometryValid=function(r){return!(!r||!Object.keys(r).length)&&(!!r.type&&!!r.coordinates&&Array.isArray(r.coordinates)&&!!r.coordinates.length)},d.parse=function(r,e,t){var o,n,i=function(r,e){var t=r||{};for(var o in e)e.hasOwnProperty(o)&&!t[o]&&(t[o]=e[o]);return t}(e,this.defaults);if(s.length=0,function(r){for(var e in r.geom={},r)r.hasOwnProperty(e)&&-1!==a.indexOf(e)&&(r.geom[e]=r[e],delete r[e]);!function(r){for(var e in r)r.hasOwnProperty(e)&&("string"==typeof r[e]?s.push(r[e]):"object"==typeof r[e]&&(s.push(r[e][0]),s.push(r[e][1])));if(0===s.length)throw new Error("No geometry attributes specified")}(r.geom)}(i),n=function(t){var e;t.exclude||t.include?t.include?e=function(e){t.include.forEach(function(r){e[r]=this[r]},this)}:t.exclude&&(e=function(r){for(var e in this)this.hasOwnProperty(e)&&-1===s.indexOf(e)&&-1===t.exclude.indexOf(e)&&(r[e]=this[e])}):e=function(r){for(var e in this)this.hasOwnProperty(e)&&-1===s.indexOf(e)&&(r[e]=this[e])};return function(){var r={};return e.call(this,r),t.extra&&function(r,e){for(var t in e)e.hasOwnProperty(t)&&(r[t]=e[t])}(r,t.extra),r}}(i),Array.isArray(r)?(o={type:"FeatureCollection",features:[]},r.forEach(function(r){var e=u({item:r,params:i,propFunc:n});(!0!==i.removeInvalidGeometries||d.isGeometryValid(e.geometry))&&o.features.push(e)}),p(o,i)):p(o=u({item:r,params:i,propFunc:n}),i),!t||"function"!=typeof t)return o;t(o)};var a=["Point","MultiPoint","LineString","MultiLineString","Polygon","MultiPolygon","GeoJSON"],s=[];function p(r,e){if(e.crs&&function(r){{if("name"===r.type){if(r.properties&&r.properties.name)return!0;throw new Error('Invalid CRS. Properties must contain "name" key')}if("link"!==r.type)throw new Error('Invald CRS. Type attribute must be "name" or "link"');if(r.properties&&r.properties.href&&r.properties.type)return!0;throw new Error('Invalid CRS. Properties must contain "href" and "type" key')}}(e.crs)&&(e.isPostgres?r.geometry.crs=e.crs:r.crs=e.crs),e.bbox&&(r.bbox=e.bbox),e.extraGlobal)for(var t in r.properties={},e.extraGlobal)r.properties[t]=e.extraGlobal[t]}function u(r){var e=r.item,t=r.params,o=r.propFunc,n={type:"Feature"};return n.geometry=function o(n,r){var e;for(var t in r.geom){var i,a,s=r.geom[t],p=[];if(void 0!==e&&!1!==e)break;if("string"==typeof s&&n.hasOwnProperty(s))e="GeoJSON"===t?n[s]:{type:t,coordinates:n[s]};else if("string"==typeof s&&v(s)){e=void 0,a=s.split("."),i=n;for(var u=0;u<a.length;u++)null!=i&&i.hasOwnProperty(a[u])?i=i[a[u]]:(u=a.length,e=!1);!1!==e&&(e={type:t,coordinates:i})}else if("object"!=typeof s||Array.isArray(s))if(Array.isArray(s)&&n.hasOwnProperty(s[0])&&n.hasOwnProperty(s[1])&&n.hasOwnProperty(s[2]))e={type:t,coordinates:[Number(n[s[1]]),Number(n[s[0]]),Number(n[s[2]])]};else if(Array.isArray(s)&&n.hasOwnProperty(s[0])&&n.hasOwnProperty(s[1]))e={type:t,coordinates:[Number(n[s[1]]),Number(n[s[0]])]};else if(Array.isArray(s)&&v(s[0])&&v(s[1])&&v(s[2])){e=void 0;for(var l=0;l<s.length;l++){a=s[l].split("."),i=n;for(var f=0;f<a.length;f++)null!=i&&i.hasOwnProperty(a[f])?i=i[a[f]]:(l=s.length,f=a.length,e=!1);p[l]=i}!1!==e&&(e={type:t,coordinates:[Number(p[1]),Number(p[0]),Number(p[2])]})}else if(Array.isArray(s)&&v(s[0])&&v(s[1])){for(var c=0;c<s.length;c++){a=s[c].split("."),i=n;for(var y=0;y<a.length;y++)null!=i&&i.hasOwnProperty(a[y])?i=i[a[y]]:(c=s.length,y=a.length,e=!1);p[c]=i}!1!==e&&(e={type:t,coordinates:[Number(p[1]),Number(p[0])]})}else Array.isArray(s)&&"Object"===s[0].constructor.name&&"coordinates"===Object.keys(s[0])[0]&&(e={type:t,coordinates:[Number(n.coordinates[s[0].coordinates.indexOf("lng")]),Number(n.coordinates[s[0].coordinates.indexOf("lat")])]});else{var h=Object.keys(s).map(function(r){var e=s[r],t=n[r];return o(t,{geom:{Point:e}})});e={type:t,coordinates:[].concat(h.map(function(r){return r.coordinates}))}}}if(r.doThrows&&r.doThrows.invalidGeometry&&!d.isGeometryValid(e))throw new m(n,r);return e}(e,t),n.properties=o.call(e),n}function v(r){return/^.+\..+$/.test(r)}}("object"==typeof module?module.exports:window.GeoJSON={});
    </script>

  </body>
</html>
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
            <input type="file" id="file_to_Upload" class="modal_file" accept=".har"><br>
            <div class="ckeck">
                <input type="checkbox" id="saveToServer"/>Save to Server</label>
                <input type="checkbox" id="saveLocally"/>Save Locally</label>
            </div>

            <button type="submit" id="submitFile">Upload</button>
        
        </div>
  
    </div>
    

	    <div class="content">
			<!---<p>Welcome back, ?=$_SESSION['name']?>!</p>--->
		</div>

    <!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script type="text/javascript" src="geojson.min.js"></script>
    
    
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

        var url;
        var status;
        var statusText;
        var startedDateTime = "";
        var serverIP = "";

        var modal = document.getElementsByClassName("form-popup");

        var noentries = 0; 

        let entries = [];
   
        var local_entries = "";

        var date = new Date();
        var last_upload = "";

        var isp = "";

        document.getElementById("submitFile").addEventListener("click", function(){
            //Εμφάνιση Pop up με μήνυμα για αναμονή
            //modal[0].style.display = "none";
            //modal[1].style.display = "block";
            let file = document.querySelector("file_to_Upload").files[0];

            let reader = new FileReader();
            reader.addEventListener('load', function(e){
                let har = e.target.result;

                var data = JSON.parse(har);
                document.getElementById("submitFile").innerHTML = "run";

                $(data.log.entries).each(function(index, value){
                    startedDateTime = value.startedDateTime.replace(/T/g, "");
                    entries[0]  = startedDateTime;
                    entries[1] = value.timing.wait;
                    entries[2] = value.serverIPAddress;

                    

                    if(typeof entries[2] !== 'undefined'){
                        if(entries[2].charAt(0) == '['){
                            entries[2] = entries[2].slice(0, -1);
                            entries[2] = entries[2].substring(1);
                        }
                    }else{
                        entries[2] = "0";
                    }


                    entries[3] = value.request.method;

                    url = value.request.url;
                    let domain = (new URL(url));
                    domain = domain.hostname;
                    entries[4] = domain;

                    $(value.request.headers).each(function(hindex, hvalue){
                        if(hvalue.name === "content-type"){
                            entries[18] = hvalue.value;
                        }

                        if(hvalue.name === "cache-control"){
                            entries[19] = hvalue.value;
                        }

                        if(hvalue.name === "pragma"){
                            entries[20] = hvalue.value;
                        }

                        if(hvalue.name === "expires"){
                            entries[21] = hvalue.value;
                        }

                        if(hvalue.name === "age"){
                            entries[22] = hvalue.value;
                        }

                        if(hvalue.name === "last-modified"){
                            entries[23] = hvalue.value; 
                        }

                        if(hvalue.name === "host"){
                            entries[24] = hvalue.value;
                        }
                    });



                    entries[5] = value.response.status;
                    entries[6] = value.response.statusText;



                    $(value.response.headers).each(function(hindex, hvalue){
                        
                        if(hvalue.name === "content-type"){
                            entries[11] = hvalue.value;
                        }

                        if(hvalue.name === "cache-control"){
                            entries[12] = hvalue.value;

                        }

                        if(hvalue.name === "pragma"){
                            entries[13] = hvalue.value;
                        }

                        if(hvalue.name === "expires"){
                            if(typeof hvalue.name !== 'undefined' && hvalue.name !== "0" && hvalue.name !== ""){
                                var expires_date = new Date(hvalue.value);
                                var d = expires_date.toISOString().replace(/T/g, " ");
                                entries[14] = d;
                            }else{
                                entries[14] = hvalue.value;
                            }
                        
                        }   

                        /*if(hvalue.name === "expires"){
                            if(typeof hvalue.name !== "undefined && hvalue.name !== "0" && hvalue.name !== ""){
                                var expires_date = new Date(hvalue.value);
                                var d = expired_date.toISOString().replace(/T/g, " ");
                                entries[14] = d;

                            }else{
                                entries[14] = hvalue.value;
                            }
                        }*/

                        if(hvalue.name === "age"){
                            entries[15] = hvalue.value;
                        }

                        if(hvalue.name === "last-modified"){
                            if(typeof hvalue.name !== 'undefined' && hvalue.name !== "0" && hvalue.name !== ""){
                                var lastmod = new Date(hvalue.value);
                                var d = lastmod.toISOString().replace(/T/g, " ");
                                entries[16] = d;
                            }else{
                                entries[16] = hvalue.value;
                            }
                        }

                        if(hvalue.name === "host"){
                            entries[17] = hvalue.value;
                        }

                    });

                    
                    

                    if(entries[2]==="0"){
                        entries[7] = " ";
                        entries[8] = " ";
                        entries[9] = " ";
                    }
                    else{
                        $.ajax({
                            dataType: "json",
                            url: "https://api.ipstack.com/"+entries[2]+"?access_key=fd83eec28090641e49db6bdc3ea99324",//marianna API
                            async: false,//σύγρονα γτ πρέπει να πάρω απάντηση από site
                            success: function(data){
                                entries[7] = data.asn.organization;
                                entries[8] = data.geo.latitude;
                                entries[9] = data.geo.longitude;
                             }
                        });
                        
                    }

                    $.ajax({
                        dataType: "json",
                        url: "http://api.ipstack.com/?access_key=fd83eec28090641e49db6bdc3ea99324",
                        async: false,  //σύγρονα γτ πρέπει να πάρω απάντηση από site
                        success: function(data){
                            entries[10] = data.ip;
                            entries[25] = data.geo.latitude;
                            entries[26] = data.geo.longitude;
                            console.log("OK");
                            parse();
                        }
                    });

                    function parse(){
                       
                        //an topika
                         if(document.getElementById("saveLocally").checked){
                             var str = "Entry" + noentries + 
                                            "\n\tstartedDateTime:" + entries[0] +
                                            "\n\tTimings\n\t\twait: " + entries[1] + 
                                            "\n\tserverIPAddress: " + entries[2] + 
                                            "\n\tRequest\n\t\tmethod: " + entries[3] + 
                                                    "\n\t\turl: " + entries[4] +
                                                    "\n\t\tHeaders" + 
                                                        "\n\t\t\tcontent-type: " + entries[18] +
                                                        "\n\t\t\tcache-control: " + entries[19] + 
                                                        "\n\t\t\tpragma: " + entries[20] + 
                                                        "\n\t\t\texpires: " + entries[21] + 
                                                        "\n\t\t\tage: " + entries[22] +
                                                        "\n\t\t\tlast-modified: " + entries[23] + 
                                                        "\n\t\t\thost: " + entries[24] + 
                                    "\n\tResponse\n\t\tstatus: " + entries[5] + 
                                    "\n\t\tstatusText: " + entries[6] + 
                                    "\n\t\tHeaders" + 
                                        "\n\t\t\tcontent-type: " + entries[11] +
                                        "\n\t\t\tcache-control: " + entries[12] + 
                                        "\n\t\t\tpragma: " + entries[13] + 
                                        "\n\t\t\texpires: " + entries[14] + 
                                        "\n\t\t\tage: " + entries[15] +
                                        "\n\t\t\tlast-modified: " + entries[16] + 
                                        "\n\t\t\thost: " + entries[17] + "\n";

                            local_entries = local_entries + str;
                         }

                         noentries++;

                    }
                    
                });

                if (document.getElementById("saveLocally").checked){
                    alert("Your file is ready to download");
                    //modal[1].style.display = "none";
                    function download(content, fileName, contentType) {
                        var a = document.createElement("a");
                        var file = new Blob([content], {type: contentType});
                        a.href = URL.createObjectURL(file);
                        a.download = fileName;
                        a.click();
                    }
                    download(local_entries, 'parsedFile.txt', 'application/json');
                }











            });
        });
        
    </script>

 
  </body>
</html>
<?php
// Έναρξη session για έλεγχο αν υπάρχει χρήστης συνδεδεμένος
session_start();
 
// Αν δεν υπάρχει -> loginPage
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/forms.css">
        <link rel="stylesheet" type="text/css" href="css/dropDown.css">
        <link rel="stylesheet" type="text/css" href="css/userPage.css">
        <link rel="stylesheet" type="text/css" href="css/PopUp.css">
        <link rel="stylesheet" type="text/css" href="css/site_header.css">

        <!-- Map -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>
        <script src = "scripts/leaflet.heat.js" ></script>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700&display=swap" rel="stylesheet">

        <!-- Github script για να βάλουμε data στο graph από το ajax -->
        <script type="text/javascript" src="scripts/geojson.min.js"></script>

        <title>"Project Web 2020-2021"</title>
    </head>

    <body>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

        <!--Upload Modal-->
        <!---<div id="uploadModal" class="modal">--->
            <!-- Upload Modal content -->
            <div class="modal-content">
                <span class="close">x</span>
                <input type="file" id="file_to_Upload" class="modal_file" accept=".har">
                <div class="modal_check">
                    <u>
                        <li><label><input type="checkbox" id="saveToServer"/>Save to Server</label>
                        <li><label><input type="checkbox" id="saveLocally"/>Save Locally</label>
                    </u>
                </div>
                <button type="button" class="modal_btn" id="submitFile">Submit File</button>
            </div>
        <!---</div>--->

        <!--Wait for Upload-->
        <div id="waitModal" class="modal">
            <!-- Wait Modal content -->
            <div class="modal-content">
                <img class="modal_fields" src="css/icons/logo2.png" style="width: 10%; margin-left: 45%; margin-right: 45%;">
                <div class="modal_fields" style="margin-top: 100px;">Please wait until procedure is complete<div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="upload.js"></script>
        <script src="har_parser.js"></script>

    </body>
</html>
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
      <a href="analytics.html">
        <button class="openbbutton"  ><i class="fa fa-line-chart" aria-hidden="true"></i> Analytics</button>
      </a>
      <a href="map.html">
        <button class="openbutton" href="map.html"><i class="fa fa-map" aria-hidden="true"></i> Map of IPs</button>
      </a>
      <a href="adminheaders.php">
        <button class="open-button" href="adminheaders.php" ><i class="fa fa-file" aria-hidden="true"></i> HTTP Files</button>
      </a>   
    
      
      <a href="responsetimes.html">
        <button class="openb-button"><i class="far fa-clock" aria-hidden="true"></i> Response Times</button>
      </a>
   
    </div>
    <!-- <div class="content">                -->
        <div class="ttl_graph_box">
            <!-- Cachability -->
            <div class="graph1_box">
                <div class="radar">
                    <div id="canvas_container1">
                        <canvas id="cachability_chart"></canvas>
                    </div>
                </div>
                <div class="radar_cb">
                    <div class="selecte_all">
                        <input type="checkbox" id="all_checkboxes" value="">
                        <label  for="all_checkboxes">Select all</label><br>
                    </div>
                    <div class="content_types">
                        <div class="cb_titles">
                            <h>Content Types</h>
                        </div>
                        <input type="checkbox" id="all_ct" value="">
                        <label  for="all_ct">Check All Content Types</label><br>
                        <script>
                            var content_types = [];
                            //Δημιουργία cb δυναμικα από data που έχει επιστρεψει η ajax
                            $.ajax({ 
                                url: "getct.php",
                                type: "POST",
                                success: function(data) { 
                                    content_types = data;
                                    for (var value of content_types) {
                                        $('.content_types')
                                        .append(`<input type="checkbox" id="${value}" value="${value}">`)
                                        .append(`<label for="${value}">${value}</label></div>`)
                                        .append(`<br>`);
                                        // .append('<input type=checkbox"><input type="checkbox" required id="'+ content_types[i].ContentType + '" class="ct-box" value="'+ content_types[i].ContentType +'"><label  for="'+ content_types[i].ContentType + '">'+ '&nbsp &nbsp'+ content_types[i].ContentType + '</label></div>')
                                    }
                                } 
                            });
                        </script>
                    </div>
                    
                    <div class="isp">
                        <div class="cb_titles">
                            <h>ISP</h>
                        </div>
                        <input type="checkbox" id="all_isp" value=""> 
                        <label for="all_isp">Check All ISPs</label><br>
                        <script>
                            var isp = [];
                            //Δημιουργία cb δυναμικα από data που έχει επιστρεψει η ajax
                            $.ajax({ 
                                url: "getisp.php",
                                type: "POST",
                                success: function(data) { 
                                    isp = data;
                                    for (var value of isp) {
                                        $('.isp')
                                        .append(`<input type="checkbox" id="${value}" value="${value}">`)
                                        .append(`<label for="${value}">${value}</label></div>`)
                                        .append(`<br>`);                                }
                                } 
                            });
                        </script>
                    </div>
                    
                    <button id="apply_filters" type="button" class="applyfilters">Apply Filters</button>
                </div>
                <!-- Check all boxes -->
                <script>
                    $("#all_ct").click(function(){
                        $('.content_types > input:checkbox').not(this).prop('checked', this.checked);
                    });
                    $("#all_isp").click(function(){
                        $('.isp > input:checkbox').not(this).prop('checked', this.checked);
                    }); 
                    $("#all_checkboxes").click(function(){
                        $('input:checkbox').not(this).prop('checked', this.checked);
                    });       
                </script>
            </div>

                <div class="graph2_box">
                    <div class="ttl_chart">
                        <div id="canvas_container2">
                            <canvas id="ttl_chart" height=230></canvas>
                        </div>
                    </div>
                </div>
        <!-- </div> -->




        <!-- Cache ability chart -->
        <script>
        var content_types = [];
        var isp = [];
        var array = [];
        var myChart;
       
        createGraphs();


        function createGraphs(){


            var ct_boxes = document.querySelectorAll('.content_types > input[type=checkbox]:checked');
            var isp_boxes = document.querySelectorAll('.isp > input[type=checkbox]:checked');
            for(var i=0; i<ct_boxes.length; i++){
                content_types.push(ct_boxes[i].value);
            }
            for(var i=0; i<isp_boxes.length; i++){
                isp.push(isp_boxes[i].value);
            }
            content_types = JSON.stringify(content_types).replace(/\[/g, "(").replace(/\]/g, ")");
            isp = JSON.stringify(isp).replace(/\[/g, "(").replace(/\]/g, ")");
            $.ajax({ 
                url: "cache_graph.php",
                type: "POST",
                data: {
                        content_types : content_types,
                        isp : isp
                    },
                    success: function(data) {
                    


                        array = data[0];
                        console.log(array);
                        //κάθε γραμμή χωρίζεται και αποθηκεύεται στον πίνακα για το γράφημα

                        var chartData = array.split(" ");
                        chartData = chartData.map(function(x)  { return x * 100; });// για να βγει ποσοσπτό

                     

                    
                        var ctx = document.getElementById('cachability_chart').getContext('2d');
                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ["Public","Private","no-Cache","no-Store"],
                                datasets: [{
                                    data: chartData,
                                    backgroundColor: "#22242A",
                                }]
                                },
                                options : {
                                    legend:{
                                        display : false,                    
                                    },
                                    title: {
                                        display: true,
                                        text: 'Cacheability Directives Percentages(%)',
                                        fontFamily: "'Archivo', sans-serif"
                                    }    
                            }
                        });
                        $.ajax({ 
                            url: "ttl_graph.php",
                            type: "POST",
                            data: {
                                    content_types : content_types,
                                    isp : isp
                                },
                                success: function(data) { 
                                    
                                    var max_age;
                                    var get_max = [];
                                    var ttl = [];
                                    console.log(data);
                                    content_types = [];
                                    isp = [];
                                    
                                


                                    for(var i=0; i < data.length; i++){
                                       
                                        get_max = data[i][0].split(",");
                                        var str = " max-age";
                                        var str1 = "max-age";
                                        
                                        ttl[i] = []; 
                                        for(var j=0; j < get_max.length; j++){
                                            if(get_max[j].substring(0,7).localeCompare(str1) == 0){
                                                max_age = get_max[j].substring(8,get_max[j].length);
                                                ttl[i][0] = parseFloat(max_age);
                                                ttl[i][1] = parseFloat(data[i][3]);
                                                break;
                                            }else if(get_max[j].substring(0,8).localeCompare(str) == 0){
                                                max_age = get_max[j].substring(9,get_max[j].length);
                                                ttl[i][0] = parseFloat(max_age);
                                                ttl[i][1] = parseFloat(data[i][3]);
                                                break;
                                            }
                                        }
                                        if(ttl[i][0] == null){
                                            if(data[i][1] > 0){
                                                ttl[i][0] = parseFloat(data[i][1]);
                                                ttl[i][1] = parseFloat(data[i][3]);
                                            }else{
                                                ttl[i][0] = parseFloat(data[i][2]);
                                                ttl[i][1] = parseFloat(data[i][3]);
                                            }
                                        }
                                    }
                               
                                    var max;
                                    var min;
                                    var scope;
                                    var buckets = [];
                                    var fill_buckets = [];
                                    max = Math.max.apply(Math, ttl.map(v => v[0]));
                                    min = Math.min.apply(Math, ttl.map(v => v[0]));

                                    scope = Math.round(((max-min)/10),2);
                                   

                                    for(var i=0; i<=10; i++){
                                        buckets.push(i*scope);
                                        fill_buckets[i] = 0;
                                    }
                                    
                                    for (var i=0; i<ttl.length; i++){
                                        for(var j=0; j<10; j++){
                                            if(ttl[i][0] >= buckets[j] && ttl[i][0] <= buckets[j+1]){
                                                fill_buckets[j] = fill_buckets[j] + ttl[j][1];
                                                break;
                                            }
                                        }
                                    }
                                  
                                    var ctx = document.getElementById("ttl_chart").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                    data: {
                                        labels: buckets,
                                        datasets: [{
                                        label: 'TTL Histogram',
                                        data: fill_buckets,
                                        backgroundColor: '#22242A',
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        xAxes: [{
                                            display: false,
                                            barPercentage: 1.3,
                                            ticks: {
                                            max: 3,
                                            }
                                        }, {
                                            display: true,
                                            ticks: {
                                            autoSkip: false,
                                            max: 4,
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                            beginAtZero: true
                                            }
                                        }]
                                        }
                                    }
                                    });
                                }      
                        });    
                                    
                    }      
            });
        }
        //Καταστροφή και δημιουργία canvas
        $('#apply_filters').on('click', function(){
            $('#canvas_container1').empty().append('<canvas id="cachability_chart"></canvas>');
            $('#canvas_container2').empty().append('<canvas id="ttl_chart" height=230></canvas>');
            createGraphs();
                    
        })
        </script>
    
    </body>
</html>
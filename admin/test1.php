<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="testing.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<!-- (DE)SELECT THE CHECKBOXES 

<script type="text/javascript">  
    function selects(){  
        var ele=document.getElementsByName('content_type');  
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=true;  
        }  
    }  
    function deSelect(){  
        var ele=document.getElementsByName('content_type');  
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
              
        }  
    }
</script>  -->

<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <div class="w3-container">
  <h2>Displaying Colors</h2>
  <p>The w3-color classes can be used to add colors to any HTML element.</p>
</div>

<div class="w3-container w3-red">
  <p>Bla bla bla bla bla bla</p>
</div> -->

<div class="about">
    <div id="chart_container">
        <canvas id="trChart"></canvas>
    </div>
    <!-- <button id="submit" class="w3-btn w3-hover-border-light-green">Submit Values</button> -->
    <button id="submit" type="button" class="submitvalues">Submit Values</button>
    <!-- <input type="button" id='selects()' value="Select All"/>  
    <input type="button" onclick='deSelect()' value="Deselect All"/> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- CHART VALUES -->
    
    <script>
        // === include 'setup' then 'config' above ===
        const labels = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];

        const data = {
            labels: labels,
            datasets: [{
            label: 'Response Times',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            spanGaps: true,
            data: [0,10,11,,14,15,21,22,23,24],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
            };
      
        var trChart = new Chart(
          document.getElementById('trChart'),
          config
        );
      </script>
  </div>

  <input id="submit/value" type="checkbox" value="All">


    <!-- CONTENT TYPE CHECKBOXES -->

    <div class="about">

        <!-- (DE)SELECT THE CHECKBOXES  -->

        <script type="text/javascript">  
            function selectType(){  
                var ele=document.getElementsByName('content_type');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelectType(){  
                var ele=document.getElementsByName('content_type');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                    
                }  
            }
        </script> 

        <!-- CHECKBOXES -->

        <h2>Content Type</h2>
        <script>
            var content_type = [];
            //CREATE DYNAMIC CHECKBOXES, BASED ON THE GIVEN DATA
            $.ajax({ 
                url: "php/get_ctype.php",
                type: "POST",
                success: function(data) { 
                    content_type = data;
                    for (var value of content_type) {
                        $('.content_type')
                        .append(`<input type="checkbox" id="${value}" value="${value}">`)
                        .append(`<label for="${value}">${value}</label></div>`)
                        .append(`<br>`);
                    }
                } 
            });
        </script>

        <!-- <label class="container">Application
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">Audio
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">Image
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">Multipart
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label>

        <label class="container">Text
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label>

        <label class="container">Video
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label>

        <label class="container">VND
            <input type="checkbox" name="content_type">
            <span class="checkmark"></span>
        </label> -->

        <div class="move-me">
            <input type="button" onclick='selectType()' value="Select All"/>  
            <input type="button" onclick='deSelectType()' value="Deselect All"/>
        </div>
    </div> 

    <!-- HTTP METHOD CHECKBOXES -->

    <div class="about">

        <!-- (DE)SELECT THE CHECKBOXES  -->

        <script type="text/javascript">  
            function selectMethod(){  
                var ele=document.getElementsByName('http_method');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelectMethod(){  
                var ele=document.getElementsByName('http_method');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                    
                }  
            }
        </script>

        <!-- CHECKBOXES -->

        <h2>HTTP Method</h2>
        <label class="container">GET
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">HEAD
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">POST
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">PUT
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>

        <label class="container">DELETE
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>

        <label class="container">CONNECT
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>

        <label class="container">OPTIONS
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>

        <label class="container">TRACE
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>

        <label class="container">PATCH
            <input type="checkbox" name="http_method">
            <span class="checkmark"></span>
        </label>

        <div class="move-me">
            <input type="button" onclick='selectMethod()' value="Select All"/>  
            <input type="button" onclick='deSelectMethod()' value="Deselect All"/>
        </div>
    </div>

<!-- DAY OF THE WEEK CHECKBOXES -->

    <div class="about">

        <!-- (DE)SELECT THE CHECKBOXES  -->

        <script type="text/javascript">  
            function selectDay(){  
                var ele=document.getElementsByName('day_of_the_week');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelectDay(){  
                var ele=document.getElementsByName('day_of_the_week');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                    
                }  
            }
        </script>

        <!-- CHECKBOXES -->

        <h2>Day of the Week</h2>
        <label class="container">Monday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <label class="container">Tuesday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <label class="container">Wednesday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <label class="container">Thrusday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <label class="container">Friday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <label class="container">Saturday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <label class="container">Sunday
            <input type="checkbox" name="day_of_the_week">
            <span class="checkmark"></span>
        </label>

        <div class="move-me">
            <input type="button" onclick='selectDay()' value="Select All"/>  
            <input type="button" onclick='deSelectDay()' value="Deselect All"/>
        </div>
    </div>

    <!-- TELEPHONE PROVIDER CHECKBOXES -->

    <div class="about">

        <!-- (DE)SELECT THE CHECKBOXES  -->

        <script type="text/javascript">  
            function selectProvider(){  
                var ele=document.getElementsByName('telephone_provider');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelectProvider(){  
                var ele=document.getElementsByName('telephone_provider');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                    
                }  
            }
        </script>

        <!-- CHECKBOXES -->

        <h2>Provider</h2>
        <script>
            var isp = [];
            //CREATE DYNAMIC CHECKBOXES, BASED ON THE GIVEN DATA
            $.ajax({ 
                url: "php/get_isp.php",
                type: "POST",
                success: function(data) { 
                    isp = data;
                    for (var value of isp) {
                        $('.telephone_provider')
                        .append(`<input type="checkbox" id="${value}" value="${value}">`)
                        .append(`<label for="${value}">${value}</label></div>`)
                        .append(`<br>`);
                    }
                } 
            });
        </script>
        
        <!-- <label class="container">Cosmote
            <input type="checkbox" name="telephone_provider">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">Vodafone
            <input type="checkbox" name="telephone_provider">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">WIND
            <input type="checkbox" name="telephone_provider">
            <span class="checkmark"></span>
        </label>
    
        <label class="container">Cyta
            <input type="checkbox" name="telephone_provider">
            <span class="checkmark"></span>
        </label> -->

        <div class="move-me">
            <input type="button" onclick='selectProvider()' value="Select All"/>  
            <input type="button" onclick='deSelectProvider()' value="Deselect All"/>
        </div>
    </div>



    <!-- Cache ability chart -->

    <script>
        var content_types = [];
        var method = [];
        var startedDateTime = [];
        var isp = [];
        var myarr = [];

        var myChart;

        //Αρχικά χωρίς data μόλις διαλέξει ο χρήστης και πατήσει submit values δημιουργία ξανά
        createGraphs();

        function createGraphs(){
            //έλεγχος για το ποια cb είναι checked και επιστροφή το value τους σε πίνακες
            //οι πίνακες με ajax σε sql για την εκτέλεση της εντολής με απαραίτητα where
            var ct_boxes = document.querySelectorAll('.content_type > input[type=checkbox]:checked');
            var method_boxes = document.querySelectorAll('.http_method > input[type=checkbox]:checked');
            var date_boxes = document.querySelectorAll('.day_of_the_week > input[type=checkbox]:checked');
            var isp_boxes = document.querySelectorAll('.telephone_provider > input[type=checkbox]:checked');

            for(var i=0; i<ct_boxes.length; i++){
                content_type.push(ct_boxes[i].value);
            }
            for(var i=0; i<method_boxes.length; i++){
                http_method.push(method_boxes[i].value);
            }
            for(var i=0; i<date_boxes.length; i++){
                day_of_the_week.push(date_boxes[i].value);
            }
            for(var i=0; i<isp_boxes.length; i++){
                telephone_provider.push(isp_boxes[i].value);
            }

            content_types = JSON.stringify(content_types).replace(/\[/g, "(").replace(/\]/g, ")");
            http_method = JSON.stringify(http_method).replace(/\[/g, "(").replace(/\]/g, ")");
            day_of_the_week = JSON.stringify(day_of_the_week).replace(/\[/g, "(").replace(/\]/g, ")");
            isp = JSON.stringify(isp).replace(/\[/g, "(").replace(/\]/g, ")");

            
                        $.ajax({ 
                                url: "php/tr_average.php",
                                type: "POST",
                                data: {
                                    content_types : content_type,
                                    methods : http_method,
                                    days : day_of_the_week,
                                    isp : telephone_provider
                                },
                                success: function(data) { 
                                myarr = data;//2D array 0 ώρα και 1 avg
                                // console.log(myarr);

                                    var i;
                                    var j;

                                    //αντοιστοίχηση δεδομένων με ώρες για γράφημα
                                    for(i=0; i <= 24; i++){
                                        for(j=0; j < myarr.length; j++){
                                            if(myarr[j][0] == chart_labels[i]){
                                                chart_data[i] = myarr[j][1];
                                                break;
                                            }else{
                                                chart_data[i] = 0;
                                            }
                                        }
                                        
                                    }//δημιουργία πίνακα με 25 κελιά

                                    // console.log(chart_data);
                                    //άδεισμα σε περίπτωση που ο χρήστης θέλει κι άλλο γράφημα
                                    content_type = [];
                                    http_method = [];
                                    day_of_the_week = [];
                                    telephone_provider = [];

                                    var ctx = document.getElementById("trChart").getContext('2d');
                                    myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: chart_labels,
                                        datasets: [{
                                            data: chart_data,
                                            backgroundColor: "#F08080",
                                        }]
                                        },
                                        options : {
                                            legend:{
                                                display : false,                    
                                            },
                                            title: {
                                                display: true,
                                                text: 'Average Request Wait Time per Hour',
                                                fontFamily: "'Archivo', sans-serif"
                                            }    
                                        }
                                    });    
                                } 
                            });      
                        }


                        // $.ajax({ 
                        //     url: "fill_ttl_graph.php",
                        //     type: "POST",
                        //     data: {
                        //             content_types : content_types,
                        //             isp : isp
                        //         },
                        //         success: function(data) { 
                        //             //με επιτυχία
                        //             var max_age;
                        //             var get_max = [];
                        //             var ttl = [];

                        //             console.log(data);

                        //             //άδειασμα πινάκων για την περίπτωση που ο χρήστης θέλει νέο γράφημα
                        //             content_types = [];
                        //             isp = [];

                        //             //για το μήκος του πίνακα που επιστρέφει η βάση
                        //             for(var i=0; i < data.length; i++){
                        //                 //κάθε γραμμή σπλιτ για να βρεθεί αν υπάρχει το max age
                        //                 get_max = data[i][0].split(",");
                        //                 //αν είναι κάπου στον πίνακα
                        //                 var str = " max-age";
                        //                 //αν είναι πρώτο
                        //                 var str1 = "max-age";
                        //                 //είναι ο τελικός πίνακας που θα μπει στο γράφημα
                        //                 ttl[i] = [];//2D 0 = τιμή , 1 = εμφανίσεις
                        //                 for(var j=0; j < get_max.length; j++){
                        //                     if(get_max[j].substring(0,7).localeCompare(str1) == 0){
                        //                         max_age = get_max[j].substring(8,get_max[j].length);
                        //                         ttl[i][0] = parseFloat(max_age);//την τιμή του max age σαν float
                        //                         ttl[i][1] = parseFloat(data[i][3]);//τις εμφανίνσεις
                        //                         break;
                        //                     }else if(get_max[j].substring(0,8).localeCompare(str) == 0){
                        //                         max_age = get_max[j].substring(9,get_max[j].length);
                        //                         ttl[i][0] = parseFloat(max_age);
                        //                         ttl[i][1] = parseFloat(data[i][3]);
                        //                         break;
                        //                     }
                        //                 }

                        //                 if(ttl[i][0] == null){//αν δεν υπάρχει max age
                        //                     if(data[i][1] > 0){//αν expires > 0 
                        //                         ttl[i][0] = parseFloat(data[i][1]);//πάρε expired(diff sql)
                        //                         ttl[i][1] = parseFloat(data[i][3]);
                        //                     }else{//αν όχι 
                        //                         ttl[i][0] = parseFloat(data[i][2]);//lastmod(diff sql)
                        //                         ttl[i][1] = parseFloat(data[i][3]);
                        //                     }
                        //                 }

                        //             }

        //                             // console.log(data);
        //                             // console.log(ttl);


        //                             //Create graph buckets #10
        //                             var max;
        //                             var min;
        //                             var scope;
        //                             var buckets = [];
        //                             var fill_buckets = [];

        //                             max = Math.max.apply(Math, ttl.map(v => v[0]));
        //                             min = Math.min.apply(Math, ttl.map(v => v[0]));
                                
        //                             // console.log(max, min);
        //                             // console.log(ttl);

        //                             //εύρος bucket δυναμικά
        //                             scope = Math.round(((max-min)/10),2);

        //                             //αρχικοποίηση
        //                             for(var i=0; i<=10; i++){
        //                                 buckets.push(i*scope);
        //                                 fill_buckets[i] = 0;
        //                             }

        //                             //μοίρασμα σε bucket αναλόγως τιμης - εύρους bucket
        //                             for (var i=0; i<ttl.length; i++){
        //                                 for(var j=0; j<10; j++){
        //                                     if(ttl[i][0] >= buckets[j] && ttl[i][0] <= buckets[j+1]){
        //                                         fill_buckets[j] = fill_buckets[j] + ttl[j][1];
        //                                         break;
        //                                     }
        //                                 }
        //                             }

                                  

        //                             var ctx = document.getElementById("ttl_chart").getContext('2d');
        //                             var myChart = new Chart(ctx, {
        //                                 type: 'bar',
        //                             data: {
        //                                 labels: buckets,
        //                                 datasets: [{
        //                                 label: 'TTL Histogram',
        //                                 data: fill_buckets,
        //                                 backgroundColor: '#22242A',
        //                                 }]
        //                             },
        //                             options: {
        //                                 scales: {
        //                                 xAxes: [{
        //                                     display: false,
        //                                     barPercentage: 1.3,
        //                                     ticks: {
        //                                     max: 3,
        //                                     }
        //                                 }, {
        //                                     display: true,
        //                                     ticks: {
        //                                     autoSkip: false,
        //                                     max: 4,
        //                                     }
        //                                 }],
        //                                 yAxes: [{
        //                                     ticks: {
        //                                     beginAtZero: true
        //                                     }
        //                                 }]
        //                                 }
        //                             }
        //                             });
        //                         }      
        //                 });    
                                    
        //             }      
        //     });

        // }

        //Καταστροφή και δημιουργία canvas
        $('#submit').on('click', function(){
            $('#chart_container').empty().append('<canvas id="trChart"></canvas>');
            createGraphs();
                    
        })

        </script>
  

</body>

</html>

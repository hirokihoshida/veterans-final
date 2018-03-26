<html>
<head>
    <title>Generate Report</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <link href="css/homepage.css" rel="stylesheet" type="text/css" />
    <link href="css/buttons.css" rel="stylesheet" type="text/css" />
    <!--   Free Website Template by t o o p l a t e . c o m   -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        
        var age = <?php echo $age; ?>;
        var cos = <?php echo $cos; ?>;
        var dis = <?php echo $dis; ?>;
        var dl = <?php echo $dl; ?>;
        var emp = <?php echo $emp; ?>;
        var inc = <?php echo $inc; ?>;
        var snr = <?php echo $snr; ?>;

        google.charts.load('current', {'packages':['bar']});
        google.charts.load('current', {'packages':['corechart']});
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawChart);

        function getData(id, filter = null){
            if (filter == null){
                if (id == "agechart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("age") ?>);
                } else if (id == "coschart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("character_of_service") ?>);
                } else if (id == "disabilitychart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("disability_status") ?>);
                } else if (id == "dlchart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("drivers_license_status") ?>);
                } else if (id == "empchart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("employment_status") ?>);
                } else if (id == "incchart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("income_level") ?>);
                } else if (id == "snrchart"){
                    return google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("senior_citizenship_status") ?>);
                }
            } else {
                var pathname = window.location.pathname;
                var idChart;
                if (id == "agechart"){
                    idChart= "age";
                } else if (id == "coschart"){
                    idChart = "character_of_service";
                } else if (id == "disabilitychart"){
                    idChart = "disability_status";
                } else if (id == "dlchart"){
                    idChart = "drivers_license_status";
                } else if (id == "empchart"){
                    idChart = "employment_status";
                } else if (id == "incchart"){
                    idChart = "income_level";
                } else if (id == "snrchart"){
                    idChart = "senior_citizenship_status";
                }

                $.ajaxSetup({
                      headers: {
                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                   }
                });

                var result = -1;

                console.log("getDataAjax to " + pathname);
                console.log("filter:" + filter + "\tidChart:" + idChart);
                var request = $.ajax({
                    url: "report-generator",
                    type: "POST",
                    dataType: "json",
                    async: false,
                    data: {filter: filter, id: idChart},
                    beforeSend: function(){
                        console.log("DATA:" + this.data );
                    },
                    success: function(response){
                        console.log("data :" + response);
                        result = response.result;
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' ERROR THROWN: ' + errorThrown);
                    },
                });
                return result;
            }
        }


        function selectHandler(chart, dataOriginal, id) {
            console.log("hi");
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
                if (selectedItem.column != null){
                    var value = dataOriginal.getValue(selectedItem.row, selectedItem.column);
                }
                else{
                    var value = dataOriginal.getValue(selectedItem.row, 0);
                }
                console.log("Value:" + value);
                var data = getData(id, value);
                if (data == -1){
                    console.log("ERRROROORRR");
                }
                var table = new google.visualization.Table(document.getElementById('table_div'));
                table.draw(data, {showRowNumber: true});
            }
        }

        function drawChart() {
            var data1 = google.visualization.arrayToDataTable(age);
            var data2 = google.visualization.arrayToDataTable(cos);
            var data3 = google.visualization.arrayToDataTable(dis);
            var data4 = google.visualization.arrayToDataTable(dl);
            var data5 = google.visualization.arrayToDataTable(emp);
            var data6 = google.visualization.arrayToDataTable(inc);
            var data7 = google.visualization.arrayToDataTable(snr);


            var options1 = {
              chart: {
                title: 'Veteran Age Report',
                subtitle: 'Age range of veterans',
              },
              chartArea:{
                width:800,
                height: 500
              },
              bars: 'vertical' // Required for Material Bar Charts.
            };


            var options2 = {
              title: 'Character of Service'
            };

            var options3 = {
              title: 'Disability Status'
            };

            var options4 = {
              title: 'Drivers License Status'
            };

            var options5 = {
              chart: {
                title: 'Employment Status'
              },
              chartArea:{
                width:800,
                height: 500
              },
              bars: 'vertical' // Required for Material Bar Charts.
            };

            var options6 = {
              chart: {
                title: 'Veterans Income Level'
              },
              chartArea:{
                width:800,
                height: 500
              },
              bars: 'vertical' // Required for Material Bar Charts.
            };


            var options7 = {
              title: 'Senior Citizenship Status'
            };

            var container1 = document.getElementById('agechart');
            container1.style.display = 'block';
            var container2 = document.getElementById('coschart');
            container2.style.display = 'block';
            var container3 = document.getElementById('disabilitychart');
            container3.style.display = 'block';
            var container4 = document.getElementById('dlchart');
            container4.style.display = 'block';
            var container5 = document.getElementById('empchart');
            container5.style.display = 'block';
            var container6 = document.getElementById('incchart');
            container6.style.display = 'block';
            var container7 = document.getElementById('snrchart');
            container7.style.display = 'block';


            var chart1 = new google.charts.Bar(container1);
            var chart2 = new google.visualization.PieChart(container2);
            var chart3 = new google.visualization.PieChart(container3);
            var chart4 = new google.visualization.PieChart(container4);
            var chart5 = new google.charts.Bar(container5);
            var chart6 = new google.charts.Bar(container6);
            var chart7 = new google.visualization.PieChart  (container7);
            
            google.visualization.events.addListener(chart1, 'ready', function () {
                container1.style.display = 'none';
            });
            google.visualization.events.addListener(chart1, 'select', function(e) {selectHandler(chart1, data1, 'agechart');});

            google.visualization.events.addListener(chart2, 'ready', function () {
                container2.style.display = 'none';
            });
            google.visualization.events.addListener(chart2, 'select', function(e) {selectHandler(chart2, data2, 'coschart');});

            google.visualization.events.addListener(chart3, 'ready', function () {
                container3.style.display = 'none';
            });
            google.visualization.events.addListener(chart3, 'select', function(e) {selectHandler(chart3, data3, 'disabilitychart');});

            google.visualization.events.addListener(chart4, 'ready', function () {
                container4.style.display = 'none';
            });
            google.visualization.events.addListener(chart4, 'select', function(e) {selectHandler(chart4, data4, 'dlchart');});

            google.visualization.events.addListener(chart5, 'ready', function () {
                container5.style.display = 'none';
            });
            google.visualization.events.addListener(chart5, 'select', function(e) {selectHandler(chart5, data5, 'empchart');});

            google.visualization.events.addListener(chart6, 'ready', function () {
                container6.style.display = 'none';
            });
            google.visualization.events.addListener(chart6, 'select', function(e) {selectHandler(chart6, data6, 'incchart');});

            google.visualization.events.addListener(chart7, 'ready', function () {
                container7.style.display = 'none';
            });
            google.visualization.events.addListener(chart7, 'select', function(e) {selectHandler(chart7, data7, 'snrchart');});


            chart1.draw(data1, options1);
            chart2.draw(data2, options2);
            chart3.draw(data3, options3);
            chart4.draw(data4, options4);
            chart5.draw(data5, options5);
            chart6.draw(data6, options6);
            chart7.draw(data7, options7);
        }

        function drawTable(id){
            if (id == 'agechart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("age") ?>);
            } else if (id == 'coschart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("character_of_service") ?>);
            } else if (id == 'disabilitychart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("disability_status") ?>);
            } else if (id == 'dlchart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("drivers_license_status") ?>);
            } else if (id == 'empchart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("employment_status") ?>);
            } else if (id == 'incchart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("income_level") ?>);
            } else if (id == 'snrchart'){
                var data = google.visualization.arrayToDataTable(<?php echo app('app\Http\Controllers\DBController')->getDataTable("senior_citizenship_status") ?>);
            }

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true});
        }


        function showDiv(id, object) {
            var x = document.getElementById(id);
            var tableB = document.getElementById('blankT');
            var table = document.getElementById('table_div');
            if (x.style.display === "none") {
                $("div[name='chart']").each(function(){
                    this.style.display = "none";
                });
                tableB.style.display = 'none';
                table.style.display = "block";
                drawTable(id,);
                x.style.display = "block";
            } else {
                x.style.display = "none";
                document.getElementById('blank').style.display = 'block';
                table.style.display =  "none";
                tableB.style.display = "block";
            }
        }

    </script>
</head>

<body>
    <div>
        <h1 class="title" style="text-align: center;">Report Generator</h1>
        <div style="width: 1220px; margin: auto">
            <div class="chart" style="float:left; padding-right:20px;">
                <div name="chart" id="blank" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="agechart" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="coschart" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="disabilitychart" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="dlchart" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="empchart" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="incchart" style="width: 900px; height: 500px;"></div>
                <div name="chart" id="snrchart" style="width: 900px; height: 500px;"></div>
            </div>
            <div class="table" id="blankT" style="float:right; width: 300px; height: 500px; display: none;"></div>
            <div class="table" id="table_div" style="float:right; width: 300px; height: 500px;"></div>
        </div>

        <h3 style="text-align: center;">Choose the fields you would like to generate in the report</h3>
        <div class="buttons" style="text-align: center;">
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('agechart', this)">Age</button>
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('coschart', this)">Character of Service</button>
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('disabilitychart', this)">Disability Status</button>
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('dlchart', this)">Drivers License</button>
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('empchart', this)">Employment</button>
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('incchart', this)">Income Level</button>
            <button type="button" name="answer" class="md-btn md-btn-raised" onclick="showDiv('snrchart', this)">Senior Citizenship</button>
        </div>
    </div>
    <!--<a href="../index.php" class="back">
        <button style="cursor: pointer" id="back">Back</button>
    </a>-->
</body>
</html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Report Generator</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">

        body {
            background-color: #eceff1

        }
    </style>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <!--Load the GOOGLE CHARTS API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        var age = <?php echo $age; ?>;
        var cos = <?php echo $cos; ?>;
        var dis = <?php echo $dis; ?>;
        var dl = <?php echo $dl; ?>;
        var emp = <?php echo $emp; ?>;
        var inc = <?php echo $inc; ?>;
        var snr = <?php echo $snr; ?>;
        var filtered = false;
        var previousVal = -1;
        var currentData = -1;

        google.charts.load('current', {'packages': ['bar']});
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.load('current', {'packages': ['table']});
        google.charts.setOnLoadCallback(drawChart);

        function selectHandler(chart, dataOriginal, id) {
            var table = new google.visualization.Table(document.getElementById('table_div'));
            var selectedItem = chart.getSelection()[0];
            var newData = [];
            newData.push(['Name', 'Value']);
            if (selectedItem)
                var value = dataOriginal.getValue(selectedItem.row, 0);
            else
                var value = -1;


            if (filtered == false && selectedItem) {//the table is not filtered and has a selected item

                //console.log(previousVal + "->" + value)
                if (previousVal == value) {//if not filtered & previousval is same then go back to non filtered state
                    currentData[0] = ['Name', 'Value'];
                    table.draw(google.visualization.arrayToDataTable(currentData), {showRowNumber: true});
                    filtered = false;
                    previousVal = -1;
                } else {//if previous value is not the same, then filter data
                    for (var i = 1; i < currentData.length; ++i) {//filter data
                        var val = currentData[i][1];
                        //console.log(i+": " + val);
                        if (value == val) {
                            //console.log(val + "=" + value + " so added");
                            newData.push(currentData[i]);
                        }
                    }
                    previousVal = value;
                    filtered = true;
                    table.draw(google.visualization.arrayToDataTable(newData), {showRowNumber: true});
                }
            } else {
                if (previousVal != value && value != -1) {//if filtered yet the previous value is different
                    filtered = false;
                    selectHandler(chart, dataOriginal, id);
                } else {//if filtered and previous val is same then unfilter
                    currentData[0] = ['Name', 'Value'];
                    table.draw(google.visualization.arrayToDataTable(currentData), {showRowNumber: true});
                    filtered = false;
                    previousVal = -1;
                }
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
                chartArea: {
                    width: 800,
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
                chartArea: {
                    width: 800,
                    height: 500
                },
                bars: 'vertical' // Required for Material Bar Charts.
            };

            var options6 = {
                chart: {
                    title: 'Veterans Income Level'
                },
                chartArea: {
                    width: 800,
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
            var chart7 = new google.visualization.PieChart(container7);

            google.visualization.events.addListener(chart1, 'ready', function () {
                container1.style.display = 'none';
            });
            google.visualization.events.addListener(chart1, 'select', function (e) {
                selectHandler(chart1, data1, 'agechart');
            });

            google.visualization.events.addListener(chart2, 'ready', function () {
                container2.style.display = 'none';
            });
            google.visualization.events.addListener(chart2, 'select', function (e) {
                selectHandler(chart2, data2, 'coschart');
            });

            google.visualization.events.addListener(chart3, 'ready', function () {
                container3.style.display = 'none';
            });
            google.visualization.events.addListener(chart3, 'select', function (e) {
                selectHandler(chart3, data3, 'disabilitychart');
            });

            google.visualization.events.addListener(chart4, 'ready', function () {
                container4.style.display = 'none';
            });
            google.visualization.events.addListener(chart4, 'select', function (e) {
                selectHandler(chart4, data4, 'dlchart');
            });

            google.visualization.events.addListener(chart5, 'ready', function () {
                container5.style.display = 'none';
            });
            google.visualization.events.addListener(chart5, 'select', function (e) {
                selectHandler(chart5, data5, 'empchart');
            });

            google.visualization.events.addListener(chart6, 'ready', function () {
                container6.style.display = 'none';
            });
            google.visualization.events.addListener(chart6, 'select', function (e) {
                selectHandler(chart6, data6, 'incchart');
            });

            google.visualization.events.addListener(chart7, 'ready', function () {
                container7.style.display = 'none';
            });
            google.visualization.events.addListener(chart7, 'select', function (e) {
                selectHandler(chart7, data7, 'snrchart');
            });


            chart1.draw(data1, options1);
            chart2.draw(data2, options2);
            chart3.draw(data3, options3);
            chart4.draw(data4, options4);
            chart5.draw(data5, options5);
            chart6.draw(data6, options6);
            chart7.draw(data7, options7);
        }

        function drawTable(id) {
            if (id == 'agechart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("age") ?>;
            } else if (id == 'coschart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("character_of_service") ?>;
            } else if (id == 'disabilitychart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("disability_status") ?>;
            } else if (id == 'dlchart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("drivers_license_status") ?>;
            } else if (id == 'empchart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("employment_status") ?>;
            } else if (id == 'incchart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("income_level") ?>;
            } else if (id == 'snrchart') {
                var data = <?php echo app('app\Http\Controllers\DBController')->getDataTable("senior_citizenship_status") ?>;
            }

            currentData = [];
            for (var i = 0; i < data.length; i++) {
                if (i != 0)
                    currentData[i] = data[i].slice();
            }

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(google.visualization.arrayToDataTable(data), {showRowNumber: true});
        }


        function showDiv(id, object) {
            var x = document.getElementById(id);
            var tableB = document.getElementById('blankT');
            var table = document.getElementById('table_div');
            if (x.style.display === "none") {
                $("div[name='chart']").each(function () {
                    this.style.display = "none";
                });
                tableB.style.display = 'none';
                table.style.display = "block";
                drawTable(id);
                x.style.display = "block";
            } else {
                x.style.display = "none";
                document.getElementById('blank').style.display = 'block';
                table.style.display = "none";
                tableB.style.display = "block";
            }
        }

    </script>
</head>

<body>

<div class="navbar-fixed">
    <nav>
        <div class="black nav-wrapper">
            <a href="home" class="brand-logo center blue-grey-text text-lighten-5">Veteran Services</a>
            <ul class="right">
                <li><a href="add" class="waves-effect waves-light btn grey modal-trigger">Add Client</a></li>
            </ul>
        </div>
    </nav>
</div>
<br>
<div class="buttons" style="text-align: center;">
    <a class="btn grey darken-1" onclick="showDiv('agechart', this)">Age</a>
    <a class="btn grey darken-1" onclick="showDiv('coschart', this)">Character of Service</a>
    <a class="btn grey darken-1" onclick="showDiv('disabilitychart', this)">Disability Status</a>
    <a class="btn grey darken-1" onclick="showDiv('dlchart', this)">Drivers License</a>
    <a class="btn grey darken-1" onclick="showDiv('incchart', this)">Income Level</a>
    <a class="btn grey darken-1" onclick="showDiv('snrchart', this)">Senior Citizenship</a>
</div>
<br>
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


<!--<a href="home" class="back">
    <button style="cursor: pointer" id="back">Back</button>
</a>-->
</body>
</html>
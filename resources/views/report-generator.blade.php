<html>
<head>
    <title>Generate Report</title>
    <meta name="description" content="" />
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <link href="/css/homepage.css" rel="stylesheet" type="text/css" />
    <!--   Free Website Template by t o o p l a t e . c o m   -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var age = <?php echo $age; ?>;
        var cos = <?php echo $cos; ?>;
        google.charts.load('current', {'packages':['bar']});
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data1 = google.visualization.arrayToDataTable(age);
            var data2 = google.visualization.arrayToDataTable(cos);

            var options1 = {
              chart: {
                title: 'Veteran Age Report',
                subtitle: 'Age range of veterans',
              },
              chartArea:{
                width:800,
                height: 500
              },
              bars: 'horizontal' // Required for Material Bar Charts.
            };


            var options2 = {
              title: 'Combat Zone'
            };


            var container1 = document.getElementById('agechart');
            container1.style.display = 'block';
            var container2 = document.getElementById('coschart');
            container2.style.display = 'block';


            var chart1 = new google.charts.Bar(container1);
            var chart2 = new google.visualization.PieChart(container2);
            
            google.visualization.events.addListener(chart1, 'ready', function () {
                container1.style.display = 'none';
            });
            google.visualization.events.addListener(chart2, 'ready', function () {
                container2.style.display = 'none';
            });
            chart1.draw(data1, options1);
            chart2.draw(data2, options2);
        }

        function showDiv(id) {
            var x = document.getElementById(id);
            if (x.style.display === "none") {
                x.style.visibility = 'visible';
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

    </script>
</head>

<body>
    <div id="wrapper">
        <header>
            <h1 class="title"><h2>Report Generator</h2></h1>
            <!--<div id="logout"><h2><a style="cursor: pointer" href="../index.php">Back
            </a></h2></div>
            <div id="logout"><h2><a href="../index.php?action=logout">Log Out</a></h2></div>-->
        </header>
        <br>
        <!--th>Last Name</th>
                <th>First Name</th>
                <th>Age</th>
                <th>Branch</th>
                <th>Disability Status</th>
                <th>Senior Citizenship</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Character of Service</th>
                <th>Healthcare ID Status</th>
                <th>Valid ID</th>
                <th>Income Level</th>
                <th>Benefits</th>
                <th>Address</th>
                <th>Drivers License</th>
                <th>Employment Status</th>
                <th>Background</th>
                <th>Combat Zone Service</th>-->
        <div id="agechart" style="width: 900px; height: 500px;"></div>
        <div id="coschart" style="width: 900px; height: 500px;"></div>

        <h3>Choose the fields you would like to generate in the report</h3>
        <input type="button" name="answer" value="Age" onclick="showDiv('agechart')"/>
        <input type="button" name="answer" value="Character of Service" onclick="showDiv('coschart')"/>
        <input type="checkbox" id="report" name="branch" value="branch"><p>Branch</p>
        <input type="checkbox" id="report" name="disability_status" value="disability_status"> <p>Disability Status</p>
        <input type="checkbox" id="report" name="Combat Zone Service" value="combat_zone"> <p>Combat Zone</p>
        
        <form action="." method="post">
            <a href="generate" target="_blank">
                <p> Generate!</p>
            </a>
        </form>
    </div>

    <!--<a href="../index.php" class="back">
        <button style="cursor: pointer" id="back">Back</button>
    </a>-->
</body>
</html>
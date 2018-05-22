<html>
<head>
    <title>Veterans Services Database</title>
    <meta name="description" content="" />
    <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
    <link href="{{ URL::asset('css/materialize.min.css') }}" rel="stylesheet" type="text/css"  media="screen,projection" />
    <!--<link href="css/homepage.css" rel="stylesheet" type="text/css" />-->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">

        body {
            background-color: #eceff1

        }
    </style>

    <link rel="stylesheet" href="css/style.css">
</head>
<body id="background">
<div class="navbar-fixed">
    <nav>
        <div class="black nav-wrapper">
            <a href="home" class="brand-logo center blue-grey-text text-lighten-5">Veteran Services</a>
            <ul class="right">
                <li><a href="add" class="waves-effect waves-light btn grey">Add Client</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="container">
    <div class="section">
        <div class="row">
            <br>
            <br>
            <div class="col s6">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/Clients.jpg') }}">
                        <span class="card-title"><b>Clients</b></span>
                    </div>
                    <div class="card-content">
                        <p>Information and data for all Veterans Services clients.</p>
                    </div>
                    <div class="card-action">
                        <a href="clientlist" class="black-text">View</a>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/Report.jpg') }}">
                        <span class="card-title black-text"><b>Reports</b></span>
                    </div>
                    <div class="card-content">
                        <p>Generate reports based on various metrics.</p>
                    </div>
                    <div class="card-action">
                        <a href="report-generator" class="black-text">Report</a>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/Visits.jpg') }}">
                        <span class="card-title black-text"><b>Visits</b></span>
                    </div>
                    <div class="card-content">
                        <p>Log the visits of clients.</p>
                    </div>
                    <div class="card-action">
                        <a href="logvisit" class="black-text">Log Visit</a>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-image">
                        <img src="{{ URL::asset('images/Search.jpg') }}">
                        <span class="card-title"><b>Search</b></span>
                    </div>
                    <div class="card-content">
                        <p>Search the database of clients.</p>
                    </div>
                    <div class="card-action">
                        <a href="search" class="black-text">Search</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
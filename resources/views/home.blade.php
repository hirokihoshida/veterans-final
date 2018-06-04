<html>
<head>
    <meta charset="UTF-8">
    <title>Veteran Services</title>
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
</head>

<body>
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
                        <a href="notifications" class="black-text">Notifications</a>
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
                        <a href="admin-tools" class="black-text">Admin Tools</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
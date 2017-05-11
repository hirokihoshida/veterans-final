<html>
    <head>
        <title>Veterans Services Database</title>
        <meta name="description" content="" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="header">
            <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
            <h1 class="client-header" style="margin-bottom: 40px">Report</h1>
        </div>

        <div class="container">
            <h3>Number of clients currently in the database: {{ \DB::table('client')->count() }}</h3>
            <h3>Number of visits serviced in the current month: {{ \App\Client::visitsInPastMonth() }}</h3>
            <h3>Number of visits serviced in the current year: {{ \App\Client::visitsInPastYear() }}</h3>
        </div>
    </body>
</html>

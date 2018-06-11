<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="header">
            <a class="visitlog-link" href="visitlog">View Visit Log</a>
            <button class="back-button btn-lg btn-danger" onclick="location.href='home'" type="button">Back</button>
            <h1 class="client-header" style="margin-bottom: 40px">Client Notifications</h1>
        </div>

        <div class="container table-container">
            <table class="table table-striped table-bordered table-hover">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <thead>
                    @if ($sortby == 4)
                        <th><a href="notifications/5">Name</a></th>
                    @else
                        <th><a href="notifications/4">Name</a></th>
                    @endif

                    @if ($sortby == null)
                        <th><a href="notifications/1">Last Visit</a></th>
                    @else
                        <th><a href="notifications/">Last Visit</a></th>
                    @endif

                    <th><a>Comments</a></th>

                    @if ($sortby == 8)
                        <th><a href="notifications/9">Days Since Last Visit</a></th>
                    @else
                        <th><a href="notifications/8">Days Since Last Visit</a></th>
                    @endif


                    @if ($sortby == 6)
                        <th><a href="notifications/7">Total Visits Logged</a></th>
                    @else
                        <th><a href="notifications/6">Total Visits Logged</a></th>
                    @endif
                </thead>
                <tbody>
                    @foreach($clientlist as $client)
                        @if ($client->daysSinceLastVisit == null && $client->daysSinceLastVisit !== 0)
                            <tr>
                        @elseif ($client->daysSinceLastVisit < 30)
                            <tr class="success">
                        @elseif ($client->daysSinceLastVisit < 60)
                            <tr class="warning">
                        @else
                            <tr class="danger">
                        @endif
                                <td><a href="view-client/{{ $client->client_id }}">{{ $client->name }}</a></td>
                                <td>{{ substr($client->date, 0, 10) }}</td>
                                <td>{{ $client->comments }}</td>
                                <td>{{ $client->daysSinceLastVisit }}</td>
                                @if ($client->count == null)
                                    <td>0</td>
                                @else
                                    <td>{{$client->count}}</td>
                                @endif
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
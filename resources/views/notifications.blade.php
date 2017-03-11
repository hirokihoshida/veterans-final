<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="header">
            <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
            <h1 class="client-header" style="margin-bottom: 40px">Client Notifications</h1>
        </div>

        <div class="container table-container">
            <table class="table table-striped table-bordered table-inverse table-hover">
                <col width="285">
                <col width="285">
                <col width="285">
                <col width="285">
                <col width="285">
                <thead>
                    <th><a>Last Name</a></th>
                    <th><a>First Name</a></th>
                    <th><a>Last Visit</a></th>
                    <th><a>Comments</a></th>
                    <th><a>Days Since Last Visit</a></th>
                </thead>
                <tbody>
                    @foreach($clientlist as $client)
                        @if ($client->daysSinceLastVisit == null)
                            <tr>
                        @elseif ($client->daysSinceLastVisit < 30)
                            <tr class="success">
                        @elseif ($client->daysSinceLastVisit < 60)
                            <tr class="warning">
                        @else
                            <tr class="danger">
                        @endif
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ substr($client->date, 0, 10) }}</td>
                                <td>{{ $client->comments }}</td>
                                <td>{{ $client->daysSinceLastVisit }}</td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
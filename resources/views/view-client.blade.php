<html>
    <head>
        <title>Veterans Services Database</title>
        <meta name="description" content="" />
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>
        <div class="header">
            <button class="back-button btn-lg btn-default" onclick="location.href='/notifications'" type="button">Back</button>
            <h1 class="client-header" style="margin-bottom: 40px">Visit Log for {{ $client->first_name . ' ' . $client->last_name }}</h1>
        </div>

        <div class="container table-container">
            <table class="table table-striped table-bordered table-hover">
                <col style="width:33.3%">
                <col style="width:33.3%">
                <col style="width:33.3%">
                <col style="width:10%">
                <thead>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Comments</th>
                    <th>Delete</th>
                </thead>

                <tbody>
                @foreach (\App\Visit::visitsForClient($client->id) as $visit)
                    <tr>
                        <td>{{ $visit->date }}</td>
                        <td>{{ $visit->type }}</td>
                        <td>{{ $visit->comments }}</td>
                        <td><a href="/view-client/{{ $visit->client_id }}/delete-visit/{{ $visit->id }}">
                            <img class="delete-icon" src="{{ asset('/images/red-minus-hi.png') }}">
                        </a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </body>
</html>
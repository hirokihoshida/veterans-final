<html>
    <head>
        <link href="/css/clientlist.css" rel="stylesheet" type="text/css" />
        <script src='//code.jquery.com/jquery-1.12.4.js' type='text/javascript'></script>
        <script src='https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js' type='text/javascript'></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable( {
                    scrollY:        '80vh',
                    scrollCollapse: true,
                    paging:         false
                } );
            } );
        </script>
    </head>

    <body>

        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column->COLUMN_NAME }}</th>
                @endforeach

            </tr>
            </thead>

            <tbody>
            @foreach($clientlist as $client)
                <tr>
                    <td>{{ $client->last_name }}</td>
                    <td> {{ $client->first_name }}</td>
                    <td> {{ $client->age }}</td>
                    <td> {{ $client->disability_status }}</td>
                    <td> {{ $client->senior_citizenship_status }}</td>
                    <td> {{ $client->phone_number }}</td>
                    <td> {{ $client->DD214 }}</td>
                    <td> {{ $client->valid_id_status }}</td>
                    <td> {{ $client->income_level }}</td>
                    <td> {{ $client->benefits }}</td>
                    <td> {{ $client->residence }}</td>
                    <td> {{ $client->drivers_license_status }}</td>
                    <td> {{ $client->employment_status }}</td>
                    <td> {{ $client->background }}</td>
                    <td> {{ $client->comments }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button onclick="location.href='/home'" type="button">Back</button>

    </body>
</html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    </head>
    <body>
        <div style="position:relative; width:60%; left:20%">
            <div class="header">
                <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
                <h1 class="client-header" style="margin-bottom: 40px">Data Search</h1>
            </div>
        </div>

        <div class="top-container">
            <div class="form-container">
                <div class="float-right">
                    <form method="post" id="search-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-form-label row" for="select">Select field: </label>
                            <select class="form-element" name="select" id="select" required>
                                <option value="">-- Select --</option>
                                @foreach ($columns as $column)
                                    <option value={{$column->COLUMN_NAME }}>{{ $column->COLUMN_NAME }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label row">From clients who have: </label>
                            <select class="form-element" name="where" id="select" required>
                                <option value="">-- Select --</option>
                                @foreach ($columns as $column)
                                    <option value={{$column->COLUMN_NAME }}>{{ $column->COLUMN_NAME }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label row">Of a value: </label>
                            <div class="internal">
                                <select class="form-element" name="operator" id="operator">
                                    <option value="=">Equal to</option>
                                    <option value="<">Less than</option>
                                    <option value=">">Greater than</option>
                                </select>
                                <div class="col-md-6" style="padding-left:0">
                                    <input type="text" class="form-control" name="value" style="width:200px">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="instructions-container">
                <div class="float-left">
                    <h3>Select Clause: Select field of data to retrieve</h3>
                    <h3>From Clause: Select field of data to filter clients by</h3>
                    <h3>Of Clause: Specify required value for filtered clients</h3>
                </div>
            </div>
        </div>

        <div class="button-wrapper">
            <button type="submit" form="search-form" class="back-button btn-lg btn-default">Search</button>
        </div>

        @if (!is_null($results) && !is_null($fields))

            <div class="container">
                @if ($results->isEmpty())
                    <h3>No Results</h3>
                @else
                    <a class="export-link" href="export-search">Export to Excel</a>

                    <table class="table table-striped table-bordered table-hover">
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                        <thead>
                        @foreach ($fields as $field)
                            <th>{{ $field }}</th>
                        @endforeach
                        </thead>
                        <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->$fields[0] }}</td>
                                <td>{{ $result->$fields[1] }}</td>
                                <td>{{ $result->$fields[2] }}</td>
                                <td>{{ $result->$fields[3] }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
            </div>
        @endif

        <div class="validation">
            @if (count($errors) > 0)
                <div id="display_errors">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </div>
            @endif
        </div>
    </body>
</html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

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

<form method="post" id="search-form">
    <div class="container">
        <div class="section">
            <form>
                <div class="row">
                    <div class="input-field col s6">
                        <select class="form-element" name="select" id="select" required>
                            <option value="">Select field...</option>
                            @foreach ($columns as $column)
                                <option value={{$column->COLUMN_NAME }}>{{ $column->COLUMN_NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <select class="form-element" name="where" id="select" required>
                            <option value="">From clients who have...</option>
                            @foreach ($columns as $column)
                                <option value={{$column->COLUMN_NAME }}>{{ $column->COLUMN_NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6 form-element" name="operator" id="operator">
                        <select>
                            <option value="=">Of a value equal to</option>
                            <option value="<">Of a value less than</option>
                            <option value=">">Of a value greater than</option>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="form-control" name="value">
                        <button type="submit" form="search-form" class="waves-effect grey darken-1 waves-light btn">Search</button>
                    </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</form>



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
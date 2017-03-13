<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header">
            <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
            <h1 class="client-header" style="margin-bottom: 40px">Data Search</h1>
        </div>

        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label class="col-form-label row" for="select">Select: </label>
                    <select class="form-element" name="select" id="select">
                        <option>-- Select --</option>
                        @foreach ($columns as $column)
                            <option>{{ $column->COLUMN_NAME }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>


        <div class="container">
            <table class="table table-striped table-bordered table-hover">

            </table>
        </div>
    </body>
</html>
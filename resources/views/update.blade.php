<html>
    <head>
        <title>Veterans Services Database</title>
        <meta name="description" content="" />
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <link href="/css/homepage.css" rel="stylesheet" type="text/css" />
        <!--   Free Website Template by t o o p l a t e . c o m   -->
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
            <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
            <h1 class="client-header" style="margin-bottom: 40px">Update Client</h1>
        </div>

        <div class="main-container">
            <form class='form-horizontal' role='form' method="post">
                {{ csrf_field() }}
                <div class='row'>
                    <div class='col-md-3'>
                        <div class="form-group">
                            <label for='client'>Choose Client: </label>
                            <select class='form-control' id='client' name='client' onchange='chooseClient()' required>
                                <option value="" selected>-- Select --</option>
                                @foreach (\App\Client::clientList() as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                @if (!is_null($client))
                    <div class='row'>
                        <div class='col-md-3'>
                            <div class="form-group">
                                <label for='first_name'>First Name</label>
                                <input id="first_name" name="first_name" class='form-control' type="text" value="{{ $client->first_name }}">
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-3'>
                            <div class="form-group">
                                <label for='last_name'>Last Name</label>
                                <input id="last_name" name="last_name" class='form-control' type="text" value="{{ $client->last_name }}">
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("#client option[value={{ $client->id }}]").attr("selected", "selected");
                        });
                    </script>
                @endif
            </form>
        </div>

        <script>
            function chooseClient() {
                var clientId = $("#client option:selected").val();
                window.location.href = '/update/' + clientId;
            }
        </script>
    </body>
</html>
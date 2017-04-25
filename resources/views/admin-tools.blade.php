<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    </head>

    <div class="header">
        <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
        <h1 class="client-header" style="margin-bottom: 40px">Admin Tools</h1>
    </div>

    <div class="form-container">
        <form class="form-horizontal" method="post" action="/new-user">
            <h2>Add New User</h2>
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-2">
                    <label class="float-right" for="username">Username</label>
                </div>

                <div class="col-md-8">
                    <input id="username" type="text" class="form-control" name="username" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    <label class="float-right" for="password">Password</label>
                </div>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    <label class="float-right" for="password_confirmation">Confirm Password</label>
                </div>
                <div class="col-md-8">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    <label class="float-right" for="admin">Admin</label>
                </div>
                <input type="checkbox" id="admin" name="admin" value="1">
            </div>

            <button type="submit" class="btn btn-default add-button">Add</button>

        </form>

        <div id="validation">
            @if ($added)
                <div id="added">
                    New user added successfully.
                </div>
            @endif

            @if (count($errors) > 0)
                <div id="display_errors">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="form-container">
        <h2>Manage Users</h2>
        <ul class="list-group hover">
            @foreach (\Auth::user()->adminUsersList() as $user)
                <li class="list-group-item">
                    <p class="list-text">{{ $user->username }}</p>
                    <a href="delete-user/{{ $user->id }}"><img class="delete-user" src="/images/red-minus-hi.png"></a>
                </li>
            @endforeach
        </ul>
    </div>
</html>
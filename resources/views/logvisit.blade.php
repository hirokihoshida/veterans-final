<html>
<head>

    <meta charset="UTF-8">
    <title>Search</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script>
        function showToday() {
            var today = new Date();

            var date = today.getDate();
            var month = today.getMonth();
            var hours = today.getHours();
            var minutes = today.getMinutes();
            if (date < 10) date = "0" + date;
            if (month + 1 < 10) month = "0" + (month + 1);
            if (hours > 12) hours = today.getHours() - 12;
            if (minutes < 10) minutes = "0" + today.getMinutes();


            if (today.getHours() >= 12)
                $('#PM').attr("selected", "selected");
            else
                $('#AM').attr("selected", "selected");

            var dateText = today.getFullYear() + "-" + month + "-" + date;
            $('#date').val(dateText);

            var timeText = hours + ":" + minutes;
            $('#time').val(timeText)

        }

    </script>
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
<div class="container">
    <div class="row">
        <br>
        <div class="col s12">
            <div class="card white">
                <div class="card-content">
                    <span class="card-title">Log a Visit</span>
                    <br>
                    <form method="post">
                        {{ csrf_field() }}
                        <div class="controls">

                            @if ($saved)
                                <div class="validation">
                                    <h3>Visit logged successfully.</h3>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="validation">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif

                            <br>

                            <div class="input-field col s12">
                                <select name="client">
                                    <option value="">Select Client</option>
                                    @foreach (\App\Client::clientList() as $client)
                                        <option value={{ $client->id  }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                <label>Client</label>
                            </div>
                            <div class="col s4">
                                <button id="today" onclick="showToday()" type="button" class="btn grey darken-1">Right Now</button>
                            </div>
                            <br>
                            <div class="col s4">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input id="date" type="text" name="date" class="form-control"
                                           placeholder="Input date in yyyy-mm-dd format" required>
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input id="time" type="text" name="time" class="form-control"
                                           placeholder="Input time in hh:mm format" required>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input id="type" type="text" name="type" class="form-control"
                                           placeholder="Describe type of visit">
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="form-group">
                                    <label for="form_message">Comments</label>
                                    <textarea id="form_message" name="comments" class="form-control"
                                              placeholder="Comments" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a type="submit" class="btn-flat grey-text text-darken-3 btn-success btn-send">Save</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


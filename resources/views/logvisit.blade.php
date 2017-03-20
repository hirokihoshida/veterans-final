<html>
<head>
    <link rel="stylesheet" href="/css/logvisit.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
<div class="header">
    <button class="back-button btn-lg btn-danger" onclick="location.href='/home'" type="button">Back</button>
    <h1 class="client-header" style="margin-bottom: 40px">Log Visit</h1>
</div>

<div class="container">
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <select name="client" required>
                            <option value="">-- Select --</option>
                            @foreach ($names as $name)
                                <option value={{ $name->id  }}>{{ $name->name }}</option>
                            @endforeach
                        </select>
                        {{--<input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">--}}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input id="date" type="text" name="date" class="form-control" placeholder="Input date in yyyy-mm-dd format" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="time">Date</label>
                        <input id="time" type="text" name="time" class="form-control" placeholder="Input time in hh:mm format" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input id="type" type="text" name="type" class="form-control" placeholder="Describe type of visit">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_message">Comments</label>
                        <textarea id="form_message" name="comments" class="form-control" placeholder="Comments" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-send">
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>


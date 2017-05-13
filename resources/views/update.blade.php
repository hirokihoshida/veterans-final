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
            <div id="validation">
                @if ($saved)
                    <div id="added">
                        Client saved successfully.
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

                    <div class="row">
                        <div class='col-md-3'>
                            <div class="form-group">
                                <label for='age'>Age</label>
                                <input id="age" name="age" class='form-control' type="number" value="{{ $client->age }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="branch">Branch</label>
                                <select class='form-control' name='branch' id='branch'>
                                    <option value="">-- Select --</option>
                                    <option value="Army">Army</option>
                                    <option value="Marines">Marines</option>
                                    <option value="Navy">Navy</option>
                                    <option value="Air Force">Air Force</option>
                                    <option value="Coast Guard">Coast Guard</option>
                                    <option value="Reserves">Reserves</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='disability_status'>Disability Status</label>
                                <input id="disability_status" name="disability_status" class="form-control" type="text" value="{{ $client->disability_status }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='senior_citizenship_status'>Senior Citizen Status</label>
                                <input id="senior_citizenship_status" name="senior_citizenship_status" class="form-control" type="text" value="{{ $client->senior_citizenship_status }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='email'>Email</label>
                                <input id="email" name="email" class="form-control" type="text" value="{{ $client->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='phone_number'>Phone Number</label>
                                <input id="phone_number" name="phone_number" class="form-control" type="text" value="{{ $client->phone_number }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='healthcare_id_status'>Has Healthcare ID</label>
                                <input id="healthcare_id_status" name="healthcare_id_status" class="form-control" type="checkbox" value="{{ $client->healthcare_id_status }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='income_level'>Income Level</label>
                                <input id="income_level" name="income_level" class="form-control" type="text" value="{{ $client->income_level }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='benefits'>Benefits</label>
                                <input id="benefits" name="benefits" class="form-control" type="text" value="{{ $client->benefits }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='residence'>Residence</label>
                                <input id="residence" name="residence" class="form-control" type="text" value="{{ $client->residence }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='drivers_license_status'>Drivers License Status</label>
                                <input id="drivers_license_status" name="drivers_license_status" class="form-control" type="text" value="{{ $client->drivers_license_status }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='employment_status'>Employment Status</label>
                                <input id="employment_status" name="employment_status" class="form-control" type="text" value="{{ $client->employment_status }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='background'>Background</label>
                                <input id="background" name="background" class="form-control" type="text" value="{{ $client->background }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='combat_zone_service'>Combat Zone Service</label>
                                <input id="combat_zone_service" name="combat_zone_service" class="form-control" type="text" value="{{ $client->combat_zone_service }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='char_of_service'>Character Of Service</label>
                                <input id="char_of_service" name="char_of_service" class="form-control" type="text" value="{{ $client->char_of_service }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for='comments'>Comments</label>
                                <input id="comments" name="comments" class="form-control" type="text" value="{{ $client->comments }}">
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-md-3'>
                            <div class="form-group">
                                <button onclick="deleteClient({{ $client->id }})" type="button" class="btn-lg btn-danger">Delete Client</button>
                                <button class='btn-lg btn-primary' type='submit'>Save Changes</button>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("#client option[value='{{ $client->id }}']").attr("selected", "selected");

                            $("#branch option[value='{{ $client->branch }}']").attr("selected", "selected");
                            if (parseInt("{{ $client->healthcare_id_status }}"))
                                $("#healthcare_id_status").attr("checked", "checked");
                        });

                        function deleteClient(id) {
                            if (confirm("Are you sure?")){
                                window.location.href = '/delete-client/' + id;
                            }
                        }
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
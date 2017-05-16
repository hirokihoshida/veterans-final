<!DOCTYPE html>
<head>
    <link href='http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css' rel='stylesheet'
          type='text/css'>
    <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css' rel='stylesheet'
          type='text/css'>
    <link href='http://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet'
          type='text/css'>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js'
            type='text/javascript'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js'
            type='text/javascript'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js'
            type='text/javascript'></script>
    <script src='http://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js'
            type='text/javascript'></script>
    <script
            src="http://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <style>
        .indent-small {
            margin-left: 5px;
        }
        .form-group.internal {
            margin-bottom: 0;
        }

        .panel-body {
            background: #e5e5e5;
            /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5),
            color-stop(100%, #ffffff));
            /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* IE10+ */
            background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
            /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */
            font: 600 15px "Open Sans", Arial, sans-serif;
        }
        label.control-label {
            font-weight: 600;
            color: #777;
        }

        .cleaner {
            display:block;
            height: 10px;
        }
    </style>

</head>
<body>
<div class='container'>
    <div class="header">
        <a href="clientlist">
            <button class="back-button btn-lg btn-danger" type="button">Back</button>
        </a>
        <h1 class="client-header" style="margin-bottom: 40px">Add New Client</h1>
    </div>
    <div class='panel panel-primary dialog-panel'>

        <div class='panel-body'>

            <div id="validation">
                @if ($added)
                    <div id="added">
                        Client added successfully.
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
                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='first_name last_name'>Name</label>
                    <div class='col-md-8'>
                        <div class='col-md-3'>
                            <div class='form-group internal'>
                                <input class='form-control' id='first_name' name='first_name' placeholder='First Name' type='text' required>
                            </div>
                        </div>
                        <div class='col-md-3 indent-small'>
                            <div class='form-group internal'>
                                <input class='form-control' id='last_name' name='last_name' placeholder='Last Name' type='text' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='age'>Age</label>
                    <div class='col-md-2'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='age' type='number' name='age' placeholder='Age'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='branch'>Branch</label>
                    <div class='col-md-8'>
                        <div class='col-md-3'>
                            <div class='form-group internal'>
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
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Disability Status</label>
                    <div class='col-md-2'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' name='disability_status' placeholder='Status' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='senior'>Senior Citizen</label>
                    <div class='col-md-2'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='senior' name='senior_citizenship_status' placeholder='Status' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='email phone_number'>Contact</label>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <div class='col-md-11'>
                                <input class='form-control' id='email' name='email' placeholder='Email' type='text'>
                            </div>
                        </div>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='phone_number' name='phone_number' placeholder='Phone Number' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='discharge'>Character of Service (Discharge)</label>
                    <div class='col-md-6'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id="discharge" name='character_of_service' placeholder='Character of Service' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='valid_id'>Valid ID</label>
                    <div class='col-md-6'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id="valid_id" name='valid_id' placeholder='Status' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class='control-label col-md-2 col-md-offset-2' for='healthcare'>Has Healthcare ID</label>
                    <div class="col-md-2">
                        <div class="internal">
                            <input id='healthcare' name='healthcare_id_status' placeholder='Status' type='checkbox' value="1">
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='income_level'>Income Level</label>
                    <div class='col-md-2'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='income_level' name='income_level' placeholder='Income Level' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Benefits</label>
                    <div class='col-md-6'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' name='benefits' placeholder='Benefits' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='address'>Address</label>
                    <div class='col-md-6'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' name='address' id='address' placeholder='Residence' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='license'>Drivers License</label>
                    <div class='col-md-2'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id="license" name='drivers_license_status' placeholder='Status' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='employment'>Employment Status</label>
                    <div class='col-md-2'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id='employment' name='employment_status' placeholder='Status' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='background'>Background</label>
                    <div class='col-md-6'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' id="background" name='background' placeholder='Background' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Combat Zone Service</label>
                    <div class='col-md-6'>
                        <div class='form-group internal'>
                            <div class='col-md-11'>
                                <input class='form-control' name='combat_zone_service' placeholder='Combat Zone Service' type='text'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-md-2 col-md-offset-2' for='comments'>Comments</label>
                    <div class='col-md-6'>
                        <textarea class='form-control' id='comments' name='comments' placeholder='Additional comments' rows='3'></textarea>
                    </div>
                </div>

                <div class='form-group'>
                    <div class='col-md-offset-4 col-md-3'>
                        <button class='btn-lg btn-primary' type='submit'>Add Client</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
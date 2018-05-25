<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Add Client</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css">

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

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
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

<div class='container'>
    <div>
        <h4>Add New Client</h4>
        <p>
       <form action="inserttest" method="post" id="insert_form">
                {{ csrf_field() }}
                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="form-control" />
                <br/>
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="First Name" id="first_name" class="form-control" />
                <br/>
                <label>Age</label>
                <input type="number" name="age" placeholder="Age" id="age" class="form-control" />
                <br/>
                <label>Branch</label>
                <select name="branch" id="branch" class="form-control">
                    <option value>-- Select --</option>
                    <option value="Army">Army</option>
                    <option value="Marines">Marines</option>
                    <option value="Navy">Navy</option>
                    <option value="Air Force">Air Force</option>
                    <option value="Coast Guard">Coast Guard</option>
                    <option value="Reserves">Reserves</option>
                </select>
                <br/>
                <label>Disability Status</label>
                <input type="text" name="disability_status" placeholder="Status" id="disability_status" class="form-control" />
                <br/>
                <label>Senior Citizen</label>
                <input type="text" name="senior_citizenship_status" placeholder="Status" id="senior_citizenship_status" class="form-control" />
                <br/>
                <label>Contact</label>
                <input type="text" name="email" placeholder="Email" id="email" class="form-control" />
                <br/>

                <input type="text" name="phone_number" placeholder="Phone Number" id="phone_number" class="form-control" />
                <br/>
                <label>Character of Service(Discharge)</label>
                <input type="text" name="character_of_service" placeholder="Character of Service" id="character_of_service" class="form-control" />
                <br/>
                <label>Valid ID</label>
                <input type="text" name="valid_id" placeholder="Status" id="valid_id" class="form-control" />
                <br/>
                
                <label>Has Healthcare ID</label>
                <input type="checkbox" name="healthcare_id_status" id="healthcare_id_status" class="form-control" />
                <br/>
                <label>Income Level</label>
                <input type="text" name="income_level" placeholder="Income Level" id="income_level" class="form-control" />
                <br/>
                <label>Benefits</label>
                <input type="text" name="benefits" placeholder="Benefits" id="benefits" class="form-control" />
                <br/>
                <label>Address</label>
                <input type="text" name="address" placeholder="Address" id="address" class="form-control" />
                <br/>
                <label>Drivers License</label>
                <input type="text" name="drivers_license_status" placeholder="Status" id="drivers_license_status" class="form-control" />
                <br/>
                <label>Employment Status</label>
                <input type="text" name="employment_status" placeholder="Status" id="employment_status" class="form-control" />
                <br/>
                <label>Background</label>
                <input type="text" name="background" placeholder="Background" id="background" class="form-control" />
                <br/>
                <label>Combat Zone Service</label>
                <input type="text" name="combat_zone_service" placeholder="Service" id="combat_zone_service" class="form-control" />
                <br/>
                <label>Comments</label>
                <textarea name="Comments" placeholder="Additional Comments" id="comments" class="form-control"></textarea>
                <br/>
            <button class='btn-large grey darken-1 right-align' type='submit'>Add Client</button>
        </form>
        </p>

    </div>
</div>
</body>
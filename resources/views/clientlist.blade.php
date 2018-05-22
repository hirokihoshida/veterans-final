<html>
<head>
    <title>Client List</title>
    <meta charset="UTF-8">
    <title>Search</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
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
                <li> <a class="waves-effect waves-light btn grey modal-trigger" href="#addclient">Add Client</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="container">
    <br>
    <div id="addclient" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Add New Client</h4>
            <p>
            <form action="inserttest" method="post" id="insert_form">
                {{ csrf_field() }}
                <label>Last Name</label>
                <input type="text" name="Last Name" placeholder="Last Name" id="last_name"
                       class="form-control"/>
                <br/>
                <label>First Name</label>
                <input type="text" name="First Name" placeholder="First Name" id="first_name"
                       class="form-control"/>
                <br/>
                <label>Age</label>
                <input type="number" name="Age" placeholder="Age" id="age" class="form-control"/>
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
                <input type="text" name="Disability" placeholder="Status" id="disability_status"
                       class="form-control"/>
                <br/>
                <label>Senior Citizen</label>
                <input type="text" name="Senior" placeholder="Status" id="senior_citizenship_status"
                       class="form-control"/>
                <br/>
                <label>Contact</label>
                <input type="text" name="Email" placeholder="Email" id="email" class="form-control"/>
                <br/>

                <input type="text" name="Phone Number" placeholder="Phone Number" id="phone_number"
                       class="form-control"/>
                <br/>
                <label>Character of Service(Discharge)</label>
                <input type="text" name="Character of Service" placeholder="Character of Service"
                       id="character_of_service" class="form-control"/>
                <br/>
                <label>Valid ID</label>
                <input type="text" name="Valid" placeholder="Status" id="valid_id" class="form-control"/>
                <br/>

                <label>Has Healthcare ID</label>
                <input type="checkbox" name="Healthcare Id Status" id="healthcare_id_status"
                       class="form-control"/>
                <br/>
                <label>Income Level</label>
                <input type="text" name="Income Level" placeholder="Income Level" id="income_level"
                       class="form-control"/>
                <br/>
                <label>Benefits</label>
                <input type="text" name="Benefits" placeholder="Benefits" id="benefits" class="form-control"/>
                <br/>
                <label>Address</label>
                <input type="text" name="Address" placeholder="Address" id="address" class="form-control"/>
                <br/>
                <label>Drivers License</label>
                <input type="text" name="Drivers License" placeholder="Status" id="drivers_license_status"
                       class="form-control"/>
                <br/>
                <label>Employment Status</label>
                <input type="text" name="Employment Status" placeholder="Status" id="employment_status"
                       class="form-control"/>
                <br/>
                <label>Background</label>
                <input type="text" name="Background" placeholder="Background" id="background"
                       class="form-control"/>
                <br/>
                <label>Combat Zone Service</label>
                <input type="text" name="Combat Zone Service" placeholder="Service" id="combat_zone_service"
                       class="form-control"/>
                <br/>
                <label>Comments</label>
                <textarea name="Comments" placeholder="Additional Comments" id="comments"
                          class="form-control"></textarea>
                <br/>
            </form>
            </p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancel</a>
            <a type="submit" name="insert" id="insert" class="modal-close waves-effect waves-black btn-flat" class="close" data-dismiss="modal">Insert</a>
        </div>
    </div>
    <div class="modal fade" id="new" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <a class="waves-effect waves-teal btn-flat" class="close" data-dismiss="modal">close</a>
                    <h4 class="modal-title">Add New Client</h4>
                </div>
                <div class="modal-body">
                    <form action="inserttest" method="post" id="insert_form">
                        {{ csrf_field() }}
                        <label>Last Name</label>
                        <input type="text" name="Last Name" placeholder="Last Name" id="last_name"
                               class="form-control"/>
                        <br/>
                        <label>First Name</label>
                        <input type="text" name="First Name" placeholder="First Name" id="first_name"
                               class="form-control"/>
                        <br/>
                        <label>Age</label>
                        <input type="number" name="Age" placeholder="Age" id="age" class="form-control"/>
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
                        <input type="text" name="Disability" placeholder="Status" id="disability_status"
                               class="form-control"/>
                        <br/>
                        <label>Senior Citizen</label>
                        <input type="text" name="Senior" placeholder="Status" id="senior_citizenship_status"
                               class="form-control"/>
                        <br/>
                        <label>Contact</label>
                        <input type="text" name="Email" placeholder="Email" id="email" class="form-control"/>
                        <br/>

                        <input type="text" name="Phone Number" placeholder="Phone Number" id="phone_number"
                               class="form-control"/>
                        <br/>
                        <label>Character of Service(Discharge)</label>
                        <input type="text" name="Character of Service" placeholder="Character of Service"
                               id="character_of_service" class="form-control"/>
                        <br/>
                        <label>Valid ID</label>
                        <input type="text" name="Valid" placeholder="Status" id="valid_id" class="form-control"/>
                        <br/>

                        <label>Has Healthcare ID</label>
                        <input type="checkbox" name="Healthcare Id Status" id="healthcare_id_status"
                               class="form-control"/>
                        <br/>
                        <label>Income Level</label>
                        <input type="text" name="Income Level" placeholder="Income Level" id="income_level"
                               class="form-control"/>
                        <br/>
                        <label>Benefits</label>
                        <input type="text" name="Benefits" placeholder="Benefits" id="benefits" class="form-control"/>
                        <br/>
                        <label>Address</label>
                        <input type="text" name="Address" placeholder="Address" id="address" class="form-control"/>
                        <br/>
                        <label>Drivers License</label>
                        <input type="text" name="Drivers License" placeholder="Status" id="drivers_license_status"
                               class="form-control"/>
                        <br/>
                        <label>Employment Status</label>
                        <input type="text" name="Employment Status" placeholder="Status" id="employment_status"
                               class="form-control"/>
                        <br/>
                        <label>Background</label>
                        <input type="text" name="Background" placeholder="Background" id="background"
                               class="form-control"/>
                        <br/>
                        <label>Combat Zone Service</label>
                        <input type="text" name="Combat Zone Service" placeholder="Service" id="combat_zone_service"
                               class="form-control"/>
                        <br/>
                        <label>Comments</label>
                        <textarea name="Comments" placeholder="Additional Comments" id="comments"
                                  class="form-control"></textarea>
                        <br/>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Add</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <div class="table-responsive">
        <table id="clients" class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Last Name</td>
                <td>First Name</td>
                <td>Age</td>
                <td>Branch</td>
                <td>Disability Status</td>
                <td>Senior Citizenship</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td>Character of Service</td>
                <td>HealthCare ID Status</td>
                <td>Valid ID</td>
                <td>Income Level</td>
                <td>Benefits</td>
                <td>Address</td>
                <td>Drivers License</td>
                <td>Employment Status</td>
                <td>Background</td>
                <td>Combat Zone Status</td>
                <td>Comments</td>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Client::clientList() as $client)
                <tr>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $client->age }}</td>
                    <td>{{ $client->branch }}</td>
                    <td>{{ $client->disability_status }}</td>
                    <td>{{ $client->senior_citizenship_status }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->character_of_service }}</td>
                    <td>{{ $client->healthcare_id_status }}</td>
                    <td>{{ $client->valid_id }}</td>
                    <td>{{ $client->income_level }}</td>
                    <td>{{ $client->benefits }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->drivers_license_status }}</td>
                    <td>{{ $client->employment_status }}</td>
                    <td>{{ $client->background }}</td>
                    <td>{{ $client->combat_zone_service }}</td>
                    <td>{{ $client->comments }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#clients').DataTable();
    });  </script>

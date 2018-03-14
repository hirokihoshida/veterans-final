<html>
<head>
<title>Sample Database</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> 
</head>
<body>
<div class = "container">
    <h3 align="center">Datatable sample mysql</h3>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#new">New</button>
      <div class="modal fade" id="new" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Client</h4>
        </div>
        <div class="modal-body">
            <form action="inserttest" method="post" id="insert_form">
                {{ csrf_field() }}
                <label>Last Name</label>
                <input type="text" name="Last Name" placeholder="Last Name" id="last_name" class="form-control" />
                <br/>
                <label>First Name</label>
                <input type="text" name="First Name" placeholder="First Name" id="first_name" class="form-control" />
                <br/>
                <label>Age</label>
                <input type="number" name="Age" placeholder="Age" id="age" class="form-control" />
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
                <input type="text" name="Disability" placeholder="Status" id="disability_status" class="form-control" />
                <br/>
                <label>Senior Citizen</label>
                <input type="text" name="Senior" placeholder="Status" id="senior_citizenship_status" class="form-control" />
                <br/>
                <label>Contact</label>
                <input type="text" name="Email" placeholder="Email" id="email" class="form-control" />
                <br/>

                <input type="text" name="Phone Number" placeholder="Phone Number" id="phone_number" class="form-control" />
                <br/>
                <label>Character of Service(Discharge)</label>
                <input type="text" name="Character of Service" placeholder="Character of Service" id="character_of_service" class="form-control" />
                <br/>
                <label>Valid ID</label>
                <input type="text" name="Valid" placeholder="Status" id="valid_id" class="form-control" />
                <br/>
                
                <label>Has Healthcare ID</label>
                <input type="checkbox" name="Healthcare Id Status" id="healthcare_id_status" class="form-control" />
                <br/>
                <label>Income Level</label>
                <input type="text" name="Income Level" placeholder="Income Level" id="income_level" class="form-control" />
                <br/>
                <label>Benefits</label>
                <input type="text" name="Benefits" placeholder="Benefits" id="benefits" class="form-control" />
                <br/>
                <label>Address</label>
                <input type="text" name="Address" placeholder="Address" id="address" class="form-control" />
                <br/>
                <label>Drivers License</label>
                <input type="text" name="Drivers License" placeholder="Status" id="drivers_license_status" class="form-control" />
                <br/>
                <label>Employment Status</label>
                <input type="text" name="Employment Status" placeholder="Status" id="employment_status" class="form-control" />
                <br/>
                <label>Background</label>
                <input type="text" name="Background" placeholder="Background" id="background" class="form-control" />
                <br/>
                <label>Combat Zone Service</label>
                <input type="text" name="Combat Zone Service" placeholder="Service" id="combat_zone_service" class="form-control" />
                <br/>
                <label>Comments</label>
                <textarea name="Comments" placeholder="Additional Comments" id="comments" class="form-control"></textarea>
                <br/>

        </div>
        <div class="modal-footer">
            <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success" />
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Add</button>-->
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<div class= "table-responsive">
        <table id = "clients" class = "table table-striped table-bordered">
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
            <?php
            while($row = mysqli_fetch_array($result))
            {
                echo '
                <tr>
                    <td>'.$row["last_name"].' </td>
                    <td>'.$row["first_name"].' </td>
                    <td>'.$row["age"].' </td>
                    <td>'.$row["branch"].' </td>
                    <td>'.$row["disability_status"].' </td>
                    <td>'.$row["senior_citizenship_status"].' </td>
                    <td>'.$row["email"].' </td>
                    <td>'.$row["phone_number"].' </td>
                    <td>'.$row["character_of_service"].' </td>
                    <td>'.$row["healthcare_id_status"].' </td>
                    <td>'.$row["valid_id"].' </td>
                    <td>'.$row["income_level"].' </td>
                    <td>'.$row["benefits"].' </td>
                    <td>'.$row["address"].' </td>
                    <td>'.$row["drivers_license_status"].' </td>
                    <td>'.$row["employment_status"].' </td>
                    <td>'.$row["background"].' </td>
                    <td>'.$row["combat_zone_service"].' </td>
                    <td>'.$row["comments"].' </td>
                </tr>   
                ';
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){  
      $('#clients').DataTable();  
 });  </script>

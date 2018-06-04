<html>
<head>
<title>Sample Database</title>
 <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> 
    <script>
        $(document).ready(function() {
            $('#clients').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
</head>
<body>
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
<div class = "container">
    <h3 align="center">Veterans Clientlist</h3>
    


<div class= "table-responsive">
        <h3>Export to:</h3>
        <table id = "clients" class = "table table-striped table-bordered">
             <thead>
            <tr>
                
                <th>Last Name</th>
                <th>First Name</th>
                <th>Age</th>
                <th>Branch</th>
                <th>Disability Status</th>
                <th>Senior Citizenship</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Character of Service</th>
                <th>Healthcare ID Status</th>
                <th>Valid ID</th>
                <th>Income Level</th>
                <th>Benefits</th>
                <th>Address</th>
                <th>Drivers License</th>
                <th>Employment Status</th>
                <th>Background</th>
                <th>Combat Zone Service</th>
                <th>Comments</th>
                
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
    $(document).ready(function(){  
      $('#clients').DataTable();  
 });  </script>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            .form-element {
                display: block;
                padding: 10px;
            }

            .text-field {
                display: inline;
            }
        </style>
    </head>
    <body>
        <h1 class="a">Add New Client</h1>
        <h3>Fill out all the fields to add a new veteran client to the database.</h3>
        <div id="form-container">
            <form method="post">

                <div class="form-element">
                    <p class="text-field">First Name: </p><input class="text-field" type="text" name="first_name" required="required">
                </div>
                <div class="form-element">
                    <p class="text-field">Last Name: </p><input class="text-field" type="text" name="last_name" required="required">
                </div>
            </form>
        </div>
    </body>
</html>
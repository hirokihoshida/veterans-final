<html>
    <head>
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
                <div class="form-element">
                    <p class="text-field">Age: </p><input class="text-field" type="text" name="age">
                </div>
                <div class="form-element">
                    <p class="text-field">Disability Status: </p><input class="text-field" type="text" name="disability_status">
                </div>
                <div class="form-element">
                    <p class="text-field">Senior Citizenship Status: </p><input class="text-field" type="text" name="senior_citizenship_status">
                </div>
                <div class="form-element">
                    <p class="text-field">Phone Number: </p><input class="text-field" type="text" name="phone_number">
                </div>
                <div class="form-element">
                    <p class="text-field">DD 214: </p><input class="text-field" type="text" name="DD214">
                </div>
                <div class="form-element">
                    <p class="text-field">Valid ID Status: </p><input class="text-field" type="text" name="valid_id_status">
                </div>
                <div class="form-element">
                    <p class="text-field">Income Level: </p><input class="text-field" type="text" name="income_level">
                </div>
                <div class="form-element">
                    <p class="text-field">Benefits: </p><input class="text-field" type="text" name="benefits">
                </div>
                <div class="form-element">
                    <p class="text-field">Residence: </p><input class="text-field" type="text" name="residence">
                </div>
                <div class="form-element">
                    <p class="text-field">Drivers License Status: </p><input class="text-field" type="text" name="drivers_license_status">
                </div>
                <div class="form-element">
                    <p class="text-field">Employment Status: </p><input class="text-field" type="text" name="employment_status">
                </div>
                <div class="form-element">
                    <p class="text-field">Background: </p><input class="text-field" type="text" name="background">
                </div>
                <div class="form-element">
                    <p class="text-field">Comments: </p><textarea class="text-field" name="comments"></textarea>
                </div>
                <input type="submit">
            </form>
        </div>
    </body>
</html>
<html>
<head>
    <title>Veterans Services Database</title>
    <meta name="description" content="" />
    <link href="/css/homepage.css" rel="stylesheet" type="text/css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body id="background">

<button class='back-button btn-lg btn-danger' onclick="location.href='/logout'">Logout</button>


<div id="tooplate_wrapper">
    <div id="tooplate_header">
        <div id="site_title"><h1 class="text-align-center">Bergen County Veterans Services Database</h1></div>
    </div>

    <div id="tooplate_main">

        <div id="tooplate_content">

            <div class="col_w900">
                <a href='/clientlist' class="col_allw280 fp_service_box">
                    <div class="con_tit_01">List of Clients</div>
                    <img src="/images/timeline-list-grid-list-icon.png" alt="Image 15" />
                    <p>Table of information and data for all Bergen County Veterans Services clients.</p>
                </a>

                <a href='/update' class="col_allw280 fp_service_box">
                    <div class="con_tit_01">Update Client Info</div>
                    <img src="/images/approve_and_update1600.png" alt="Image 08" />
                    <p>Create and add a new client and all of his veteran info to the database.</p>
                </a>

                <a href='/notifications' class="col_allw280 fp_service_box col_last">
                    <div class="con_tit_01">Notifications</div>
                    <img src="/images/Apps-Notifications-icon.png" alt="Image 16" />
                    <p>View updates for clients with overdue visits.</p>
                </a>

                <a href='/report' class="col_allw280 fp_service_box">
                    <div class="con_tit_01">Report Generator</div>
                    <img src="/images/onebit_16.png" alt="Image 16" />
                    <p>Generate statistics reports for presentation.</p>
                </a>

                <a href='/search' class="col_allw280 fp_service_box">
                    <div class="con_tit_01">Data Search</div>
                    <img src="/images/search-icon.png" alt="Image 18" />
                    <p>Retrieve customized data on veterans from the database.</p>
                </a>

                <a href='/logvisit' class="col_allw280 fp_service_box col_last">
                    <div class="con_tit_01">Log Visit</div>
                    <img src="/images/Notepad-512.png" alt="Image 18" />
                    <p>Log the details of a client visit.</p>
                </a>

                <div class="cleaner"></div>

            </div>

        </div> <!-- end of content -->

        @if (\Auth::user()->admin)
            <div class="admin-container">
                <a id="admin-tools-link" href="{{ route('admin-tools') }}">Admin Tools</a>
            </div>
        @endif

    </div> <!-- end of main -->

</div> <!-- end of wrapper -->

</body>
</html>
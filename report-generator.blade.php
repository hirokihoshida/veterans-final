<html>
<head>
    <title>Generate Report</title>
    <link rel="stylesheet" type="text/css" href="../../../shared/ss/main.css<?php echo(getVersionString()); ?>">
    <link rel="stylesheet" type="text/css" href="styles.css<?php echo(getVersionString()); ?>">
    <script src="http://code.jquery.com/jquery.js<?php echo(getVersionString()); ?>"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <h1 class="title"><h2>Report Generator</h2></h1>
            <!--<div id="logout"><h2><a style="cursor: pointer" href="../index.php">Back
            </a></h2></div>
            <!--<div id="logout"><h2><a href="../index.php?action=logout">Log Out</a></h2></div>-->
        </header>
        <br>
        <form action="." method="post">
            <table>
                <tr>
                    <td>
                        <a href="./index.php?action=generate-session-signins" target="_blank">
                            <div class="feature">
                                <h2>Session Sign In Sheets</h2>
                                <p>Generates sign in sheets for each presentation.</p>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="./index.php?action=generate-mentor-signin" target="_blank">
                            <div class="feature">
                                <h2>Mentor Sign In Sheet</h2>
                                <p>Generates sign in sheet for mentors.</p>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="./index.php?action=generate-room-signs" target="_blank">
                            <div class="feature">
                                <h2>Room Signs</h2>
                                <p>Generates the room signs.</p>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!--<a href="../index.php" class="back">
        <button style="cursor: pointer" id="back">Back</button>
    </a>-->
</body>
</html>
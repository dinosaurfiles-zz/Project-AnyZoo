<html>

<body>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "ZooDB";
        $dbconn = mysqli_connect($host,$user,$pass,$db) or die("Could not connect to database!");   

        mysqli_select_db($dbconn,'Cage');

        $query="SELECT * FROM Cage";
        $result=mysqli_query($dbconn,$query);
        $rownum=mysqli_num_rows($result);

    ?>
        <!DOCTYE HTML>
        <html>

        <head>
            <meta charset="utf-8">
            <title> Framework Test page</title>
            <link href="asset/css/main.css" rel="stylesheet" type="text/css">
        </head>

        <body style="; background-color: #F6F9FA;">
            <h1 style="text-align: center">Cage Table</h1>
            <div class="row">
                <div class="col-2" style="text-align: left;background-color: #D6DAF0;">
                    <h3 style="text-align: center;">Options</h3>
                    <ul>
                        <li><a href="cageadd.php">Add</a></li>
                        <li>Drop All Data</li>
                    </ul>
                </div>

                <div class="col-8" style="text-align: center;">
                    <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr>
                            <th>Cage No</th>
                            <th>Station ID</th>
                            <th>Cage Type</th>
                            <th>Options</th>
                        </tr>
                        <style>
                            td {
                                text-align: center;
                            }
                        </style>
                        <?php
                while($row=mysqli_fetch_assoc($result)){    
            ?>
                            <tr>
                                <td><?php echo $row['Cage_No']?></td>
                                <td><?php echo $row['Station_ID']?></td>
                                <td><?php echo $row['Cage_Type']?></td>
                                <td><p><a href="cageedit.php?cageno=<?php echo $row['Cage_No']?>">Edit</a> <a href="cagedelete.php?cageno=<?php echo $row['Cage_No']?>">Delete</a></p></td>
                            </tr>

                            <?php 
                }    
            ?>
                    </table>
                </div>
                <div class="col-2" style="background-color: #D6DAF0;">
                    <h3 style="text-align: center;">Tables</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="cage.php">Cage</a></li>
                        <li><a href="animal.php">Animal</a></li>
                        <li><a href="animalclass.php">Animal Class</a></li>
                        <li><a href="staff.php">Staff</a></li>
                        <li><a href="shift.php">Shift</a></li>
                        <li><a href="station.php">Station</a></li>
                        <li><a href="animalsearch.php">Search For Animals</a></li>
                    </ul>

                </div>
            </div>
        </body>

        </html>
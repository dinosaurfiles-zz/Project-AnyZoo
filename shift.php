<html>

<body>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "ZooDB";
        $dbconn = mysqli_connect($host,$user,$pass,$db) or die("Could not connect to database!");   

        mysqli_select_db($dbconn,'Shift');

        $query="SELECT * FROM Shift_Assignment NATURAL JOIN (SELECT Staff_ID, Staff_Name FROM Staff) as StaffNames;";
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
            <h1 style="text-align: center">Shift Table</h1>
            <br>
            <p style="text-align: center; margin-top: -30px;margin-bottom: -5px;">*Note: 0600H = 6AM, 1500H = 3PM, etc.</p>
            <div class="row">
                <div class="col-2" style="text-align: left;background-color: #D6DAF0;">
                    <h3 style="text-align: center;">Options</h3>
                    <ul>
                        <li><a href="shiftadd.php">Add</a></li>
                        <li>Drop All Data</li>
                    </ul>
                </div>

                <div class="col-8" style="text-align: center;">
                    <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr>
                            <th>Staff ID</th>
                            <th>Staff Name</th>
                            <th>Station ID</th>
                            <th>Start Time</th>
                            <th>End Time</th>
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
                                <td><?php echo $row['Staff_ID']?></td>
                                <td><?php echo $row['Staff_Name']?></td>
                                <td><?php echo $row['Station_ID']?></td>
                                <td><?php echo $row['StartTime']?>H</td>
                                <td><?php echo $row['EndTime']?>H</td>
                                <td><p><a href="shiftedit.php?shiftid=<?php echo $row['Shift_ID']?>">Edit</a> <a href="shiftdelete.php?shiftid=<?php echo $row['Shift_ID']?>"> Delete</a></p></td>
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
<?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    
    $get_Station_ID = $_GET["stationid"];
    //echo $get_Station_ID;
    $sql_Query="SELECT * FROM (SELECT DISTINCT Staff_ID FROM Shift_Assignment WHERE Station_ID='$get_Station_ID')AS StaffonStation NATURAL JOIN Staff;";
    $pass_Query = mysqli_query($dbconn, $sql_Query);
        
?>
<html>
    <head>
        <meta charset="utf-8">
            <title> Framework Test page</title>
            <link href="asset/css/main.css" rel="stylesheet" type="text/css">
        </head>
<body style="; background-color: #F6F9FA;">
            <h1 style="text-align: center">Details of Station <u><?php echo $get_Station_ID; ?></u></h1>
        <div class="row">
            <div class="row">
                <div class="col-2" style="text-align: left;background-color: #D6DAF0;">
                    <h3 style="text-align: center;">Options</h3>
                    <ul>
                        <li><a href="shiftadd.php">Add</a></li>
                        <li>Drop All Data</li>
                    </ul>
                </div>

                <div class="col-8" style="text-align: center;">
                    <p style="text-align: left;">Assigned Staff:</p>
                    <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr>
                            <th>Staff ID</th>
                            <th>Staff Name</th>
                            <th>Staff Type</th>
                        </tr>
                        <style>
                            td {
                                text-align: center;
                            }
                        </style>
            <?php
                while($results_Query = mysqli_fetch_assoc($pass_Query)) {    
            ?>
                            <tr>
                                <td><?php echo $results_Query['Staff_ID']?></td>
                                <td><?php echo $results_Query['Staff_Name']?></td>
                                <td><?php echo $results_Query['Staff_Type']?></td>
                            </tr>

                            <?php 
                }    
            ?>
                    </table>
                    
                    <br>
                    <p style="text-align: left;">Animals:</p>
                    <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr>
                            <th>Cage No</th>
                            <th>Cage Type</th>
                            <th>Animal ID</th>
                            <th>Animal Nick</th>
                            <th>Gender</th>
                            <th>Animal Classification</th>
                        </tr>
                        <style>
                            td {
                                text-align: center;
                            }
                        </style>
            <?php
                $sql_animalQuery="SELECT * FROM (SELECT Cage_No, Cage_Type FROM Cage WHERE Station_ID='$get_Station_ID') as CageonStation NATURAL JOIN Animals ORDER BY(Cage_No);";
                $pass_animalQuery = mysqli_query($dbconn, $sql_animalQuery);
                while($results_animalQuery = mysqli_fetch_assoc($pass_animalQuery)) {    
            ?>
                            <tr>
                                <td><?php echo $results_animalQuery['Cage_No']?></td>
                                <td><?php echo $results_animalQuery['Cage_Type']?></td>
                                <td><?php echo $results_animalQuery['Animal_ID']?></td>
                                <td><?php echo $results_animalQuery['Animal_Nick']?></td>
                                <td><?php echo $results_animalQuery['Gender']?></td>
                                <td><?php echo $results_animalQuery['Animal_ClassID']?></td>
                                
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
        </div>
    </body>
</html>
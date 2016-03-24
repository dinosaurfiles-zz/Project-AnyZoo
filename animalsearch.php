<?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
?>
<html>
    <head>
        <meta charset="utf-8">
            <title> Framework Test page</title>
            <link href="asset/css/main.css" rel="stylesheet" type="text/css">
        </head>
<body style="; background-color: #F6F9FA;">
            <h1 style="text-align: center">Details of Station <u> </u></h1>
        <div class="row">
            <div class="row">
                <div class="col-2" style="text-align: left;background-color: #D6DAF0;">
                    <h3 style="text-align: center;">Options</h3>
                    <ul>

                    </ul>
                </div>

                <div class="col-8" style="text-align: center;">
                    <form method="get" action="animalsearch.php">
                        <label for="search">Enter Animal Nickname Keyword/s: </label>
                        <br>
                        <input type="search" name="searchword" autofocus>
                        <input type="submit" name="search" value="Search">
                        
                    </form>
                    
                    <?php
                        if(isset($_GET['search'])){
                            $Animal_Nick = $_GET['searchword'];
                            echo "Searching for keyword: ". $Animal_Nick;
                            $sql_detailsearch = "SELECT * FROM (SELECT * FROM Animals WHERE Animal_Nick LIKE '%$Animal_Nick%') as FindAnimal NATURAL JOIN Cage";
                            $pass_detailsearch = mysqli_query($dbconn, $sql_detailsearch);
                    ?>
                        <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr>
                            <th>Station ID</th>
                            <th>Cage No : Cage Type</th>
                            <th>Animal ID</th>
                            <th>Animal Nick</th>
                            <th>Gender</th>
                            <th>Animal Classification</th>
                        </tr> 
                    <?php
                            $results_detailsearch = mysqli_fetch_assoc($pass_detailsearch);
                    ?>
                        <tr style="text-align: center;">
                            <td><?php echo $results_detailsearch['Station_ID']?></td>
                            <td><?php echo $results_detailsearch['Cage_No']?> : <?php echo $results_detailsearch['Cage_Type']?></td>
                            <td><?php echo $results_detailsearch['Animal_ID']?></td>
                            <td><?php echo $results_detailsearch['Animal_Nick']?></td>
                            <td><?php echo $results_detailsearch['Gender']?></td>
                            <td><?php echo $results_detailsearch['Animal_ClassID']?></td>
                        </tr>
                        </table>        
                        <p style="text-align: left;">Caretaker and Veterinarian Assigned:</p>
                    <?php
                        $Station_ID = $results_detailsearch['Station_ID'];
                        $sql_vetcare = "SELECT * FROM (SELECT DISTINCT Staff_ID FROM Shift_Assignment WHERE Station_ID='$Station_ID')AS StaffonStation NATURAL JOIN Staff WHERE Staff_Type='Caretaker' OR Staff_Type='Veterinarian';";
                        $pass_vetcare = mysqli_query($dbconn, $sql_vetcare);
                    ?>
                        <table border="1" style="width: 100%; margin-top: 10px;">
                            <tr>
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Staff Type</th>
                            </tr> 
                            
                    <?php
                        while ( $results_vetcare = mysqli_fetch_assoc($pass_vetcare)){
                    ?>
                            <tr style="text-align: center;">
                             <td><?php echo $results_vetcare['Staff_ID']?></td>    
                             <td><?php echo $results_vetcare['Staff_Name']?></td>
                             <td><?php echo $results_vetcare['Staff_Type']?></td>
                    <?php
                        }
                    ?>
                            </tr>
                        </table>
                    <?php        
                        }
                    ?>
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
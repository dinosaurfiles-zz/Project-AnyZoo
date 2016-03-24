<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    $selectstationid="SELECT Station_ID FROM Station";
    $selectresult=mysqli_query($dbconn,$selectstationid);
    $selectstaffid="SELECT Staff_ID, Staff_Type FROM Staff";
    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
    
    
    if(isset($_GET['add'])){ 
        $Staff_ID=$_GET["staffid"];
        $Station_ID=$_GET["stationid"];
        $StartTime=$_GET["starttime"];
        $EndTime=$_GET["endtime"];
     
        $add="INSERT INTO Shift_Assignment VALUES(NULL, '$Staff_ID', '$Station_ID', '$StartTime', '$EndTime')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
        if($affectedrows==1){
                header("Location:shift.php");
        }
    }
   
    ?>
    <h4>Assign New Shift to Staff</h4>
        <form method="get" action="shiftadd.php">
            <label for="staffid">Staff ID:</label>
            <select name="staffid">
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name FROM Staff WHERE Staff_Type='Caretaker'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Caretaker">
                <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name, Staff_Name FROM Staff WHERE Staff_Type='Cashier'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Cashier">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name FROM Staff WHERE Staff_Type='Manager'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Manager">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name FROM Staff WHERE Staff_Type='Veterinarian'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Veterinarian">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
            </select> 
            <br>
            <label for="stationid">Station ID:</label>
            <select name="stationid">
            <?php while($selectresultrow=mysqli_fetch_assoc($selectresult)){  ?>
                <option value="<?php echo $selectresultrow['Station_ID'] ?>"><?php echo $selectresultrow['Station_ID'] ?></option>
            <?php } ?>
            </select> 
            <br>
            <label for="starttime">Start Time: </label>
            <input type="text" name="starttime">
            <br>
            <label for="endtime">End Time: </label>
            <input type="text" name="endtime">
            <br>
            <input type="submit" name="add" value="Add">
            <a href="#">Home</a>
        </form>
</body>
</html>

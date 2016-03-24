<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    if(isset($_GET['update'])){ 
        $Shift_ID=$_GET["shiftid"];
        $Staff_ID=$_GET["staffid"];
        $Station_ID=$_GET["stationid"];
        $StartTime=$_GET["starttime"];
        $EndTime=$_GET["endtime"];
     
        $update_Query = "UPDATE Shift_Assignment SET Staff_ID='$Staff_ID', Station_ID='$Station_ID', StartTime='$StartTime', EndTime='$EndTime' WHERE Shift_ID='$Shift_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);
        header("Location:shift.php");
    }else {
        $edit_Shift_ID = $_GET["shiftid"];
        $edit_Query="SELECT * FROM Shift_Assignment WHERE Shift_ID=$edit_Shift_ID";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
    }
    ?>
    
    <h4>Editing Shift Assignment: #<u><?php echo $edit_Shift_ID?></u></h4>
         <form method="get" action="shiftedit.php">
             <input type="hidden" name="shiftid" value="<?php echo $edit_Shift_ID?>" >
            <label for="staffid">Staff ID:</label>
            <select name="staffid">
                <?php
                    $selectstaffid="SELECT Staff_ID FROM Staff WHERE Staff_Type='Caretaker'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Caretaker">
                <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID FROM Staff WHERE Staff_Type='Cashier'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Cashier">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID FROM Staff WHERE Staff_Type='Manager'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Manager">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID FROM Staff WHERE Staff_Type='Veterinarian'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Veterinarian">
            <?php 
                    $selectstationid="SELECT Station_ID FROM Station";
                    $selectresult=mysqli_query($dbconn,$selectstationid);
                    while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?></option>
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
            <input type="text" name="starttime" value="<?php echo $edit_Results['StartTime'] ?>">
            <br>
            <label for="endtime">End Time: </label>
            <input type="text" name="endtime" value="<?php echo $edit_Results['EndTime'] ?>">
            <br>
            <input type="submit" name="update" value="Save">
            <a href="#">Home</a>
        </form>
</body>
</html>

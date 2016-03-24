<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    mysqli_select_db($dbconn,'Station');
    
    if(isset($_GET['update'])){ 
        $Station_ID=$_GET["stationid"];
        $Station_Name=$_GET["stationname"];
     
        $update_Query = "UPDATE Station SET Station_Name='$Station_Name' WHERE Station_ID='$Station_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1)
            header("Location:station.php");
    }else {
        $edit_Station_ID = $_GET["station_id"];
        $edit_Query="SELECT Station_Name FROM Station where Station_ID='$edit_Station_ID'";
        $edit_Pass_Query = mysqli_query($dbconn,$edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
    
    <h4>Edit Station <u><?php echo $edit_Station_ID?></u></h4>
        <form method="get" action="stationedit.php">
            <input type="hidden" name="stationid" value="<?php echo $edit_Station_ID?>" >
            <label for="stationname">Station Name: </label>
            <input type="text" name="stationname" value="<?php echo $edit_Results['Station_Name']?>">
            <br>
            <input type="submit" name="update" value="Save">
            <a href="#">Home</a>
        </form>
</body>
</html>

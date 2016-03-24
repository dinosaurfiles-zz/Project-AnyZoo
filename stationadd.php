<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    mysqli_select_db($dbconn,'Station');
    
    if(isset($_GET['submit'])){ 
    $Station_ID=$_GET["stationid"];
    $Station_Name=$_GET["stationname"];
     
        $new="INSERT INTO Station values('$Station_ID','$Station_Name')";
        mysqli_query($dbconn,$new);
        $affectedrows = mysqli_affected_rows($dbconn);
        
    if($affectedrows==1)
            header("Location:station.php");
    }
   
    ?>
    <h4>Add New Station</h4>
        <form method="get" action="stationadd.php">
            <label for="stationid">Station ID: </label>
            <input type="text" name="stationid">
            <br>
            <label for="stationname">Station Name: </label>
            <input type="text" name="stationname">
            <br>
            <input type="submit" name="submit" value="Add">
            <a href="#">Home</a>
        </form>
</body>
</html>

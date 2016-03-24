<html>

<body>

    <?php
        $dbconn = mysqli_connect("localhost","root","","ZooDB");
        mysqli_select_db($dbconn,'Station');
        $Station_ID=$_GET["station_id"];
        mysqli_query($dbconn,"DELETE FROM Station WHERE Station_ID='$Station_ID'");
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1)
            header("Location:station.php");
    ?>
</body>
    
</html>    
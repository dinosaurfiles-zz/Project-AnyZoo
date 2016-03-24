<html>

<body>

    <?php
        $dbconn = mysqli_connect("localhost","root","","ZooDB");
        mysqli_select_db($dbconn,'Staff');
        $Staff_ID=$_GET["staffid"];
        mysqli_query($dbconn,"DELETE FROM Staff WHERE Staff_ID='$Staff_ID'");
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:staff.php");
        }
    ?>
</body>
    
</html>    
<html>

<body>

    <?php
        $dbconn = mysqli_connect("localhost","root","","ZooDB");
        mysqli_select_db($dbconn,'Animals');
        $Shift_ID=$_GET["shiftid"];
        mysqli_query($dbconn,"DELETE FROM Shift_Assignment WHERE Shift_ID='$Shift_ID'");
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:shift.php");
        }
    ?>
</body>
    
</html>    
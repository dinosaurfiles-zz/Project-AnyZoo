<html>

<body>

    <?php
        $dbconn = mysqli_connect("localhost","root","","ZooDB");
        mysqli_select_db($dbconn,'Animals');
        $Animal_ID=$_GET["animalid"];
        mysqli_query($dbconn,"DELETE FROM Animals WHERE Animal_ID='$Animal_ID'");
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:animal.php");
        }
    ?>
</body>
    
</html>    
<html>

<body>

    <?php
        $dbconn = mysqli_connect("localhost","root","","ZooDB");
        mysqli_select_db($dbconn,'Cage');
        $Cage_No=$_GET["cageno"];
        mysqli_query($dbconn,"DELETE FROM Cage WHERE Cage_No='$Cage_No'");
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:cage.php");
        }
    ?>
</body>
    
</html>    
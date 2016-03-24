<html>

<body>

    <?php
        $dbconn = mysqli_connect("localhost","root","","ZooDB");
        mysqli_select_db($dbconn,'Animal_Class');
        $Animal_ClassID=$_GET["animalclassid"];
        mysqli_query($dbconn,"DELETE FROM Animal_Class WHERE Animal_ClassID='$Animal_ClassID'");
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:animalclass.php");
        }
    ?>
</body>
    
</html>    
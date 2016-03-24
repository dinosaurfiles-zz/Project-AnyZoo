<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    mysqli_select_db($dbconn,'Animal_Class');
    
    if(isset($_GET['add'])){ 
    $Animal_ClassID=$_GET["animalclassid"];
    $Family_Name=$_GET["familyname"];
    $Species_Name=$_GET["speciesname"];
     
        $add="INSERT INTO Animal_Class values('$Animal_ClassID', '$Family_Name', '$Species_Name')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
    if($affectedrows==1)
            header("Location:animalclass.php");
    }
   
    ?>
    <h4>Add New Animal Classification</h4>
        <form method="get" action="animalclassadd.php">
            <label for="animalclassid">Animal Class ID: </label>
            <input type="text" name="animalclassid">
            <br>
            <label for="familyname">Family Name: </label>
            <input type="text" name="familyname">
            <br>
            <label for="speciesname">Species Name: </label>
            <input type="text" name="speciesname">
            <br>
            <input type="submit" name="add" value="Add">
            <a href="#">Home</a>
        </form>
</body>
</html>

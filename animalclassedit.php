<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    mysqli_select_db($dbconn,'Animal_Class');
    
    if(isset($_GET['update'])){ 
        $Animal_ClassID=$_GET["animalclassid"];
        $Family_Name=$_GET["familyname"];
        $Species_Name=$_GET["speciesname"];
     
        $update_Query = "UPDATE Animal_Class SET Family_Name='$Family_Name', Species_Name='$Species_Name' WHERE Animal_ClassID='$Animal_ClassID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:animalclass.php");
        }
    }else {
        $edit_Animal_ClassID = $_GET["animalclassid"];
        $edit_Query="SELECT Family_Name, Species_Name FROM `Animal_Class` WHERE `Animal_ClassID`='$edit_Animal_ClassID'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
    
    <h4>Edit Animal Class ID: <u><?php echo $edit_Animal_ClassID?></u></h4>
        <form method="get" action="animalclassedit.php">
            <input type="hidden" name="animalclassid" value="<?php echo $edit_Animal_ClassID?>" >
            <label for="familyname">Family Name: </label>
            <input type="text" name="familyname" value="<?php echo $edit_Results['Family_Name']?>">
            <br>
            <label for="speciesname">Species Name: </label>
            <input type="text" name="speciesname" value="<?php echo $edit_Results['Species_Name']?>">
            <br>
            <input type="submit" name="update" value="Save">
            <a href="#">Home</a>
        </form>
</body>
</html>

<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    $selectcageno="SELECT Station_ID, Cage_No, Cage_Type FROM Cage ORDER BY (Station_ID)";
    $selectcagenoresult=mysqli_query($dbconn,$selectcageno);
    
    
    if(isset($_GET['add'])){ 
        $Animal_ID=$_GET["animalid"];
        $Animal_Nick=$_GET["animalnick"];
        $Gender=$_GET["gender"];
        $Cage_No=$_GET["cageno"];
        $Animal_ClassID=$_GET["animalclassid"];
        
        $add="INSERT INTO `Animals` (`Cage_No`, `Animal_ID`, `Animal_Nick`, `Gender`, `Animal_ClassID`) VALUES ('$Cage_No', '$Animal_ID', '$Animal_Nick','$Gender', '$Animal_ClassID')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        if($affectedrows==1){
                header("Location:animal.php");
        }        
    }
   
    ?>
    <h4>Add New Animal</h4>
        <form method="get" action="animaladd.php">
            <label for="animalid">Animal ID: </label>
            <input type="text" name="animalid">
            <br>
            <label for="animalnick">Animal Nickname: </label>
            <input type="text" name="animalnick">
            <br>
            <label for="gender">Gender</label>
            <select name="gender">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
            <br>
            <label for="cageno">Cage No</label>
            <select name="cageno">
            <?php while($selectcagenoresultrow=mysqli_fetch_assoc($selectcagenoresult)){  ?>
                <option value="<?php echo $selectcagenoresultrow['Cage_No'] ?>"><?php echo $selectcagenoresultrow['Station_ID'] ?> > <?php echo $selectcagenoresultrow['Cage_Type'] ?></option>
            <?php } ?>
            </select> 
            <br>
            <?php
                $selectanimalclassid="SELECT Animal_ClassID, Family_Name, Species_Name FROM Animal_Class ORDER BY (Family_Name)";
                $selectanimalclassidresult=mysqli_query($dbconn,$selectanimalclassid);
            ?>
            <label for="animalclassid">Animal Classification</label>
            <select name="animalclassid">
                <?php
                    while($selectanimalclassidresultrow=mysqli_fetch_assoc($selectanimalclassidresult)){ ?>
                <option value="<?php echo $selectanimalclassidresultrow['Animal_ClassID'] ?>"><?php echo $selectanimalclassidresultrow['Family_Name'] ?> > <?php echo $selectanimalclassidresultrow['Species_Name'] ?></option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" name="add" value="Add">
            <a href="#">Home</a>
        </form>
</body>
</html>


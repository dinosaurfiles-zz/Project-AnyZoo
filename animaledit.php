<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    if(isset($_GET['update'])){ 
        $Animal_ID=$_GET["animalid"];
        $Animal_Nick=$_GET["animalnick"];
        $Gender=$_GET["gender"];
        $Cage_No=$_GET["cageno"];
        $Animal_ClassID=$_GET["animalclassid"];
     
        $update_Query = "UPDATE Animals SET Cage_No='$Cage_No', Animal_Nick='$Animal_Nick', Gender='$Gender', Cage_No='$Cage_No', Animal_ClassID='$Animal_ClassID' WHERE Animal_ID='$Animal_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);
        header("Location:animal.php");
    }else {
        $edit_Animal_ID = $_GET["animalid"];
        $edit_Query="SELECT * FROM Animals WHERE Animal_ID='$edit_Animal_ID'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
    }
    ?>
    
    <h4>Editing Animal: #<u><?php echo $edit_Animal_ID?></u></h4>
        <form method="get" action="animaledit.php">
            <input type="hidden" name="animalid" value="<?php echo $edit_Animal_ID?>" >
            <label for="animalnick">Animal Nickname: </label>
            <input type="text" name="animalnick" value="<?php echo $edit_Results['Animal_Nick']?>">
            <br>
            <label for="gender">Gender</label>
            <select name="gender">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
            <br>
            <label for="cageno">Cage No</label>
            <select name="cageno">
            <?php 
                $selectcageno="SELECT Station_ID, Cage_No, Cage_Type FROM Cage ORDER BY (Station_ID)";
                $selectcagenoresult=mysqli_query($dbconn,$selectcageno);
                while($selectcagenoresultrow=mysqli_fetch_assoc($selectcagenoresult)){  ?>
                <option value="<?php echo $selectcagenoresultrow['Cage_No'] ?>"><?php echo $selectcagenoresultrow['Station_ID'] ?> > <?php echo $selectcagenoresultrow['Cage_Type'] ?></option>
            <?php } ?>
            </select>
            <br>
            <label for="animalclassid">Animal Classification</label>
            <select name="animalclassid">
                <?php
                    $selectanimalclassid="SELECT Animal_ClassID, Family_Name, Species_Name FROM Animal_Class ORDER BY (Family_Name)";
                    $selectanimalclassidresult=mysqli_query($dbconn,$selectanimalclassid);
                    while($selectanimalclassidresultrow=mysqli_fetch_assoc($selectanimalclassidresult)){ ?>
                <option value="<?php echo $selectanimalclassidresultrow['Animal_ClassID'] ?>"><?php echo $selectanimalclassidresultrow['Family_Name'] ?> > <?php echo $selectanimalclassidresultrow['Species_Name'] ?></option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" name="update" value="Save">
            <a href="#">Home</a>
        </form>
</body>
</html>

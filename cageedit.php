<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    
    if(isset($_GET['update'])){ 
        $Cage_No=$_GET["cageno"];
        $Cage_Type=$_GET["cagetype"];
     
        $update_Query = "UPDATE Cage SET Cage_Type='$Cage_Type' WHERE Cage_No='$Cage_No'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:cage.php");
        }
    }else {
        $edit_Cage_No = $_GET["cageno"];
        $edit_Query="SELECT Station_ID, Cage_Type FROM `Cage` WHERE `Cage_No`='$edit_Cage_No'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
    
    <h4>Edit Cage: #<u><?php echo $edit_Cage_No?></u> on Station: <u><?php echo $edit_Results['Station_ID']?></u></h4>
        <form method="get" action="cageedit.php">
            <input type="hidden" name="cageno" value="<?php echo $edit_Cage_No?>" >
            <label for="cagetype">Cage Type: </label>
            <input type="text" name="cagetype" value="<?php echo $edit_Results['Cage_Type']?>">
            <br>
            <input type="submit" name="update" value="Save">
            <a href="#">Home</a>
        </form>
</body>
</html>

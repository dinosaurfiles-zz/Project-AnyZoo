<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    $selectstationid="SELECT Station_ID FROM Station";
    $selectresult=mysqli_query($dbconn,$selectstationid);
    
    
    if(isset($_GET['add'])){ 
        $Station_ID=$_GET["stationid"];
        $Cage_Type=$_GET["cagetype"];
     
        $add="INSERT INTO Cage VALUES('$Station_ID', NULL, '$Cage_Type')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
        if($affectedrows==1){
                header("Location:cage.php");
        }
    }
   
    ?>
    <h4>Add New Cage</h4>
        <form method="get" action="cageadd.php">
            <label for="stationid">Station ID</label>
            <select name="stationid">
            <?php while($selectresultrow=mysqli_fetch_assoc($selectresult)){  ?>
                <option value="<?php echo $selectresultrow['Station_ID'] ?>"><?php echo $selectresultrow['Station_ID'] ?></option>
            <?php } ?>
            </select> 
            <br>
            <label for="cagetype">Cage Type: </label>
            <input type="text" name="cagetype">
            <br>
            <input type="submit" name="add" value="Add">
            <a href="#">Home</a>
        </form>
</body>
</html>

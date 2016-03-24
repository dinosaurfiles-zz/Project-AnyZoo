<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    mysqli_select_db($dbconn,'Staff');
    
    if(isset($_GET['add'])){ 
    $Staff_ID=$_GET["staffid"];
    $Staff_Name=$_GET["staffname"];
    $Staff_Type=$_GET["stafftype"];
     
        $add="INSERT INTO Staff values('$Staff_ID', '$Staff_Name', '$Staff_Type')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
    if($affectedrows==1)
            header("Location:staff.php");
    }
   
    ?>
    <h4>Add New Staff</h4>
        <form method="get" action="staffadd.php">
            <label for="staffid">Staff ID: </label>
            <input type="text" name="staffid">
            <br>
            <label for="staffname">Staff Name: </label>
            <input type="text" name="staffname">
            <br>
            <label for="stafftype">Staff Type: </label>
            <input type="text" name="stafftype">
            <br>
            <input type="submit" name="add" value="Add">
            <a href="#">Home</a>
        </form>
</body>
</html>

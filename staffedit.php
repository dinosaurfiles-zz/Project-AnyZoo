<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","ZooDB");
    mysqli_select_db($dbconn,'Staff');
    
    if(isset($_GET['update'])){ 
        $Staff_ID=$_GET["staffid"];
        $Staff_Name=$_GET["staffname"];
        $Staff_Type=$_GET["stafftype"];
     
        $update_Query = "UPDATE Staff SET Staff_Name='$Staff_Name', Staff_Type='$Staff_Type' WHERE Staff_ID='$Staff_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:staff.php");
        }
    }else {
        $edit_Staff_ID = $_GET["staffid"];
        $edit_Query="SELECT Staff_Name, Staff_Type FROM `Staff` WHERE `Staff_ID`='$edit_Staff_ID'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
    
    <h4>Edit Animal Class ID: <u><?php echo $edit_Staff_ID?></u></h4>
        <form method="get" action="staffedit.php">
            <input type="hidden" name="staffid" value="<?php echo $edit_Staff_ID?>" >
            <label for="staffname">Staff Name: </label>
            <input type="text" name="staffname" value="<?php echo $edit_Results['Staff_Name']?>">
            <br>
            <label for="stafftype">Staff Type: </label>
            <input type="text" name="stafftype" value="<?php echo $edit_Results['Staff_Type']?>">
            <br>
            <input type="submit" name="update" value="Save">
            <a href="#">Home</a>
        </form>
</body>
</html>

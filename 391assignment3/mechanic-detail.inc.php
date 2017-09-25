<?php
    ob_start();
    session_start();
    if(empty($_SESSION["name"])){ 
        header("Location:index.php");
    }
    else{ 
    }
?> 

<?php
    require "database.php";
    
    if(isset($_GET['username'])){
        $username=$_GET['username'];
        $selectMechanicsQ="select * from mechanic_table where m_username='$username'";
        $result = $conn->query($selectMechanicsQ);
        while($row = $result->fetch_assoc()){
        $name=$row['m_name'];
        $address=$row['m_address'];
        $phone=$row['m_phone'];
        $admin=$row['added_admin'];
        $username=$row['m_username'];  
?>

    <form>
        <label>Name</label>
        <input type="text" id="m-u-name" value=<?php echo $name;?>>
        <label>Address</label>
        <input type="text" id="m-u-address" value=<?php echo $address;?>>
        <label>Phone</label>
        <input type="text" id="m-u-phone" value=<?php echo $phone;?>>
        <label>Username</label>
        <input type="text" id="m-u-username" readonly value=<?php echo $username;?>>
        <input class="m-a-button" type="button" onclick="updateClick();" value="Update">
    </form>
    <p id="updateDiv"></p>
<?php
    }
    }
else{
    echo "problem";
}
?>
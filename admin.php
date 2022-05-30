<?php
include("layout/uheader.php");
?>
<?php
 if(isset($_SESSION['email']))
 {
    echo "<h1>HELLO ".$_SESSION['name']."</h1>";

 }
 $conn = new mysqli("localhost","root","","myproject");
            if($conn->connect_errno!=0)
            {
                die("Conncetion failed".$conn->connect_errno);
            }
            $data="SELECT * FROM admin";
            $result=$conn->query($data);
            while($row=$result->fetch_assoc()){
?>
<body class="text-center">
<h1 class="text-success">Your Profile</h1>
 <form id="register" action="update.php" method="post">
        <table class="table table-striped">
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>"/></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>"readonly/> </td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" class="form-control" id="email" name="pass" value="<?php echo $row['password'];?>"/> </td>
            </tr>
            <tr>
                <td><label>Address</label></td>
                <td><input type="text"  class="form-control" id="add" name="add" value="<?php echo $row['address'];?>"/></td>
                
            </tr>
            <tr>
                <td><label>Contact</label></td>
                <td><input type="text" class="form-control" id="con" name="con" value="<?php echo $row['mobile'];?>"/></td>
                
            </tr>
            <tr>
                <td><label>Gender</label></td>
                <td><select name="gen" selected="<?php echo $row['gender'];?>">
                <option>Male</option>
                <option>FeMale</option>
                </select></td>
            </tr>
        </table>
    </form>
    <?php
}?>
    
</body>
</html>
<hr>
    <?php
    include("layout/footer.php");
    ?>
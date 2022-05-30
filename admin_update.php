<?php
    include("layout/uheader.php");
    ?>
<?php

    if(isset($_POST['email']))
    {
        $errors= array();
        $email = $_POST['email'];
        $name = $_POST['name'];
        $add = $_POST['add'];
        $con = $_POST['con'];
        $gen = $_POST['gen'];
        $pass=$_POST['pass'];

        if($email=="")
        {
            $errors[] = 'Email is missing';
        }
        if($name=="")
        {
            $errors[] = 'Username is missing';
        }
        if($con=="")
        {
            $errors[] = 'Contact is missing';
        }
        if($gen=="")
        {
            $errors[] = 'Choose a gender';
        }
        if($pass=="")
        {
            $errors[] = 'choose a password';
        }
        if(empty($errors)==true)
        {
            $conn2 = new mysqli("localhost","root","","myproject");
            if($conn2->connect_errno!=0)
            {
                die("Conncetion failed".$conn2->connect_errno);
            }
            else{
                $sql = "UPDATE admin set name='".$name."',address='".$add."',mobile='".$con."',gender='".$gen."',password='".$pass."' WHERE email='".$email."'";  
            if($conn2->query($sql))
                {
                    echo "<h5>Your account is successfully updated"."</h5>";
                }
                else
                {
                    echo $conn1->error;
                }
                
           
        }
    }
        else
        {
            print_r($errors);
        }
    }

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
<h1 class="text-success">Update Your Profile</h1>
 <form id="register" action="admin_update.php" method="post">
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
            <tr>
      
                <td colspan="2"><input class="btn btn-success" type="submit" value="update"></td>
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
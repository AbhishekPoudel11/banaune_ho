<?php
include("layout/uheader.php");
?>
<?php
$conn = new mysqli("localhost","root","","myproject");
        if($conn->connect_errno!=0)
        {
            die("Conncetion failed".$conn->connect_errno);
        }
        if(isset($_POST['email']))
        {
            $sql = "DELETE FROM user where email='".$_POST['email']."'";
            if($conn->query($sql))
                {
                    echo "Success";
                }
                else{
                    echo "error";
                }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
        function getemail(email)
        {
            document.getElementById('email').value = email;
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="Manageacc.php">
    <?php
        
        $data = "SELECT * FROM user";
        $result = $conn->query($data);
        echo "<table border='1' class='table table-dark'><tr class='table-success'><th>Name</th><th>Email</th><th>Mobile</th><th>Gender</th><th>Select row</th></tr>";
        while($row = $result->fetch_assoc())
        {
            $x = $row['email'];
            echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['mobile']."</td><td>".$row['gender']."</td><td><input type='radio' name='select' id='select' onclick='getEmail(this.value)' value='".$row['email']."'/></td></tr>";
        }
        echo "</table>";
    ?>
    <div class="text-center">
        <input type="text" class="form-control" name="email" id="email"/>
        <input type="submit" class="btn btn-success" value="Delete" />
        </div>
    </form>
    </body>
</html>
<?php
    include("layout/footer.php");
    ?>
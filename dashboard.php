<?php
    include("layout/userheader.php");
    ?>
</div><hr>
<div class="view" style="background-image: url('img/product.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
<div class="text-center">
<p>
  </a>
<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#profile" aria-expanded="false" aria-controls="collapseExample">
    Your Profile
  </button>
  <a class="btn btn-success" data-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
    Product Notification
</a>
  <a class="btn btn-success" data-toggle="collapse" href="#product" role="button" aria-expanded="false" aria-controls="collapseExample">
    Apply for Repair
  </a>
  <a class="btn btn-success" data-toggle="collapse" href="#history" role="button" aria-expanded="false" aria-controls="collapseExample">
    Repair History
  </a>
</p>

<!--product-->
<div class="collapse" id="product">
  <div class="card card-body">
  <div class="view" style="background-image: url('img/product.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
<div class="container-md">
<div class="card-columns">
  <div class="card bg-success">
  <img class="card-img-top" src="img/mobile.png">
  <div class="card-img-overlay">
  <h5 class="card-title text-center">Repair your phone</h5>
    <div class="card-body text-center">
      <p class="card-text">If you have any problem reguarding your mobile devices we can fix it for you.Please provide your details trust only professionals......</p>
      <a href="repair.php" class="btn btn-sm btn-outline-success"><b>Phone details</b></a>
    </div>
    </div>
  </div>
  <div class="card bg-info">
  <img class="card-img-top" src="img/acc.png">
  <div class="card-img-overlay">
  <h5 class="card-title text-center">Accessories Repair</h5>
    <div class="card-body text-center">
      <p class="card-text">We will be able to quickly and easily repair your favorite Accessories like gaming console, headphones and many others.....</p>
      <a href="repair.php" class="btn btn-sm btn-outline-success"><b>Accessories</b></a>
    </div>
    </div>
  </div>
  </div>
</div>
<div class="container-md">
  <div class="card-columns">
  <div class="card bg-success">
  <img class="card-img-top" src="img/c.png">
  <div class="card-img-overlay">
  <h5 class="card-title text-center">Repair your PC</h5>
    <div class="card-body text-center">
      <p class="card-text">Repair technician will work with five general categories of hardware including desktop computers, laptops, servers.....</p>
      <a href="repair.php" class="btn btn-sm btn-outline-success"><b>Computer details</b></a>
    </div>
    </div>
  
  </div>
  <div class="card bg-info">
  <img class="card-img-top" src="img/gg.png">
  <div class="card-img-overlay">
  <h5 class="card-title text-center">Other repairs</h5>
    <div class="card-body text-center">
      <p class="card-text">We repair appliances of any manufacturer in the sortest possible time.You can provide us details about your product that needed to be fixed.....</p>
      <a href="repair.php" class="btn btn-sm btn-outline-success"><b>Others details</b></a>
    </div>
  </div>
</div>
</div>
</div>
</div>
		</div>
</div>
</div>
</p>
<!--product close-->

<!--profile-->
<div class="collapse" id="profile">
  <div class="card card-body">
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
        $email=$_SESSION['email'];
        $data="SELECT * FROM user WHERE email='".$email."'";
        $result=$conn->query($data);
        while($row=$result->fetch_assoc()){
?>
<body class="text-center">
<h1 class="text-success">This is Your Profile</h1>
<form id="register" action="update.php" method="post">
    <table class="table table-striped">
        <tr>
            <td><label>Name</label></td>
            <td><input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>"readonly/></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>"readonly/> </td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="password" class="form-control" id="email" name="pass" value="<?php echo $row['password'];?>"readonly/> </td>
        </tr>
        <tr>
            <td><label>Address</label></td>
            <td><input type="text"  class="form-control" id="add" name="add" value="<?php echo $row['address'];?>"readonly/></td>
            
        </tr>
        <tr>
            <td><label>Contact</label></td>
            <td><input type="text" class="form-control" id="con" name="con" value="<?php echo $row['mobile'];?>"readonly/></td>
            
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
  </div>
  </div>
  <!--profile end-->

  <!--history-->
  <div class="collapse" id="history">
    <div class="card card-body">
    <div class="card card-body">
  <div class="view" style="background-image: url('img/product.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
   </div>
   <?php
  
   $conn = new mysqli("localhost","root","","myproject");
   $email=$_SESSION['email'];
   $data="SELECT * FROM user, account WHERE account.user_id=user.user_id AND user.email = '".$email."'";
   $result = $conn->query($data);
   while($row=$result->fetch_assoc())
   {
?>
<form id="register" action="dashboard.php" method="post">
<table class='table table-dark'>
<tr class='table-success'>
<th><label>Name</label></th>
<th><label>Email</label></th>
<th><label>Product type</label></th>
<th><label>Product detail</label></th>
<th><label>Product name</label></th>
<th><label>Other Message </label></th>
<th><label>Date </label></th>
</tr>
<tr>
<td><input type="text" class="form-control"  value="<?php echo $row['name'];?>" readonly name="email"/></td>


<td><input type="text" class="form-control"  value="<?php echo $row['email'];?>" readonly name="email"/></td>

<td><input type="text" class="form-control"  value="<?php echo $row['product_type'];?>" readonly name="email"/></td>

<td><input type="text" class="form-control"  value="<?php echo $row['product_detail'];?>" readonly name="email"/></td>


<td><input type="text" class="form-control"  value="<?php echo $row['product_name'];?>" readonly name="email"/></td>


<td><input type="text" class="form-control"  value="<?php echo $row['other_messages'];?>" readonly name="email"/></td>

<td><input type="text" class="form-control"  value="<?php echo $row['date'];?>" readonly name="email"/></td>
</tr>
</table></form>
<?php
   }
?>

</div>
</div>
</div>
<!--history close-->

<div class="text-center">
<div class="hero-unit">
  <h1>Welcome to your dashboard</h1>
  <p>An expansive variety of repair guides for electronic gear,<br> ranging from home and car audio to calculators.<br> Electronics troubleshooting, repair, and services.<br>...</p>
  <p>
  </p>
  </div>
   </div>
</div>
</div>

    <hr>
    <?php
    include("layout/footer.php");
    ?>
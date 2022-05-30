<?php
    if(isset($_POST['product_name']))
    {
      $errors= array();
        $product_name = $_POST['product_name'];
        $other_messages =$_POST['other_messages'];
        $product_type = $_POST['product_type'];
        $product_detail = $_POST['product_detail'];
        $user_id=$_POST['user_id'];
        $image=$_POST['image'];
        
        if($product_name=="")
        {
            $errors[] = 'Product name is missing';
        }
        if($product_type=="")
        {
            $errors[] = 'Please select the product type';
        }
        if($product_detail=="")
        {
            $errors[] = 'Please provide your details';
        }
        if(empty($errors)==true)
        {
            $conn1 = new mysqli("localhost","root","","myproject");
            if($conn1->connect_errno!=0)
            {
                die("Conncetion failed".$conn1->connect_errno);
            }
            else
            {
            
            $sql = "INSERT INTO account (product_detail,product_name,other_messages,product_type,user_id,image) VALUES ('".$product_detail."','".$product_name."','".$other_messages."','".$product_type."','".$user_id."','".$image."')";
                if($conn1->query($sql))
                {
                    echo '<script>alert("Your details are successfully send")</script>';
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
   
?>
  <?php
    include("layout/userheader.php");
    ?>
<html>
  <head>
	<link rel="stylesheet" href="css/img.css"/>
  </head>
<body>

<form action="repair.php" method="POST" enctype="multipart/form-data">
  
  <h1 class="text-center"><b>Repair details</b></h1>
    
    <div class="container card p-5 float-left card-body col-md-6 mb-4 md-form">
        <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 200px">
        <h4> <u><b>CONTACT:</u></b><br>kathmandu,koteshwor<br>info_OERS@gmail.com<br>+ 977 234 567 88/234 567 89<br>9818451497</h4>
        <iframe class="rounded float-left" src="img/kot.png" frameborder="0"
          style="border:0" allowfullscreen>
          </iframe>
          </div></br></br></br></br></br></br></br>

<div class="card p-5 text-left card-body col-md-12 mb-5 md-form">
<input type="file" name="image" id="inpFile">
<div class="image-preview" id="imagePreview">
<img src="" alt="Image Preview" name="image" class="image-preview__image">
<span class="image-preview__default-text">Image Preview</span>
</div>
<script>
	const inpFile = document.getElementById("inpFile");
	const previewContainer = document.getElementById("imagePreview");
	const previewImage = previewContainer.querySelector(".image-preview__image");
	const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

inpFile.addEventListener("change", function() {
	const file = this.files[0];

	if (file) {
		const reader = new FileReader();

		previewDefaultText.style.display = "none";
		previewImage.style.display = "block";

		reader.addEventListener("load", function(){
			previewImage.setAttribute("src",this.result);
		});
		
		reader.readAsDataURL(file);

	}else{
		previewDefaultText.style.display = null;
		previewImage.style.display = null;
		previewImage.setAttribute("src","");
	}
});

</script>       

</div>
</div>
          </div>
          

        <div class="container card p-5 text-right card-body col-md-6 mb-4 md-form">
            <label class="text-left">Email</label>
                <input type="text" class="form-control" name="email" value='<?php echo $_SESSION['email']?>'readonly/></br></br>
                
                <input type="hidden" name="user_id" value='<?php echo $_SESSION['user_id']?>'hidden/>
                

         <div class="container">
            <div class="md-form">
              <input type="text" id="product_name" class="form-control" name="product_name" placeholder=#Name..>
              <label class="float-left">Product name</label>
            </div></div><hr>
            
            <div class="container">
            <div class="md-form">
              <select id="product detail" name="product_type" class="form-control">
              <option>--Select--</option>
                <option>Phone</option>
                <option>Accessories</option>
                <option>Computer/PC</option>
                <option>Others</option></select>
              <label class="float-left">Product type</label>
            </div></div><hr>

            <div class="col-md-12 mb-8 md-form primary-textarea">
            <textarea id="product_description" name="product_detail" class="md-textarea form-control"  placeholder=#Details.. style="padding-bottom: 1.2rem;"></textarea>
            <label class="float-left">Product detail</label>
            </div><hr>

            <div class="col-md-12 mb-8 md-form primary-textarea">
            <textarea id="other_messages" name="other_messages" class="md-textarea form-control"  placeholder=#Messages.. style="padding-bottom: 1.2rem;"></textarea>
            <label class="float-left">Other messages</label>
        </div><hr>
        
        <div class="container">
            <div class="md-form">
              <input type="text" id="date" readonly name="date" class="form-control" placeholder="2020-2021">
              <label class="float-left">Current year</label>
            </div></div>

         
        </div>
        </div>

          <div class="text-center">
            <a><input type="submit" class="btn btn-success" value="Send details"/></a>
      </div>
  </div>
</form>
<!--Section: Contact v.2-->
        </body>
        </html>
    <?php
    include("layout/footer.php");
    ?>
                        
                    
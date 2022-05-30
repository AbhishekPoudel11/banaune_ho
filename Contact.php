<?php
include("layout/header.php");
?>
<?php
    if(isset($_POST['name']))
    {
      $errors= array();
        $name = $_POST['name'];
        $email =$_POST['email'];
        $subject = $_POST['subject'];
        $message =$_POST['message'];

        if($name=="")
        {
            $errors[] = 'name is missing';
        }
        if($email=="")
        {
            $errors[] = 'Email is missing';
        }
        if($message=="")
        {
            $errors[] = 'Please provide your details';
        }
        if(empty($errors)==true)
        {
            $conn2 = new mysqli("localhost","root","","myproject");
            if($conn2->connect_errno!=0)
            {
                die("Conncetion failed".$conn2->connect_errno);
            }
            else
            {
            
            $sql = "INSERT INTO message (name,email,subject,message) VALUES ('".$name."','".$email."','".$subject."','".$message."')";
                if($conn2->query($sql))
                {
                    echo '<script>alert("Your message is successfully send")</script>';
                }
                else
                {
                    echo $conn2->error;
                }  
            }        
        }
        else
        {
            print_r($errors);
        }
    }
    ?>
<html>
  <head></head>
</body>
<form action="contact.php" method="post">
<section class="section">
  <h1 class="text-center"><b>Contact us</b></h1>
      <div class="card-body">
      <!--Google map-->
      <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 200px">
      <h4> <u><b>CONTACT:</u></b><br>
kathmandu,koteshwor<br>

info_OERS@gmail.com<br>

+ 977 234 567 88/234 567 89<br>

9818451497</h4>
        <iframe class="rounded float-left" src="img/kot.png" frameborder="0"
          style="border:0" allowfullscreen></iframe>

      </div>

              <div class="row">

     
                <div class="col-md-6 mb-4"> 

                  <div class="md-form">
              <input type="text" name="name" class="form-control">
              <label for="contact-name">Your name</label>
                  

            
              <input type="text" name="email" class="form-control">
              <label for="contact-email">Your email</label>
            

            
              <input type="text" name="subject" class="form-control">
              <label for="contact-Subject">Subject</label>
                  </div>
                </div>
 
        <div class="col-md-6 mb-4">
          <div class="md-form primary-textarea">
            <textarea name="message" class="md-textarea form-control mb-0" rows="5" style="padding-bottom: 1.2rem;"></textarea>
            <label for="contact-message">Your Message</label>
          </div>
        </div>
       
        <div class="col-md-12">
          <div class="text-center">
          <a><input type="submit" class="btn btn-success" value="Submit"/></a>
          </div>
        </div>
      

      </div>

    </div>

  </div>

</section>
    <?php
    include("layout/footer.php");
    ?>
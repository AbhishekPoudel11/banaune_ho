
<?php
    if(isset($_POST['emailsignup']))
    {
        $email = $_POST['emailsignup'];
        $name = $_POST['usernamesignup'];
        $pass = $_POST['passwordsignup'];
        $add = $_POST['add'];
        $con = $_POST['con'];
        $gen = $_POST['gen'];

        if(empty($errors)==true)
        {
            $conn = new mysqli("localhost","root","","myproject");
            if($conn->connect_errno!=0)
            {
                die("Conncetion failed".$conn->connect_errno);
            }
            $check="SELECT * FROM user WHERE email='".$email."'";
            $result = $conn-> query($check);
            if($result-> num_rows>0)
            {
                echo "username or email already exist";
            }
            else
            {
                 $sql = "INSERT INTO user (name,email,password,address,mobile,gender) VALUES ('".$name."','".$email."','".$pass."','".$add."','".$con."','".$gen."')";
            if($conn->query($sql))
            {
                echo '<script>alert("you are successfully registered")</script>';
            }
            else
            {
                echo $conn->error;
            }   
        }
    }
        else
        {
            print_r($errors);
        }
    }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8"/>
        <title>Login and Registration Form</title>
        
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Registration Form <span></span></h1>
				<nav class="codrops-demos">
					<span>Click <strong>"Join us"</strong> if you want to sign up</span>
				</nav>
            </header>
            <section>				
                <div id="container_demo" >
            
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            
                        </div>

                        <div id="login" class="animate form">
                            <form  action="register.php" autocomplete="on" method="post" name="login"> 
                                <h1>sign up</h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label class="add" data-icon="u">Address</label>
                                    <input  name="add" required="required" type="text" placeholder="city/district" />
                                </p>
                                <p> 
                                    <label class="phone" data-icon="u">Phone</label>
                                    <input  name="con" required="required" type="text" placeholder="#9812345590" />
                                </p>
                                <p> 
                                    <label class="gen" data-icon="u">Gender</label>
                                    <select  name="gen" required="required" type="text" name="gen">
                                <option>Male</option>
                                <option>FeMale</option>
                                </select>
                                </p>
                               
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="form.php" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
       

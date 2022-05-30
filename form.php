
<?php
    session_start();
    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
       $pass = $_POST['password'];
            $conn = new mysqli("localhost","root","","myproject");
            if($conn->connect_errno!=0)
            {
                die("Conncetion failed".$conn->connect_errno);
            }
            $check="SELECT * FROM user WHERE email='".$email."' AND password='".$pass."'";
            $result = $conn-> query($check);

            if($result->num_rows>0)
                {
                while($row=$result->fetch_assoc())
                     {
                $_SESSION['email']=$row['email'];
                $_SESSION['name']=$row['name'];
                $_SESSION['user_id']=$row['user_id'];

                        }
            header("Location:dashboard.php");
                }
                
                
        else
        {
            echo '<script>alert("your username or password may be wrong")</script>';
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
            <div class="codrops-top">
               
                <div class="clr"></div>
            </div>
            <header>
                <h1>Login and Registration Form <span></span></h1>
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
                            <form  action="form.php" autocomplete="on" method="post" name="login"> 
                                <h1>Log in</h1> 
                                
                                <p> 
                                    <label for="username" class="uname"  > Your email or username </label>
                                    <input id="username" name="email" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
                                    </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" name="login"/> 
								</p> 
                                <p class="change_link">
									Not a member yet ?
									<a href="register.php" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
       

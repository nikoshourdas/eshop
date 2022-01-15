<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from users where EMAIL = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['PASSWORD'] === $password)
					{
                        $_SESSION["login"] = "OK";

						$_SESSION['ID'] = $user_data['ID'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "<script>alert('Invalid login!');</script>";

		}else
		{
			echo "<script>alert('Invalid login!');</script>";

		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="Login.css">
    <title>Σύνδεση</title>

    <script>
        function ValidateEmail(inputText) {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(inputText.value.match(mailformat))
                {
                    document.validate.mail.focus();
                    return true;
                }
                else
                {
                    alert("You have entered an invalid email address!");
                    document.validate.mail.focus();
                    return false;
                }
            }
    </script>
</head>


    <body style="background:#222">
    <?php
            
            if((isset($_SESSION["login"]) && $_SESSION["login"] == "OK")){?>
                <nav class="navbar navbar-expand-md">
                    <a href="index.php"><img class ="home-img"  src="images/smallLogo.jpg" width="45" height ="45">
                    <div class="collapse navbar-collapse" id="main-navigation">
                        <ul class="navbar-nav">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="myorders.php">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="phones.php">Mobile phones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>

            <?php } else { ?>
                <nav class="navbar navbar-expand-md">
                <a href="index.php"><img class ="home-img"  src="images/smallLogo.jpg" width="45" height ="45">
                    <div class="collapse navbar-collapse" id="main-navigation">
                        <ul class="navbar-nav">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="phones.php">Mobile phones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            <?php } 
        ?>
        <!-- login box  -->
        <form name="validate" method="post" style= "background :#333" >
            <div class="signup-form">
                <form action="/examples/actions/confirmation.php" method="post" >
                    <h2>Log in</h2>
                    <p class="hint-text">Login using your Credencials</p>
                    
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>

                    <div class="form-group" >     
                        <button type="submit" class="btn btn-success btn-lg btn-block" >Login</button></a>
                    </div>

                </form>
                <div class="text-center" style="color: white;">Don't have an account? <a href="signup.php" style="color: white;">Sign Up</a></div>
            </div>
        </form>
        
        <!--  -->

        </div>
        <footer class="page-footer">
            <div class="container">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                    <h6 class="text-uppercase"> Στοιχεία επικοινωνίας</h6>
                    <p>Διεύθυνση: Εσταυρωμένος, ΤΚ 71111 Ηράκλειο Κρήτης</br>
                        Τηλέφωνο : +30 – 2810 – 333333</br>
                        Ωράριο λειτουργίας: Δευτέρα-Παρασκευή 9:00-15:30</br>
                        Email: shopyourtatooine@empire.un
                    </p>
                </div>
        </footer>

        <script src="jquery-3.5.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="main.js"></script>
        </body>
    </body>
</html>
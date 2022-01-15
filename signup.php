<?php 
    session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $postalcode = $_POST['post'];
        $phone = $_POST['phone'];

	
		

			//save to database
			$id = random_num(5);
			$query = "insert into users (FIRSTNAME,LASTNAME,EMAIL,PASSWORD,ADRESS,CITY,POSTALCODE,PHONE,ID) values ('$f_name','$l_name','$email','$password','$adress','$city','$postalcode','$phone','$id')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		
	}
?>
<!DOCTYPE html>
<html>
    <title>Tatouine Eshop</title>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">   
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="Login.css">

        <script>
           
            $(function() {
                var availableTags = [
                "Athens", "Paris", "New York", "Dublin",
                "Beijing", "New Dehli", "Moscow", "London",
                "Helsinki", "Tokyo"
                ];
                $( "#tags" ).autocomplete({
                    source: availableTags
                });
            } );
            /* fuction για επιβεβαίωση σωστής φόρμας κωδικού πρόσβασης*/
            function CheckPassword(inputtxt) { 
			var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,20}$/;
			if(inputtxt.value.match(passw)) 
			{ 
				return true;
			}
			else
			{ 
				alert('Password must contain at least 1 Upper case/1 lower case and one number!')
				return false;
			}
		}
        /* fuction για επιβεβαίωση σωστής φόρμας email*/
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
    <body>
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
         

    <form name="validate" method="post" style= "background :#333">
        <div class="signup-form">
            <form action="/examples/actions/confirmation.php" method="post">
                <h2>Sign Up</h2>
                <p class="hint-text">Login using your Credencials</p>
                <!-- first name -->
                <div class="form-group">
                    <input type="text" class="form-control" name="f_name" placeholder="Firstname" required="required">
                </div>
                <!-- last name -->
                <div class="form-group">
                    <input type="text" class="form-control" name="l_name" placeholder="Lastname" required="required">
                </div>
                <!-- email -->
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="e-mail" required="required">
                </div>
                <!-- password -->
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="rpassword" placeholder="Retype Password" required="required">
                </div>
                <!-- adress -->
                <div class="form-group">
                    <input type="text" class="form-control" name="adress" placeholder="Adress " required="required">
                </div>
                <!-- city -->
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="City " required="required">
                </div>
                <!-- postal code  -->
                <div class="form-group">
                    <input type="text" class="form-control" name="postal" placeholder="Postal Code " required="required">
                </div>
                <!-- mobile phone -->
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Mobile Phone " required="required">
                </div>


                <!-- sign up Button -->
                <div class="form-group" >
                    <button type="submit" class="btn btn-success btn-lg btn-block">Sign Up</button>
                </div>
                <!-- google linkdin -->
                 <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block" onClick="window.location.href='https://myaccount.google.com/';">Google</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                 <button type="submit" class="btn btn-success btn-lg btn-block" onClick="window.location.href='https://LinkedIn.com/';">LinkedIn</button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
            <div class="text-center" style="color: white;">Already have an account? <a href="index.php" style="color: white;">Log in </a></div>
        </div>
    </form>
        

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
</html>
<?php 
session_start();
?>


<!DOCTYPE html>

<html lang="en">

    <head>

        <title>Tatouine Eshop</title>
            
        <script src="jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="main.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="contact.css">

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
        <div class="container2" style="background:#333">
            <form action="action_page.php">
        
                <label for="fname" style="color:white">Όνομα</label>
                <input type="text" id="fname" name="firstname" placeholder="Όνομα">
            
                <label for="lname" style="color:white">Email</label>
                <input type="text" id="lname" name="lastname" placeholder="Email">
            
                <label for="subject" style="color:white">Subject</label>
                <textarea id="subject" name="subject" placeholder="Γράψτε κάτι" style="height:200px"></textarea>
            
                <input type="submit" value="Submit">
        
            </form>
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

    </body>
</html>
<?php
  session_start();
  include("connection.php");
  include("functions.php");
  date_default_timezone_set('Europe/Athens');
  // Create database connection
  $user_data = check_login($con);
  $db = mysqli_connect("localhost", "root", "", "eshop");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Κατάλογος Βιβλίων</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        <style>
            #phone_div{
                width: 32%;
                padding: 5px;
                margin: 15px auto;
                border: 1px solid #cbcbcb;
            }

            button {
                margin-top:25px;
                border: none;
                outline: 0;
                padding: 12px;
                color: white;
                background-color: red;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }
        </style>
	</head>
    
	<body>
        <!-- Nav Bar -->
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
        <div class="container mt-5 mb-5">
            <div class="row mt-1">
                <?php
                    $query = "SELECT * FROM mobilephone WHERE PRODUCTID > 6 AND PRODUCTID <=12";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-4">
                                <form method="post" action="myorders.php?action=add&PRODUCTID=<?php echo $row["PRODUCTID"]; ?>">
                                    <div class="p-card bg-white p-2 rounded px-3">
                                        <img width="250" src="<?php echo $row["PHOTOURL"]; ?>" class="img-responsive">
                                        <h6 class="text-info">Μοντέλο: <?php echo $row["MODEL"]; ?></h6>
                                        <h6 class="text-info">Τιμή: <?php echo $row["PRICE"]; ?>€</h6>
                                        <h6 class="text-info">Οθόνη: <?php echo $row["SCREENSIZE"]; ?></h6>
                                        <h6 class="text-info">Κάμερα: <?php echo $row["CAMERA"]; ?></h6>
                                        <h6 class="text-info">Επεξεργαστής: <?php echo $row["CPU"]; ?></h6>
                                        <h6 class="text-info">Μπαταρία: <?php echo $row["BATTERY"]; ?></h6>
                                        <h6 class="text-info">Δείκτης SAR: <?php echo $row["SAR"]; ?></h6>
                                        <h6 class="text-info">Διαθεσιμοτητα : <?php echo $row["QUANTITY"]; ?></h6>
                                        <input type="submit" name="add" style="margin: 5px;" class="btn btn-success"<?php if($row["QUANTITY"]==0){?> disabled <?php }?>
                                            value="Add to Cart">
                                    </div>
                                </form>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        
        <div class="d-flex justify-content-end text-right mt-2">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="phones.php">1</a></li>
                    <li class="page-item"><a class="page-link" href="phones2.php">2</a></li>
                    <li class="page-item"><a class="page-link" href="phones3.php">3</a></li>
                    <li class="page-item"><a class="page-link" href="phones4.php">4</a></li>
                </ul>
            </nav>
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
		<script src="JavaScript/main.js"></script>

	</body>
	
</html>
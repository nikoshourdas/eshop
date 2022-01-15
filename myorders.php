<?php 
    session_start();
	include("connection.php");
    include("functions.php");
    date_default_timezone_set('Europe/Athens');
    $user_data=check_login($con); //parse all user data, based on his Session id during his login.

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $product_id=$_GET["PRODUCTID"];
        $date=date('Y-m-d H:i:s');
        $userid=$user_data['ID'];
        $query = "insert into orders (PRODUCTID,USERID,DATE) values ('$product_id','$userid','$date')";
        mysqli_query($con, $query);
        
    } 
    $id=$user_data['ID'];
    $order = mysqli_query($con, "select * from orders where USERID = '$id'");
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
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 40%;
            }
        </style>
      
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

        <h3 class="MyOrders" style="color:white">Shopping Cart Details</h3>
        <div class="table-responsive" style="color:white">
            <table class="table table-bordered">
                <tr>
                    <th width="10%">Product Name</th>
                    <th width="8%">Photo</th>
                    <th width="5%">Price</th>
                    <th width="4%">Screen</th>
                    <th width="8%">Camera</th>
                    <th width="7%">CPU</th>
                    <th width="4%">RAM</th>
                    <th width="7%">Battery</th>
                    <th width="7%">Sar</th>
                    <th width="7%">Date</th>
                </tr>

                <?php
                if(mysqli_num_rows($order) > 0) {
                    while ($row = mysqli_fetch_array($order)) {
                        $phoneid= $row['PRODUCTID'];
                        $ph=mysqli_query($con, "select * from mobilephone where PRODUCTID='$phoneid' ");
                        $phone= mysqli_fetch_assoc($ph);
                            ?>
                            <tr>
                                <td>  <?php echo $phone["PRICE"]; ?></td>
                                <td> <img width="100" src="<?php echo $phone["PHOTOURL"];?>"class="img-responsive"> </td>
                                <td> <?php echo $phone["MODEL"]; ?></td>
                                <td> <?php echo $phone["SCREENSIZE"]; ?></td>
                                <td> <?php echo $phone["CPU"]; ?></td>
                                <td> <?php echo $phone["RAM"]; ?></td>
                                <td> <?php echo $phone["CAMERA"]; ?></td>
                                <td> <?php echo $phone["BATTERY"]; ?></td>
                                <td> <?php echo $phone["SAR"]; ?></td>
                                <td> <?php echo $row["DATE"]; ?></td>
                            </tr>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </table>
        </div>
</body>
</html>

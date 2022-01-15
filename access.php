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
			
			print "wrong username or password!";
		}else
		{
			print "wrong username or password!";
		}
	}

?>
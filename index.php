<?php
require("admin_panel/Shared/config.php");
session_start();

// if(isset($_SESSION['user_name']))
// {
// 	header("location:index.php");
// }

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $sql = "SELECT * FROM `admin` where `admin_email`='$email' AND `user_paswword`='$pass'";
    $result=mysqli_query($conn,$sql);
	 if(mysqli_num_rows($result)>0)
     {
			$row=mysqli_fetch_array($result);
			$_SESSION['admin_id']=$row['Name'];
			$_SESSION['admin_name']=$row['Name'];
			header("location:admin_panel/inventry.php");
	}  
        
    else 
        {
		$sql1 = "SELECT * FROM `users`  where `user_email`='$email' AND `user_pasword`='$pass'";
						$result=mysqli_query($conn,$sql1);
							if(mysqli_num_rows($result)>0)
                            {
								$row=mysqli_fetch_array($result);
								$_SESSION['user_id']=$row['user_id'];
								$_SESSION['user_name']=$row['user_name'];
								header("location:index.php");
							} 
					}
					
					}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="admin_panel/assest/css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a href="#"><img src="admin_panel/assest/img/LABTEST_logo_2.png" width="170px" height="auto" alt=""></a>
    </div>
  </nav>
    <div class="login_background">
 <div class="container12">
 <form method="POST">
        <div class="card">
            <a class="login"><img src="admin_panel/assest/img/LABTEST_logo.png" width="60px" height="60px" alt=""></a>
            <div class="inputBox">
                <input type="email" name="email" required="required">
                <span class="user">Email</span>
            </div>

            <div class="inputBox">
                <input type="password" name="pass" required="required">
                <span>Password</span>
            </div>
            <button type="submit"  name="submit" class="enter">Enter</button>
        </div>
        </form>
    </div>
    </div>
    
</body>
</html>
<?php
    ini_set('display_errors', 1);
    ini_set('display_status_errors',1);
    error_reporting(E_ALL);

    include ('connexion.php');
    $conn=connexion();
    session_start();
    $error='';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT nom FROM user WHERE login = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $conn = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($conn == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Votre nom d'utilisateur ou votre mot de passe est invalide ";
      }
   }
?>
<html>
   
   <head>
   <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/fonts/css/all.min.css">
      <title>Login </title>
   </head>
   
   <body >
	
   <div class="container mt-5">
    <div class="card w-50 mx-auto">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0 text-center">Login</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="d-grid gap-2 text-center">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <div class="text-danger mt-3"><?php echo $error; ?></div>
        </div>
        <div class="card-footer text-center">
            <p class="mb-0">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</div>

      <style type = "text/css">
         body {
            background-color: rgb(220,220,220);
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
   </body>
</html>
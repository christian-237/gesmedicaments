<?php
    include ('connexion.php');
    $conn=connexion();
    session_start();
    $error='';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT login_id FROM admin WHERE login = '$myusername' and password = '$mypassword'";
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
	
      <div align = "center" >
         <div style = "width:300px; border: solid 1px #333333; " align = "left" class=" mt-5">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box form-control"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box form-control" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php  echo $error; ?></div>
					
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
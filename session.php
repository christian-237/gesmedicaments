<?php
   include('connexion.php');
   session_start();
   $conn=connexion();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT login FROM user where login  = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['login'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
<?php
   include_once "conexion.php";
   session_start();
   
   $user_check = $_SESSION['username'];
   echo ($user_check);
   
   $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME); 
   $sql = "SELECT usuario FROM usuarios WHERE usuario = '$user_check'";
   $ses_sql = mysqli_query($con,$sql); 

   #$ses_sql = mysqli_query($con,"select usuario from usuarios where usuario = 'Admin'");
   $row = mysqli_fetch_object($ses_sql);
   $login_session = $row->usuario;

   mysqli_close($con);
   
   if(!isset($_SESSION['username'])){
      header("location:/014/index.php");
   }
?>
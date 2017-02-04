<?php
   include_once "conexion.php";
   session_start();
   
   $user_check = $_SESSION['username'];
   echo ($user_check);
   $sql = "SELECT usuario FROM usuarios WHERE usuario = '$user_check'";
   $ses_sql = mysql_query($sql); 

   #$ses_sql = mysqli_query($con,"select usuario from usuarios where usuario = 'Admin'");
   $row = mysql_fetch_object($ses_sql);
   $login_session = $row->usuario;
   
   if(!isset($_SESSION['username'])){
      header("location:/014/index.php");
   }
?>
<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

?>

<?
include "conn.php";
  $url = $_SERVER;
        $name= $_SERVER["QUERY_STRING"];
  
        $sql1 = "DELETE FROM clients WHERE client ='".$name."'";
        $sql2 = "DELETE FROM client_camp WHERE clientname ='".$name."'";
        
        if (mysqli_query($conn, $sql1)&&mysqli_query($conn, $sql2)) {
          header("Location: clients.php");
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn); 
?>
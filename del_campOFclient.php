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
  $client=$_POST['cli'];
  $sql2 = "DELETE FROM client_camp WHERE campaignName ='".$name."' && clientname='".$client."'";
  
  if (mysqli_query($conn, $sql2)) {
    header("Location: client_camp_view.php?".$client);
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  mysqli_close($conn);      
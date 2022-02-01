<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }
if (isset($_POST['add']) ){
    if(!empty($_POST['campaign'])){
        include "conn.php";
        $Nname = $_GET['name'];
        $mac=$_GET['mac'];
        $client=$_GET['client'];
        $from=$_GET['from'];
        $to=$_GET['to'];
        $camp=$_POST['campaign'];  
        $sql1="SELECT * FROM schedule WHERE (device_id='".$mac."' AND device_name='".$Nname."' AND client='".$client."' AND from_TM='".$from."' AND to_TM='".$to."')";
        $result = mysqli_query($conn,$sql1);
        $count = mysqli_num_rows($result);
        if($count==0){
            $sql2 = "INSERT INTO schedule(device_id,device_name,client,from_TM,to_TM,campaign)
                        VALUES ('$mac','$Nname','$client','$from','$to','$camp');";
            mysqli_query($conn, $sql2);
        }
        elseif($count==1){
            $sql3 = "UPDATE schedule
            SET campaign = '".$camp."'
            WHERE (device_id='".$mac."' AND device_name='".$Nname."' AND client='".$client."' AND from_TM='".$from."' AND to_TM='".$to."')";
            mysqli_query($conn, $sql3);
        }
        header("Location: dev_scd.php?name=".$Nname."&mac=".$mac."&client=".$client);
        mysqli_close($conn);      
      }
}
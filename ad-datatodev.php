<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

    $client=$_GET['client'];
    if (isset($_POST['add']) ) {
        if(!empty($_POST['ndev_name']) && !empty($_POST['dev_name']) && !empty($_POST['dev_mac']) && !empty($_POST['dev_lat']) && !empty($_POST['dev_lon'])){
            include "db_conn.php";
                $client=$_GET['client'];
                $sug_name=$_POST['ndev_name'];
                $dev_nam=$_POST['dev_name'];
                $dev_mac=$_POST['dev_mac'];
                $dev_lat=$_POST['dev_lat'];
                $dev_lon=$_POST['dev_lon'];
                $sql = "INSERT INTO devices(clientname,usagename,device_name,device_id,device_LAT,device_LON) 
                        VALUES('$client','$sug_name','$dev_nam','$dev_mac','$dev_lat','$dev_lon')";        
                mysqli_query($conn, $sql);
                header("Location: device_data.php?name=".$sug_name."&mac=".$dev_mac."&client=".$client);
        }
    }

if(isset($_POST['logout'])){
    session_destroy();
    if(isset($_SESSION['uname'])&&isset($_SESSION['pass'])){
        $uname=$_COOKIE['uname'];
        $pass=$_COOKIE['pass'];
        setcookie('uname',$uname, time()-1);
        setcookie('pass', $pass, time()-1);}
    
    }
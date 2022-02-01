<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

    
    if (isset($_POST['add']) ) {
        if(!empty($_POST['campaign']) && !empty($_POST['client'])){
            include "db_conn.php";
                $camp=$_POST['campaign'];
                $client=$_POST['client'];
                        $sql1="SELECT clientname FROM client_camp WHERE campaignName ='".$camp."' AND clientname = '".$client."'";
                        $result=mysqli_query($conn, $sql1);
                        $count = mysqli_num_rows($result);  
                        if($count == 0){
                                        $sql = "INSERT INTO client_camp(clientname,campaignName) 
                                        VALUES('$client','$camp')";
                                        
                                mysqli_query($conn, $sql);
                                header("Location: client_camp_view.php?".$client);
                            
                        }
                        else{
                            header("Location: client_camp_view.php?".$client);
                            echo '<script>alert("DATA ALREADY EXISTS..!")</script>';
                        }
        }
    else {?>
        <script>alert("select campaign before adding..!")</script>
        <?php 
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
    echo "<form action='index.php' method='post'>
    <input type='submit' name='logout' value='logout'>
</form>";
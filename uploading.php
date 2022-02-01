<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

    if (isset($_POST['add']) && isset($_FILES["imgs"])) {
        if(!empty($_POST['camp']) ){
            include "db_conn.php";
            foreach($_FILES['imgs']['tmp_name'] as $key=>$value){
                $img_name = $_FILES['imgs']['name'][$key];
                $img_size = $_FILES['imgs']['size'][$key];
                $tmp_name = $_FILES['imgs']['tmp_name'][$key];
                $error = $_FILES['imgs']['error'][$key];
                $camp=$_POST['camp'];
                    if ($img_size > 125000000) {
                        $em = "Sorry, your file is too large.";
                        header("Location: camp_view.php?error=$em");
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("jpg", "jpeg", "png");
                        $name= uniqid();
                        $new_img_name ="IMG-".'.'.$camp.'.'.$name.'.'.$img_ex_lc;
                        $sql1="SELECT unique_id FROM main WHERE unique_id  LIKE '".$new_img_name."'";
                        $result=mysqli_query($conn, $sql1);
                        $count = mysqli_num_rows($result);
                        if($count == 0){
                            echo $img_ex_lc, $allowed_exs;
                            if (in_array($img_ex_lc, $allowed_exs)) {
                                echo '<script>alert("666")</script>';
                                $img_upload_path = 'uploads/'.$new_img_name;
                                if(move_uploaded_file($tmp_name, $img_upload_path)){
                                    $print="SUCCESFUL";
                                    echo $print;
                                    
                                    $sql = "INSERT INTO main(unique_id,img_name,campaign) 
                                        VALUES('$new_img_name','$name','$camp')";
                                        var_dump (mysqli_query($conn, $sql));
                                        header("Location: camp_view.php?".$camp);
                                }
                                else{
                                    echo '<script>alert("oops")</script>';
                                }
                            }else {
                                echo '<script>alert("oops1")</script>';
                            }
                        }
                        else{
                            echo '<script>alert("oops2")</script>';
                        }
                    }
            }	
        }
    }else {
        echo '<script>alert("oops3")</script>';
    }


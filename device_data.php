<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iBridge.Digital</title>
    <style>
        body{
            background:#d9d9d9;
        }
        .x{
            position: absolute;
            border:3px solid brown;
            width:30%;
            height:80%;
            right:3%;
        }
        .b2{
            position: absolute;
            border:3px solid brown;
            width:35%;
            height:80%;
            left:60%;
            top:13%;
        }
        .b3{
            position: relative;
            margin: 10px;
            background:brown;
            height:96%;
        }
        .y{
            background:brown;
            position: relative;
            width:91%;
            color:white;
            padding:20px;
            text-align: center;
            font-size:25px;
        }
        .z{
            color:black;
            font-weight:bold;
            position: relative;
            height: 100%;
            text-align: center;
            top:35%;
            bottom:50%;
            font-size:50px;
        }
        .a1{
            position:relative;
            top:20%;
            padding-top:20px;
            padding-left:10px;
            font-size:30px;
        }
        .a2{
            position:relative;
            left:60%;
            padding:5px;
            background:white;
            font-weight:bold;
            cursor: pointer;
        }
        .a3{
            height:20px;
            background:none;
            width:50%;
            border:none;
            border-bottom:2px solid brown;
        }
        input[type=text]:focus{
            border-bottom:2px solid brown;
            outline: none;
        }
        .p{
            position: absolute;
            border:3px solid brown;
            width:55%;
            height:80%;
            left:3%;
            top:13%;
        }
        .q{
            background:brown;
            position: relative;
            width:95%;
            color:white;
            margin:0.5px;
            padding:20px;
            text-align: left;
            font-size:25px; 
        }
        .m{
            background:none;
            border:none;
            width:30%;
            font-size: large;
        }
        .l{
            margin-top:5%;
        }
        .a4{
            position:relative;
            padding-left:10px;
            font-size:30px;
            margin-top:30%;
        }
        #over img {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            display: block;
            top:20%;
        }
        .b4{
            position: relative;
            font-size:15px;
            bottom:35%;
            padding: 12%;
            padding-left:20%;
            display: block;
        }
    </style>
</head>
<body>
    <?php include('db_conn.php');
        $name= $_GET['name'];
        $mac= $_GET['mac'];
        $cli=$_GET['client'];
        $query="SELECT * FROM devices WHERE device_id LIKE '".$mac."'";
        $sql=mysqli_query($conn, $query);
        while($row=mysqli_fetch_array($sql)){
            $Sname=$row['usagename'];
            $Dname=$row['device_name'];
            $mac=$row['device_id'];
            $lat=$row['device_LAT'];
            $lon=$row['device_LON'];
        }
        $que="DELETE FROM code_auth WHERE device_id LIKE '".$mac."';";
    ?>
    <h1 style="color:brown;padding-left:20px;margin-bottom:8;margin-top:2%"><?= $name?> :</h1>
    
    <div class="p">
    <form action="dev_scd.php?name=<?= $Sname?>&mac=<?= $mac?>&client=<?= $cli?>" method="post">
        <div class="q">Device Data:
        <input type="submit" class="a2" name="add" value="SCHEDULE CAMPAIGNS"><br>
        </div>
        <div class="a1">
        <label for="name" >Suggested device name:</label>
        <input type="text" name="ndev_name"  class="a3" size="32" placeholder="device name" maxlength="30" readonly value=<?= $Sname?> > 
        </div><br><br>
        <div>
        <label class="a4">Device name:</label>
        <input type="text" name="dev_name"  class="m"  readonly value=<?= $Dname?> >
        </div><br><br>
        <div>
        <label  class="a4">MAC id:</label>
        <input type="text" name="dev_mac"  class="m"  readonly value=<?= $mac?> >
        </div>
        <div>
        <h2 style="padding-left:10px;">Device location:</h2>
        <iframe src="https://maps.google.com/maps?q=<?= $lat?>,<?= $lon?>&hl=es;z=17&amp;output=embed" width="60%" height="190px"   style="border: 0.5px dashed black;margin-left:10%;" allowfullscreen="" loading="lazy"></iframe>
        </div><br>
        <div>
        <label  class="a4">latitude :</label>
        <input type="text" name="dev_lat"  class="m"  readonly  value=<?= $lat?>>
        <label  class="a4">longitude:</label>
        <input type="text" name="dev_lon" class="m"  readonly value=<?= $lon?> >
        </div>
        </form>
    </div>
    <div class= b2>
            <div class= b3>
                    <div id="over" style=" width:100%; height:100%">
                        <img src="facebook-like-logo-black-png-facebook-like-icon-white-white-like-icon-pnglike-png-free-transparent-png-images-pngaaacom-removebg-preview.png"  alt="DONE" width="300" height="300">
                    </div>
                    <div class=b4>
                        <h1 style="color:white;">DEVICE CONNECTED!</h1>
                    </div>
            </div>
            
    </div>
</body>
</html>



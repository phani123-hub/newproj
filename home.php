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
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="download (5)-modified.png" type="image/jpeg">
    <title>iBridge.Digital</title>
    <style>
        div img {
            width:100%;
			height: 100%;

		}
        div{
            width:14%;
        }
    </style>
</head>
<body>
    <?php include('conn.php');
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
    }
  	$query="SELECT * FROM campaigns";
  	$sql=mysqli_query($conn, $query);
	?>
    <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?><br>
    <pre><h1 style="color: brown;font-size: 32px;margin-bottom:50px; margin-left:40px">   iBridge.Digital</h1></pre>
    
    <button class="button button1" onclick="window.location.href='camps.php'">campaigns</button><br>
    <button class="button button2" onclick="window.location.href='clients.php'">clients  </button><br>
    <button class="button button3">admins  </button>
    </pre><br>  
    <div style="position: absolute;right: 6%;top:0%;height:100%;"><img src="2624a17c155ae9dffe8a1f4f666ba2d2.jpg"></div>
    <div style="color:brown;font-family:papyrus;font-size: 40px;position: absolute;right: 32%;top:9%;font-weight: bold;">“Nobody counts the number of ads you run; they just remember the impression you make.”</div>
</body>
</html>


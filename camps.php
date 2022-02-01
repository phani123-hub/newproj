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
    <style>
        body{
            background-image: url("pexels-lorenzo-242236.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: scroll;
        }
        .tab{
            display: inline-block;
        }
        th{
            padding-right:60px;
            padding-left:40px;
        }
        tr:hover{background-color: #f0f5f2;}
        .btn1 {
            line-height: 12px;
            font-size: 15pt;
            font-family: tahoma;
            margin-top: 58px;
            margin-right: 40px;
            position:absolute;
            top:0;
            right:0;    
        }
        .btn2 {
            line-height: 12px;
            font-size: 15pt;
            font-family: tahoma;
            margin-top: 58px;
            margin-right: 20px;
            position:absolute;
            top:0;
            right:0;    
        }
        a:link {
            background-color: transparent;
            color: green;
            }
        a:visited {
            background-color: transparent;
            }
        button{
            position: absolute;
            right:0;
            }
        
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="icon" href="download (5).jpg" type="image/jpeg">
    <title>campaigns</title>
    </head>
<body>
<form action="camp_upload.php" method="post" enctype="multipart/form-data">
    <input type="text" name="new_camp" id="" size="32" placeholder="new campaign-name"class="btn1" maxlength="30">
    <input type="submit" name="submit" class="btn2" value="CREATE">
</form>
<table class="tab">
<tr>
<th>CAMPAIGNS </th>
</tr>
<?php include('conn.php');
  	$query="SELECT DISTINCT campaignName FROM campaigns";
  	$sql=mysqli_query($conn, $query);
      if ($sql->num_rows > 0) {
        while($row = $sql->fetch_assoc()) {
        echo '<tr><td><a href="camp_view.php?'.$row["campaignName"].'" style="color: #004b49">'.$row["campaignName"].'</a></td><td><form action="del_camp.php?'.$row["campaignName"].'" method="post"><input type="submit" style="position:absolute;right:2%;margin-bottom:5px;" name="'.$row["campaignName"].'"
        class="button" value="Delete" /></form></td></tr>';
    }
        echo "</table>";
        } else { echo "0 results"; }
        $conn->close();
	?>
    
    </table>
    
</body>
</html>
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
        <link rel="stylesheet" href="styl.css">
        <link rel="icon" href="download (5).jpg" type="image/jpeg">
        <title>Clients</title>
        <style>
            .tab{
            
                display: inline-block;
            }
            tr:hover{background-color: #f0f5f2;}
            th{
                padding-right:60px;
                padding-left:40px;
            }
            .btn1 {
                line-height: 12px;
                font-size: 15pt;
                font-family: tahoma;
                margin-top: 48px;
                margin-right: 40px;
                position:absolute;
                top:0;
                right:0;    
            }
            .btn2 {
                line-height: 12px;
                font-size: 15pt;
                font-family: tahoma;
                margin-top: 48px;
                margin-right: 20px;
                position:absolute;
                top:0;
                right:0;    
            }
            
        </style>
    </head>
    <body>
    <table>
    <tr>
    <th>CLIENTS</th>
    </tr>
    <form action="client_upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="new_client" id="" size="32" placeholder="new client-name" form autocomplete="off"                  class="btn1" maxlength="30">
        <input type="submit" name="submit" class="btn2" value="CREATE">
    </form>
    <?php include('conn.php');
    
          $query="SELECT DISTINCT client FROM clients";
          $sql=mysqli_query($conn, $query);
          if ($sql->num_rows > 0) {
            while($row = $sql->fetch_assoc()) {
            echo '<tr><td><a href="client_camp_view.php?'.$row["client"].'" style="color:#004b49">'.$row["client"].'</a></td><td><form action="del_client.php?'.$row["client"].'" method="post"><input type="submit" style="position:absolute;right:2%;margin-bottom:5px;""
            class="button" value="Delete" /></form></td></tr>';
            }
            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();
        ?>
        
        </table>
    </body>
    </html>
 

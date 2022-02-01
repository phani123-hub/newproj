<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

?>

<?php     include "conn.php"; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="download (5).jpg" type="image/jpeg">
        <title>Document</title>
        <style>
            body {
                display: flex;
                flex-wrap: wrap;
                min-height: 100vh;
                background-image: url("pexels-lorenzo-242236.jpg");
                background-size: cover;
                height: auto;
                width: auto;
            }
            .alb {
                width: 300px;
                height: 300px;
                padding: 10px;
                margin-top:70px;
                margin-right:10px;
                margin-left:60px;
                border:10px solid #004b49;
                background:#e6e6e6;
                border-radius: 10px;
            }
            .alb img {
                width: 98%;
                height: 93%;
    
            }
            .btn {
                position:absolute;
                top:30;
                right: 0;
                border: none;
                padding: 16px ;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 8px 10px;
                transition-duration: 0.2s;
                cursor: pointer;
                color: white; 
                border-radius:25px;
                background-color: #004b49;
            }
            .btn:hover {
                background-color: #004b49;
                color: white;
                padding-right:40px;
                border-radius:25px;
            }
            .btn1 {
                position:absolute;
                top:60;
                right: 0;
                border: none;
                padding: 16px ;
                padding-left:50px;
                padding-right:50px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 70px 10px;
                transition-duration: 0.2s;
                cursor: pointer;
                color: white; 
                background-color: #004b49;
                border-radius:25px;
            }
            .btn1:hover {
                background-color: #004b49;
                color: white;
                padding-right:90px;
            }
            h2{
                text-align: center;
                
            }
            .un{
                position: absolute;
                display:inline-block;
                top:0;
                left:0;
            }
        </style>
    </head>
    <body>
        <?php $name= $_SERVER["QUERY_STRING"];?>
        <?php echo "<div><h2 style='color:#004b49;font-size:30px;position:absolute;top:0;margin-bottom:30px;'>$name :</h2></div><br>";?>
          <form action="uploading.php" method="post" enctype="multipart/form-data" >
              <input type="text" name="camp" style="visibility:hidden;" class="un" value=<?= $name ?> readonly>
              <label for="files" class="btn">  SELECT IMAGES</label>
              <input id="files" style="visibility:hidden;" class="un" type="file" name="imgs[]" multiple>
              <input type="submit" value="+ ADD" class="btn1" name="add">
            </form><br>
    <?php 
        
          $url = $_SERVER;
          $name= $_SERVER["QUERY_STRING"];
          $sql = "SELECT unique_id FROM main WHERE campaign LIKE '".$name."'";
          $res = mysqli_query($conn,  $sql);
          if (mysqli_num_rows($res) > 0) {
              while ($images = mysqli_fetch_assoc($res)) {  ?>
             <div class="alb" >
                 <img  style="border: 4px solid #004b49;" src="uploads/<?=$images['unique_id']?>">
                 <form action="del_img.php?<?=$images['unique_id']?>" method="post"><input type="submit" value="delete" style="border: none;margin-left: 250px;padding:2px;font-weight: bold;cursor: pointer;color:red; background: none;"> <input type="text" style="visibility:hidden;height: 1em;padding:0;margin:0;font-size:1px;" readonly name="camp" value=<?=$name?>></form>
             </div>
                  
    <?php } }?>
    </body>
    </html>

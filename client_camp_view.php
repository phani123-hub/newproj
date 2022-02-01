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
          .x{
              position: absolute;
              top:2%;
              right:4%;
          }
          .y{
              position: absolute;
              top:2%;
              right:1%;
          }
          .dropdown-btn:hover{
      color: #f1f1f1;
    background: #008080;
  }
  .sidenav {
    width: 96%;
    position: relative;
    padding-top: 20px;
    margin-left:20px;
  }
   .dropdown-btn {
    padding: 10px 8px 10px 10px;
    text-decoration: none;
    font-size: 35px;
    display: block;
    border: none;
    background: #004b49;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    color: white;
    border-radius:5px;
    transition-duration: 0.6s;
  }
  .sidenav a{
    padding: 10px 8px 10px 10px;
    width: 90%;
    text-decoration: none;
    font-size: 25px;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    color:#004b49;
  }
  .dropdown-container {
    display: none;
    padding-right: 3%;
  }
  .fa-caret-down {
    float: right;
    padding-right: 8px;
  }
  a:hover{
    background-color:#f2f2f2;
  }
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  .add{
      border:none;
      cursor: pointer;
      margin-top:10px;
      position: sticky;
      left:0;
      background:#004b49;
      color:white;
      padding:15px;
      border-radius:10px;
      transition-duration: 0.6s;
  }
  .add:hover{
      background:#008080;
      padding-right :40px;
      padding-left :15px;
  }
</style>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="styl.css">
      <link rel="icon" href="download (5).jpg" type="image/jpeg">
      <title>campaigns</title>
  </head>
  <body>
  <?php include('db_conn.php');
      $query="SELECT * FROM campaigns";
      $sql=mysqli_query($conn, $query);
      $url = $_SERVER;
      $name= $_SERVER["QUERY_STRING"];
    ?>
      <h1 style="color:brown;padding-left:20px;margin-bottom:8;margin-top:2%"><?= $name?> :</h1>
      <form action="add_campTOclients_upload.php" method="post" enctype="multipart/form-data">
      <input type="text" name="client" style="visibility:hidden;margin:0%;font-size:1px;margin:0;padding:0;position:absolute;top:0;"  value=<?= $name ?> readonly>
       <input type="text" size="32"  placeholder="choose campaign to add" list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row=mysqli_fetch_array($sql)){?>
           <option><?php echo $row['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="ADD" >
  </form>
  
  <?php 
  $code= substr(uniqid(),5,12);
      if ($result = $conn -> query("SELECT campaignName FROM client_camp WHERE clientname LIKE '".$name."'")) 
            {
              
          }
          echo '<div class="sidenav">
                  <button class="dropdown-btn">CAMPAIGNS 
                  <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-container">';
          while($row = mysqli_fetch_array($result)) 
          {
            echo ('<a href="camp_view.php?'.$row["campaignName"].'">' . $row['campaignName'] . "</a>");
          }
          echo '</div>
          </div>';
          if ($result = $conn -> query("SELECT * FROM devices WHERE clientname LIKE '".$name."'")) 
            {
              
          }
          echo '<div class="sidenav">
                  <button class="dropdown-btn">DEVICES 
                  <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-container">
                  <form action="add_device.php?client='.$name.'&code='.$code.'" method="post"><div><button type="submit" class="add">ADD NEW DEVICE</button></div></form>';
          while($row = mysqli_fetch_array($result)) 
          {
            echo ('<a href="device_data.php?name='.$row["usagename"].'&mac='.$row["device_id"].'&client='.$name.'">' . $row['usagename'] . "</a>");
          }
          echo '</div>
          </div>'
    ?>
  <script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
  }
  </script>
  </body>
  </html>

<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background:#f5eec2;
    }
    ::placeholder {
      color: #39335f;
      font-weight:bold;
  }
    h1,h2{
        color:#39395f;
        display: inline-block;
    }
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  padding-top:10%;
 }
 td {
  border: 2px solid #39395f;
  text-align: left;
  padding: 8px;
 }
 th{
  border: 2px solid #39395f;
  text-align: left;
  padding: 8px;
  background:#39395f;
  color:white;
 }
 .x{
    background:none;
    border:none;
    border-bottom: 2px solid #39395f;
     cursor: pointer;
 }
 .y{
    background:#39395f;
    color:white;
    font-weight:bold;
    border:none;
    cursor: pointer;
    border-radius:5px;
 }
 .y:active{
   background:#000033;
 }
 .y:hover{
   background:#809fff;
 }
</style>
<body>
<?php
$client=$_GET['client'];
$sug_name=$_GET['name'];
$dev_mac=$_GET['mac'];
include "db_conn.php";
    if (isset($_POST['add']) ) {
        if(!empty($_POST['ndev_name'])){
            // && !empty($_POST['dev_name']) && !empty($_POST['dev_mac']) && !empty($_POST['dev_lat']) && !empty($_POST['dev_lon'])
            
                $client=$_GET['client'];
                $sug_name=$_POST['ndev_name'];
                $dev_nam=$_POST['dev_name'];
                $dev_mac=$_POST['dev_mac'];
                $dev_lat=$_POST['dev_lat'];
                $dev_lon=$_POST['dev_lon'];
        }
    }
    include('db_conn.php');
  
      $query="SELECT * FROM client_camp WHERE clientname LIKE '".$client."'";
      $sql=mysqli_query($conn, $query);
      
    
      

if(isset($_POST['logout'])){
    session_destroy();
    if(isset($_SESSION['uname'])&&isset($_SESSION['pass'])){
        $uname=$_COOKIE['uname'];
        $pass=$_COOKIE['pass'];
        setcookie('uname',$uname, time()-1);
        setcookie('pass', $pass, time()-1);}
    
    }
?>
    <h1><?= $sug_name?>/</h1><h2><?= $client?>:</h2>
<table>
  <tr>
    <th>SNO</th>
    <th>SLOT</th>
    <th>CAMPAIGN</th>
  </tr>
  <tr>
    <td>1</td>
    <td>00:00 - 01:00</td>
    <td>                    
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&from=00:00&to=01:00" method="post" enctype="multipart/form-data">
      <?php $sql1="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='00:00' AND to_TM='01:00')";
        $result1 = mysqli_query($conn,$sql1);
        $value="default";
        if ($result1->num_rows == 1) {
          while($row1 = $result1->fetch_assoc()) {
              $value=$row1['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row1a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row1a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
        <input type="submit" class="y"  name="add" value="SAVE" >
    </form>
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td>01:00 - 02:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=01:00&to=02:00" method="post" enctype="multipart/form-data">
    <?php $sql2="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='01:00' AND to_TM='02:00')";
        $result2 = mysqli_query($conn,$sql2);
        $value="default";
        if ($result2->num_rows == 1) {
          while($row2 = $result2->fetch_assoc()) {
              $value=$row2['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row2a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row2a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
        <input type="submit" class="y"  name="add" value="SAVE" >
    </form>
    </td>
  </tr>
  <tr>
    <td>3</td>
    <td>02:00 - 03:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=02:00&to=03:00" method="post" enctype="multipart/form-data">
    <?php $sql3="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='02:00' AND to_TM='03:00')";
        $result3 = mysqli_query($conn,$sql3);
        $value="default";
        if ($result3->num_rows == 1) {
          while($row3 = $result3->fetch_assoc()) {
              $value=$row3['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row3a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row3a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>4</td>
    <td>03:00 - 04:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=03:00&to=04:00" method="post" enctype="multipart/form-data">
    <?php $sql4="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='03:00' AND to_TM='04:00')";
        $result4 = mysqli_query($conn,$sql4);
        $value="default";
        if ($result4->num_rows == 1) {
          while($row4 = $result4->fetch_assoc()) {
              $value=$row4['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row4a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row4a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>5</td>
    <td>04:00 - 05:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=04:00&to=05:00" method="post" enctype="multipart/form-data">
    <?php $sql5="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='04:00' AND to_TM='05:00')";
        $result5 = mysqli_query($conn,$sql5);
        $value="default";
        if ($result5->num_rows == 1) {
          while($row5 = $result5->fetch_assoc()) {
              $value=$row5['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row5a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row5a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>6</td>
    <td>05:00 - 06:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=05:00&to=06:00" method="post" enctype="multipart/form-data">
    <?php $sql6="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='05:00' AND to_TM='06:00')";
        $result6 = mysqli_query($conn,$sql6);
        $value="default";
        if ($result6->num_rows == 1) {
          while($row6 = $result6->fetch_assoc()) {
              $value=$row6['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row6a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row6a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>7</td>
    <td>06:00 - 07:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=06:00&to=07:00" method="post" enctype="multipart/form-data">
    <?php $sql7="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='06:00' AND to_TM='07:00')";
        $result7 = mysqli_query($conn,$sql7);
        $value="default";
        if ($result7->num_rows == 1) {
          while($row7 = $result7->fetch_assoc()) {
              $value=$row7['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row7a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row7a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>8</td>
    <td>07:00 - 08:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=00:07&to=08:00" method="post" enctype="multipart/form-data">
    <?php $sql8="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='07:00' AND to_TM='08:00')";
        $result8 = mysqli_query($conn,$sql8);
        $value="default";
        if ($result8->num_rows == 1) {
          while($row8 = $result8->fetch_assoc()) {
              $value=$row8['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row8a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row8a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>9</td>
    <td>08:00 - 09:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=08:00&to=09:00" method="post" enctype="multipart/form-data">
    <?php $sql9="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='08:00' AND to_TM='09:00')";
        $result9 = mysqli_query($conn,$sql9);
        $value="default";
        if ($result9->num_rows == 1) {
          while($row9 = $result9->fetch_assoc()) {
              $value=$row9['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row9a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row9a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>10</td>
    <td>09:00 - 10:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=09:00&to=10:00" method="post" enctype="multipart/form-data">
    <?php $sql10="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='09:00' AND to_TM='10:00')";
        $result10 = mysqli_query($conn,$sql10);
        $value="default";
        if ($result10->num_rows == 1) {
          while($row10 = $result10->fetch_assoc()) {
              $value=$row10['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row10a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row10a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>11</td>
    <td>10:00 - 11:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=10:00&to=11:00" method="post" enctype="multipart/form-data">
    <?php $sql11="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='10:00' AND to_TM='11:00')";
        $result11 = mysqli_query($conn,$sql11);
        $value="default";
        if ($result11->num_rows == 1) {
          while($row11 = $result11->fetch_assoc()) {
              $value=$row11['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row11a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row11a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>12</td>
    <td>11:00 - 12:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=11:00&to=12:00" method="post" enctype="multipart/form-data">
    <?php $sql12="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='11:00' AND to_TM='12:00')";
        $result12 = mysqli_query($conn,$sql12);
        $value="default";
        if ($result12->num_rows == 1) {
          while($row12 = $result12->fetch_assoc()) {
              $value=$row12['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row12a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row12a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>13</td>
    <td>12:00 - 13:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=12:00&to=13:00" method="post" enctype="multipart/form-data">
    <?php $sql13="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='12:00' AND to_TM='13:00')";
        $result13 = mysqli_query($conn,$sql13);
        $value="default";
        if ($result13->num_rows == 1) {
          while($row13 = $result13->fetch_assoc()) {
              $value=$row13['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row13a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row13a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>14</td>
    <td>13:00 - 14:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=13:00&to=14:00" method="post" enctype="multipart/form-data">
    <?php $sql14="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='13:00' AND to_TM='14:00')";
        $result14 = mysqli_query($conn,$sql14);
        $value="default";
        if ($result14->num_rows == 1) {
          while($row14 = $result14->fetch_assoc()) {
              $value=$row14['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row14a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row14a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>15</td>
    <td>14:00 - 15:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=14:00&to=15:00" method="post" enctype="multipart/form-data">
    <?php $sql15="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='14:00' AND to_TM='15:00')";
        $result15 = mysqli_query($conn,$sql15);
        $value="default";
        if ($result15->num_rows == 1) {
          while($row15 = $result15->fetch_assoc()) {
              $value=$row15['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row15a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row15a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>16</td>
    <td>15:00 - 16:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=15:00&to=16:00" method="post" enctype="multipart/form-data">
    <?php $sql16="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='15:00' AND to_TM='16:00')";
        $result16 = mysqli_query($conn,$sql16);
        $value="default";
        if ($result16->num_rows == 1) {
          while($row16 = $result16->fetch_assoc()) {
              $value=$row16['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row16a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row16a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>17</td>
    <td>16:00 - 17:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=16:00&to=17:00" method="post" enctype="multipart/form-data">
    <?php $sql17="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='16:00' AND to_TM='17:00')";
        $result17 = mysqli_query($conn,$sql17);
        $value="default";
        if ($result17->num_rows == 1) {
          while($row17 = $result17->fetch_assoc()) {
              $value=$row17['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row17a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row17a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>18</td>
    <td>17:00 - 18:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=17:00&to=18:00" method="post" enctype="multipart/form-data">
    <?php $sql18="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='17:00' AND to_TM='18:00')";
        $result18 = mysqli_query($conn,$sql18);
        $value="default";
        if ($result18->num_rows == 1) {
          while($row18 = $result18->fetch_assoc()) {
              $value=$row18['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row18a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row18a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>19</td>
    <td>18:00 - 19:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=18:00&to=19:00" method="post" enctype="multipart/form-data">
    <?php $sql19="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='18:00' AND to_TM='19:00')";
        $result19 = mysqli_query($conn,$sql19);
        $value="default";
        if ($result19->num_rows == 1) {
          while($row19 = $result19->fetch_assoc()) {
              $value=$row19['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row19a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row19a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>20</td>
    <td>19:00 - 20:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=19:00&to=20:00" method="post" enctype="multipart/form-data">
    <?php $sql20="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='19:00' AND to_TM='20:00')";
        $result20 = mysqli_query($conn,$sql20);
        $value="default";
        if ($result20->num_rows == 1) {
          while($row20 = $result20->fetch_assoc()) {
              $value=$row20['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row20a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row20a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>21</td>
    <td>20:00 - 21:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=20:00&to=21:00" method="post" enctype="multipart/form-data">
    <?php $sql21="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='20:00' AND to_TM='21:00')";
        $result21 = mysqli_query($conn,$sql21);
        $value="default";
        if ($result21->num_rows == 1) {
          while($row21 = $result21->fetch_assoc()) {
              $value=$row21['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row21a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row21a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>22</td>
    <td>21:00 - 22:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=21:00&to=22:00" method="post" enctype="multipart/form-data">
    <?php $sql22="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='21:00' AND to_TM='22:00')";
        $result22 = mysqli_query($conn,$sql22);
        $value="default";
        if ($result22->num_rows == 1) {
          while($row22 = $result22->fetch_assoc()) {
              $value=$row22['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row22a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row22a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>23</td>
    <td>22:00 - 23:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=22:00&to=23:00" method="post" enctype="multipart/form-data">
    <?php $sql23="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='22:00' AND to_TM='23:00')";
        $result23 = mysqli_query($conn,$sql23);
        $value="default";
        if ($result23->num_rows == 1) {
          while($row23 = $result23->fetch_assoc()) {
              $value=$row23['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row23a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row23a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
  <tr>
    <td>24</td>
    <td>23:00 - 24:00</td>
    <td>
    <form action="update_schedule.php?name=<?= $sug_name?>&mac=<?= $dev_mac?>&client=<?= $client?>&&from=23:00&to=24:00" method="post" enctype="multipart/form-data">
    <?php $sql24="SELECT * FROM schedule WHERE (device_id='".$dev_mac."' AND device_name='".$sug_name."' AND client='".$client."' AND from_TM='23:00' AND to_TM='24:00')";
        $result24 = mysqli_query($conn,$sql24);
        $value="default";
        if ($result24->num_rows == 1) {
          while($row24 = $result24->fetch_assoc()) {
              $value=$row24['campaign'];
          }
        }
      ?>
       <input type="text" size="32"  placeholder=<?= $value?> list="list" class="x" id="opt" name="campaign" autocomplete="off">
          <datalist id="list" >
           <?php while($row24a=mysqli_fetch_array($sql)){?>
           <option><?php echo $row24a['campaignName']; ?></option>
            <?php }?>   
          </datalist>
          <input type="submit" class="y"  name="add" value="SAVE" >
  </form>
    </td>
  </tr>
</table>
</body>
</html>

<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

?>

<?php
    include "conn.php";

      $url = $_SERVER;
      $name= $_SERVER["QUERY_STRING"];
      $sql = "SELECT unique_id FROM main WHERE campaign = '".$name."'";
      $res = mysqli_query($conn,  $sql);
      if (mysqli_num_rows($res)>0) {
      	while ($images = mysqli_fetch_assoc($res)) {

            $file_pointer = "uploads/".$images['unique_id']; 
   
            // Use unlink() function to delete a file 
            if (!unlink($file_pointer)) { 
                echo ("$file_pointer cannot be deleted due to an error"); 
            }

        }
      }

      $sql1 = "DELETE FROM main WHERE campaign ='".$name."'";
      $sql2 = "DELETE FROM client_camp WHERE campaignName ='".$name."'";
      $sql3 = "DELETE FROM campaigns WHERE campaignName ='".$name."'";
      
      if (mysqli_query($conn, $sql1)&&mysqli_query($conn, $sql2)&&mysqli_query($conn, $sql3)) {
        header("Location: camps.php");
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
      mysqli_close($conn);      
?>
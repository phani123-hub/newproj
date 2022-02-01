<?php

    if(isset($_POST['deviceCode'])&&isset($_POST['deviceName'])&&isset($_POST['UDID'])&&isset($_POST['LAT'])&&isset($_POST['LOG'])){
        $code = $_POST['deviceCode'];
        $name = $_POST['deviceName'];
        $udid = $_POST['UDID'];
        $lat = $_POST['LAT'];
        $log = $_POST['LOG'];
        include conn.php;
        if($name==null||$name==null||$log==null||$lat==null){
            echo json_encode("Try_Again");
        }
        else{
            $query="SELECT client_name FROM code_auth WHERE code = '".$code."'";
  	        $sql=mysqli_query($conn, $query);
            if ($sql->num_rows == 1) {
                while($row = $sql->fetch_assoc()) {
                    $client_name = $row["client_name"];
                }

                $query="INSERT INTO code_auth (device_name, device_id, device_LAT, device_LON)
                VALUES ( '".$name."', '".$uuid."','".$lat."','".$log."') WHERE code = '".$code."'";
                if($sql=mysqli_query($conn, $query)){
                    echo json_encode($udid);
                }
                else
                echo json_encode("Error");
            } 
            else { 
                echo json_encode("Error"); 
            }
            $conn->close();

        }

    }
    else{
        echo json_encode("Error");
    }

?>
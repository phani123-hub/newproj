<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

?>

<?php
	if (isset($_POST['submit'])) {
		if(!empty($_POST['new_client']) ){
			include "db_conn.php";
			$client=$_POST['new_client'];
				$sql1="SELECT client FROM clients WHERE client  LIKE '".$client."'";
				$result=mysqli_query($conn, $sql1);
				$count = mysqli_num_rows($result);
				if($count == 0){
						$sql = "INSERT INTO clients(client) 
								VALUES('$client')";		
						mysqli_query($conn, $sql);
						header("Location: client_camp_view.php?".$client);
				}
				else{
					$em = "DATA ALREADY EXIST...!";
					header("Location: client_camp_view.php?".$camp);
				}
		}
		else{
			echo('ENTER CAMPAIGN NAME');
		}
	}else {
		echo('ERROR');
	}
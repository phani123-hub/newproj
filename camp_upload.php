<?php
    session_start();
    if(!isset($_SESSION['uname'])&&!isset($_SESSION['pass'])){
        header("location: login.php");
        exit();
    }

?>

<?php 

	if (isset($_POST['submit'])) {
		if(!empty($_POST['new_camp']) ){
			include "db_conn.php";
			$camp=$_POST['new_camp'];
				$sql1="SELECT campaignName FROM campaigns WHERE campaignName  LIKE '".$camp."'";
				$result=mysqli_query($conn, $sql1);
				$count = mysqli_num_rows($result);
				if($count == 0){
						$sql = "INSERT INTO campaigns(campaignName) 
								VALUES('$camp')";		
						mysqli_query($conn, $sql);
						header("Location: camp_view.php?".$camp);
					
				}
				else{
					$em = "DATA ALREADY EXIST...!";
					header("Location: index.php?error=$em");
				}
		}
		else{
			echo('ENTER CAMPAIGN NAME');
		}
	}else {
		echo('ERROR');
	}
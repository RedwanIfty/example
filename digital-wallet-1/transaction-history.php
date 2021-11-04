<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transaction History</title>
</head>
<body>
	<h1>Page 3[Transaction History]</h1>
	<h2>Digital Waller</h2>
	<p>1.<a href="home.php">Home</a>
	   2.<a href="add-beneficiary.php">Add Bebeficiary</a>
	   3.<a href="transaction-history.php">Transaction History</a>
	   
	</p>
	<h3>Transaction History:</h3>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="GET">
		From:
		<input type="datetime-local" name="datetimefrom">
		To:
		<input type="datetime-local" name="datetimeto">
		<input type="submit" name="search" value="Search">

	</form>
	<br><br>

	<?php
		if($_SERVER['REQUEST_METHOD']=="GET"){
			if(empty($_GET['datetimefrom']) or empty($_GET['datetimeto']))
			{
				echo "Time date required";
			}
			else
			{	$handle2 = fopen("data.json","r");
				$data2=fread($handle2,filesize("data.json"));
				$explode=explode("\n",$data2 );
				array_pop($explode);
				$arr2=array();
				for ($i=0; $i <count($explode); $i++) { 
					// code...
					$json=json_decode($explode[$i]);
					array_push($arr2, $json);

				}
					$count=0;
				//	echo "<b>Total records</b>(".$count.")";
				//	echo "<br><br>";
					echo "<table border='1'>"; 
						echo "<thead>";
	 					echo "<tr>";
	 						echo	"<th>Transaction Catagory</th>";
						 				
	 					echo "<th>To</th>";
	 					echo "<th>Ammount</th>";
	 					echo "<th>Transferred On</th>";
	 					echo "</tr>";
	 					echo "</thead>";
	 					echo "<tbody>";

			 				for($k=0;$k<count($arr2)-1;$k++)
			 				{
			 					if($arr2[$k]->ttimedate >= $_GET['datetimefrom'] and $arr2[$k]->ttimedate <= $_GET['datetimeto'] ){
			 							$count=$count+1;
			 							echo "<tr>";
			 							echo "<td>".$arr2[$k]->Category."</td>";
			 					echo "<td>".$arr2[$k]->to."</td>";
			 					echo "<td>".$arr2[$k]->ammount."</td>";
			 					echo "<td>".$arr2[$k]->ttimedate."</td>";
			 					echo "</tr>";
			 				}
			 			//	echo "Total records".$count;
			 			}echo "<b>Total records(".$count.")</b>";
			 			echo "<br><br>";
	 					echo "</tbody>";
	 					echo "</table>";
			}
		} 
	 ?>

</body>
</html>

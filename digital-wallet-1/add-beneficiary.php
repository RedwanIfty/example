<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Beneficiary</title>
</head>
<body>
	<h1>Page 2[Add Beneficiary]</h1>
	<h2>Digital Waller</h2>
	<p>1.<a href="home.php">Home</a>
	   2.<a href="add-beneficiary.php">Add Bebeficiary</a>
	   3.<a href="transaction-history.php">Transaction History</a>
	   
	</p>
	<h3>Add Beneficiary:</h3>
	<?php
		$beneficiaryNameErr=$mobileErr=$beneficiaryName=$mobile=$saved= " ";
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(empty($_POST['beneficiary'])){
				$beneficiaryNameErr="Name requried";
			}
			else
			{
				$beneficiaryName=sanitize($_POST['beneficiary']);
			}
			if(empty($_POST['mobile'])){
				$mobileErr="Phone number requried";
			}
			else
			{
				if(strlen($_POST['mobile'])<11)
				{
					$mobileErr="Invalid mobile number";
				}
				else
					{
						$mobile=sanitize($_POST['mobile']);
					}
			}
			if(empty($_POST['beneficiary'])==false and empty($_POST['mobile'])==false and strlen($_POST['mobile'])<11==false)
				{
					$handle=fopen("data1.json", "a");
					$arr1=array('beneficiary' => $_POST['beneficiary'],'mobile' => $_POST['mobile']);
					$encode=json_encode($arr1);
					$res1=fwrite($handle, $encode ."\n");
					if($res1)
					{
						$saved ="Saved successful";
					}
					else 
						echo "Error while saving";

				}
		}

				function sanitize($data){
				$data=trim($data);
				$data=stripslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}

	 ?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	  Beneficiary Name:
	  <input type="text" name="beneficiary"><?php echo $beneficiaryNameErr; ?>
	  <br><br>
	  Mobile :
	  <input type="number" name="mobile" ><?php echo $mobileErr; ?>
	  <br><br>
	  <input type="submit" name="submit"><br><br><?php echo $saved ?>
	<br><br>
	</form>
	<?php
		$handle2 = fopen("data1.json","r");
		$data2=fread($handle2,filesize("data1.json"));
		$explode=explode("\n",$data2 );
		array_pop($explode);
		$arr2=array();
		for ($i=0; $i <count($explode); $i++) { 
			// code...
			$json=json_decode($explode[$i]);
			array_push($arr2, $json);
		}
	 ?>
	 <table border="1">
	 	<thead></thead>
	 	<tbody>
	 		<?php
	 			for ($k=0; $k < count($arr2); $k++) { 
	 			 	echo "<tr>";
	 			 	echo "<td>".$arr2[$k]->beneficiary."</td>";
	 			 	echo "<td>".$arr2[$k]->mobile."</td>";
	 			 	echo "</tr>";
	 			 } 
	 		 ?>
	 	</tbody>
	 </table>

</body>
</html>
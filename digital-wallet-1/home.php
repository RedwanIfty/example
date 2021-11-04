<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<h1>Page 1[Home]</h1>
	<h2>Digital Waller</h2>
	<p>1.<a href="home.php">Home</a>
	   2.<a href="add-beneficiary.php">Add Bebeficiary</a>
	   3.<a href="transaction-history.php">Transaction History</a>
	   
	</p>
	<h3>Fund Transfer:</h3>
		<?php
			$selectCategoryErr=$toErr=$ammountErr=$timedateErr=$selectCategory=$to=$ammount=$saved="";
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(empty($_POST['Category']))
				{
					$selectCategoryErr="Select Category";
				}
				else 
				{
					$selectCategory=sanitize($_POST['Category']);
				}
				if(empty($_POST['to']))
				{
					$toErr="Whom you want to send";
				}
				else 
				{
					$to=sanitize($_POST['to']);
				}
				if(empty($_POST['ammount']))
				{
					$ammountErr="Ammount can not be empty";
					
				}
				else 
				{	if ($_POST['ammount']<0) {
						$ammountErr="Invalid ammount";
					}
					else
					{
						$ammount=sanitize($_POST['ammount']);
					}
				}
				if(empty($_POST['ttimedate']))
				{
					$timedateErr="Time date required";
				}
				if(empty($_POST['Category'])==false and empty($_POST['to'])==false and empty($_POST['ammount'])==false and $_POST['ammount']>0 and empty($_POST['ttimedate'])==false)
				{
					$handle=fopen("data.json", "a");
					$arr=array('Category' => $_POST['Category'],'to' => $_POST['to'],'ammount'=>$_POST['ammount'],'ttimedate'=>$_POST['ttimedate']);
					$encode=json_encode($arr);
					$res=fwrite($handle, $encode ."\n");
					if($res)
					{
						$saved= "Saved successful";
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
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
	  ?>">
	  <b>Select Category:</b>
	  <select name="Category" id="Category">
	  	<option value="">Select a value</option>
	  	<option value="Pay money">Pay Money</option>
	  	<option value="Recharge">Recharge</option>
	  </select><?php echo $selectCategoryErr; ?>
	  <br><br>
	  <b>To:</b>
	  <input type="text" name="to"><?php echo $toErr; ?>
	  <br><br>
	  <b>Ammount:</b>
	  <input type="number" name="ammount" ><?php echo $ammountErr; ?>
	  <br><br>
	  <b>Transferred On:</b>
	  <input type="datetime-local" name="ttimedate"><?php
	  echo $timedateErr;  ?>
	  <br><br>
	  <input type="submit" name="submit">
	  <br><br>
	  <?php echo $saved; ?>
	</form>
</body>
</html>
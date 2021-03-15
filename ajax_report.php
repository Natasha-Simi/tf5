 <?php

 	// $data = "here";

 	// echo json_encode($data);

 	// echo $_POST['name'];

 	function returnData($asset,$status,$description,$u_id)
 	{
 		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "centum";
		$date = date('Y-m-d'); 
		// $_POST['floor_id'] = 8;
		try 
		{
		  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $stmt = $conn->prepare("INSERT INTO `report`(`assetTag`, `status`, `description`, `date`, `user_id`) VALUES (:asset,:status,:description,:_date,:u_id)");
		  
		  $stmt->bindParam(':asset',$asset);
		  $stmt->bindParam(':status',$status);
		  $stmt->bindParam(':description',$description);
		  $stmt->bindParam(':_date',$date);
		  $stmt->bindParam(':u_id',$u_id);
		  $stmt->execute();
		  // $stmt->setFetchMode(PDO::FETCH_ASSOC);
		  // $data = "Inserted!!";
		  
		  $data = json_encode(['Response'=>"INSERTED"]);
		 	echo $data;
		} 
		catch(PDOException $e) 
		{
			$data = json_encode(['Response'=>"INSERTED"]);
		  echo $data;
		}
 	}

 	returnData($_POST['asset'],$_POST['status'],$_POST['desc'],$_POST['u_id']);
	
	$conn = null;
?> 
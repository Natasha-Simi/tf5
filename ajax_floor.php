 <?php

 	function returnData($id)
 	{
 		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "centum";
		// $_POST['floor_id'] = 8;
		try 
		{
		  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $stmt = $conn->prepare("SELECT * FROM floor where floorNumber=:id");
		  $stmt->bindParam('id',$id);
		  $stmt->execute();
		  $stmt->setFetchMode(PDO::FETCH_ASSOC);
		  $data = $stmt->fetchAll();
		  
		  $data = json_encode($data);
		 	echo $data;
		} 
		catch(PDOException $e) 
		{
		  echo "Error: " . $e->getMessage();
		}
 	}

 	returnData($_POST['floor_id']);
	
	// $conn = null;
?> 
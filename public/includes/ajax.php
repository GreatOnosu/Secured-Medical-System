<?php
if(isset($_POST['value_selected'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smbs";
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	$get_value = $_POST['value_selected'];
	try {
		$result = $conn->prepare("SELECT * FROM doctors_tb WHERE hospital = '$get_value'");
		$result->execute();
		$records = $result->fetchAll(PDO::FETCH_OBJ);
	} catch (Exception $e) {
		return false;
	}
	if(empty($records)){
		echo "<option value=''>No Doctor Available</option>";
	}else{
		$info = "<option value=''>Select a Doctor</option>";
		foreach ($records as $record) {
			$info .= "<option value='".$record->email."|".$record->first_name." ".$record->last_name."'>".$record->first_name." ".$record->last_name."</option>";
		}
		echo $info;
	}
}
if(isset($_POST['service_selected'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smbs";
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	$get_value = $_POST['service_selected'];
	try {
		$result = $conn->prepare("SELECT * FROM hospitals_tb WHERE name = '$get_value'");
		$result->execute();
		$records = $result->fetchAll(PDO::FETCH_OBJ);
	} catch (Exception $e) {
		return false;
	}
	$dbase =$records{0}->dbase;
	$dbname = $dbase;
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	try {
		$result = $conn->prepare("SELECT * FROM service_tb");
		$result->execute();
		$record = $result->fetchAll(PDO::FETCH_OBJ);
	} catch (Exception $e) {
		return false;
	}
	if(empty($record)){
		echo "<option value=''>No Service Available</option>";
	}else{
		$info = "<option value=''>Service Type</option>";
		foreach ($record as $rec) {
			$info .= "<option value='".$rec->name."'>".$rec->name."</option>";
		}
		echo $info;
	}
}
?>
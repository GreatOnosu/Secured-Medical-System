<?php
namespace Core;
use PDO;
use App\Config;
abstract class model{
	protected static function getDB(){
		static $db = null;
		if($db === null){
			try{
				$dsn = 'mysql:host='. Config::DB_HOST .';dbname='. Config::DB_NAME .';charset=utf8';
				$db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
				return $db;
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
/************************************************************************************************************/
	protected static function hospitalDB($dbase){
		static $db = null;
		if($db === null){
			try{
				$dsn = 'mysql:host='. Config::DB_HOST .';dbname='. $dbase .';charset=utf8';
				$db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
				return $db;
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
/************************************************************************************************************/
	public static function validateData($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
/************************************************************************************************************/
	public static function getData($conn, $table, $id, $value){
		try {
			$result = $conn->prepare("SELECT * FROM $table WHERE $id = '$value' ORDER BY id DESC");
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
	}
}
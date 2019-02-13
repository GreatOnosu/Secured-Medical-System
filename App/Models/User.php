<?php
namespace App\Models;
use PDO;
use App\Config;
class User extends \Core\Model{
/************************************************************************/
	public static function selectAccount(){
		$conn = static::getDB();
		if(isset($_POST['btn_select'])){
			$type = $_POST['category'];
			if($type == 'Personal'){
				header("Location:personalaccount");
			}else{
				header("Location:hospitalaccount");
			}
		}
	}
/************************************************************************/
	public static function createAccount(){
		$conn = static::getDB();
		if(isset($_POST['btn_personal'])){
			$get_fname = static::validateData($_POST['fname']);
			$get_lname = static::validateData($_POST['lname']);
			$get_dob = $_POST['dob'];
			$get_phone = static::validateData($_POST['phone']);
			$get_gender = static::validateData($_POST['gender']);
			$get_address = static::validateData($_POST['address']);
			$get_email = static::validateData($_POST['email']);
			$get_pin = static::validateData($_POST['pin']);
			$bindings = array(
				'fname' 		=>	$get_fname,
				'lname'			=>	$get_lname,
				'dob'			=> 	$get_dob,
				'gender'		=>	$get_gender,
				'address'		=>	$get_address,
				'phone'			=>	$get_phone,
				'email'			=>	$get_email,
				'pin'			=>	$get_pin,
			);
			$check_dup = static::getData($conn, 'patients_tb', 'email', $get_email);
			if(empty($check_dup)){
				try {
					$result = $conn->prepare("INSERT INTO patients_tb (first_name, last_name, dob, gender, address, phone, email, pin) VALUES (:fname, :lname, :dob, :gender, :address, :phone, :email, :pin)");
					$create_user = $result->execute($bindings);
				} catch (Exception $e) {
					return false;
				}
				if(!empty($create_user)){
					$_SESSION['user'] = $get_email;
					header("Location:../patient/index");
				}
			}else{
				$stat = '<h3 class="error">Email Address already taken</h3>';
				return $stat;
			}
		}
	}
/************************************************************************/
	public static function createHospital(){
		$conn = static::getDB();
		if(isset($_POST['btn_hospital'])){
			$get_hname = static::validateData($_POST['hname']);
			$dbase = "mbs_".preg_replace("/[^a-zA-Z]+/", "", $get_hname);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "CREATE DATABASE IF NOT EXISTS $dbase";
		    $result = $conn->exec($sql);
			if(!empty($result)){
				if(isset($_FILES['image'])){
					$image_name = $_FILES['image']['name'];
					$image_temp = $_FILES['image']['tmp_name'];
					$image_size = $_FILES['image']['size'];
					$image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
					$image_path = 'images/'.$image_name;
					if($image_size < 2000000){
						if($image_ext == 'jpg' || $image_ext = 'png' || $image_ext = 'gif'){
							if(move_uploaded_file($image_temp,$image_path)){
								$image_file = $image_path;
							}else{
								$stat = '<h3 class="error">Image upload not successful</h3>';
							}
						}else{
							$stat = '<h3 class="error">Wrong image format</h3>';
						}
					}else{
						$stat = '<h3 class="error">Image size is too big</h3>';
					}
				}
				$get_phone = static::validateData($_POST['phone']);
				$get_address = static::validateData($_POST['address']);
				$get_about = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($_POST['about_us']))))));
				$get_email = static::validateData($_POST['email']);
				$get_pin = static::validateData($_POST['pin']);
				$bindings = array(
					'hname' 		=>	$get_hname,
					'dbase'			=>	$dbase,
					'address'		=>	$get_address,
					'phone'			=>	$get_phone,
					'about'			=>	$get_about,
					'email'			=>	$get_email,
					'pin'			=>	$get_pin,
					'image'			=>	$image_file,
				);
				$check_dup = static::getData($conn, 'hospitals_tb', 'email', $get_email);
				if(empty($check_dup)){
					try {
						$result = $conn->prepare("INSERT INTO hospitals_tb (name, dbase, address, image, phone, email, pin, about_us) VALUES (:hname, :dbase, :address, :image, :phone, :email, :pin, :about)");
						$create_user = $result->execute($bindings);
					} catch (Exception $e) {
						return false;
					}
					$connect = static::hospitalDB($dbase);
					$sql = "CREATE TABLE doctor_tb (
						    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
						    firstname VARCHAR(30),
						    lastname VARCHAR(30),
						    email VARCHAR(50),
						    pin TEXT,
						    phone VARCHAR(30),
						    room VARCHAR(50),
						    free_days TEXT,
						    time_stamp TIMESTAMP
						    )";
		    		$result = $connect->exec($sql);
		    		$sql = "CREATE TABLE service_tb (
						    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
						    name VARCHAR(100),
						    time_stamp TIMESTAMP
						    )";
		    		$result = $connect->exec($sql);
		    		$sql = "CREATE TABLE facility_tb (
						    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
						    name VARCHAR(100),
						    image TEXT(),
						    rate INT(11),
						    time_stamp TIMESTAMP
						    )";
		    		$result = $connect->exec($sql);
		    		if(!empty($create_user)){
						$_SESSION['session_user'] = $get_email;
						$_SESSION['session_name'] = $get_hname;
						$_SESSION['session_dbase'] = $get_dbase;
						header("Location:../hospital/index");
					}
				}else{
					$stat = '<h3 class="error">Email Address already taken</h3>';
					return $stat;
				}
			}
		}
	}
/************************************************************************/
	public static function isLogin(){
		$conn = static::getDB();
		$stat = '';
		if(isset($_POST['btn_login'])){
			$get_email = static::validateData($_POST['userid']);
			$get_pin = static::validateData($_POST['userpass']);
			$get_account = static::validateData($_POST['category']);
			try {
				$result = $conn->prepare("SELECT * FROM $get_account WHERE email = '$get_email' AND pin = '$get_pin'");
				$result->execute();
				$log_in = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			if(!empty($log_in)){
				$_SESSION['session_user'] = $log_in{0}->email;
				$_SESSION['session_pin'] = $log_in{0}->pin;
				if($get_account == 'hospitals_tb'){
					$_SESSION['session_name'] = $log_in{0}->name;
					$_SESSION['session_dbase'] = $log_in{0}->dbase;
					header("Location:../hospital/index");
				}elseif($get_account == 'doctors_tb'){
					header("Location:../doctor/index");
				}else{
					header("Location:../patient/index");
				}
			}else{
				$stat = '<h3 class="error">Wrong Email or Password</h3>';
			}
		}
		try {
			$result = $conn->prepare("SELECT * FROM hospitals_tb LIMIT 3");
			$result->execute();
			$records1 = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		try {
			$result = $conn->prepare("SELECT * FROM hospitals_tb LIMIT 3,3");
			$result->execute();
			$records2 = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		try {
			$result = $conn->prepare("SELECT * FROM hospitals_tb LIMIT 6,3");
			$result->execute();
			$records3 = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $info = array('stat'	=> $stat, 'records1' => $records1, 'records2' => $records2, 'records3' => $records3);
	}
/************************************************************************/
	public static function isAdminLogin(){
		$conn = static::getDB();
		$stat = '';
		if(isset($_POST['admin_login'])){
			$get_user = static::validateData($_POST['username']);
			$get_pin = static::validateData($_POST['userpass']);
			try {
				$result = $conn->prepare("SELECT * FROM users_tb WHERE username = '$get_user' AND password = '$get_pin'");
				$result->execute();
				$log_in = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			if(!empty($log_in)){
				$_SESSION['session_user'] = $log_in{0}->username;
				$_SESSION['session_pin'] = $log_in{0}->password;
				header("Location:../admin/index");
			}else{
				$stat = '<h3 class="error">Wrong Username or Password</h3>';
			}
		}
		return $stat;
	}
/************************************************************************/
	public static function allBookings(){
		$conn = static::getDB();
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb LIMIT 10");
			$result->execute();
			$log_in = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $log_in;
	}
/************************************************************************/
	public static function allHospitals(){
		$conn = static::getDB();
		if(isset($_POST['del_hos'])){
			$get_id = $_POST['del_id'];
			try {
				$result = $conn->query("DELETE FROM hospitals_tb WHERE id = $get_id");
				$result->execute();
			}catch (Exception $e) {
				return false;
			}
		} 
		try {
			$result = $conn->prepare("SELECT * FROM hospitals_tb");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function allPatients(){
		$conn = static::getDB();
		if(isset($_POST['del_pat'])){
			$get_id = $_POST['del_id'];
			try {
				$result = $conn->query("DELETE FROM patients_tb WHERE id = $get_id");
				$result->execute();
			}catch (Exception $e) {
				return false;
			}
		} 
		try {
			$result = $conn->prepare("SELECT * FROM patients_tb");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function isLoginCheck(){
		if(isset($_SESSION['session_user'])){
			
		}else{
			header("Location:../Home/index");
		}
	}
/************************************************************************/
	public static function myHospital(){
		$conn = static::getDB();
		if(isset($_GET['id'])){
			$get_id = $_GET['id'];
			try {
				$result = $conn->prepare("SELECT * FROM hospitals_tb WHERE id = '$get_id'");
				$result->execute();
				$records = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			$get_dbase = $_GET['hospital'];
			$connect = static::hospitalDB($get_dbase);
			try {
				$result = $connect->prepare("SELECT * FROM facility_tb LIMIT 3");
				$result->execute();
				$facility = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			try {
				$result = $connect->prepare("SELECT * FROM service_tb LIMIT 6");
				$result->execute();
				$service = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			return $info = array('records' => $records, 'facility' => $facility, 'service' => $service);
		}
		
	}
/************************************************************************/
	public static function allDoctors(){
		$conn = static::getDB();
		$get_hospital = $_SESSION['session_name'];
		if(isset($_POST['del_doc'])){
			$get_id = $_POST['del_id'];
			try {
				$result = $conn->query("DELETE FROM doctors_tb WHERE id = $get_id");
				$result->execute();
			}catch (Exception $e) {
				return false;
			}
		} 
		try {
			$result = $conn->prepare("SELECT * FROM doctors_tb WHERE hospital = '$get_hospital'");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function updateDoctors(){
		$conn = static::getDB();
		if(isset($_POST['upd_id'])){
			$get_id = $_POST['upd_id'];
			try {
				$result = $conn->prepare("SELECT * FROM doctors_tb WHERE id = '$get_id'");
				$result->execute();
				$records = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			return $records;
		}
		if(isset($_POST['upd_doctor'])){
			$get_id = $_POST['id_doctor'];
			$get_first = static::validateData($_POST['fname']);
			$get_last = static::validateData($_POST['lname']);
			$get_phone = $_POST['phone'];
			$get_email = $_POST['email'];
			$get_room = static::validateData($_POST['room']);
			$get_pin = static::validateData($_POST['pin']);
			try {
				$result = $conn->prepare("UPDATE doctors_tb SET first_name='$get_first', last_name='$get_last', room='$get_room', phone_no='$get_phone', email='$get_email', pin = '$get_pin' WHERE id = $get_id");
				$reschedule = $result->execute();
			}catch (Exception $e) {
				return false;
			}
			if(!empty($reschedule)){
				header("Location:doctors");
			}
		}
	}
/************************************************************************/
	public static function addDoctor(){
		$conn = static::getDB();
		if(isset($_POST['btn_doctor'])){
			$get_hospital = $_SESSION['session_name'];
			$get_dbase = $_SESSION['session_dbase'];
			$get_fname = static::validateData($_POST['fname']);
			$get_lname = static::validateData($_POST['lname']);
			$get_room = static::validateData($_POST['room']);
			$get_phone = static::validateData($_POST['phone']);
			$get_email = static::validateData($_POST['email']);
			$get_pin = static::validateData($_POST['pin']);
			$bindings = array(
				'hospital' 		=>	$get_hospital,
				'fname'			=>	$get_fname,
				'lname'			=> 	$get_lname,
				'room'			=>	$get_room,
				'phone'			=>	$get_phone,
				'email'			=>	$get_email,
				'pin'			=>	$get_pin,
			);
			$bindings1 = array(
				'fname'			=>	$get_fname,
				'lname'			=> 	$get_lname,
				'room'			=>	$get_room,
				'phone'			=>	$get_phone,
				'email'			=>	$get_email,
				'pin'			=>	$get_pin,
			);
			$check_dup = static::getData($conn, 'doctors_tb', 'email', $get_email);
			if(empty($check_dup)){
				try {
					$result = $conn->prepare("INSERT INTO doctors_tb (hospital, first_name, last_name, room, phone_no, email, pin) VALUES (:hospital, :fname, :lname, :room, :phone, :email, :pin)");
					$create_user = $result->execute($bindings);
				} catch (Exception $e) {
					return false;
				}
				$connect = static::hospitalDB($get_dbase);
				try {
					$result = $connect->prepare("INSERT INTO doctor_tb (first_name, last_name, room, phone_no, email, pin) VALUES (:fname, :lname, :room, :phone, :email, :pin)");
					$result->execute($bindings1);
				} catch (Exception $e) {
					return false;
				}
				if(!empty($create_user)){
					header("Location:doctors");
				}
			}else{
				$stat = '<h3 class="error">Email already registered</h3>';
				return $stat;	
			}
		}
	}
}
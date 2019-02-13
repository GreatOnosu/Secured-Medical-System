<?php
namespace App\Models;
use PDO;
use App\Config;
class Activity extends \Core\Model{
/************************************************************************/
	public static function bookMeeting(){
		$conn = static::getDB();
		$stat = '';
		if(isset($_POST['btn_appoint'])){
			$get_user = $_SESSION['session_user'];
			$get_hospital = static::validateData($_POST['hospital']);
			$get_service = static::validateData($_POST['service']);
			$get_doa = $_POST['doa'];
			$get_tod = $_POST['tod'];
			$get_doctor = static::validateData($_POST['doctor']);
			$doc = explode('|', $get_doctor);
			$get_doctor = $doc[0];
			$get_desc = static::validateData($_POST['desc']);
			$gen = date("ymd").rand(100,999).date("ss");
			$check_doc = static::getData($conn, 'doctors_tb', 'email', $get_doctor);
			$get_fullname = $check_doc{0}->first_name.' '.$check_doc{0}->last_name;
			$get_room = $check_doc{0}->room;
			$bindings = array(
				'user'			=>	$get_user,
				'hospital' 		=>	$get_hospital,
				'service'		=>	$get_service,
				'doa'			=> 	$get_doa,
				'tod'			=>	$get_tod,
				'doctor'		=>	$get_doctor,
				'name'			=>	$get_fullname,
				'room'			=>	$get_room,
				'descrip'		=>	$get_desc,
				'appointid'		=>	$gen,
				'status'		=>	'Awaiting Confirmation',
			);
			$check_dup = static::getData($conn, 'appointments_tb', 'doa', $get_doa);
			if(empty($check_dup)){
				try {
					$result = $conn->prepare("INSERT INTO appointments_tb (user, hospital, service_type, doa, tod, requested_doctor, full_name, room, description, appointment_id, status) VALUES (:user, :hospital, :service, :doa, :tod, :doctor, :name, :room, :descrip, :appointid, :status)");
					$create_user = $result->execute($bindings);
				} catch (Exception $e) {
					return false;
				}
				if(!empty($create_user)){
					header("Location:appointments");
				}
			}else{
				$stat = '<h3 class="error">Time for appointment not available</h3>';
			}	
		}
		try {
			$result = $conn->prepare("SELECT * FROM hospitals_tb");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $info = array('records' => $records, 'stat' => $stat);
	}
/************************************************************************/
	public static function getMeeting(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		if(isset($_POST['del_app'])){
			$get_id = $_POST['del_id'];
			try {
				$result = $conn->query("DELETE FROM appointments_tb WHERE id = $get_id");
				$result->execute();
			}catch (Exception $e) {
				return false;
			}
		} 
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE user = '$get_user' AND doa >= CURDATE()");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function allMeeting(){
		$conn = static::getDB();
		$get_name = $_SESSION['session_name'];
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE hospital = '$get_name' AND doa >= CURDATE()");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function getAppointments(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		if(isset($_POST['accept_app'])){
			$accept_id = $_POST['accept_id'];
			try {
				$result = $conn->prepare("UPDATE appointments_tb SET status = 'Confirmed' WHERE id = '$accept_id'");
				$schedule = $result->execute();
			}catch (Exception $e) {
				return false;
			}
		}
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE requested_doctor = '$get_user' AND doa >= CURDATE()");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function reportMeeting(){
		$conn = static::getDB();
		$get_patient = $_POST['report_id'];
		if(isset($_POST['btn_report'])){
			$report_id = $_POST['report_id'];
			$get_attend = $_POST['attendance'];
			$get_report = $_POST['doc_report'];
			try {
				$result = $conn->prepare("UPDATE appointments_tb SET attendance = '$get_attend', report = '$get_report' WHERE id = '$report_id'");
				$schedule = $result->execute();
				if (!empty($schedule)) {
					header("Location:history");
				}
			}catch (Exception $e) {
				return false;
			}
		}
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE ID = '$get_patient'");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function appointmentHistory(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE requested_doctor = '$get_user' AND doa < CURDATE()");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function getHistory(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE user = '$get_user' AND doa < CURDATE()");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function allHistory(){
		$conn = static::getDB();
		$get_name = $_SESSION['session_name'];
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE hospital = '$get_name' AND doa < CURDATE()");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function recentAppointments(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		try {
			$result = $conn->prepare("SELECT * FROM appointments_tb WHERE requested_doctor = '$get_user' LIMIT 5");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function makeSchedule(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		$get_day1 = '';
		$get_day2 = '';
		$get_day3 = '';
		$get_day4 = '';
		$get_day5 = '';
		$get_day6 = '';
		$get_day7 = '';
		if(isset($_POST['btn_sch'])){
			$get_day1 = $_POST['day1'];
			$get_day2 = $_POST['day2'];
			$get_day3 = $_POST['day3'];
			$get_day4 = $_POST['day4'];
			$get_day5 = $_POST['day5'];
			$get_day6 = $_POST['day6'];
			$get_day7 = $_POST['day7'];
			$get_days = $get_day1.'|'.$get_day2.'|'.$get_day3.'|'.$get_day4.'|'.$get_day5.'|'.$get_day6.'|'.$get_day7;
			try {
				$result = $conn->prepare("UPDATE doctors_tb SET free_days = '$get_days' WHERE email = '$get_user'");
				$schedule = $result->execute();
			}catch (Exception $e) {
				return false;
			}
			if(!empty($schedule)){
				header("Location:index?act=ok");
			}
		}
	}
/************************************************************************/
	public static function updateMeeting(){
		$conn = static::getDB();
		if(isset($_POST['upd_id'])){
			$get_id = $_POST['upd_id'];
			try {
				$result = $conn->prepare("SELECT * FROM appointments_tb WHERE id = '$get_id'");
				$result->execute();
				$records = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			try {
				$result = $conn->prepare("SELECT * FROM hospitals_tb");
				$result->execute();
				$clinics = $result->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				return false;
			}
			return $info = array('records' => $records, 'clinics' => $clinics);
		}
		if(isset($_POST['upd_appoint'])){
			$get_id = $_POST['id_appoint'];
			$get_hospital = static::validateData($_POST['hospital']);
			$get_service = static::validateData($_POST['service']);
			$get_doa = $_POST['doa'];
			$get_tod = $_POST['tod'];
			$doctor = explode('|', $_POST['doctor']);
			$get_doctor = $doctor[0];
			$get_name = $doctor[1];
			$get_desc = static::validateData($_POST['desc']);
			try {
				$result = $conn->prepare("UPDATE appointments_tb SET hospital='$get_hospital', service_type='$get_service', doa='$get_doa', tod='$get_tod', requested_doctor='$get_doctor', full_name= '$get_name', description='$get_desc', status = 'Awaiting Confirmation' WHERE id = $get_id");
				$reschedule = $result->execute();
			}catch (Exception $e) {
				return false;
			}
			if(!empty($reschedule)){
				header("Location:appointments");
			}
		}
	}
/************************************************************************/
	public static function allServices(){
		$get_dbase = $_SESSION['session_dbase'];
		$connect = static::hospitalDB($get_dbase);
		if(isset($_POST['del_duty'])){
			$get_id = $_POST['del_id'];
			try {
				$result = $connect->query("DELETE FROM service_tb WHERE id = $get_id");
				$result->execute();
			}catch (Exception $e) {
				return false;
			}
		}
		try {
			$result = $connect->prepare("SELECT * FROM service_tb");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function addService(){
		$get_dbase = $_SESSION['session_dbase'];
		$connect = static::hospitalDB($get_dbase);
		if(isset($_POST['btn_service'])){
			$get_service = static::validateData($_POST['service']);
			$bindings = array(
				'service' 		=>	$get_service,
			);
			try {
				$result = $connect->prepare("INSERT INTO service_tb (name) VALUES (:service)");
				$create_user = $result->execute($bindings);
			} catch (Exception $e) {
				return false;
			}
			if(!empty($create_user)){
				header("Location:services");
			}
		}
	}
/************************************************************************/
	public static function allFacility(){
		$get_dbase = $_SESSION['session_dbase'];
		$connect = static::hospitalDB($get_dbase);
		if(isset($_POST['del_fac'])){
			$get_id = $_POST['del_id'];
			try {
				$result = $connect->query("DELETE FROM facility_tb WHERE id = $get_id");
				$result->execute();
			}catch (Exception $e) {
				return false;
			}
		}
		try {
			$result = $connect->prepare("SELECT * FROM facility_tb");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
	public static function addFacility(){
		$get_dbase = $_SESSION['session_dbase'];
		$connect = static::hospitalDB($get_dbase);
		if(isset($_POST['btn_facility'])){
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
			$get_facility = static::validateData($_POST['facility']);
			$get_rate = $_POST['rate'];
			$bindings = array(
				'facility' 	=>	$get_facility,
				'rate'		=>	$get_rate,
				'image'		=>	$image_file,
			);
			try {
				$result = $connect->prepare("INSERT INTO facility_tb (name, rate, image) VALUES (:facility, :rate, :image)");
				$create_user = $result->execute($bindings);
			} catch (Exception $e) {
				return false;
			}
			if(!empty($create_user)){
				header("Location:facility");
			}
		}
	}
/************************************************************************/
	public static function getHospital(){
		$conn = static::getDB();
		$get_user = $_SESSION['session_user'];
		if(isset($_POST['upd_hospital'])){
			$get_id = $_POST['id_hosp'];
			$get_phone = $_POST['phone'];
			$get_email = $_POST['email'];
			$get_about = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($_POST['about_us']))))));
			try {
				$result = $conn->prepare("UPDATE hospitals_tb SET phone='$get_phone', email='$get_email', about_us='$get_about' WHERE id = $get_id");
				$schedule = $result->execute();
			}catch (Exception $e) {
				return false;
			}
		}
		try {
			$result = $conn->prepare("SELECT * FROM hospitals_tb WHERE email = '$get_user'");
			$result->execute();
			$records = $result->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			return false;
		}
		return $records;
	}
/************************************************************************/
// 	public static function getMeeting(){
// 		$conn = static::getDB();
		
// 	}
// /************************************************************************/
// 	public static function getMeeting(){
// 		$conn = static::getDB();
		
// 	}
/************************************************************************/

}
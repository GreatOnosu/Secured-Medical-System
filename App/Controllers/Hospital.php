<?php
namespace App\Controllers;
use \Core\View;
use \App\Models\User;
use \App\Models\Activity;
/************************************************************************/	

/************************************************************************/	
class Hospital extends \Core\Controller{
/************************************************************************/	
	protected function before(){

	}
/************************************************************************/
	public function indexAction(){
		User::isLoginCheck();
		$info = Activity::allMeeting();
		View::render('Hospital/index.php',[
			'records'	=> $info
			]);
	}
/************************************************************************/	
	public function doctorsAction(){
		User::isLoginCheck();
		$info = User::allDoctors();
		View::render('Hospital/doctors.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/	
	public function adddoctorAction(){
		User::isLoginCheck();
		$info = User::addDoctor();
		View::render('Hospital/add_doctors.php',[
			'stat'	=>	$info
			]);
	}
/************************************************************************/	
	public function updatedoctorAction(){
		User::isLoginCheck();
		$info = User::updateDoctors();
		View::render('Hospital/update_doctors.php',[
			'records'	=> $info
			]);
	}
/************************************************************************/
	public function appointmentsAction(){
		User::isLoginCheck();
		$info = Activity::allMeeting();
		View::render('Hospital/appointments.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/
	public function servicesAction(){
		User::isLoginCheck();
		$info = Activity::allServices();
		View::render('Hospital/service.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/	
	public function addserviceAction(){
		User::isLoginCheck();
		$info = Activity::addService();
		View::render('Hospital/add_service.php',[
			'stat'	=>	$info
			]);
	}
/************************************************************************/
	public function facilityAction(){
		User::isLoginCheck();
		$info = Activity::allFacility();
		View::render('Hospital/facility.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/	
	public function addfacilityAction(){
		User::isLoginCheck();
		$info = Activity::addFacility();
		View::render('Hospital/add_facility.php',[
			'stat'	=>	$info
			]);
	}
/************************************************************************/
	public function updateAction(){
		User::isLoginCheck();
		$info = Activity::getHospital();
		View::render('Hospital/update_hospital.php', [
			'records'	=> $info
			]);
	}
/************************************************************************/
	public function historyAction(){
		User::isLoginCheck();
		$info = Activity::allHistory();
		View::render('Hospital/history.php', [
			'records'	=> $info
			]);
	}
/************************************************************************/	
	protected function after(){

	}
}
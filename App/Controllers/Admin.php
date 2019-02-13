<?php
namespace App\Controllers;
use \Core\View;
use \App\Models\User;
use \App\Models\Activity;
/************************************************************************/	

/************************************************************************/	
class Admin extends \Core\Controller{
/************************************************************************/	
	protected function before(){

	}
/************************************************************************/
	public function indexAction(){
		User::isLoginCheck();
		$info = User::allBookings();
		View::render('Admin/index.php',[
			'records' => $info
			]);
	}
/************************************************************************/	
	public function patientsAction(){
		User::isLoginCheck();
		$info = User::allPatients();
		View::render('Admin/patients.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/	
	public function hospitalsAction(){
		User::isLoginCheck();
		$info = User::allHospitals();
		View::render('Admin/hospitals.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/	
	protected function after(){

	}
}
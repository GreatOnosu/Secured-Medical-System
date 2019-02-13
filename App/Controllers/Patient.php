<?php
namespace App\Controllers;
use \Core\View;
/************************************************************************/
use \App\Models\User;
use \App\Models\Activity;	
/************************************************************************/	
class Patient extends \Core\Controller{
/************************************************************************/	
	protected function before(){

	}
/************************************************************************/
	public function indexAction(){
		User::isLoginCheck();
		$info = Activity::getMeeting();
		View::render('Patient/index.php',[
			'records' => $info
			]);
	}
/************************************************************************/	
	public function appointmentsAction(){
		User::isLoginCheck();
		$info = Activity::getMeeting();
		View::render('Patient/appointments.php',[
			'records'	=> $info
			]);
	}
/************************************************************************/
	public function requestAction(){
		User::isLoginCheck();
		$info = Activity::bookMeeting();
		View::render('Patient/request_appoint.php',[
			'stat'		=>	$info{'stat'},
			'hospitals'	=>	$info{'records'}
			]);
	}
/************************************************************************/
	public function updaterequestAction(){
		User::isLoginCheck();
		$info = Activity::updateMeeting();
		View::render('Patient/request_update.php',[
			'records'	=>	$info{'records'},
			'clinics'	=>	$info{'clinics'}
			]);
	}
/************************************************************************/	
	public function historyAction(){
		User::isLoginCheck();
		$info = Activity::getHistory();
		View::render('Patient/history.php',[
			'records'	=> $info
			]);
	}
/************************************************************************/
	
/************************************************************************/	
	protected function after(){

	}
}
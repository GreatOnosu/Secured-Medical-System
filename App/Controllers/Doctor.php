<?php
namespace App\Controllers;
use \Core\View;
/************************************************************************/
use \App\Models\Activity;	
/************************************************************************/	
class Doctor extends \Core\Controller{
/************************************************************************/	
	protected function before(){

	}
/************************************************************************/
	public function indexAction(){
		$info = Activity::getAppointments();
		View::render('Doctor/index.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/
	public function scheduleAction(){
		$info = Activity::makeSchedule();
		View::render('Doctor/schedule.php');
	}
/************************************************************************/
	public function checkAction(){
		$info = Activity::getAppointments();
		View::render('Doctor/check.php',[
			'records'	=>	$info
			]);
	}
/************************************************************************/
	public function reportAction(){
		$info = Activity::reportMeeting();
		View::render('Doctor/report.php',[
			'records' => $info
			]);
	}
/************************************************************************/
	public function historyAction(){
		$info = Activity::appointmentHistory();
		View::render('Doctor/history.php',[
			'records' => $info
			]);
	}
/************************************************************************/
/************************************************************************/	
	protected function after(){

	}
}
<?php
namespace App\Controllers;
use \Core\View;
use \App\models\User;
/************************************************************************/	
class Home extends \Core\Controller{
/************************************************************************/	
	protected function before(){

	}
/************************************************************************/	
	public function indexAction(){
		$info = User::isLogin();
		View::render('Home/index.php', [
			'stat'		=>	$info{'stat'},
			'records1'	=>	$info{'records1'},
			'records2'	=>	$info{'records2'},
			'records3'	=>	$info{'records3'}
			]);
	}
	public function hospitalsAction(){
		$info = User::myHospital();
		View::render('Home/hospitals.php',[
			'records'	=>	$info{'records'},
			'facility'	=>	$info{'facility'},
			'service'	=>	$info{'service'}
			]);
	}
	public function appointmentsAction(){
		View::render('Home/appointments.php');
	}
	public function accountAction(){
		User::selectAccount();
		View::render('Home/account.php');
	}
	public function personalaccountAction(){
		$info = User::createAccount();
		View::render('Home/personal_account.php', [
			'stat'	=>	$info
			]);
	}
	public function hospitalaccountAction(){
		$info = User::createHospital();
		View::render('Home/hospital_account.php',[
			'stat'	=>	$info
			]);
	}
	public function contactsAction(){
		View::render('Home/contact_us.php');
	}
	public function logoutAction(){
		View::render('Home/logout.php');
	}
	public function loginAction(){
		$info = User::isAdminLogin();
		View::render('Home/login.php',[
			'stat'	=> $info
			]);
	}
/************************************************************************/	
	protected function after(){

	}
}
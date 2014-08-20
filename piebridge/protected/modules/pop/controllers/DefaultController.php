<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->use_view();
		$this->display();
	}

	public function actionEmail()
	{
		$mo = new EmailInfo();
		$mo->email = $_POST['email'];
		$mo->ip = $_SERVER["REMOTE_ADDR"];
		$re = $mo->insert();
	}

	public function actionGetnum()
	{
		$email_num = EmailInfo::model()->countBySql("SELECT COUNT(DISTINCT(email)) from email_info");
		echo  $email_num;
	}
}
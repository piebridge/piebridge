<?php

class PersonController extends Controller
{
	//http://www.piebridge.com/index.php?r=person/index/&uid=2
	public function actionIndex($uid = 0)
	{

		$is_self = 0;
		$user_id = $uid;
		if(empty($uid)) {
			$user_id = Yii::app()->user->id;
			$is_self = 1;
		}
		//基本信息
		$user_base_info = UserAR::model()->findByPk($user_id);
		if(empty($user_base_info)){
			echo "no user";
			exit();
		}

		$this->assign('is_self', $is_self);
		$user_base_info->sex = $user_base_info->sex ? '男' : '女';

		$this->assign('user', $user_base_info);

		//more info 带外键的
		$user_more_info = UserInfoAR::model()->findByPk($user_id);

		$this->assign('user_more', $user_more_info);
		$this->use_view();

		$this->display();

	}

	public function actionEditbaseinfo($user_id)
	{



	}
	public function actionEditmoreinfo($user_id)
	{

		$user_more_info = UserInfoAR::model()->findByPk($user_id);
		$this->assign('user_more', $user_more_info);

		$maritalStatus = MaritalStatus::model()->findAll(); // 'MaritalStatus', 'marital_status_id'),
		$hometown      = Hometown::model()->findAll(); // 'Province', 'hometown_id'),
		$nation        = Nation::model()->findAll(); // 'Nation', 'nation_id'),
		$bodyType      = BodyType::model()->findAll(); // 'BodyType', 'body_type_id'),
		$education     = Education::model()->findAll(); // 'Education', 'education_id'),
		$school        = School::model()->findAll(); // 'School', 'school_id'),
		$province      = Province::model()->findAll(); // 'Province', 'province_id'),
		$job           = Job::model()->findAll(); // '$maritalSta,

		$this->assign('maritalStatus', $maritalStatus );
		$this->assign('hometown'     , $hometown  );
		$this->assign('nation'       , $nation    );
		$this->assign('bodyType'     , $bodyType  );
		$this->assign('education'    , $education );
		$this->assign('school'       , $school    );
		$this->assign('province'     , $province  );
		$this->assign('job'          , $job       );


	}

	public function actionSavemoreinfo($user_id)
	{
		//接受各个id
		$user_more_info = UserInfoAR::model()->findByPk($user_id);

		$user_more_info->marital_status_id =  isset($_POST['maritalStatus']) ? $_POST['maritalStatus'] : 0;
		$user_more_info->hometown_id = isset($_POST['hometown     ']) ?  $_POST['hometown     '] : 0;
		$user_more_info->nation_id = isset($_POST['nation       ']) ?  $_POST['nation       '] : 0;
		$user_more_info->bodyType_id = isset($_POST['bodyType     ']) ?  $_POST['bodyType     '] : 0;
		$user_more_info->education_id = isset($_POST['education    ']) ?  $_POST['education    '] : 0;
		$user_more_info->school_id = isset($_POST['school       ']) ?  $_POST['school       '] : 0;
		$user_more_info->province_id = isset($_POST['province     ']) ?  $_POST['province     '] : 0;
		$user_more_info->job_id = isset($_POST['job          ']) ?  $_POST['job          '] : 0;
		// $user_more_info->save();
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
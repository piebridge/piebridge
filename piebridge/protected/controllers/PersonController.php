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

	public function actionEditbaseinfo()
	{



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
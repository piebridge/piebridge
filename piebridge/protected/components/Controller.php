<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
error_reporting(E_ALL);
class Controller extends CController
{
	private $_viewFile = '';

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */

	public $layout='/common/';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	private static $nologin = array(
			'site' => array('login', 'index', 'upload'),
			'specialTopic' => array('preview'),
	);

	/**
	 * (non-PHPdoc)
	 * @see CController::init()
	 */
	public function init()
	{
		$layout_path = Yii::app()->getLayoutPath();

		$this->assign('commonTmpPath', $layout_path.DS);

		$httpHost = $_SERVER['HTTP_HOST'];
		$this->assign('HTTP_HOST', $httpHost);
		$login = Yii::app()->user->isGuest;
		$this->assign('login', $login);
		$this->assign('username', Yii::app()->user->name);
	}

	public function use_view($viewName='')
	{
		if(empty($viewName)) $viewName = $this->action->id;
		$viewpath = $this->getViewFile($viewName);
		$this->_viewFile = $viewpath;
	}

	/**
	 * Smarty assign()方法
	 *
	 */
	public function assign($key, $value)
	{
		Yii::app()->smarty->assign($key, $value);
	}

	/**
	 * Smarty fetch()方法
	 *
	 */
	public function fetch($view)
	{
		return Yii::app()->smarty->fetch($view);
	}

	/**
	 * Smarty display()方法
	 *
	 */
	public function display()
	{
		Yii::app()->smarty->display($this->_viewFile);
	}

	public function resolveViewFile($viewName,$viewPath,$basePath,$moduleViewPath=null)
	{
		if(empty($viewName))
			return false;

		if($moduleViewPath===null)
			$moduleViewPath=$basePath;

		if(($renderer=Yii::app()->getViewRenderer())!==null)
			$extension=$renderer->fileExtension;
		else
			$extension='.html';
		if($viewName[0]==='/')
		{
			if(strncmp($viewName,'//',2)===0)
				$viewFile=$basePath.$viewName;
			else
				$viewFile=$moduleViewPath.$viewName;
		}
		elseif(strpos($viewName,'.'))
		$viewFile=Yii::getPathOfAlias($viewName);
		else
			$viewFile=$viewPath.DIRECTORY_SEPARATOR.$viewName;

		if(is_file($viewFile.$extension))
			return Yii::app()->findLocalizedFile($viewFile.$extension);
		elseif($extension!=='.html' && is_file($viewFile.'.html'))
		return Yii::app()->findLocalizedFile($viewFile.'.html');
		else
			return false;
	}

	/**
	 *
	 * @see CController::beforeAction()
	 */
	protected function beforeAction($action)
	{

// 		if($error=Yii::app()->errorHandler->error)
// 		{
// 			if(Yii::app()->request->isAjaxRequest)
// 				echo $error['message'];
// 			else
// 				$this->render('error', $error);
// 			exit();
// 		}
// 		if ($this->noLoginActions($action)) return true;

// 		$user = new UserAu();
// 		$islogin = $user->isLogin();
// 		if(!$islogin) {
// 			//TODO 没有登陆，跳转到登陆页
// // 			$this->redirect($user->getLoginUrl());
// 		}

// 		//获取用户信息,并获取权限
// // 		$userInfo = $user->isCp();

// // 		if(!$userInfo) echo 'no right'; return false;

		return true;
	}
	private function noLoginActions($action)
	{
		$controller = $this->getId();
		$action = strtolower($this->getAction()->getId());

		return isset(self::$nologin[$controller]) && in_array($action, self::$nologin[$controller]);
	}



}
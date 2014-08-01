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
	public $layout='/layouts/column1';
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
		if($this->layout){
			$view_html = Yii::app()->smarty->fetch($this->_viewFile);

			Yii::app()->smarty->assign('content', $view_html);
			$layoutFile=$this->getLayoutFile($this->layout);
			$this->renderLayout($layoutFile);
		}

		Yii::app()->smarty->display(!empty($layoutFile) ? $layoutFile : $this->_viewFile);
	}

	public function renderLayout($layoutFile)
	{
		$layout = str_replace('html', 'php', $layoutFile);

		include_once $layout;
		$layoutname = basename($layout, '.php');
		$layout = new $layoutname();
		$layout->renderLayout();
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



}
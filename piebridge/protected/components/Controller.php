<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
error_reporting(E_ALL);
class Controller extends CController
{
	private $_viewpath = '';

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
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


	public function use_view($viewpath='')
	{
		if(empty($view_path)){
			$viewpath =  $this->module->basePath.DS.'views'.DS.$this->id.DS.$this->action->id.'.tpl';
		}
		$this->_viewpath = $viewpath;
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
	 * Smarty display()方法
	 *
	 */
	public function display()
	{
		Yii::app()->smarty->display($this->_viewpath);
	}

}
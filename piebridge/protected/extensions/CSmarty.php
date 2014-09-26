<?php
error_reporting(E_ALL);
require_once(Yii::getPathOfAlias('application.extensions.smarty').DS.'Smarty.class.php');
define('SMARTY_TMPL_DIR', Yii::getPathOfAlias('application.views'));

class CSmarty extends Smarty
{
	public function __construct()
	{
		parent::__construct();
		$this->config();
// 		$this->addPluginsDir(Yii::getPathOfAlias('application.components.tags'));
	}

	private function config()
	{
		$this->template_dir = SMARTY_TMPL_DIR;
		$this->compile_dir = COMPILE_PATH;
		$this->cache_dir = CACHE_PATH;
		$this->left_delimiter  =  '<%';
		$this->right_delimiter =  '%>';
	}

	public function var_init($inits)
	{
		if(empty($inits)) return false;

		foreach ($inits as $k => $v)
			$this->assign($k, $v);
	}

	function init(){
		Yii::registerAutoloader('smartyAutoload');
	}
}
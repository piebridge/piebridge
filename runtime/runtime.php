<?php
error_reporting(0);
define('FRAMEWORK_VERSION', '1.1.15');
define('YII_DEBUG',true);
define('YII_ENABLE_EXCEPTION_HANDLER',true);
define('YII_ENABLE_ERROR_HANDLER',true);
define('UPLOAD_PATH', '/mnt/pictures/pocket');
define('IMG_URL', 'http://img1.funshion.com/pictures/pocket/');
define('LOG_PATH', RUNTIME_PATH . 'logs');
define('COMPILE_PATH', RUNTIME_PATH  . 'tpl_c');
define('CACHE_PATH', RUNTIME_PATH . 'cache');


class RunTime
{
	const LDAP_HOST = '192.168.1.14';
	const LDAP_PORT = null;

	public static function getDBConf($db = NULL)
	{
		$dbs = array(
				'pocket' =>	array(
					'connectionString' => 'mysql:host=192.168.16.21;dbname=pocket',
					'emulatePrepare' => true,		//上线的时候变为false
					'username' => 'root',
					'password' => '',
					'tablePrefix' => 'cms_',
					'charset'=>'utf8',
				),
		);

		if (!$db)
			return $dbs;
		else
			return isset($dbs[$db]) ? $dbs[$db] : null;
	}

	public static function getRabbitMqConf()
	{
		return array(
				'host' => '192.168.16.21',
				'port' => '5672',
				'login' => 'guest',
				'password' => 'guest',
				'vhost'=>'/');
	}

	public static function getLogConf()
	{
		return array(
			'class'=>'CLogRouter',
			'routes'=>array(
					array(
							'class'=>'CFileLogRoute',
							'levels' => 'trace,info',
							'categories'=> array('system.base.*', 'system.CModule.*','application.*'),
							'logPath'=> CMS_LOG_PATH, //日志文件路径
							'maxLogFiles'=>20,
							'logFile' => 'applcation_' . date('Ymd') . '.log',
					),
					array(
							'class'=>'CFileLogRoute',
							'levels' => 'error, warning',
							'categories'=> array('system.base.*', 'system.CModule.*','application.*'),
							'logPath'=> CMS_LOG_PATH, //日志文件路径
							'maxLogFiles'=>20,
							'logFile' => 'applcation_' . date('Ymd') . '.err',
					),

					array(
							'class' => 'CFileLogRoute',
							'levels' => 'trace, info',
							'categories'=> 'system.db.*',
							'logFile' => 'db_' . date('Ymd') . '.log',
							'logPath'=> CMS_LOG_PATH, //日志文件路径
							'maxLogFiles'=>20,
					),
					array(
							'class' => 'CFileLogRoute',
							'levels' => 'error, warning',
							'categories'=> 'system.db.*',
							'logFile' => 'db_' . date('Ymd') . '.err',
							'logPath'=> CMS_LOG_PATH, //日志文件路径
							'maxLogFiles'=>20,
					),
			),
		);
	}

}
<?php
//////////////////////////////////////////////////////////////////////////////////////////
// Author: 杨帆
// Copyright 2005-, Funshion Online Technologies Ltd. All Rights Reserved
// 版权 2014-，小鹊桥技术有限公司 所有版权保护
// This is UNPUBLISHED PROPRIETARY SOURCE CODE of Funshion Online Technologies Ltd.;
// the contents of this file may not be disclosed to third parties, copied or
// duplicated in any form, in whole or in part, without the prior written
// permission of Funshion Online Technologies Ltd.
// 这是北小鹊桥技术有限公司未公开的私有源代码。本文件及相关内容未经风行在线技术有
// 限公司事先书面同意，不允许向任何第三方透露，泄密部分或全部; 也不允许任何形式的私自备份.
//////////////////////////////////////////////////////////////////////////////////////////

@date_default_timezone_set('PRC');
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
if (!defined('MYAPP_ROOT')) define('MYAPP_ROOT', dirname(dirname(__FILE__)).DS);
define('PIEBRIDGE_ROOT', MYAPP_ROOT . 'piebridge' . DS);
if (!defined('RUNTIME_PATH')) define('RUNTIME_PATH', MYAPP_ROOT . 'runtime' . DS);

define('PIEBRIDGE_PROTECT', PIEBRIDGE_ROOT . 'protected' . DS);
define('PIEBRIDGE_CONFIG', APP_PROTECT . 'config' . DS);

if (file_exists(RUNTIME_PATH . 'runtime.php'))
	require RUNTIME_PATH . 'runtime.php';
else
	require APP_CONFIG . 'runtime.php';

// change the following paths if necessary
$yii=dirname( dirname(__FILE__)).'/framework/yii.php';

$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

Yii::createWebApplication($config)->run();



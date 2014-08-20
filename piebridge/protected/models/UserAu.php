<?php

/*
 * 用户相关
 */
class UserAu
{

	/**
	 *判断登录状态,并返回用户信息
	 */
	public function isLogin()
	{
		if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])) return false; //没有登录
		return true;
	}

	public function getLoginUrl()
	{
		return "http://www.fun.tv/account/login?location=http://cp.fun.tv";
	}

	public function isCp()
	{
		$this->_getLoginUerInfo();
		return true;
	}
	/**
	 *根据登录状态获取用户信息
	  * @purpose:getUserInfo
	 */
	private function _getLoginUerInfo()
	{
		//TODO 从账号系统中获取账户信息,并判断是否是cp
		$token = base64_decode(CPTools::getCookie('sso_token'));
		if (is_null($token)) return false;

		$url = self::API_ENTRY."user/account_info";
		$sso_token = 222;
		$account = Yii::app()->service->get_name('account_login');
		$accountFieldsNeeded = array('group_id', 'plat_type', 'open_id', 'user_name', 'plat_name');
		$respAccountInfo = $account->get_login_info_by_sso_token($sso_token);
		return $respAccountInfo;
	}
}


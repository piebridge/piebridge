<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property string $sex
 * @property string $birthday
 * @property integer $age
 * @property integer $constellation
 * @property string $location
 * @property integer $info_percent
 * @property integer $head_pic
 * @property integer $limit
 * @property string $vip_daedline
 * @property integer $is_vip
 * @property string $last_login_time
 * @property string $create_time
 * @property integer $height
 */
class UserAR extends User
{

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		$this->password = $this->hashPassword($this->password);
		return CPasswordHelper::verifyPassword($password,$this->password);
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}
}

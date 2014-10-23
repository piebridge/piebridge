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
 * @property string $birth
 * @property integer $age
 * @property integer $constellation
 * @property string $location
 * @property integer $info_percent
 * @property integer $head_pic
 * @property integer $limit
 * @property string $vip_daedline
 * @property integer $is_vip
 * @property string $last_login_time
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_name, password', 'required'),
			array('user_id, age, constellation, info_percent, head_pic, limit, is_vip', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>16),
			array('password', 'length', 'max'=>32),
			array('email', 'length', 'max'=>255),
			array('sex', 'length', 'max'=>1),
			array('location', 'length', 'max'=>100),
			array('birth, vip_daedline, last_login_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_name, password, email, sex, birth, age, constellation, location, info_percent, head_pic, limit, vip_daedline, is_vip, last_login_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_name' => 'User Name',
			'password' => 'Password',
			'email' => 'Email',
			'sex' => 'Sex',
			'birth' => 'Birth',
			'age' => 'Age',
			'constellation' => 'Constellation',
			'location' => 'Location',
			'info_percent' => 'Info Percent',
			'head_pic' => 'Head Pic',
			'limit' => 'Limit',
			'vip_daedline' => 'Vip Daedline',
			'is_vip' => 'Is Vip',
			'last_login_time' => 'Last Login Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('constellation',$this->constellation);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('info_percent',$this->info_percent);
		$criteria->compare('head_pic',$this->head_pic);
		$criteria->compare('limit',$this->limit);
		$criteria->compare('vip_daedline',$this->vip_daedline,true);
		$criteria->compare('is_vip',$this->is_vip);
		$criteria->compare('last_login_time',$this->last_login_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

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

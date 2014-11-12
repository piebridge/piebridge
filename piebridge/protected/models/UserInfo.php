<?php

/**
 * This is the model class for table "user_info".
 *
 * The followings are the available columns in table 'user_info':
 * @property integer $user_id
 * @property integer $hometown_id
 * @property integer $nation_id
 * @property integer $body_type_id
 * @property integer $education_id
 * @property integer $school_id
 * @property integer $job_id
 * @property integer $monthly_income
 * @property string $self_summary
 * @property string $usually_doing
 * @property string $good_at
 * @property string $interest
 * @property string $love_history
 * @property string $other
 * @property integer $province_id
 * @property string $blood
 * @property integer $marital_status_id
 *
 * The followings are the available model relations:
 * @property MaritalStatus $maritalStatus
 * @property Province $hometown
 * @property Nation $nation
 * @property BodyType $bodyType
 * @property Education $education
 * @property School $school
 * @property Province $province
 * @property Job $job
 * @property UserPhoto[] $userPhotos
 */
class UserInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, hometown_id, nation_id, body_type_id, education_id, school_id, job_id, monthly_income, province_id, marital_status_id', 'numerical', 'integerOnly'=>true),
			array('self_summary, usually_doing', 'length', 'max'=>200),
			array('good_at, interest, love_history', 'length', 'max'=>45),
			array('other', 'length', 'max'=>500),
			array('blood', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, hometown_id, nation_id, body_type_id, education_id, school_id, job_id, monthly_income, self_summary, usually_doing, good_at, interest, love_history, other, province_id, blood, marital_status_id', 'safe', 'on'=>'search'),
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
			'maritalStatus' => array(self::BELONGS_TO, 'MaritalStatus', 'marital_status_id'),
			'hometown' => array(self::BELONGS_TO, 'Province', 'hometown_id'),
			'nation' => array(self::BELONGS_TO, 'Nation', 'nation_id'),
			'bodyType' => array(self::BELONGS_TO, 'BodyType', 'body_type_id'),
			'education' => array(self::BELONGS_TO, 'Education', 'education_id'),
			'school' => array(self::BELONGS_TO, 'School', 'school_id'),
			'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
			'job' => array(self::BELONGS_TO, 'Job', 'job_id'),
			'userPhotos' => array(self::HAS_MANY, 'UserPhoto', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'hometown_id' => 'Hometown',
			'nation_id' => 'Nation',
			'body_type_id' => 'Body Type',
			'education_id' => 'Education',
			'school_id' => 'School',
			'job_id' => 'Job',
			'monthly_income' => 'Monthly Income',
			'self_summary' => 'Self Summary',
			'usually_doing' => 'Usually Doing',
			'good_at' => 'Good At',
			'interest' => 'Interest',
			'love_history' => 'Love History',
			'other' => 'Other',
			'province_id' => 'Province',
			'blood' => 'Blood',
			'marital_status_id' => 'Marital Status',
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
		$criteria->compare('hometown_id',$this->hometown_id);
		$criteria->compare('nation_id',$this->nation_id);
		$criteria->compare('body_type_id',$this->body_type_id);
		$criteria->compare('education_id',$this->education_id);
		$criteria->compare('school_id',$this->school_id);
		$criteria->compare('job_id',$this->job_id);
		$criteria->compare('monthly_income',$this->monthly_income);
		$criteria->compare('self_summary',$this->self_summary,true);
		$criteria->compare('usually_doing',$this->usually_doing,true);
		$criteria->compare('good_at',$this->good_at,true);
		$criteria->compare('interest',$this->interest,true);
		$criteria->compare('love_history',$this->love_history,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('blood',$this->blood,true);
		$criteria->compare('marital_status_id',$this->marital_status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

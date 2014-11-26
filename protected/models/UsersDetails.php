<?php

/**
 * This is the model class for table "users_details".
 *
 * The followings are the available columns in table 'users_details':
 * @property integer $id
 * @property integer $users_credentials_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $postalcode
 * @property string $country
 * @property string $company_name
 * @property string $dob
 * @property integer $gender
 * @property integer $current_subscription_id
 *
 * The followings are the available model relations:
 * @property Subscription $currentSubscription
 * @property UsersCredentials $usersCredentials
 */
class UsersDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('first_name, last_name, phone, company_name', 'required'),
            array('users_credentials_id, gender, current_subscription_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, postalcode, country', 'length', 'max'=>100),
			array('phone', 'length', 'max'=>50),
			array('address, city, state, company_name', 'length', 'max'=>255),
			array('dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_credentials_id, first_name, last_name, phone, address, city, state, postalcode, country, company_name, dob, gender, current_subscription_id', 'safe', 'on'=>'search'),
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
			'currentSubscription' => array(self::BELONGS_TO, 'Subscription', 'current_subscription_id'),
			'usersCredentials' => array(self::BELONGS_TO, 'UsersCredentials', 'users_credentials_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_credentials_id' => 'Users Credentials',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone' => 'Phone',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'postalcode' => 'Postalcode',
			'country' => 'Country',
			'company_name' => 'Company Name',
			'dob' => 'Dob',
			'gender' => 'Gender',
			'current_subscription_id' => 'Current Subscription',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('users_credentials_id',$this->users_credentials_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('postalcode',$this->postalcode,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('current_subscription_id',$this->current_subscription_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

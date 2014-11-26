<?php

/**
 * This is the model class for table "subscription_log".
 *
 * The followings are the available columns in table 'subscription_log':
 * @property integer $id
 * @property integer $users_credentials_id
 * @property integer $subscription_id
 * @property string $sub_name
 * @property string $hits_allowed
 * @property double $durations_in_days
 * @property string $price
 * @property string $purchase_date
 *
 * The followings are the available model relations:
 * @property UsersCredentials $usersCredentials
 * @property Subscription $subscription
 */
class SubscriptionLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subscription_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_credentials_id, subscription_id', 'numerical', 'integerOnly'=>true),
			array('durations_in_days', 'numerical'),
			array('sub_name, hits_allowed', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			array('purchase_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_credentials_id, subscription_id, sub_name, hits_allowed, durations_in_days, price, purchase_date', 'safe', 'on'=>'search'),
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
			'usersCredentials' => array(self::BELONGS_TO, 'UsersCredentials', 'users_credentials_id'),
			'subscription' => array(self::BELONGS_TO, 'Subscription', 'subscription_id'),
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
			'subscription_id' => 'Subscription',
			'sub_name' => 'Sub Name',
			'hits_allowed' => 'Hits Allowed',
			'durations_in_days' => 'Durations In Days',
			'price' => 'Price',
			'purchase_date' => 'Purchase Date',
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
		$criteria->compare('subscription_id',$this->subscription_id);
		$criteria->compare('sub_name',$this->sub_name,true);
		$criteria->compare('hits_allowed',$this->hits_allowed,true);
		$criteria->compare('durations_in_days',$this->durations_in_days);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('purchase_date',$this->purchase_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubscriptionLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

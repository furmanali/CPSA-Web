<?php

/**
 * This is the model class for table "users_credentials".
 *
 * The followings are the available columns in table 'users_credentials':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $authkey
 * @property string $x2license
 * @property integer $status
 * @property string $date_created
 * @property string $date_modified
 * @property string $date_of_expiry
 *
 * The followings are the available model relations:
 * @property HitsCounter[] $hitsCounters
 * @property HitsLogs[] $hitsLogs
 * @property SubscriptionLog[] $subscriptionLogs
 * @property UsersDetails[] $usersDetails
 */
class UsersCredentials extends CActiveRecord
{
    public $repeat_password;
    public $initialPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_credentials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, date_of_expiry', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('email, password, authkey, x2license', 'length', 'max'=>255),
            //Unique validations
			array('email', 'email'),
			array('email', 'unique', 'on'=>'insert',),
			array('authkey', 'unique', 'on'=>'insert',),
			array('x2license', 'unique', 'on'=>'insert',),
            //password validation
            array('password, repeat_password', 'required', 'on'=>'insert'),
            array('password, repeat_password', 'length', 'min'=>6, 'max'=>255),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),

            array('date_created, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, password, authkey, x2license, status, date_created, date_modified, date_of_expiry', 'safe', 'on'=>'search'),
		);
	}

    public function beforeSave()
    {
        // in this case, we will use the old hashed password.
        if(empty($this->password) && empty($this->repeat_password) && !empty($this->initialPassword))
            $this->password=$this->repeat_password=$this->initialPassword;

        return parent::beforeSave();
    }

    public function afterFind()
    {
        //reset the password to null because we don't want the hash to be shown.
        $this->initialPassword = $this->password;
        $this->password = null;

        parent::afterFind();
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'hitsCounters' => array(self::HAS_ONE, 'HitsCounter', 'users_credentials_id'),
			'hitsLogs' => array(self::HAS_MANY, 'HitsLogs', 'users_credentials_id'),
			'subscriptionLogs' => array(self::HAS_MANY, 'SubscriptionLog', 'users_credentials_id'),
			'latestSubscriptionLog' => array(self::HAS_ONE, 'SubscriptionLog', 'users_credentials_id','order'=>'purchase_date DESC'),
			'usersDetails' => array(self::HAS_ONE, 'UsersDetails', 'users_credentials_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'authkey' => 'Authkey',
			'x2license' => 'X2license',
			'status' => 'Status',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'date_of_expiry' => 'Date Of Expiry',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('authkey',$this->authkey,true);
		$criteria->compare('x2license',$this->x2license,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('date_of_expiry',$this->date_of_expiry,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersCredentials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

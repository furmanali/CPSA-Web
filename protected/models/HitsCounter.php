<?php

/**
 * This is the model class for table "hits_counter".
 *
 * The followings are the available columns in table 'hits_counter':
 * @property integer $id
 * @property integer $users_credentials_id
 * @property integer $hits_available
 * @property integer $hits_success
 * @property integer $hits_failure
 * @property integer $counter_total
 * @property integer $counter_consecutive_failed
 * @property string $date_of_expiry
 *
 * The followings are the available model relations:
 * @property UsersCredentials $usersCredentials
 */
class HitsCounter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hits_counter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('hits_success, hits_failure', 'required'),
			array('users_credentials_id, hits_available, hits_success, hits_failure, counter_total, counter_consecutive_failed', 'numerical', 'integerOnly'=>true),
			array('date_of_expiry', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_credentials_id, hits_available, hits_success, hits_failure, counter_total, counter_consecutive_failed, date_of_expiry', 'safe', 'on'=>'search'),
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
			'hits_available' => 'Hits Available',
			'hits_success' => 'Hits Success',
			'hits_failure' => 'Hits Failure',
			'counter_total' => 'Counter Total',
			'counter_consecutive_failed' => 'Counter Consecutive Failed',
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
		$criteria->compare('users_credentials_id',$this->users_credentials_id);
		$criteria->compare('hits_available',$this->hits_available);
		$criteria->compare('hits_success',$this->hits_success);
		$criteria->compare('hits_failure',$this->hits_failure);
		$criteria->compare('counter_total',$this->counter_total);
		$criteria->compare('counter_consecutive_failed',$this->counter_consecutive_failed);
		$criteria->compare('date_of_expiry',$this->date_of_expiry,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HitsCounter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function updateCounter($id,$user_id,$type)
    {
        $model = $this->model()->findByPk($id);
        if($type=='success')
        {
            $model->hits_success += 1;
            $model->counter_consecutive_failed = 0;
        }
        else
        {
            $model->hits_failure += 1;
            $model->counter_consecutive_failed += 1;
        }
        $model->id  = $id;
        $model->users_credentials_id = $user_id;
        $model->hits_available -= 1;
        $model->counter_total += 1;
        $model->save();
    }
}

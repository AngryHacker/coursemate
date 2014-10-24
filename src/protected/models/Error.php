<?php

/**
 * This is the model class for table "Error".
 *
 * The followings are the available columns in table 'Error':
 * @property integer $er_id
 * @property string $user_id
 * @property string $psw
 */
class Error extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Error';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, psw', 'required'),
			array('user_id, psw', 'length', 'max'=>124),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('er_id, user_id, psw', 'safe', 'on'=>'search'),
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
			'er_id' => '主键',
			'user_id' => '用户 ID',
			'psw' => '密码',
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

		$criteria->compare('er_id',$this->er_id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('psw',$this->psw,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Error the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

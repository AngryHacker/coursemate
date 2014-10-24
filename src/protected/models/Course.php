<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $cou_id
 * @property string $resourceID
 * @property string $course_name
 * @property string $time
 * @property integer $tea_id
 *
 * The followings are the available model relations:
 * @property Teacher $tea
 * @property StuCourse[] $stuCourses
 */
class Course extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resourceID, course_name, time, tea_id', 'required'),
			array('tea_id', 'numerical', 'integerOnly'=>true),
			array('resourceID', 'length', 'max'=>32),
			array('course_name', 'length', 'max'=>512),
			array('time', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cou_id, resourceID, course_name, time, tea_id', 'safe', 'on'=>'search'),
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
			'tea' => array(self::BELONGS_TO, 'Teacher', 'tea_id'),
			'stuCourses' => array(self::HAS_MANY, 'StuCourse', 'cou_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cou_id' => '主键',
			'resourceID' => '课程resourceID',
			'course_name' => '课程名称',
			'time' => '上课时间',
			'tea_id' => '授课老师',
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

		$criteria->compare('cou_id',$this->cou_id);
		$criteria->compare('resourceID',$this->resourceID,true);
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('tea_id',$this->tea_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

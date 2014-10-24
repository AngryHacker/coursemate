<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $user_id
 * @property string $username
 * @property integer $sex
 * @property string $grade
 * @property string $nickname
 * @property string $password
 * @property string $major
 * @property string $school
 * @property string $number
 * @property string $email
 * @property string $mail
 * @property string $call
 * @property string $signature
 * @property string $pre_school
 * @property string $address
 * @property string $detail_address
 * @property string $pic_url
 * @property integer $score
 * @property integer $rank
 * @property integer $login_time
 * @property string $cookie
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Friend[] $friends
 * @property Friend[] $friends1
 * @property Post[] $posts
 * @property StuCourse[] $stuCourses
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, sex, grade, password, number, score, rank, login_time', 'required'),
			array('sex, score, rank, login_time', 'numerical', 'integerOnly'=>true),
			array('username, nickname, password, email, mail, call', 'length', 'max'=>128),
            array('email','email'),
			array('grade, major, school, number', 'length', 'max'=>32),
			array('signature, pre_school, address, pic_url', 'length', 'max'=>256),
			array('detail_address', 'length', 'max'=>512),
			array('cookie', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, username, sex, grade, nickname, password, major, school, number, email, mail, call, signature, pre_school, address, detail_address, pic_url, score, rank, login_time, cookie', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'author_id'),
			'friends' => array(self::HAS_MANY, 'Friend', 'stu1'),
			'friends1' => array(self::HAS_MANY, 'Friend', 'stu2'),
			'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
			'stuCourses' => array(self::HAS_MANY, 'StuCourse', 'stu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => '主键',
			'username' => '用户名',
			'sex' => '性别',
			'grade' => '年级',
			'nickname' => '昵称',
			'password' => '密码',
			'major' => '专业名称',
			'school' => '所属学院',
			'number' => '学号',
			'email' => '邮箱',
			'mail' => '邮编',
			'call' => '联系电话',
			'signature' => '签名',
			'pre_school' => '原学校',
			'address' => '地址',
			'detail_address' => '详细地址',
			'pic_url' => '头像链接',
			'score' => '用户积分',
			'rank' => '用户等级',
			'login_time' => '最近登录时间',
			'cookie' => 'cookie',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('call',$this->call,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('pre_school',$this->pre_school,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('detail_address',$this->detail_address,true);
		$criteria->compare('pic_url',$this->pic_url,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('login_time',$this->login_time);
		$criteria->compare('cookie',$this->cookie,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

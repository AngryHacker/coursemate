<?php

class StudentController extends Controller
{
	public $layout = '//layouts/site_mob';

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
				'expression'=>'in_array(Yii::app()->user->stuid, array("12348068", "12348061"))',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id = -1)
	{
        $self = true;
        $is_friend = false;

        $stu_num = Yii::app()->user->stuid;
        $stu = Student::model()->findByAttributes(array('number'=>$stu_num));

        if($id == -1)
        {
            $id = $stu->user_id;
        }

        if($id != $stu->user_id)
        {
            $self = false;
            $friend = Friend::model()->findByAttributes(array('stu1'=>$id,'stu2'=>$stu->user_id));
            if($friend != NULL){
                $is_friend = true;
            }
        }

		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'self'=>$self,
            'is_friend'=>$is_friend,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Student;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
            $validated = true;
            if($model->email == '')
            {
                $model->addError('','邮箱不可为空');
                $validated = false;
            }
            if($model->nickname == '')
            {
                $model->addError('','昵称不可为空!');
                $validated = false;
            }
            if($model->signature == '')
            {
                $model->addError('','签名不可为空');
                $validated = false;
            }
			if($validated && $model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($cou_id,$page=1)
	{
        $this->layout = '//layouts/stu_mob';

        if(!isset($cou_id)||!is_numeric($page))
            $this->redirect(array('course/index'));

        $cou = Course::model()->findByPk($cou_id);
        if($cou == NULL)
            $this->redirect(array('course/index'));

        $topic = $cou->course_name;

        $models = StuCourse::model()->findAllByAttributes(array('cou_id'=>$cou_id));
        if(count($models) < ($page-1)*10)
            $page = 1;

        if($page <= 1)
            $pre = false;
        else $pre = $page-1;

        if(count($models) > $page*10)
            $next = $page + 1;
        else $next = false;

        $stuArray = array();
        foreach($models as $model)
        {
            array_push($stuArray,$model->stu_id);
        }

        $criteria = new CDbCriteria;
        $criteria->compare('user_id',$stuArray);
        $criteria->offset = ($page - 1)*10;
        $criteria->limit = 10;
        $models = Student::model()->findAll($criteria);

		$this->render('index',array(
            'models'=>$models,
            'pre'=>$pre,
            'next'=>$next,
            'cou_id'=>$cou_id,
            'topic'=>$topic,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Student the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Student $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class PostController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/course_mob';
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
				'users'=>array('*'),
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
	public function actionView($id,$cou)
	{
        $model = $this->loadModel($id);

        /* 帖子作者 取实名或昵称*/
        $author_name = $model->author->nickname;
        if(!$author_name) $author_name = $model->author->username;

        $couModel = Course::model()->findByPk($cou);
        if($couModel == NULL)
            $this->redirect(array('course/index'));

        $comments = Comments::model()->findAll('post_id=:post_id',array(":post_id"=>$id));

		$this->render('view',array(
			'model'=>$model,
            'comments'=>$comments,
            'cou_id'=>$cou,
            'author_name'=>$author_name,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($cou_id)
	{
		$model=new Post;
        $couModel = Course::model()->findByPk($cou_id);
        if($couModel == NULL)
            $this->redirect(array('course/index'));

        $topic = $couModel->course_name;


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];

            if(!isset(Yii::app()->user->stuid))
                $this->redirect(array('site/login'));

            $stu_id = Yii::app()->user->stuid;
            $stu = Student::model()->findByAttributes(array('number'=>$stu_id));

            $user_id = $stu->user_id;
            $model->author_id = $user_id;

            $model->cou_id = $cou_id;
            $model->create_time = time();

			if($model->save())
				$this->redirect(array('index','cou_id'=>$cou_id));
		}

		$this->render('create',array(
			'model'=>$model,
            'cou_id'=>$cou_id,
            'topic'=>$topic,
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

		if(isset($_POST['Post']))
		{
			$model->attributes=$_POST['Post'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->post_id));
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
	public function actionIndex($cou_id,$page = 1)
    {
        if(!isset($cou_id)||!is_numeric($page))
            $this->redirect(array('course/index'));

        $models = Post::model()->findAllByAttributes(array('cou_id'=>$cou_id));
        if(count($models) < ($page-1)*10)
            $page = 1;

        if($page <= 1)
            $pre = false;
        else $pre = $page-1;

        if(count($models) > $page*10)
            $next = $page + 1;
        else $next = false;

        $criteria = new CDbCriteria;
        $criteria->compare('cou_id',$cou_id);
        $criteria->offset = ($page - 1)*10;
        $criteria->limit = 10;
        $criteria->order = 'create_time DESC';
        $models = Post::model()->findAll($criteria);

		$this->render('index',array(
            'models'=>$models,
            'pre'=>$pre,
            'next'=>$next,
            'cou_id'=>$cou_id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

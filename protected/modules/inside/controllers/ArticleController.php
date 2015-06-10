<?php

class ArticleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			// 'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index','view, deleteImage'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'imageUpload, deleteImage'),
				'users'=>array('admin'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){

		$model=new Article;

		$data = Yii::app()->getRequest()->getPost('Article', null);
		if (!empty($data)) {
			$model->images = CUploadedFile::getInstancesByName('images');
			$model->setAttributes( $data );

			if($model->save()){
				Yii::app()->user->setFlash('Article_FLASH', 'Збережено');
				$this->redirect(array('index'));
			}
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
	public function actionUpdate($id){

		$model=$this->loadModel($id);

		$data = Yii::app()->getRequest()->getPost('Article', null);
		// d($data);
		if (!empty($data)) {
			$model->images = CUploadedFile::getInstancesByName('images');
			$model->setAttributes( $data );

			if($model->save()){
				Yii::app()->user->setFlash('Article_FLASH', 'Збережено');
				$this->redirect(array('index'));
			}
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Article the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Article $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionImageUpload(){
		$image=CUploadedFile::getInstanceByName('file');
		$filename = uniqid().'.'.$image->extensionName;
		$path = Yii::app()->basePath.'/../images/articles/'.$filename;
		// echo $path;
		// die;
		$image->saveAs(Yii::app()->basePath.'/../images/articles/'.$filename);


		// $image_open = Yii::app()->image->load(Yii::app()->basePath.'/../img/knowall/article/'.$filename); 
		// if(isset($image_open)){
		// 	if ($image_open->width > $image_open->height){
		// 		$dim = Image::HEIGHT;
		// 	} else{ 
		// 		$dim = Image::WIDTH;
		// 	}  
		// 	$image_open->resize(100, 100, $dim)->crop(100, 100); 
		//  	$image_open->save(Yii::app()->basePath.'/../img/knowall/article/'.'thumb_'.$filename); 
		// } 


		$array = array( 
		 	'filelink' => Yii::app()->baseUrl.'/unload/article/'.$filename, 
		 	'filename' => $filename 
	 	); 
		echo stripslashes(json_encode($array)); 
	}

	/**
	 * удаление картинок
	 */
	public function actionDeleteImage(){
		if(Yii::app()->request->isAjaxRequest)
		{
			$response['success']=0;
			$image = Yii::app()->request->getPost('image', null);
			$part = explode('_', $image);
			$partExt = explode('.', $image);
			$origin = $part[0].'_'.$part[1].'.'.$partExt[1];

			if(file_exists(Yii::app()->basePath.'/..'.$image)){
				if(unlink(Yii::app()->basePath.'/..'.$image) && unlink(Yii::app()->basePath.'/..'.$origin) ){
					$response['success'] &= 1;
				}
			}
			
			echo json_encode($response);
			Yii::app()->end();
		}
	}
}

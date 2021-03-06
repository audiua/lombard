<?php

class LeftMenuController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','imageUpload', 'deleteImage'),
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

	public function actionCreate(){

		$model=new LeftMenu;

		$data = Yii::app()->getRequest()->getPost('LeftMenu', null);
		if (!empty($data)) {
			$model->images = CUploadedFile::getInstancesByName('images');
			$model->setAttributes( $data );

			if($model->save()){
				Yii::app()->user->setFlash('LeftMenu_FLASH', 'Збережено');
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$data = Yii::app()->getRequest()->getPost('LeftMenu', null);
		if (!empty($data)) {
			$model->images = CUploadedFile::getInstancesByName('images');
			$model->setAttributes( $data );

			if($model->save()){
				Yii::app()->user->setFlash('LeftMenu_FLASH', 'Збережено');
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
		$model=new LeftMenu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftMenu']))
			$model->attributes=$_GET['LeftMenu'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LeftMenu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LeftMenu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LeftMenu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='left-menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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

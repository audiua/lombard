<?php

class SiteController extends Controller{

	/**
	 * Просмотр главной страницы - по умолчанию slug = main
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->condition = "t.slug='main'";
		$model = Page::model()->find($criteria);
		if(!$model){
			throw new CHttpException('404', 'not page');
		}


		$this->render('index', array('model'=>$model));
	}



	/**
	 * Просмотр страницы
	 *
	 * @param $page str  slug страницы
	 */
	public function actionPage($page){

		$criteria=new CDbCriteria;
		$criteria->condition = "t.slug='{$page}'";
		$model = Page::model()->find($criteria);
		if(!$model){
			throw new CHttpException('404', 'not page');
		}


		$this->render('page', array('model'=>$model));
	}

	/**
	 * Просмотр категории. Выводит список статей
	 *
	 * @param $category str  slug категории
	 */
	public function actionCategory($category){
		$criteria=new CDbCriteria;
		$criteria->condition = "t.slug='{$category}'";
		$model = Category::model()->find($criteria);
		if(!$model){
			throw new CHttpException('404', 'not category');
		}

		$criteria = new CDbCriteria;
		$criteria->condition = 't.public=1';
		$criteria->addCondition('t.category_id='.$model->id);

		$articles = new CActiveDataProvider('Article',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>10,'pageVar'=>'p')));

		$this->render('category', array('model'=>$articles));
	}

	/**
	 * Просмотр статьи в категории
	 *
	 * @param $category str  slug категории
	 * @param $article str  slug статьи
	 */
	public function actionArticle($category, $article){
		$criteria=new CDbCriteria;
		$criteria->condition = "t.slug='{$category}'";
		$categoryModel = Category::model()->find($criteria);
		if(!$categoryModel){
			throw new CHttpException('404', 'Категория не знайдена');
		}

		$criteria=new CDbCriteria;
		$criteria->condition = "t.slug='{$article}'";
		$criteria->addCondition("t.category_id='{$categoryModel->id}'");
		$criteria->addCondition("t.public=1");
		$criteria->addCondition("t.public_time<".time());
		$article = Article::model()->find($criteria);
		if(!$article){
			throw new CHttpException('404', 'Стаття не знайдена');
		}

		$this->render('article', array('model'=>$article));
	}



	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin(){
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionGold(){
		$this->renderPartial('gold');
	}

	
}
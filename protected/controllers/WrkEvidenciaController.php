<?php

class WrkEvidenciaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $layout=false;

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
	public function actionCreate($idr)
	{
		$model=new WrkEvidencia('web'); //Escenario WEB, permite que la foto solo sea requerida si es web
		
		$model->id_reporte = $idr;
		$model->txt_unidad = "no definido";
		$model->b_liberado = 0;
		
		

		if(isset($_POST['WrkEvidencia']))
		{
			$model->attributes=$_POST['WrkEvidencia'];
			
			$model->image = CUploadedFile::getInstance($model,'image');
			$model->txt_url_imagen =  uniqid() . ".jpg";
			
			
			if($model->save()){	
				$imgPath = Yii::app()->basePath . "/../images/evidencia/repo_" . $model->id_reporte  . "/";
				
				//Verifica si existe el directorio, si no lo crea
				if(!file_exists ($imgPath)){
					mkdir($imgPath, 0700, true);
				}
				
				
				//Guarda la imagen en el directorio indicado
				$model->image->saveAs($imgPath . $model->txt_url_imagen);
				return;
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
		$criteriaReporte = CatTiposReportes::model ()->findAll ();
		$criteriaReporte = CHtml::listData ( $criteriaReporte, "id_tipo_reporte", "txt_nombre" );
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WrkEvidencia']))
		{
			$model->attributes=$_POST['WrkEvidencia'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evidencia));
		}

		$this->render('update',array(
			'model'=>$model,
				'criteriaReporte'=>$criteriaReporte
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('WrkEvidencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WrkEvidencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WrkEvidencia']))
			$model->attributes=$_GET['WrkEvidencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WrkEvidencia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WrkEvidencia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param WrkEvidencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wrk-evidencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

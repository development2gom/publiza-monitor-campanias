<?php

class WrkReporteController extends Controller
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
				'actions'=>array('create','update','admin','delete'),
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
	public function actionCreate($idc, $idca)
	{
		$model=new WrkReporte;
		
		$model->id_cliente = $idc;
		$model->id_campana = $idca;
		
		$criteriaCliente = EntClientes::model ()->findAll ();
		$criteriaCliente = CHtml::listData ( $criteriaCliente, "id_cliente", "txt_nombre" );
		
		$criteriaCampana = EntCampanas::model ()->findAll ();
		$criteriaCampana = CHtml::listData ( $criteriaCampana, "id_campana", "txt_nombre" );
		
		$criteriaTipoReporte = CatTiposReportes::model ()->findAll ();
		$criteriaTipoReporte = CHtml::listData ( $criteriaTipoReporte, "id_tipo_reporte", "txt_nombre" );
		
		$criteriaPlaza = CatPlazas::model()->findAll();
		$criteriaPlaza = CHtml::listData  ($criteriaPlaza, "id_plaza","txt_nombre");
		

		if(isset($_POST['WrkReporte']))
		{
			$model->attributes=$_POST['WrkReporte'];
			if($model->save()){
				return;
			}
		}

		$this->render('create',array(
			'model'=>$model,
				'criteriaCliente'=>$criteriaCliente,
				'criteriaCampana'=>$criteriaCampana,
				'criteriaTipoReporte'=>$criteriaTipoReporte,
				'criteriaPlaza' => $criteriaPlaza,
				
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
		$criteriaCliente = EntClientes::model ()->findAll ();
		$criteriaCliente = CHtml::listData ( $criteriaCliente, "id_cliente", "txt_nombre" );
		
		$criteriaCampana = EntCampanas::model ()->findAll ();
		$criteriaCampana = CHtml::listData ( $criteriaCampana, "id_campana", "txt_nombre" );
		
		$criteriaTipoReporte = CatTiposReportes::model ()->findAll ();
		$criteriaTipoReporte = CHtml::listData ( $criteriaTipoReporte, "id_tipo_reporte", "txt_nombre" );
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WrkReporte']))
		{
			$model->attributes=$_POST['WrkReporte'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_reporte));
		}

		$this->render('update',array(
			'model'=>$model,
				'criteriaCliente'=>$criteriaCliente,
				'criteriaCampana'=>$criteriaCampana,
				'criteriaTipoReporte'=>$criteriaTipoReporte
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
		$dataProvider=new CActiveDataProvider('WrkReporte');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WrkReporte('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WrkReporte']))
			$model->attributes=$_GET['WrkReporte'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WrkReporte the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WrkReporte::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param WrkReporte $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wrk-reporte-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

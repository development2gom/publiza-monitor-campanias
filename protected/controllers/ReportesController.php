<?php

class ReportesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('create','update','admin','delete','instalacion','incidencias','periodico'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','instalacion'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex(){
		
		$idCliente = Yii::app()->user->getClientId();
		
		$camapanasList = EntCampanas::model()->findAll(array(
			'condition'=>'id_cliente=:idc AND b_habilitado=1',
			'params'=>array(':idc'=>$idCliente),	
		));
		
		$cliente = EntClientes::model()->findByPk($idCliente);
		
		$this->render('index',array('cliente'=>$cliente,'camapanasList'=>$camapanasList));
	}
	
	
	
	public function actionInstalacion($idc){
		$idCampana = $idc;
		$idTipoReporte = 1; //instalacion
		
		$campana = EntCampanas::model()->findByPk($idCampana);
		$data = WrkReporte::model()->findAll(array(
			'condition'=>'id_campana=:idc AND id_tipo_reporte=:idtr AND b_liberado=1',
			'params'=>array(':idc'=>$idCampana,':idtr'=>$idTipoReporte)	
		));
		$this->render('instalacion',array('campana'=>$campana, 'data'=>$data));
	}
	
	public function actionIncidencias($idc){
		$idCampana = $idc;
		$idTipoReporte = 2; //incidentes
	
		$campana = EntCampanas::model()->findByPk($idCampana);
		$data = WrkReporte::model()->findAll(array(
				'condition'=>'id_campana=:idc AND id_tipo_reporte=:idtr AND b_liberado=1',
				'params'=>array(':idc'=>$idCampana,':idtr'=>$idTipoReporte)
		));
		$this->render('incidencias',array('campana'=>$campana, 'data'=>$data));
	}
	
	public function actionPeriodico($idc){
		$idCampana = $idc;
		$idTipoReporte = 3; //Periodico
	
		$campana = EntCampanas::model()->findByPk($idCampana);
		$data = WrkReporte::model()->findAll(array(
				'condition'=>'id_campana=:idc AND id_tipo_reporte=:idtr AND b_liberado=1',
				'params'=>array(':idc'=>$idCampana,':idtr'=>$idTipoReporte)
		));
		$this->render('periodicos',array('campana'=>$campana, 'data'=>$data));
	}
}

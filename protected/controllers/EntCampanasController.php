<?php

class EntCampanasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	//public $layout='//layouts/main';

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
				'actions'=>array(
						'create',
						'update',
						'admin',
						'delete',
						'updateImage',
						'deleteEvidencia',
						'liberarReporte',
						'agregarArchivo',
						'editarNumeroReporte',
						'vencerCampana'
				),
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
	public function actionView($id, $idp = null, $idt = null)
	{
		$this->layout = "main";
		
		$plazas = CatPlazas::model()->findAll();
		$plazas = CHtml::listData ( $plazas, "id_plaza", "txt_nombre" );
		
		$estado = CatTiposReportes::model()->findAll();
		$estado = CHtml::listData ( $estado, "id_tipo_reporte", "txt_nombre" );
		
		
		//Filtra los elementos 
		if($idp == null && $idt == null){
			$model = EntCampanas::model()->findByPk($id);
		}else if($idp == null && $idt != null){ //Filtra los reportes
			$model = EntCampanas::model()->with(
					array('wrkReportes'=>array('condition'=>'id_tipo_reporte=:idt','params'=>array(':idt'=>$idt))		
					))->findByPk($id);
					
		}else if($idp != null && $idt == null){ //Filtra los reportes por plaza
			$model = EntCampanas::model()->with(
					array('wrkReportes'=>array('condition'=>'id_plaza=:idp','params'=>array(':idp'=>$idp))		
					))->findByPk($id);
		}else if($idp != null && $idt != null){
			$model = EntCampanas::model()->with(
					array('wrkReportes'=>array('condition'=>'id_plaza=:idp AND id_tipo_reporte=:idt','params'=>array(':idp'=>$idp,':idt'=>$idt))		
					))->findByPk($id);
		}
		
		
		if(empty($model)){
			$model = EntCampanas::model()->findByPk($id);
			$model-> wrkReportes = array();
		}
		//print_r($model);
		
		
		$this->render('view',array(
			'model'=>$model,
			'plazas'=>$plazas,
			'estado'=>$estado,
			'idt'=>$idt,
			'idp'=>$idp	
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EntCampanas;
		$model->relCampanasPlazases = array();
		
		$criteriaUsuario = EntClientes::model ()->findAll (array('order'=>'txt_nombre'));
		$criteriaUsuario = CHtml::listData ( $criteriaUsuario, "id_cliente", "txt_nombre" );
		
		$criteriaEstatus = CatEstatus::model ()->findAll ();
		$criteriaEstatus = CHtml::listData ( $criteriaEstatus, "id_estatus", "txt_nombre" );
		
		
		
		$criteriaPlazas = CatPlazas::model()->findAll();
		$criteriaPlazasData = CHtml::listData ( $criteriaPlazas, "id_plaza", "txt_nombre" );
		
		//Carga los datos seleccionados relacionados al objeto principal (Se usa para el update)
		$selected_keys = array_keys ( CHtml::listData ( $model->relCampanasPlazases, 'id_plaza', 'id_plaza' ) );
		$criteriaPlazas = CHtml::checkBoxList ( 'CatPlazas[relCampanasPlazases][]', $selected_keys, $criteriaPlazasData );


		if(isset($_POST['EntCampanas']))
		{
			//Recupera los datos del post
			$model->attributes=$_POST['EntCampanas'];
			
			
			if(isset($_POST['CatPlazas']['relCampanasPlazases'])){
			
			//Recupera los datos del check 
			$model->relCampanasPlazases = $_POST['CatPlazas']['relCampanasPlazases'];
			
			//Crea la lista de elementos seleccionados por si se requere desplegar de nuevo
			$criteriaPlazas = CHtml::checkBoxList ( 'CatPlazas[relCampanasPlazases][]', $model->relCampanasPlazases, $criteriaPlazasData );
			
			
			
			$model->image=CUploadedFile::getInstance($model,'image');
			
			
			
			
			if(count($model->relCampanasPlazases) > 0 && $model->save()){
				
			if(!empty($model->image)){
					$model->txt_url_master_graphic =  uniqid() . ".jpg";
					$imgPath = Yii::app()->basePath . "/../images/campana_" . $model->id_campana . "/master/";
					
					//Verifica si existe el directorio, si no lo crea
					if(!file_exists ($imgPath)){
						mkdir($imgPath, 0700, true);
					}
					
					
					//Guarda la imagen en el directorio indicado
					$model->image->saveAs($imgPath . $model->txt_url_master_graphic);
					$model->save(); //Actualiza con la nueva imagen
				}
				
				//Guarda las plazas
				foreach ($model->relCampanasPlazases as $plaza){
					$modelPlaza = new RelCampanasPlazas();
					$modelPlaza->id_campana = $model->id_campana;
					$modelPlaza->id_plaza = $plaza;
					$modelPlaza->fch_inicio = $model->fch_inicio;
					$modelPlaza->fch_fin = $model->fch_fin;
					
					$modelPlaza->save();
				}
				
				//Redirect
				$this->redirect(array('view','id'=>$model->id_campana));
			}
			}else{
					$model->validate();
					$model->addError('rel_plazas','Debe seleccionar almenos una plaza');
				
			}
		}

		$this->render('create',array(
			'model'=>$model,
				'criteriaUsuario'=> $criteriaUsuario,
				'criteriaEstatus'=>$criteriaEstatus,
				'criteriaPlazas' => $criteriaPlazas
		));
	}
	
	
	public function actionVencerCampana(){
		
		if(isset($_POST['idcv'])){
			$id = $_POST['idcv'];
			$model=$this->loadModel($id);
			$model->b_habilitado = 0;
			
			if($model->save()){
				Yii::app()->user->setFlash('success', "Camapaña marcada como vencida " . $model->txt_nombre);
			}else{
				Yii::app()->user->setFlash('error', "Error al marcar como vencida la campaña!");
			}
			
			print_r($model->getErrors());
		}
		
		$this->redirect(array('index'));
		
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
	
		$criteriaUsuario = EntClientes::model ()->findAll ();
		$criteriaUsuario = CHtml::listData ( $criteriaUsuario, "id_cliente", "txt_nombre" );
	
		$criteriaEstatus = CatEstatus::model ()->findAll ();
		$criteriaEstatus = CHtml::listData ( $criteriaEstatus, "id_estatus", "txt_nombre" );
	
		$criteriaPlazas = CatPlazas::model()->findAll();
		$criteriaPlazasData = CHtml::listData ( $criteriaPlazas, "id_plaza", "txt_nombre" );
		
		//Carga los datos seleccionados relacionados al objeto principal (Se usa para el update)
		$selected_keys = array_keys ( CHtml::listData ( $model->relCampanasPlazases, 'id_plaza', 'id_plaza' ) );
		$criteriaPlazas = CHtml::checkBoxList ( 'CatPlazas[relCampanasPlazases][]', $selected_keys, $criteriaPlazasData );
		
		
	
		if(isset($_POST['EntCampanas'])){
				
			$model->attributes=$_POST['EntCampanas'];
			if(isset($_POST['CatPlazas']['relCampanasPlazases'])){
					
				//Recupera los datos del check
				$plazas  = $model->relCampanasPlazases;
				
				$model->relCampanasPlazases = $_POST['CatPlazas']['relCampanasPlazases'];
					
				//Crea la lista de elementos seleccionados por si se requere desplegar de nuevo
				$criteriaPlazas = CHtml::checkBoxList ( 'CatPlazas[relCampanasPlazases][]', $model->relCampanasPlazases, $criteriaPlazasData );
					
					
			
			
			$model->image=CUploadedFile::getInstance($model,'image');
	
			if($model->save()){
	
				if(!empty($model->image)){
					$model->txt_url_master_graphic =  uniqid() . ".jpg";
					$imgPath = Yii::app()->basePath . "/../images/campana_" . $model->id_campana . "/master/";
						
					//Verifica si existe el directorio, si no lo crea
					if(!file_exists ($imgPath)){
						mkdir($imgPath, 0700, true);
					}
						
						
					//Guarda la imagen en el directorio indicado
					$model->image->saveAs($imgPath . $model->txt_url_master_graphic);
					$model->save(); //Actualiza con la nueva imagen
					
				}
				
				
				$existe = false;
				foreach ($plazas as $p){
					$existe = false;
					foreach ($model->relCampanasPlazases as $idPlaza){
						if($idPlaza == $p->id_plaza){
							$existe = true;
							break;
						}
					}
					
					if(!$existe){
						$p->delete();
					}
				}
				
				
				//Guarda las plazas
				
				foreach ($model->relCampanasPlazases as $idPlaza){
					$existe = false;
					foreach ($plazas as $p){
						if($idPlaza == $p->id_plaza){
							$existe = true;
						}
					}
					if($existe){
						continue;
					}
					$modelPlaza = new RelCampanasPlazas();
					$modelPlaza->id_campana = $model->id_campana;
					$modelPlaza->id_plaza = $idPlaza;
					$modelPlaza->fch_inicio = $model->fch_inicio;
					$modelPlaza->fch_fin = $model->fch_fin;
					$modelPlaza->save();
				}
				
				//Redirect
				$this->redirect(array('view','id'=>$model->id_campana));
			}
			}
		}
	
		$this->render('update',array(
				'model'=>$model,
				'criteriaUsuario'=> $criteriaUsuario,
				'criteriaEstatus'=>$criteriaEstatus,
				'criteriaPlazas' => $criteriaPlazas
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
		$dataProvider=new CActiveDataProvider('EntCampanas',
				array(
    				'criteria'=>array(
        			'condition'=>'b_habilitado=1',
        
    			)));
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}
	
	
	
	
	//============================ FUNCIONES DE SOPORTE ===========================================
	
	
	
	/*
	 * Edita los numeros del camion
	 */
	public function actionEditarNumeroReporte(){
		if(isset($_POST['idr']) && isset($_POST['numero']) ){ //Id de la campaña
			
			$idReporte  = $_POST['idr'];
			$idTipo 	= $_POST['idtipo'];
			$numero 	= $_POST['numero'];
			
			$txtCampo = "";
			
			$model = WrkReporte::model()->findByPk( $idReporte );
			
			switch($idTipo){
				case 1:
					$model->txt_numero_unidad = $numero;
					$txtCampo = "unidad";
					break;
				case 2:
					$model->txt_eco_placa 	  = $numero;
					$txtCampo ="eco/placa";
					break;
				case 3:
					$model->txt_codigo_ruta  = $numero;
					$txtCampo = "código de ruta";
					break;
				default:
					Yii::app()->user->setFlash('success', "Default " . $idTipo);
					$this->redirect(array('view','id'=> $model->id_campana));
			}
			
			
			if($model->save()){
				Yii::app()->user->setFlash('success', "Número " . $txtCampo . " actualizado correctamente");
				$this->redirect(array('view','id'=> $model->id_campana));
			}else{
				//print_r($model->getErrors());
				//exit();
				
				Yii::app()->user->setFlash('danger', "El número no pudo ser actualizado.");
				$this->redirect(Yii::app()->request->urlReferrer);
			}
			
		}else{
			Yii::app()->user->setFlash('danger', "No indico el numero para actualizar.");
		
			$this->redirect(Yii::app()->request->urlReferrer);
		}
	}
	
	
	/**
	 * Agrega un archivo a la campaña
	 */
	public function actionAgregarArchivo(){
		print_r($_FILES['archivo']['name']);
		
		
		
		if(isset($_FILES['archivo']['name']) && //Verifica que si venga el nombre del archivo
				($_FILES['archivo']['name'] != '') && //Verifica que el nombre no sea vacio
				isset($_POST['tipo']) && //Tipo de archivo
				isset($_POST['idc'])){ //Id de la campaña
				
				
			$tipoArchivo = $_POST['tipo'];
			$idCampana   = $_POST['idc'];
				
			$model = EntCampanas::model()->findByPk($idCampana);
			
			$model->archivo=CUploadedFile::getInstanceByName('archivo');
				
			$path = $_FILES['archivo']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$fileName = uniqid() . '.' . $ext;
			
			//Determina el tipo de archivo a agregar
			if($tipoArchivo == "xls"){
				$model->txt_url_xls =  $fileName;
			}else if($tipoArchivo == "ppt"){
				$model->txt_url_ppt =  $fileName;
			}else{
				$model->txt_url_image =  $fileName;
			}
		
			if($model->save()){
					
				$filePath = Yii::app()->basePath . "/../images/campana_" . $model->id_campana . "/";
					
				//Verifica si existe el directorio, si no lo crea
				if(!file_exists ($filePath)){
					mkdir($filePath, 0700, true);
				}
					
					
				//Guarda el archivo en el directorio indicado
				$model->archivo->saveAs($filePath . $fileName);
				
				Yii::app()->user->setFlash('success', "Archivo actualizada correctamente");
				$this->redirect(array('view','id'=> $model->id_campana));
			}
				
			Yii::app()->user->setFlash('danger', "El archivo indicado no puedo ser agregado.");
				
			$this->redirect(Yii::app()->request->urlReferrer);
				
		}else{
			Yii::app()->user->setFlash('danger', "No indico archivo para agregar.");
				
			$this->redirect(Yii::app()->request->urlReferrer);
		}
	}
	
	/**
	 * Actualiza la imagen de la evidencia de la campaña
	 */
	public function actionUpdateImage(){
		
		print_r($_FILES['new_image']['name']);
		
		if(isset($_FILES['new_image']['name']) && ($_FILES['new_image']['name'] != '') && isset($_POST['idEvent'])){
			
			
			$idEvent = $_POST['idEvent'];
			
			$model = WrkEvidencia::model()->findByPk($idEvent);
			$model->image=CUploadedFile::getInstanceByName('new_image');
			
			
			
			print_r($model->image);
			
			$model->txt_url_imagen =  uniqid() . ".jpg";
				
				
			if($model->save()){
			
				$imgPath = Yii::app()->basePath . "/../images/evidencia/repo_" . $model->id_reporte . "/";
			
				//Verifica si existe el directorio, si no lo crea
				if(!file_exists ($imgPath)){
					mkdir($imgPath, 0700, true);
				}
			
			
				//Guarda la imagen en el directorio indicado
				$model->image->saveAs($imgPath . $model->txt_url_imagen);
				
				Yii::app()->user->setFlash('success', "Imagen actualizada correctamente");
				$this->redirect(array('view','id'=> $model->idReporte->id_campana));
			}
			
			//print_r($model);
			
		}else{
			Yii::app()->user->setFlash('danger', "No indico imagen para hacer el cambio.");
			
			$this->redirect(Yii::app()->request->urlReferrer);
		}
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteEvidencia($id)
	{
		$model = WrkEvidencia::model()->findByPk($id);
		$idCamapana = $model->idReporte->id_campana;
		$model->delete();

		Yii::app()->user->setFlash('success', "Evidencia eliminada correctamente");
		$this->redirect(array('view','id'=> $idCamapana));
	}
	
	
	/**
	 * Marca como liberado el reporte
	 * @param unknown $id
	 */
	public function actionLiberarReporte($id){
		$model = WrkReporte::model()->findByPk($id);
		$model->b_liberado = 1;
		
		$model->save();
		
		Yii::app()->user->setFlash('success', "Reporte liberado con éxito!");
		$this->redirect(Yii::app()->request->urlReferrer);
	}

	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EntCampanas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EntCampanas']))
			$model->attributes=$_GET['EntCampanas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EntCampanas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EntCampanas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EntCampanas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ent-campanas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

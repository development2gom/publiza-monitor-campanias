<?php

class ServicesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout=false;
	
	
	public function actionLogin($u,$p){
		$sql = "SELECT id_usuario AS id, txt_nombre_usuario As userName FROM ent_usuarios WHERE txt_nombre_usuario = :un AND txt_contrasena = :ps AND b_web=0";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":un",$u);
		$command->bindParam(":ps",$p);
		$res = $command->queryAll(true); // execute a query SQL
		
		if(count($res) == 1){
			$json = json_encode($res[0]);
			echo($json);
		}
	}
	
	
	
	public function actionGetClientList(){
		$sql = "SELECT CL.id_cliente AS id, CL.txt_nombre AS txtNombre FROM ent_clientes CL INNER JOIN ent_campanas CA ON CL.id_cliente = CA.id_cliente WHERE CA.id_estatus <> 3 GROUP BY id ORDER BY CL.txt_nombre";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$res = $command->queryAll(true); // execute a query SQL
		
		echo(json_encode($res));

	}
	
	public function actionGetCampaignList($idc){
		$sql = "SELECT id_campana AS id, txt_nombre As txtNombre FROM ent_campanas WHERE id_cliente=:idc AND id_estatus <> 3";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":idc",$idc);
		$res = $command->queryAll(true); // execute a query SQL
	
		echo(json_encode($res));
	}
	
	public function actionGetTiposReportesList(){
		$sql = "SELECT id_tipo_reporte AS id, txt_nombre AS txtNombre FROM cat_tipos_reportes WHERE b_habilitado = 1";
		$command = Yii::app()->db->createCommand($sql);
		$res = $command->queryAll(true); // execute a query SQL
	
		echo(json_encode($res));
	}

	public function actionGetPlazasList($idc){
		$sql = "SELECT CP.id_plaza AS id , P.txt_nombre AS txtNombre FROM rel_campanas_plazas CP INNER JOIN cat_plazas P ON CP.id_plaza = P.id_plaza WHERE id_campana = :idc";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(":idc",$idc);
		$res = $command->queryAll(true); // execute a query SQL
	
		echo(json_encode($res));
	}
	
	
	public function actionUploadReporte(){
		if(isset($_POST['idr'])){
			$repo = New WrkReporte();
			$repo->id_cliente 		 = $_POST['idc'];
			$repo->id_campana 		 = $_POST['idca'];
			$repo->id_tipo_reporte 	 = $_POST['idtr'];
			$repo->txt_numero_unidad = $_POST['tnu'];
			
			//Agregadas mayo 16 por AFA
			$repo->id_plaza			 = $_POST['idp'];
			$repo->txt_eco_placa	 = $_POST['eco'];
			$repo->txt_codigo_ruta	 = $_POST['ruta'];
			
			//Valida si la campaña es la numero 1 y autoriza sus reportes
			if($repo->id_campana == 1){
				$repo->b_liberado = 1;
			}
			

			if($repo->save()){
				echo '{"responseCode":1,"response":"ok","message":"Guardado con exito","id":' . $repo->id_reporte . '}';
			}else{
				$errorMsg = print_r($repo->getErrors());
				echo '{"responseCode":0,"response":"error","message":"no se pudo guardar: ' . $errorMsg . '"}';
				
			}
		}else{
			echo '{"responseCode":0,"response":"error","message":"Parametros incorrectos"}';
		}
	}
	
	
	/**
	 * 
	 */
	public function actionUploadEvidencia(){
		if(isset($_POST['idr'])){
			$evi = new WrkEvidenciaService();
			
			$evi->id_reporte 	 = $_POST['idr'];
			$evi->txt_unidad 	 = $_POST['tu'];
			$evi->txt_url_imagen = "img" . uniqid() . ".jpg";
			$evi->num_lat 		 = $_POST['lat'];
			$evi->num_lon 		 = $_POST['lon'];
			$image 				 = $_POST['img_b64']; //Base64 de la imagen

			
			
			//ruta para almacenar la imagen
			$imgPath = Yii::app()->basePath . "/../images/evidencia/repo_" . $evi->id_reporte . "/";
			
			//Verifica si existe el directorio, si no lo crea
			if(!file_exists ($imgPath)){
				mkdir($imgPath, 0777);
			}
			
			//almacena en el disco la imagen creada
			$this->base64_to_jpeg($image, $imgPath . $evi->txt_url_imagen);
			
		if($evi->save()){
				echo '{"responseCode":1,"response":"ok","message":"Guardado con exito","id":' . $evi->id_evidencia . '}';
			}else{
				print_r($evi->getErrors());
				$errorMsg = print_r($evi->getErrors());
				echo '{"responseCode":0,"response":"error","message":"no se pudo guardar: ' . $errorMsg . '"}';
				
			}
		}else{
			echo '{"responseCode":0,"response":"error","message":"Parametros incorrectos"}';
		}
	}
	
	
	function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen($output_file, "wb");
	
		$data = explode(',', $base64_string);
	
		fwrite($ifp, base64_decode($data[0]));
		fclose($ifp);
	
		return $output_file;
	}
}

?>
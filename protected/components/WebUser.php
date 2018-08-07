<?php 
//http://www.yiiframework.com/wiki/60/
class WebUser extends CWebUser{
	
	private $_model;
	
	function getFulltName(){
		$user = $this->loadUser(Yii::app()->user->id);
		return $user->txt_nombre . ' ' . $user->txt_apellido_paterno;
	}
	
	function isClient(){
		$user = $this->loadUser(Yii::app()->user->id);
		if($user === null){
			return false;
		}
		return $user->id_cliente != null;
	}
	
	function getClientId(){
		$user = $this->loadUser(Yii::app()->user->id);
		if($user === null){
			return -1;
		}
		return $user->id_cliente;
	}
	
	// Load user model.
	protected function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null)
				$this->_model=EntUsuarios::model()->find(array(
					'condition'=>' txt_nombre_usuario=:nu',
					'params'=>array(':nu'=>$id),	
				));
		}
		return $this->_model;
	}
}

?>
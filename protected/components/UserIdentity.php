<?php
//http://www.yiiframework.com/wiki/60/
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$record = EntUsuarios::model ()->findByAttributes ( array (
	    'txt_nombre_usuario' => $this->username,
		'b_web' => 1,		 
	    
	  ) ); // here I use Email as user name which comes from database

	  	//print_r($record);
	  
	  	if ($record === null) {
	   		//$this->_id = 'user Null';
	   		$this->errorCode = self::ERROR_USERNAME_INVALID;
	   		// here I compare db password with passwod field
	  	} else if ($record->txt_contrasena !== $this->password){
	  		echo("password");
	   		//$this->_id = $this->username;
	   		$this->errorCode = self::ERROR_PASSWORD_INVALID;
	   		// here I check status as Active in db
// 	  }    else if ($record->b_habilitado != 1) {
//			//echo("habilitado");
// 	  		$err = "You have been Inactive by Admin.";
// 	  		$this->errorCode = $err;
	  	 } else {
	  	 //	echo ("ok");
	   		//$this->_id=$record->id_usuario;
	   		$this->errorCode = self::ERROR_NONE;
	   		//$this->setState('ID_CLIENTE', $record->id_cliente);
	  	}
	  	return ! $this->errorCode;
	}
}
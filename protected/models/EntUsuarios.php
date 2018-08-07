<?php

/**
 * This is the model class for table "ent_usuarios".
 *
 * The followings are the available columns in table 'ent_usuarios':
 * @property string $id_usuario
 * @property string $id_cliente
 * @property string $txt_nombre
 * @property string $txt_apellido_paterno
 * @property string $txt_apellido_materno
 * @property string $txt_nombre_usuario
 * @property string $txt_contrasena
 * @property integer $b_web
 * @property integer $b_habilitado
 *
 * The followings are the available model relations:
 * @property EntClientes $idCliente
 */
class EntUsuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ent_usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('txt_nombre, txt_apellido_paterno, txt_apellido_materno, txt_nombre_usuario, txt_contrasena, b_web', 'required'),
			array('b_web, b_habilitado', 'numerical', 'integerOnly'=>true),
			array('id_cliente', 'length', 'max'=>11),
			array('txt_nombre, txt_apellido_paterno, txt_apellido_materno, txt_nombre_usuario, txt_contrasena', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, id_cliente, txt_nombre, txt_apellido_paterno, txt_apellido_materno, txt_nombre_usuario, txt_contrasena, b_web, b_habilitado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCliente' => array(self::BELONGS_TO, 'EntClientes', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Usuario',
			'id_cliente' => 'Cliente',
			'txt_nombre' => 'Nombre',
			'txt_apellido_paterno' => 'Apellido paterno',
			'txt_apellido_materno' => 'Apellido materno',
			'txt_nombre_usuario' => 'Nombre de usuario',
			'txt_contrasena' => 'Contraseña',
			'b_web' => 'Tipo de usuario',
			'b_habilitado' => 'Habilitado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('txt_nombre',$this->txt_nombre,true);
		$criteria->compare('txt_apellido_paterno',$this->txt_apellido_paterno,true);
		$criteria->compare('txt_apellido_materno',$this->txt_apellido_materno,true);
		$criteria->compare('txt_nombre_usuario',$this->txt_nombre_usuario,true);
		$criteria->compare('txt_contrasena',$this->txt_contrasena,true);
		$criteria->compare('b_web',$this->b_web);
		$criteria->compare('b_habilitado',$this->b_habilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EntUsuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 */
class FichierForm extends CFormModel
{
	public $fichier;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('fichier', 'required'),
			array('fichier', 'file','types'=>'jpg, gif, png'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'fichier'=>Yii::t('common','file'),
		);
	}
}
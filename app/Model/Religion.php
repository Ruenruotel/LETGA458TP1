<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Subcategory $Subcategory
 */
class Religion extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Subreligion' => array(
			'className' => 'Subreligion',
			'foreignKey' => 'religion_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

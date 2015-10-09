<?php
App::uses('AppModel', 'Model');
/**
 * ChurchesMissionary Model
 *
 * @property Church $Church
 * @property Missionary $Missionary
 */
class ChurchesMissionary extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'church_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'missionary_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Church' => array(
			'className' => 'Church',
			'foreignKey' => 'church_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Missionary' => array(
			'className' => 'Missionary',
			'foreignKey' => 'missionary_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

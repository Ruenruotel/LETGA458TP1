<?php

App::uses('AppModel', 'Model');

/**
 * Donation Model
 *
 * @property Church $Church
 */
class Donation extends AppModel {

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
        'amount' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'The donation must be a number.',
                'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'date' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                'message' => 'The date is invalid.',
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
        )
    );

}

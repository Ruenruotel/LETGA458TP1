<?php

App::uses('AppModel', 'Model');

/**
 * Subcategory Model
 *
 * @property Category $Category
 * @property Post $Post
 */
class Subreligion extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Religion' => array(
            'className' => 'Religion',
            'foreignKey' => 'religion_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Missionary' => array(
            'className' => 'Missionary',
            'foreignKey' => 'subreligion_id',
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

    public function getByReligion($rel_id = null) {
        return $this->find('list', array(
                    'conditions' => array('Subreligion.religion_id' => $rel_id),
                    'recursive' => -1
        ));
    }

}

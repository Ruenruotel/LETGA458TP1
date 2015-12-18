<?php

App::uses('AppModel', 'Model');

class Country extends AppModel {

    public function getCountries($term = null) {
        if (!empty($term)) {
            $countries = $this->find('all', array(
                'conditions' => array(
                    'name LIKE' => trim($term) . '%'
                ),
                    'recursive' => -1
            ));
            return $countries;
        }
        return false;
    }
    
    public function getIdByName($name = null) {
        $returnId = -1;
        if (!empty($name)) {
            $country = $this->find('first', array(
                'conditions' => array(
                    'name = "' . $name . '"'
                )
            ));
            if (!empty($country)) {
                $returnId = $country['Country']['id'];
            }
        }
        return $returnId;
    }
    
    public $hasMany = array(
		'Missionary' => array(
			'className' => 'Missionary',
			'foreignKey' => 'country_id',
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

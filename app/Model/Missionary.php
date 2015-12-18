<?php

App::uses('AppModel', 'Model');

/**
 * Missionary Model
 *
 * @property User $User
 * @property Church $Church
 */
class Missionary extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter a name for the missionary.',
                'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'details' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter details for the missionary.',
                'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid email.',
                'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'profile_picture' => array(
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                'message' => 'Invalid file, only images allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'filesize' => array(
                'rule' => array('filesize', '<=', '1MB'),
                'message' => 'Article image must be less then 1MB',
                'allowEmpty' => TRUE,
            ),
            'processImageUpload' => array(
                'rule' => 'processImageUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'subreligion_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'country_id' => array(
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Subreligion' => array(
            'className' => 'Subreligion',
            'foreignKey' => 'subreligion_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Church' => array(
            'className' => 'Church',
            'joinTable' => 'churches_missionaries',
            'foreignKey' => 'missionary_id',
            'associationForeignKey' => 'church_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    public function isOwnedBy($missionary, $user) {
        return $this->field('id', array('id' => $missionary, 'user_id' => $user)) !== false;
    }

    /**
     * Process the Upload
     * @param array $check
     * @return boolean
     */
    public function processImageUpload($check = array()) {
        if (!empty($check['profile_picture']['tmp_name'])) {
            if (!$this->is_uploaded_file($check['profile_picture']['tmp_name'])) {
                return FALSE;
            }
            $filename = WWW_ROOT . 'img' . DS . 'uploads' . DS . $check['profile_picture']['name'];
            if (!$this->move_uploaded_file($check['profile_picture']['tmp_name'], $filename)) {
                return FALSE;
            } else {
                $this->data[$this->alias]['profile_picture'] = 'uploads' . '/' . $check['profile_picture']['name'];
            }
        }
        return TRUE;
    }

    public function is_uploaded_file($tmp_name) {
        return is_uploaded_file($tmp_name);
    }

    public function move_uploaded_file($from, $to) {
        return move_uploaded_file($from, $to);
    }

}

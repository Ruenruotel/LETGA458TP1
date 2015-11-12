<?php

App::uses('AppController', 'Controller');

class SubreligionsController extends AppController {

    public function getByReligion() {
        $religion_id = $this->request->data['Missionary']['religion_id'];

        $subreligions = $this->Subreligion->find('list', array(
            'conditions' => array('Subreligion.religion_id' => $religion_id),
            'recursive' => -1
        ));

        $this->set('subreligions', $subreligions);
        $this->layout = 'ajax';
    }

}

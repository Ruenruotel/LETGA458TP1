<?php

App::uses('AppController', 'Controller');

class SubreligionsController extends AppController {

    public function getByReligion() {
        $religion_id = $this->request->data['Missionary']['religion_id'];
        $this->set('subreligions', $this->Subreligion->getByReligion($religion_id));
        $this->layout = 'ajax';
    }

}

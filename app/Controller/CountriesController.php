<?php
  class CountriesController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
      if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $countries = $this->Country->getCountries($term);
            $this->set(compact('countries'));
            $this->set('_serialize', 'countries');
        }
    }
    
  }


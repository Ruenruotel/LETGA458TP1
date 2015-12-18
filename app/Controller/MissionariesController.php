<?php

App::uses('AppController', 'Controller');

/**
 * Missionaries Controller
 *
 * @property Missionary $Missionary
 * @property PaginatorComponent $Paginator
 */
class MissionariesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        $this->Session->write('Auth.theRedirect', Router::url(null, true));
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function complete() {
        if ($this->request->is('ajax')) {
            $this->autoLayout = false;
            $this->autoRender = false;
            $this->loadModel('Country');
            $term = $this->request->query('term');
            $countries = $this->Country->getCountries($term);
            echo json_encode($countries);
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Missionary->recursive = 1;
        $this->set('missionaries', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Missionary->exists($id)) {
            throw new NotFoundException(__('Invalid missionary'), 'flash/warning');
        }
        $options = array('conditions' => array('Missionary.' . $this->Missionary->primaryKey => $id));
        $missionary = $this->Missionary->find('first', $options);
        $this->set('missionary', $missionary);
        $this->set('religion', $this->Missionary->Subreligion->Religion->find('first', array('conditions' => array('id' => $missionary['Subreligion']['religion_id']))));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Missionary->create();
            $this->loadModel('Country');
            $this->request->data['Missionary']['country_id'] = $this->Country->getIdByName($this->request->data['Missionary']['country_name']);
            if ($this->request->data['Missionary']['country_id'] != -1) {
                if (empty($this->request->data['Missionary']['profile_picture']['name'])) {
                    unset($this->request->data['Missionary']['profile_picture']);
                }
                if ($this->Missionary->save($this->request->data)) {
                    $this->Session->setFlash(__('The missionary has been saved'), 'flash/success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The missionary could not be saved. Please, try again.'), 'flash/error');
                }
            } else {
                $this->Session->setFlash(__('The country does not exist.'), 'flash/error');
            }
        }
        $religions = $this->Missionary->Subreligion->Religion->find('list');
        $subreligions = $this->Missionary->Subreligion->find('list', array('conditions' => array('religion_id' => 1))); // Christianisme par défaut
        $users = $this->Missionary->User->find('list');
        $churches = $this->Missionary->Church->find('list');
        $this->set(compact('users', 'churches', 'religions', 'subreligions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Missionary->id = $id;
        if (!$this->Missionary->exists($id)) {
            throw new NotFoundException(__('Invalid missionary'), 'flash/warning');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->loadModel('Country');
            $this->request->data['Missionary']['country_id'] = $this->Country->getIdByName($this->request->data['Missionary']['country_name']);
            if ($this->request->data['Missionary']['country_id'] != -1) {
                if (empty($this->request->data['Missionary']['profile_picture']['name'])) {
                    unset($this->request->data['Missionary']['profile_picture']);
                }
                if ($this->Missionary->save($this->request->data)) {
                    $this->Session->setFlash(__('The missionary has been saved'), 'flash/success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The missionary could not be saved. Please, try again.'), 'flash/error');
                }
            } else {
                $this->Session->setFlash(__('The country does not exist.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Missionary.' . $this->Missionary->primaryKey => $id));
            $this->request->data = $this->Missionary->find('first', $options);
        }
        $options = array('conditions' => array('Missionary.' . $this->Missionary->primaryKey => $id));
        $test = $this->Missionary->find('first', $options);
        $religions = $this->Missionary->Subreligion->Religion->find('list');
        $this->request->data['Missionary']['religion_id'] = $this->Missionary->Subreligion->find('first', array('conditions' => array('Subreligion.id' => $this->request->data['Missionary']['subreligion_id'])))['Subreligion']['religion_id'];
        $subreligions = $this->Missionary->Subreligion->find('list', array('conditions' => array('religion_id' => $this->request->data['Missionary']['religion_id'])));
        if ($this->request->data['Missionary']['country_id'] != -1) {
            $this->request->data['Missionary']['country_name'] = $this->Missionary->Country->find('first', array('conditions' => array('Country.id' => $this->request->data['Missionary']['country_id'])))
                ['Country']['name'];
        }
        $users = $this->Missionary->User->find('list');
        $churches = $this->Missionary->Church->find('list');
        $this->set(compact('users', 'churches', 'religions', 'subreligions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Missionary->id = $id;
        if (!$this->Missionary->exists()) {
            throw new NotFoundException(__('Invalid missionary'), 'flash/warning');
        }
        if ($this->Missionary->delete()) {
            $this->Session->setFlash(__('Missionary deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Missionary was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $missionaryId = (int) $this->request->params['pass'][0];
            if ($this->Missionary->isOwnedBy($missionaryId, $user['id'])) {
                return true;
            }
        }
        if (in_array($this->action, array('add'))) {
            if ($this->Session->read('Auth.User.active') == 1) {
               return true; 
            }
        }
        return parent::isAuthorized($user);
    }

}

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
        $this->set('missionary', $this->Missionary->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Missionary->create();
            if ($this->Missionary->save($this->request->data)) {
                $this->Session->setFlash(__('The missionary has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The missionary could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Missionary->User->find('list');
        $churches = $this->Missionary->Church->find('list');
        $this->set(compact('users', 'churches'));
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
            if ($this->Missionary->save($this->request->data)) {
                $this->Session->setFlash(__('The missionary has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The missionary could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Missionary.' . $this->Missionary->primaryKey => $id));
            $this->request->data = $this->Missionary->find('first', $options);
        }
        $users = $this->Missionary->User->find('list');
        $churches = $this->Missionary->Church->find('list');
        $this->set(compact('users', 'churches'));
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
            return true;
        }
        return parent::isAuthorized($user);
    }

}

<?php

App::uses('AppController', 'Controller');

/**
 * Donations Controller
 *
 * @property Donation $Donation
 * @property PaginatorComponent $Paginator
 */
class DonationsController extends AppController {

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
        $this->Donation->recursive = 0;
        $this->set('donations', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Donation->exists($id)) {
            throw new NotFoundException(__('Invalid donation'));
        }
        $options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
        $this->set('donation', $this->Donation->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Donation->create();
            if ($this->Donation->save($this->request->data)) {
                $this->Session->setFlash(__('The donation has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The donation could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $churches = $this->Donation->Church->find('list');
        $this->set(compact('churches'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Donation->id = $id;
        if (!$this->Donation->exists($id)) {
            throw new NotFoundException(__('Invalid donation'), 'flash/warning');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Donation->save($this->request->data)) {
                $this->Session->setFlash(__('The donation has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The donation could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
            $this->request->data = $this->Donation->find('first', $options);
        }
        $churches = $this->Donation->Church->find('list');
        $this->set(compact('churches'));
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
        $this->Donation->id = $id;
        if (!$this->Donation->exists()) {
            throw new NotFoundException(__('Invalid donation'), 'flash/warning');
        }
        if ($this->Donation->delete()) {
            $this->Session->setFlash(__('Donation deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Donation was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    
    public function isAuthorized($user) {
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $this->Donation->id = (int) $this->request->params['pass'][0];
            $this->Donation->read();
            $church_id = $this->Donation->data['Church']['id'];
            if ($this->Donation->Church->isOwnedBy($church_id, $user['id'])) {
                return true;
            }
        }
        if (in_array($this->action, array('add'))) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}

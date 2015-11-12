<?php

App::uses('AppController', 'Controller');

/**
 * Churches Controller
 *
 * @property Church $Church
 * @property PaginatorComponent $Paginator
 */
class ChurchesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        $this->Session->write('Auth.theRedirect', Router::url(null, true));
        parent::beforeFilter();
        $this->Auth->allow('index', 'about');
    }
    
    public function about() {
        
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Church->recursive = 1;
        $this->set('churches', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Church->exists($id)) {
            throw new NotFoundException(__('Invalid church'), 'flash/warning');
        }
        $options = array('conditions' => array('Church.' . $this->Church->primaryKey => $id));
        $this->set('church', $this->Church->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Church->create();
            if ($this->Church->save($this->request->data)) {
                $this->Session->setFlash(__('The church has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The church could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Church->User->find('list');
        $missionaries = $this->Church->Missionary->find('list');
        $this->set(compact('users', 'missionaries'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Church->id = $id;
        if (!$this->Church->exists($id)) {
            throw new NotFoundException(__('Invalid church'), 'flash/warning');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Church->save($this->request->data)) {
                $this->Session->setFlash(__('The church has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The church could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Church.' . $this->Church->primaryKey => $id));
            $this->request->data = $this->Church->find('first', $options);
        }
        $users = $this->Church->User->find('list');
        $missionaries = $this->Church->Missionary->find('list');
        $this->set(compact('users', 'missionaries'));
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
        $this->Church->id = $id;
        if (!$this->Church->exists()) {
            throw new NotFoundException(__('Invalid church'), 'flash/warning');
        }
        if ($this->Church->delete()) {
            $this->Session->setFlash(__('Church deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Church was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $churchId = (int) $this->request->params['pass'][0];
            if ($this->Church->isOwnedBy($churchId, $user['id'])) {
                return true;
            }
        }
        if (in_array($this->action, array('add'))) {
            return true;
        }
        return parent::isAuthorized($user);
    }

}

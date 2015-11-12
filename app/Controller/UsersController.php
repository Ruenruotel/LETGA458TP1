<?php

App::uses('AppController', 'Controller');
App::uses('HtmlHelper', 'Helper');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    public function beforeFilter() {
        $this->Auth->loginRedirect = $this->Session->read("Auth.theRedirect");
        parent::beforeFilter();
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        $this->Auth->allow('logout', 'resend_mail', 'activate');
        $this->Session->write('Auth.theRedirect', "/");
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->request->data['User']['role'] = 'member';
            if ($this->request->data['User']['password'] == $this->request->data['User']['password_confirm']) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    if ($this->request->data['User']['role'] != 'admin') {
                        $u = $this->User->read(null, $this->User->getInsertId());
                        $this->send_mail($u['User']['email'], $u['User']['username'], $this->User->getInsertID(), $u['User']['password']);
                    }
                    $this->Session->setFlash(__('You have successfully registered. You can now sign in. Don\'t forget to activate your account.'), 'flash/success');
                    $this->redirect(array('action' => 'login'));
                } else {
                    $this->Session->setFlash(__('An error occured and you couldn\'t get registered. Please, try again.'), 'flash/error');
                }
            } else {
                $this->Session->setFlash(__('The passwords do not match.'), 'flash/error');
            }
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->request->data['User']['password'] == $this->request->data['User']['password_confirm']) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    if ($this->request->data['User']['role'] != 'admin') {
                        $u = $this->User->read(null, $this->User->getInsertId());
                        $this->send_mail($u['User']['email'], $u['User']['username'], $this->User->getInsertID(), $u['User']['password']);
                    }
                    $this->Session->setFlash(__('The user has been saved.'), 'flash/success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
                }
            } else {
                $this->Session->setFlash(__('The passwords do not match.'), 'flash/error');
            }
        }
    }

    private function send_mail($recipient = null, $username = null, $id = null, $password = null) {
        $link = array('controller' => 'users', 'action' => 'activate', $id . '-' . md5($password));
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('noreply@localhost.com')->to($recipient)->subject('Mail Confirmation');
        $email->emailFormat('html')->template('activation')->viewVars(array('username' => $username, 'link' => $link));
        $email->send();
    }

    public function resend_mail() {
        $user = $this->User->find('first', array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id'))))['User'];
        $this->send_mail($user['email'], $user['username'], $user['id'], $user['password']);
        $this->Session->setFlash(__('The link has been sent to your email. Please go click it.'), 'flash/success');
        $this->redirect('/');
    }

    public function activate($link) {
        if (empty($link)) {
            $this->redirect(array('action' => 'login'));
        }
        $linkArray = explode('-', $link);
        $user = $this->User->find('first', array('conditions' => array('id' => $linkArray[0], 'MD5(User.password)' => $linkArray[1], 'active' => 0)));
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->Session->setFlash(__('Account activated ! You are now able to manage donations and missionaries.'), 'flash/success');
            $user = $this->User->findById($user['User']['id']);
            $this->Auth->login($user['User']);
            $this->redirect(array('controller' => 'churches', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Activation link not good or account already activated.'), 'flash/error');
            $this->redirect('/');
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Session->read('Auth.User.active') == 0) {
                    $this->Session->setFlash(__("As your account is not activated yet, you may only manage churches (not donations or missionaries)."), 'flash/info');
                } else {
                    $this->Session->setFlash(__("Logged in ! (and just so you know, your account is activated)"), 'flash/success');
                }
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__("Invalid user or password, try again"), 'flash/warning');
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'), 'flash/warning');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'), 'flash/warning');
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            if ($id === $this->Session->read('Auth.User.id')) {
                $this->redirect(array('action' => 'logout'));
            } else {
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        if (in_array($this->action, array('edit', 'delete'))) {
            $userId = $this->request->params['pass'][0];
            if ($userId === $user['id']) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}

<?php

// app/Controller/UsersController.php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        $this->layout = 'Posts';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        $this->layout = 'Posts';
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->layout = 'Posts';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
        return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
    }

    public function view($id = null) {
        $this->layout = 'Posts';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        $this->layout = 'Posts';
        if ($this->request->is('post')) {
            $this->User->create();
            //upload avatar
            if (!empty($this->request->data['User']['avatar']['tmp_name']) && is_uploaded_file($this->request->data['User']['avatar']['tmp_name'])) {
                $filename = basename($this->request->data['User']['avatar']['name']);
                move_uploaded_file($this->data['User']['avatar']['tmp_name'],WWW_ROOT . DS . 'img' . DS . $filename);
            }
            $image_url = array('image_url'=>  '.'.DS . 'img' . DS . $filename);
            $requestForm = array_merge($this->request->data['User'], $image_url);
            if ($this->User->save($requestForm)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->layout = 'Posts';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null)
    {

        $this->layout = 'Posts';

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));

    }

}
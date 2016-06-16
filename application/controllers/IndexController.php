<?php

class IndexController extends Zend_Controller_Action {

    public $sessUser;

    public function preDispatch() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/auth');
        } else {
            $this->sessUser = Zend_Auth::getInstance()->getIdentity();
        }
    }

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

}

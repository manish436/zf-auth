<?php

use Application_Model_EmployeeMapper;

class MyaccountController extends Zend_Controller_Action {

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
        $form = new Application_Form_Myaccount();

        $obj = new Application_Model_EmployeeMapper();

        $userDetails = $obj->fetchUserDetails($this->sessUser->id);
        $data = array(
            'employeeid' => $employee_id,
            'FirstName' => $employee->getFirstName(),
            'LastName' => $employee->getLastName(),
            'email' => $employee->getEmail(),
            'PhoneNumber' => $employee->getPhoneNumber(),
            'HireDate' => $employee->getHireDate(),
            'JobId' => $employee->getJobId(),
            'Salary' => $employee->getSalary(),
            'CommissionPct' => $employee->getCommissionPct()
        );
        $form->populate($data);

        $this->view->form = $form;
    }

}

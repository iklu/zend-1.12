<?php

class Application_Form_Auth_Login extends Zend_Form
{
    public function init()
    {

        $this->setMethod('post');
 
        $this->addElement(
            'text', 'USERNAME', array(
                'label' => 'Username:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
 
        $this->addElement('password', 'PASSWORD', array(
            'label' => 'Password:',
            'required' => true,
            ));
 
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
            ));
 
    }
}
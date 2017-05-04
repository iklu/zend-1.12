    <?php

    class AuthController extends Zend_Controller_Action
    {
     
        public function loginAction()
        {
            $db = $this->_getParam('resources.db.adapter');

            print_r($db);
     
            $loginForm = new Application_Form_Auth_Login();
     
            if ($loginForm->isValid($_POST)) {
     
                $adapter = new Zend_Auth_Adapter_DbTable(
                    $db,
                    'USERS_AUTH',
                    'USERNAME',
                    'PASSWORD',
                    'MD5(CONCAT(?, PASSWORD_SALT))'
                    );
     
                $adapter->setIdentity($loginForm->getValue('USERNAME'));
                $adapter->setCredential($loginForm->getValue('PASSWORD'));
     
                $auth   = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);
     
                if ($result->isValid()) {
                    $this->_helper->FlashMessenger('Successful Login');
                    $this->_redirect('/');
                    return;
                }
     
            }
     
            $this->view->loginForm = $loginForm;
     
        }
     
    }
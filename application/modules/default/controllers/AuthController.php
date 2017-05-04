    <?php

    class AuthController extends Zend_Controller_Action
    {
     
        public function loginAction()
        {
            $dbAdapter = Zend_Db_Table::getDefaultAdapter();           
     
            $loginForm = new Application_Form_Auth_Login();
            
     
            if ($loginForm->isValid($_POST)) {
     
                $adapter = new Zend_Auth_Adapter_DbTable(
                    $dbAdapter,
                    'USERS_AUTH',
                    'USERNAME',
                    'PASSWORD',
                    'PASSWORD_SALT'
                    );
     
                $adapter->setIdentity($loginForm->getValue('USERNAME'));
                $adapter->setCredential($loginForm->getValue('PASSWORD'));
     
                $auth   = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);
     
                if ($result->isValid()) {
                    $this->_helper->FlashMessenger('Successful Login');
                    $this->_redirect('/');
                    return;
                } else {
                    var_dump($result);
                }
     
            }
     
            $this->view->loginForm = $loginForm;
     
        }
     
    }
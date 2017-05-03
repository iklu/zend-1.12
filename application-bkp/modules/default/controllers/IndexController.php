<?php

class IndexController extends Saffron_AbstractController {

    
    public function indexAction() {
        
        $this->view->headTitle('Homepage');
//        
//        $db = Zend_Db::factory('Oracle', array(
//            'host'       => 'localhost',
//            'username'   => 'system',
//            'password'   => 'parola86',
//            'dbname'     => 'xe',
//            'persistent' => true
//        ));
//        $sql = 'SELECT * FROM USERS';
//     
//    $result = $db->fetchAll($sql);
//           
//            
//            print_r($result);
        
        $employee = new Application_Model_UsersMapper();
        $this->view->entries = $employee->fetchAll();

        
        print_r($this->view->entries);
    }

}

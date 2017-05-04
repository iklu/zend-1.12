<?php

class Application_Model_GuestbookMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Guestbook');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Guestbook $guestbook)
    {
        
        $data = array(
            'EMAIL'   => $guestbook->getEmail(),
            'COMMENTS' => $guestbook->getComments(),
            'CREATED' =>new Zend_Db_Expr("to_date('".date("Y-m-d")."', 'YYYY-MM-DD')") ,
        );

         $this->getDbTable()->insert($data);
        
        if (null === ($id = $guestbook->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Guestbook $guestbook)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $guestbook->setId($row->id)
                  ->setEmail($row->email)
                  ->setComments($row->comments)
                  ->setCreated($row->created);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Guestbook();
            $entry->setId($row->ID)
                  ->setEmail($row->EMAIL)
                  ->setComments($row->COMMENTS)
                  ->setCreated($row->CREATED);
            $entries[] = $entry;
        }
        return $entries;
    }
}


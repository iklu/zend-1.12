<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Application_Model_Guestbook
 *
 * @author ovidiu.dragoi
 */
class Application_Model_Guestbook {
    protected $_comment;
    protected $_created;
    protected $_email;
    protected $_id;
 
    public function __set($name, $value);
    public function __get($name);
 
    public function setComment($text);
    public function getComment();
 
    public function setEmail($email);
    public function getEmail();
 
    public function setCreated($ts);
    public function getCreated();
 
    public function setId($id);
    public function getId();
}

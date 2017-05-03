<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$route = new Zend_Controller_Router_Route( 'author', array('controller' => 'user', 'action' => 'index'));

$router->addRoute('author', $route);
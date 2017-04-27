<?php

$route = new Zend_Controller_Router_Route(
    'author',
    array(
        'controller' => 'hello',
        'action'     => 'hello'
    ) 
);

$router->addRoute('hello', $route);
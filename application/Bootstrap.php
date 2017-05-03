<?php

use DI\Bridge\ZendFramework1\Dispatcher;

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    protected function _initRoutes()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        
        $route = new Zend_Controller_Router_Route( 'author', array('controller' => 'user', 'action' => 'indsex'));
        
        $router->addRoute('author', $route);
    }

    /**
     * Initialize the dependency injection container
     */
    protected function _initDependencyInjection()
    {
       $builder = new \DI\ContainerBuilder();
        $builder->useAnnotations(true);
        $container = $builder->build();

        $dispatcher = new \DI\Bridge\ZendFramework1\Dispatcher();
        $dispatcher->setContainer($container);

        Zend_Controller_Front::getInstance()->setDispatcher($dispatcher);
        
    }
}

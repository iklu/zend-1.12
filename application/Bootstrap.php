<?php

use DI\Bridge\ZendFramework1\Dispatcher;

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    /**
     * Initialize the routes
     *
     * @return void
     */
    protected function _initRoutes()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        
        $login = new Zend_Controller_Router_Route( 'login', array('controller' => 'auth', 'action' => 'login'));
        
        $router->addRoute('login', $login);
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

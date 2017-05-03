<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected $_docRoot;
    
    
    protected function _initDoctype() {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initPath()
    {
        $this->_docRoot = realpath(APPLICATION_PATH . '/../');
        Zend_Registry::set('docRoot', $this->_docRoot);
    }

    protected function _initLoaderResource()
    {
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                'basePath' => $this->_docRoot . '/application',
                'namespace' => 'Saffron'
            ));
        $resourceLoader->addResourceTypes(array(
            'model' => array(
                'namespace' => 'Model',
                'path' => 'models'
            )
        ));
    }

    protected function _initLog()
    {
        $writer = new Zend_Log_Writer_Stream(APPLICATION_PATH . '/../data/logs/error.log');
        return new Zend_Log($writer);
    }

    protected function _initView()
    {
        $view = new Zend_View();
        return $view;
    }

    protected function _initRoutes()
    {

        $frontController  = Zend_Controller_Front::getInstance();
        $route = new Zend_Controller_Router_Route(
            "users", array(
                "controller"=>"homepage",
                "module"=>"default",
                "action"=>"index"
            ));

        $frontController->getRouter()->addRoute("user", $route);
        
        
        
        //$router = Zend_Controller_Front::getInstance()->getRouter();
       // include APPLICATION_PATH . "/../application/configs/routes.php";
    }
    
      protected function _initContainer()
    {
        $builder = new DI\ContainerBuilder;
        $builder->useAnnotations(true);
        $container = $builder->build();

        $dispatcher = new \DI\Bridge\ZendFramework1\Dispatcher();
        $dispatcher->setContainer($container);

        Zend_Controller_Front::getInstance()->setDispatcher($dispatcher);
    }
    

}

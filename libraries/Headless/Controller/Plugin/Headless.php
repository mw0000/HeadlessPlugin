<?php

class Headless_Controller_Plugin_Headless extends Zend_Controller_Plugin_Abstract
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        $user = current_user();

        if (empty($user) && $controller != 'users' && $action != 'login') {
            
            // allow some controllers for API requests
            if($controller != 'api' 
            && $controller !='site'
            && $controller !='resources'
            && $controller !='files'
            && $controller !='presentation'
            && $controller !='image'
            ) {
                $request->setActionName('index');
                $request->setModuleName('headless');
                $request->setControllerName('index');
            }
            
        }
    } 
}

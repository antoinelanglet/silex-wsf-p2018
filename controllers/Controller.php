<?php
namespace MVC;

class Controller 
{

    protected $datas = array();

    public function initAction($app)
    {
        
    }

    public function redirect($app, $route)
    {
        return $app->redirect(
            $app['url_generator']->generate($route)
        );
    }
}
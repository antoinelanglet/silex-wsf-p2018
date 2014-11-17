<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request, Application $app, $name)
    {
        return 'Hello '.$name;
    }
}

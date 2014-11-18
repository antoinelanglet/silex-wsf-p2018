<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    public function postLogin(Request $request, Application $app)
    {
        return 'post login';
    }

}

<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    public function getAdminDashboard(Request $request, Application $app)
    {
        $this->initAction($app);

        return $app['twig']->render('admin/dashboard.twig', $this->datas);
    }
}
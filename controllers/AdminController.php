<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;


class AdminController extends Controller
{

    public function getAdminDashboard(Request $request, Application $app)
    {
        $this->initAction($app);

        return $app['twig']->render('admin/dashboard.twig', $this->datas);
    }

    public function getAdminArticle(Request $request, Application $app)
    {
        $this->initAction($app);

        return $app['twig']->render('admin/article.twig', $this->datas);
    }

    public function getAdminUser(Request $request, Application $app)
    {
        $this->initAction($app);

        return $app['twig']->render('admin/user.twig', $this->datas);
    }

    public function postAdminUser(Request $request, Application $app)
    {
        $this->initAction($app);

        $email = $request->request->get('email');
        $emailConfirm = $request->request->get('confirm_email');

        $password = $request->request->get('password');
        $passwordConfirm = $request->request->get('confirm_password');

        $errorsEmail = $app['validator']->validateValue(
            $email, 
            array(
                new Assert\Email(),
                new Assert\NotBlank(),
                new Assert\IdenticalTo(array(
                    'value' => $emailConfirm,
                )),
            )
        );
        
        $errorsPassword = $app['validator']->validateValue(
            $password, 
            array(
                new Assert\NotBlank(),
                new Assert\IdenticalTo(array(
                    'value' => $passwordConfirm,
                )),
            )
        );

        //Si il y a des erreurs
        if (count($errorsEmail) > 0 || count($errorsPassword) > 0) {
            foreach ($errorsEmail as $error) {
                $app['session']->getFlashBag()->add('errorsEmail', $error->getMessage());
            }
            foreach ($errorsPassword as $error) {
                $app['session']->getFlashBag()->add('errorsPassword', $error->getMessage());
            }

            return $this->redirect($app, 'getAdminUser');
        }

        //Ajout d'un user dans la BDD
        $user = new User();
        $nb = $user->add($email , $password);

        if ($nb) {
            $app['session']->getFlashBag()->add('success', 'User added');
        }
        else {
            $app['session']->getFlashBag()->add('error', 'User not added');
        }

        return $this->redirect($app, 'getAdminUser');
        //return $app['twig']->render('admin/user.twig', $this->datas);
    }


}
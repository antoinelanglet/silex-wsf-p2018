<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    public function postLogin(Request $request, Application $app)
    {
        //Récupérer les valeurs postés par les champs input
        $login = $request->request->get('login');
        $password = $request->request->get('password');

        //Si $login n'est pas vide
        if (!empty($login)) {
            //J'instancie le model User
            $user = new User();

            //Je recupère l'utilisateur qui correspond au login
            $myUser = $user->getByLogin($login);

            //Si $myUser n'est pas vide
            if (!empty($myUser)) {
                //Si le password de l'user est égale au password du formulaire
                if ($myUser['password'] === $password) {

                    //On enregistre l'user dans la session
                    $app['session']->set('user', array(
                        'username' => $login,
                        'admin' => $myUser['admin']
                    ));

                    //on redirige vers la home
                    return $app->redirect(
                        $app['url_generator']->generate('home')
                    );
                }
            }
        }

        //$app['session']->getFlashBag();

        //On redirige vers la home sans modifier la session
        return $app->redirect(
            $app['url_generator']->generate('home')
        );
    }

}

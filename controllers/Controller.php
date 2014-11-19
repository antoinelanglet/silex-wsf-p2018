<?php
namespace MVC;

class Controller 
{

    /**
     * Les données qui seront envoyés à la vue
     * 
     * @var array
     */
    protected $datas = array();

    /**
     * Inistalise le tableau datas avec les données de 
     * l'utilisateur connecté.
     * 
     * @param  Silex\Application $app
     */
    public function initAction($app)
    {
        //Recupère la variable user dans la session
        $user = $app['session']->get('user');

        //Si user n'est pas vide
        if (!empty($user)) {

            //Je met user dans le tableau datas
            $this->datas['user'] = $user;

            //Je definis la valeur idAdmin en fonction 
            //du status admin de l'user
            $this->datas['isAdmin'] = $user['admin'];
        }  
    }

    /**
     * Renvoi une redirection
     * 
     * @param  Silex\Application $app   
     * @param  string $route Route de destination
     * @return Redirect
     */
    public function redirect($app, $route)
    {
        return $app->redirect(
            $app['url_generator']->generate($route)
        );
    }
}
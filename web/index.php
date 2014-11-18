<?php 

//Chargement de l'auto loader
require_once __DIR__.'/../vendor/autoload.php';

// Creation de l'instance Silex
$app = new Silex\Application();

//Activation du mode debug
$app['debug'] = true;

//Configuration de twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    //twig trouvera les fichiers templates dans le dossier views
    'twig.path' => __DIR__.'/../views',
));

//Routes
$app->get('/', 'MVC\\HomeController::index');
$app->get('/article/{id}', 'MVC\\HomeController::getArticle');

$app->run();

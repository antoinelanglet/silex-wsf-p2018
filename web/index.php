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

//Configuration du service URL Generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//Configuration du service session
$app->register(new Silex\Provider\SessionServiceProvider());


//Routes
$app->get('/', 'MVC\\HomeController::index')
    ->bind('home');

$app->get('/article/{id}', 'MVC\\HomeController::getArticle')
    ->bind('getArticle');

$app->post('/login', 'MVC\\UserController::postLogin')
    ->bind('postLogin');

$app->get('/logout', 'MVC\\UserController::getLogout')
    ->bind('getLogout');

$app->run();

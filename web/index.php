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

//Validator service 
$app->register(new Silex\Provider\ValidatorServiceProvider());



//Routes
$app->get('/', 'MVC\\HomeController::index')
    ->bind('home');

$app->get('/article/{id}', 'MVC\\HomeController::getArticle')
    ->bind('getArticle');

$app->post('/login', 'MVC\\UserController::postLogin')
    ->bind('postLogin');

$app->get('/logout', 'MVC\\UserController::getLogout')
    ->bind('getLogout');

/**
 * Route Admin
 */
$app->get('/admin', 'MVC\\AdminController::getAdminDashboard')
    ->bind('getAdmin');

$app->get('/admin/article', 'MVC\\AdminController::getAdminArticle')
    ->bind('getAdminArticle');

$app->get('/admin/user', 'MVC\\AdminController::getAdminUser')
    ->bind('getAdminUser');

$app->post('/admin/user', 'MVC\\AdminController::postAdminUser')
    ->bind('postAdminUser');

$app->run();

<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index(Request $request, Application $app)
    {
        $this->initAction($app);

        //initialise le model Article
        $article = new Article();

        //Je mets dans datas['articles'] tous mes articles
        $this->datas['articles'] = $article->getAll();

        //Appel de twig, pour générer le rendu html
        return $app['twig']->render('home/index.twig', $this->datas);
    }

    public function getArticle(Request $request, Application $app, $id)
    {
        $this->initAction($app);
        
        //initialise le model Article
        $article = new Article();

        //Recupère un article
        $this->datas['article'] = $article->get($id);

        //Appel de twig, pour générer le rendu html
        return $app['twig']->render('home/article.twig', $this->datas);

    }
}

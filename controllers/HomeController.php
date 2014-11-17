<?php 
namespace MVC;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function index(Request $request, Application $app)
    {
        //initialise le model Article
        $article = new Article();

        //Recupère tous les articles
        $all = $article->getAll();

        //Construction de l'html
        $html = '<html><body>';

        //Boucle sur tous les articles
        foreach ($all as $art) {
            //html de l'article
            $html .= '<article>'
                  .'<h2>' . $art['title'] . '</h2>'
                  .'<p>' . $art['body'] . '</p>'
                  .'</article>';
        } 
        
        //fin de l'html
        $html .= '</body></html>';

        return $html;
    }
}

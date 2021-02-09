<?php 
namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;

class BlogController extends Controller {

    private $em;

    public function __construct()
    {
        $this->em = new EntityManager('article');
    }

    public function articleList() {
        $articles = $this->em->find([], ['*'], [0, 10]);
        $this->render("client-article-list", ['articles' => $articles]);
    }

    public function articlePage(string $articleId) {
        
        $article = $this->em->find(['id'=> $articleId]);
        
        if(!$article) {
            $this->redirectWithError(HOME_ROUTE, "L'article souhaité n'existe pas");
        }

        $this->render('client-article', ["article" => $article[0]]);
    }

}
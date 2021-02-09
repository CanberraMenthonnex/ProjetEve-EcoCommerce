<?php 

namespace Controller;

use Core\Controller\Controller;
use Core\Http;
use Core\Model\EntityManager;
use Core\Session;
use DateTime;
use Model\Entity\Article;

class AdminBlogController extends Controller {

    private $em;

    public function __construct()
    {
        $this->protectFor('admin', HOME_ROUTE);
        $this->em = new EntityManager('article');
    }

    public function createArticlePage() {
        $admin = Session::get('admin');
        $this->render('admin-create-blog-article', compact("admin"));
    }

    public function articleList() {
        $admin = Session::get('admin');
        $articles = $this->em->find();
        $this->render('admin-blog-list', compact('admin','articles'));
    }

    public function postArticle() {
        if(!$this->checkPostKeys($_POST, ['title', 'description', 'category', 'content'])) {
            $this->redirectWithError(ADMIN_CREATE_ARTICLE, 'Some keys are missing');
        }

        $admin = Session::get('admin');
        
        $article = new Article();
        $article ->setTitle($_POST['title'])        
                 ->setDescription($_POST['description'])
                 ->setCategory($_POST['category'])
                 ->setContent($_POST['content'])
                 ->setAuthor($admin->getId());

        $res = $this->em->save($article);

        if($res) {
            $this->redirect(ADMIN_ARTICLE_LIST, "L'article a été créé avec succès");
        }

        $this->redirectWithError(ADMIN_CREATE_ARTICLE, "L'article ne s'est pas correctement créé");
        
    }

    public function deleteArticle(string $articleId) {
        $res = $this->em->delete(['id' => $articleId]);
        if($res) {
            $this->redirect(ADMIN_ARTICLE_LIST, 'L\'article a été supprimé avec succès ! ');
        }
        $this->redirectWithError(ADMIN_ARTICLE_LIST, ERROR_DELETE_BDD);
    }

}
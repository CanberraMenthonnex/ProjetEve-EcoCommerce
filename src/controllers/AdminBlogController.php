<?php 

namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;
use Core\Session;
use Model\Entity\Article;

class AdminBlogController extends Controller {

    private EntityManager $em;

    public function __construct()
    {
        $this->protectFor('admin', HOME_ROUTE);
        $this->em = new EntityManager('Article');
    }

    /**
     *
     *  Article index
     *
     */
    public function articleList() {
        $admin = Session::get('admin');
        $articles = $this->em->find();
        $this->render('admin-blog-list', compact('admin','articles'));
    }

    /**
     *  Create article page
     *
     */
    public function createArticlePage() {
        $admin = Session::get('admin');
        $this->render('admin-create-blog-article', compact("admin"));
    }

    /**
     *  Create article
     */
    public function postArticle() {
        if(!$this->checkPostKeys($_POST, ['title', 'description', 'category', 'content'])) {
            $this->redirectWithError(ADMIN_CREATE_ARTICLE, 'Some keys are missing');
        }

        $admin = Session::get('admin');
        $category = BLOG_CATEGORIES[$_POST["category"]] ? $_POST["category"] : BLOG_CATEGORIES["discovery"];
        
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

    /**
     * Delete article
     *
     * @param string $articleId
     */
    public function deleteArticle(string $articleId) {
        $res = $this->em->delete(['id' => $articleId]);
        if($res) {
            $this->redirect(ADMIN_ARTICLE_LIST, 'L\'article a été supprimé avec succès ! ');
        }
        $this->redirectWithError(ADMIN_ARTICLE_LIST, ERROR_DELETE_BDD);
    }

    /**
     * Edit page
     *
     * @param string $articleId
     */
    public function edit(string $articleId) {
        $admin = Session::get("admin");
        $article = $this->em->findOne(["id"=> $articleId]);

        if(!$article) {
            $this->redirect(ADMIN_ARTICLE_LIST);
        }

        $this->render("admin-create-blog-article", compact("article", "admin"));
    }

    /**
     * Update article
     *
     * @param string $articleId
     */
    public function update(string $articleId) {
        if(!$this->checkPostKeys($_POST, ['title', 'description', 'category', 'content'])) {
            $this->redirectWithError(ADMIN_CREATE_ARTICLE, 'Some keys are missing');
        }

        $admin = Session::get('admin');

        $article = $this->em->findOne(["id" => $articleId]);
        $article
            ->setTitle($_POST['title'])
            ->setDescription($_POST['description'])
            ->setCategory($_POST['category'])
            ->setContent($_POST['content'])
            ->setAuthor($admin->getId());

        $res = $this->em->update($article, ["id" => $articleId]);

        if($res) {
            $this->redirect(ADMIN_ARTICLE_LIST, "L'article a été modifié avec succès");
        }

        $this->redirectWithError(ADMIN_CREATE_ARTICLE, "L'article ne s'est pas correctement modifié");
    }

}
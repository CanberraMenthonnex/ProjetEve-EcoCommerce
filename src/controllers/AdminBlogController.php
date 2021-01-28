<?php 

namespace Controller;

use Core\Controller\Controller;
use Core\Session;

class AdminBlogController extends Controller {

    public function __construct()
    {
        $this->protectFor('admin', HOME_ROUTE);
    }

    public function createArticlePage() {
        $admin = Session::get('admin');
        $this->render('admin-create-blog-article', compact("admin"));
    }

}
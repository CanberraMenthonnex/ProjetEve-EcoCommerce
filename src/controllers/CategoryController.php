<?php

namespace Controller;

use Core\Controller\Controller;
use Core\Model\EntityManager;

class CategoryController extends Controller {

    private EntityManager $em;

    public function __construct()
    {
        $this->em = new EntityManager("ArticleCategory");
    }

}
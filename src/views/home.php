<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/common.css"/>
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/header.css" />
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/footer.css">
        <link rel="stylesheet" href="<?= MAIN_PATH ?>/style/home.css">
        <title>Document</title>
    </head>
    <body>
        <?php require("inc/header.php") ?>
        <main>
            <div class="container-tree" >
                <img src="<?= MAIN_PATH ?>/img/three-trees.svg" alt="Trees" title="Saved trees" class="container-tree--trees">
                <strong class="f-white" class="container-tree--comment">300 000 arbres</strong>
            </div>
            <section class="banner">
                <img src="<?= MAIN_PATH ?>/img/forest.jpg" alt="Forêt" title="Forêt" class="banner--picture">
                <article>
                    <h2 class="f-white banner--title"> Qui sommes nous ?</h2>
                    <p class="f-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque consequuntur et a numquam quo commodi reprehenderit ab animi! Necessitatibus, ea laborum. Porro aliquam reprehenderit amet ullam suscipit modi quia quasi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore ratione quisquam modi vitae libero corrupti mollitia, aut reprehenderit quia quod. Sequi rem qui voluptate vero, nemo blanditiis fugit eius placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium non assumenda vitae quaerat atque! Saepe perspiciatis voluptatem, placeat amet, necessitatibus architecto eum iure aut cum harum ipsa quam, enim optio?
                        <br><br>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia mollitia odit voluptatibus distinctio recusandae totam, neque repellendus doloremque, sapiente asperiores repudiandae eligendi. Rem nulla aut, tenetur inventore nihil hic expedita?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia cupiditate architecto, praesentium eligendi dicta cumque mollitia quasi porro ducimus dignissimos dolorem, cum rerum, adipisci fuga molestias quibusdam velit illum odit.
                    </p>
                </article>
            </section>
            <section class="post-container">
                <article class="post">
                    <h2 class="f-white post-title">Titre d'un article</h2>
                    <p class="f-white">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus quo deserunt libero veritatis tempora reprehenderit molestiae optio odit qui. Impedit similique praesentium consequuntur blanditiis. Velit illo perferendis atque tempore quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit perspiciatis laborum nulla ea? Enim, sed fuga at quia cum excepturi, repudiandae similique in omnis quas rem iste dignissimos quasi nisi!
                        <br><br>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et aut quibusdam obcaecati, in rerum error placeat sit voluptas veniam nesciunt, voluptates corporis magni? Facilis praesentium ad odit! Molestias, vitae sequi  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas quasi vel repellat dolore sunt minus dignissimos id nesciunt cum, provident iusto ex repudiandae vero, perspiciatis delectus facere reiciendis ipsum quia! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum, suscipit blanditiis accusantium assumenda ducimus reprehenderit excepturi cum quaerat, alias quod quidem recusandae iusto, modi nobis consequatur magnam aperiam! Facere, quibusdam.
                        <br><br>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et aut quibusdam obcaecati, in rerum error placeat sit voluptas veniam nesciunt, voluptates corporis magni? Facilis praesentium ad odit! Molestias, vitae sequi  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas quasi vel repellat dolore sunt minus dignissimos id nesciunt cum, provident iusto ex repudiandae vero, perspiciatis delectus facere reiciendis ipsum quia!
                    </p>
                </article>
                <a href="#" class="call-btn post--btn">
                    <span class="f-white">Découvrir notre blog</span>
                    <img src="<?= MAIN_PATH ?>/img/arrow_r.svg" alt="Right arrow" title="Découvrir notre blog" class="call-btn--icon">
                </a>
            </section>
            <div class="container-article-wrapper">
                <section class="container-articles">
                    <header class="separator-header">
                        <h2 class="f-white separator-header--title"> Les meilleures ventes </h2>
                    </header>
                    <div class="product-container">
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                    </div>
                </section>
                <section class="container-articles">
                    <header class="separator-header">
                        <h2 class="separator-header--title f-white"> Nom inconnu </h2>
                    </header>
                    <div class="product-container">
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img"> 
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                        <a href="#" class="product-link">
                            <article class="product-card">
                                <img src="<?= MAIN_PATH ?>/img/product-img.png" alt="" class="product-card--img">
                                <div class="product-card--content">
                                    <span class="product-card--price">10,99€</span>
                                    <h3 class="product-card--name">Nom du produit</h3>
                                </div>
                            </article>
                        </a>
                    </div>
                </section>  
            </div>
            <blockquote class="moral">
                <strong class="f-white moral--txt">"Devenez responsable du futur de votre planète"</strong>
            </blockquote>   
        </main>
        
        <?php require("inc/footer.php"); ?>
        <script src="/js/index.js"></script>
    </body>
</html>
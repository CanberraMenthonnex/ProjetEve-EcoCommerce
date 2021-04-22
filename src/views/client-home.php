<?php

use Core\Router\PathGenerator;
use Core\View\Template\Template;

    ob_start();
?>


    <div class="flex--column align--center my-3" >
        <img src="<?= PathGenerator::generateImgPath( "three-trees.svg" )?>" alt="Trees" title="Saved trees" class="col2 col3-tablet col6-phone">
        <strong class="py-2 f-white" >300 000 arbres sauvés</strong>
    </div>
    <section class="banner flex  justify--around bg--dark-grey py-1">
        <img src="<?= MAIN_PATH ?>/img/forest.jpg" alt="Forêt" title="Forêt" class="col4 col8-tablet">
        <article class="col6 col10-tablet py-2-tablet flex--column justify--around">
            <h2 class="f-white banner--title"> Qui sommes nous ?</h2>
            <p class="f-white">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque consequuntur et a numquam quo commodi reprehenderit ab animi! Necessitatibus, ea laborum. Porro aliquam reprehenderit amet ullam suscipit modi quia quasi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore ratione quisquam modi vitae libero corrupti mollitia, aut reprehenderit quia quod. Sequi rem qui voluptate vero, nemo blanditiis fugit eius placeat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium non assumenda vitae quaerat atque! Saepe perspiciatis voluptatem, placeat amet, necessitatibus architecto eum iure aut cum harum ipsa quam, enim optio?
                <br><br>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia mollitia odit voluptatibus distinctio recusandae totam, neque repellendus doloremque, sapiente asperiores repudiandae eligendi. Rem nulla aut, tenetur inventore nihil hic expedita?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia cupiditate architecto, praesentium eligendi dicta cumque mollitia quasi porro ducimus dignissimos dolorem, cum rerum, adipisci fuga molestias quibusdam velit illum odit.
            </p>
        </article>
    </section>
    <div class="flex justify--center">
        <section class="flex--column align--center col10">
            <article class="col8 col10-phone py-3">
                <h2 class="f-white post-title py-2 py-3-phone">Titre d'un article</h2>
                <p class="f-white py-3-phone">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus quo deserunt libero veritatis tempora reprehenderit molestiae optio odit qui. Impedit similique praesentium consequuntur blanditiis. Velit illo perferendis atque tempore quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit perspiciatis laborum nulla ea? Enim, sed fuga at quia cum excepturi, repudiandae similique in omnis quas rem iste dignissimos quasi nisi!
                    <br><br>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et aut quibusdam obcaecati, in rerum error placeat sit voluptas veniam nesciunt, voluptates corporis magni? Facilis praesentium ad odit! Molestias, vitae sequi  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas quasi vel repellat dolore sunt minus dignissimos id nesciunt cum, provident iusto ex repudiandae vero, perspiciatis delectus facere reiciendis ipsum quia! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum, suscipit blanditiis accusantium assumenda ducimus reprehenderit excepturi cum quaerat, alias quod quidem recusandae iusto, modi nobis consequatur magnam aperiam! Facere, quibusdam.
                    <br><br>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et aut quibusdam obcaecati, in rerum error placeat sit voluptas veniam nesciunt, voluptates corporis magni? Facilis praesentium ad odit! Molestias, vitae sequi  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas quasi vel repellat dolore sunt minus dignissimos id nesciunt cum, provident iusto ex repudiandae vero, perspiciatis delectus facere reiciendis ipsum quia!
                </p>
            </article>
            <a href="#" class="cta self--end self-phone--center">
                <span class="f-white">Découvrir notre blog</span>
                <img src="<?= MAIN_PATH ?>/img/arrow_r.svg" alt="Right arrow" title="Découvrir notre blog" class="cta--icon">
            </a>
        </section> 
    </div>
    <div class="flex flex--column align--center py-5">
        <section class="col10 flex--column">
            <header class="py-3 delimiter-title">
                <h2 class="f-white separator-header--title"> Les meilleures ventes </h2>
            </header>
            <div class="flex justify--between align--stretch justify-phone--center">
                <?php foreach($products as $product) : ?>
                    <a href="<?= PathGenerator::generatePath( PRODUCT_DESC_ROUTE . $product->getId() )?>" class="col2 col5-tablet my-2-tablet col9-phone" >
                        <article class="product-card flex-fill--height">
                            <img src="<?= PathGenerator::generatePath(PRODUCT_UPLOAD_IMG_BASE_URL . $product->getImageUrl()) ?>" alt="" class="product-card--img">
                            <div class="product-card--content">
                                <span class="product-card--price"><?= $product->getPrice() ?>€</span>
                                <h3 class="product-card--title"><?= $product->getName() ?></h3>
                            </div>
                        </article>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="py-3 flex justify--end justify-phone--center">
               <a href="#" class="cta">Accéder à tous les produits</a> 
            </div>
            
        </section>
        <section class="col10">
            <header class="py-2 delimiter-title">
                <h2 class="separator-header--title f-white"> Les nouveaux produits </h2>
            </header>
            <div class="flex justify--between align--stretch justify-phone--center">
                <?php foreach($products as $product) : ?>
                    <a href="<?=PathGenerator::generatePath( PRODUCT_DESC_ROUTE . $product->getId() ) ?>" class="col2 col5-tablet my-2-tablet col9-phone">
                        <article class="product-card flex-fill--height">
                            <img src="<?= PathGenerator::generatePath(PRODUCT_UPLOAD_IMG_BASE_URL . $product->getImageUrl()) ?>" alt="" class="product-card--img">
                            <div class="product-card--content">
                                <span class="product-card--price"><?= $product->getPrice() ?>€</span>
                                <h3 class="product-card--title"><?= $product->getName() ?></h3>
                            </div>
                        </article>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="py-3 flex justify--end justify-phone--center">
               <a href="#" class="cta">Accéder aux autres nouveautés</a> 
            </div>
        </section>  
    </div>
    <blockquote class="flex justify--center pb-3 pb-5-phone">
        <strong class="f-white title txt-center">"Devenez responsable du futur de votre planète"</strong>
    </blockquote>   

<?php

$content = ob_get_clean();
$temp = new Template("Home", [], ["index"]);
$temp->transmitVarToContext(["userSession" => $userSession]);
$temp->render($content);
<?php

    $args = array(
      "post_type" => array("product"),
      "post_per_page" => -1, // all posts
    );

    $products = new WP_Query($args);
?>

<main class="productos">
  <div class="container-fluid ">
    <div class="productos__container">
      <?php if($products->have_posts()){ ?>
        <?php while($products->have_posts()){ $products->the_post(); ?>
          <div class="productos__card">
            <a class="producto__link" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail("post-thumbnail"); ?>
              <div class="producto__caption">
                <div class="productos__desc">
                  <h4 class="productos__titulo"><?php the_title(); ?></h4>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</main>
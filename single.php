<!-- Post Page -->

<?php get_header() ?>

<?php if(have_posts()) { ?>
  <?php while(have_posts()) { the_post(); ?>

    <div class="container product-container">
      <div class="row">
        <div class="col-12 col-md-6 product-image-container">
          <?php the_post_thumbnail("large"); ?>
        </div>
        <div class="col-12 col-md-6">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    
  <?php } ?>
<?php } ?>

<?php get_footer() ?>
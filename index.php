<?php get_header() ?>

<?php if(have_posts()) { ?>
  <?php while(have_posts()) { the_post(); ?>
    <div class="container">
      <?php the_content(); ?>
    </div>
  <?php } ?>
<?php } ?>

<?php if(is_front_page()) { ?>
  <?php get_template_part('template-parts/content', 'product-list') ?>
<?php } ?>

<?php get_footer() ?>
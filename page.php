<?php get_header(); ?>

<div class="container wrapper">
   <div class="row">
      <div class="col-12 col-lg-8">
         <div id="primary" class="content-area pr-lg-5">
            <main id="main" class="site-main" role="main">
               <?php 
                  if (have_posts()) :
                     while (have_posts()) : the_post(); 
                        get_template_part( 'content', 'page' ); 
                     endwhile;
                  endif; ?>
            </main>
         </div>
      </div><!-- .col-lg-8 -->
      <div class="col-12 col-lg-4">
         <?php get_sidebar(); ?>
      </div><!-- .col-lg-4 -->
   </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>

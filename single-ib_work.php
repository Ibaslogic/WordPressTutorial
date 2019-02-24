<?php get_header(); ?>

<div class="container wrapper">
   <div class="row">
      <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
         <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
               <?php 
                  if (have_posts()) :
                     while (have_posts()) : the_post(); 
                        get_template_part( 'content', 'single-work' ); ?>                       
                        <div class="row nav-wrapper">
                           <div class="col-6 "><?php previous_post_link(); ?></div>
                           <div class="col-6 text-right"><?php next_post_link(); ?></div>
                        </div>
                     <?php endwhile;
                  endif; ?>
            </main>
         </div>
      </div><!-- .col-12 -->
   </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
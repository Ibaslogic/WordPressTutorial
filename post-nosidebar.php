<?php get_header(); 
/*
 * Template Name: No Sidebar Template
 * Template Post Type: post
 */
?>

<div class="container wrapper">
   <div class="row">
      <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
         <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
               <?php 
                  if (have_posts()) :
                     while (have_posts()) : the_post(); 
                        get_template_part( 'content', 'nothumbnail' ); ?>
                        
                        <div class="row nav-wrapper">
                           <div class="col-6 "><?php previous_post_link(); ?></div>
                           <div class="col-6 text-right"><?php next_post_link(); ?></div>
                        </div>

                        <?php
                         // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                             comments_template();
                        endif;

                     endwhile;
                  endif; ?>
            </main>
         </div>
      </div><!-- .col-12 -->
   </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="container wrapper">  
   <div id="primary" class="custom-content-area">
      <main id="main" class="site-main" role="main">
         <div class="row">

         <?php 
            $args = array(
               'post_type'       => 'ib_work',
               'posts_per_page'  => 3,
            );
           $args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
            // The Query
            $loop = new WP_Query( $args );
            // The Loop
            if ( $loop->have_posts() ) : 
               while ( $loop->have_posts() ) : $loop->the_post(); 
                  echo '<div class="col-12 col-md-6 col-lg-4">';            
                     get_template_part( 'content', 'standard' ) ;
                  echo '</div>'; 
               endwhile; 

               /* Restore original Post Data */
               wp_reset_postdata();
            endif;  
         ?>
         </div>
         <nav class="navigation" role="navigation">
            <?php echo paginate_links( array(
                  'prev_text' => '«', 
                  'next_text' => '»',
                  'total'     => $loop->max_num_pages,  
               ) ); ?>
         </nav>
      </main>
   </div>
</div><!-- .container -->

<?php get_footer(); ?>

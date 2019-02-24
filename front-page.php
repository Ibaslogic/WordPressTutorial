<?php get_header(); ?>

<div class="container wrapper">
   <div class="row">
      <div class="col-12">
         <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
               <section class="latest-posts">
                  <div class="section-heading">
                     <p>Latest Posts</p>
                  </div>

                  <div class="row">
                  <?php 
                  $args_cat = array(
                     'include' => '57,58,59'
                  );

                  $categories = get_categories( $args_cat );

                  foreach ($categories as $category): 
                     $args = array(
                        'post_type'      => 'post', 
                        'posts_per_page' => 1,
                        'category__in'    => $category,
                     );
                     // The Query
                     $latestPosts = new WP_Query( $args );
                     // The Loop
                     if ( $latestPosts->have_posts() ) :                     
                        while ( $latestPosts->have_posts() ) : $latestPosts->the_post(); 
                           echo '<div class="col-12 col-md-6 col-lg-4">';
                              get_template_part( 'content', 'latest' ) ;
                           echo '</div>'; 
                        endwhile;
                        /* Restore original Post Data */
                        wp_reset_postdata();
                     endif; 
                  endforeach;
                  ?>
                  </div>
               </section>  
               <section class="recent-news">
                  <div class="section-heading">
                     <p>WordPress Theme News</p>
                  </div>

                  <div class="row">
                  <?php 
                  $args = array(
                     'post_type'       => 'post',
                     'posts_per_page'  => 3, 
                     'offset'          => 1,
                     'cat'             => 59,
                  );
                  $resentNews = new WP_Query( $args );

                  if ( $resentNews->have_posts() ) :
                      while ( $resentNews->have_posts() ) : $resentNews->the_post(); 
                        echo '<div class="col-12 col-md-6 col-lg-4">';         
                            get_template_part( 'content', 'standard' ); 
                        echo '</div>'; 
                     endwhile;
                     /* Restore original Post Data */ 
                     wp_reset_postdata();
                  endif;                     
                  ?>
                  </div>   
               </section>                     
            </main>
         </div>
      </div><!-- .col-12 -->
   </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>





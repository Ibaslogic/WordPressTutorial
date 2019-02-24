<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header">
      <div class="row">
         <div class="col-6">
            <div class="post-thumbnail">
               <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
               </a>
            </div>   
         </div>
         <div class="col-6">
            <?php the_title( '<h6 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' ); ?>
            <small class="entry-meta">Posted in <?php the_category(', '); ?></small>
         </div>
      </div>
   </header><!-- .entry-header -->
</article>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
   <header class="entry-header"> 
      <div class="post-thumbnail">
         <a href="<?php the_permalink(); ?>">
            <?php  the_post_thumbnail(); ?>
         </a>
      </div>
      <?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );  ?>
   </header><!-- .entry-header -->
  
   <div class="entry-content">
      <?php the_excerpt();  ?>
   </div><!-- .entry-content -->
</article>

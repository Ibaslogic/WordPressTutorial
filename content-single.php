<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<small class="entry-meta">Posted on <?php the_time('F j, Y'); ?> in <?php the_category(', '); ?> <br /> <?php the_tags(); ?> <?php edit_post_link('Edit'); ?></small>
		<?php if( has_post_thumbnail() ) :  ?>
      		<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>  
    	<?php endif; ?>   
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article>



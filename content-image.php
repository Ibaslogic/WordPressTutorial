<article id="post-<?php the_ID(); ?>" <?php post_class('ibaslogic-image-format'); ?>>
	
	<header class="entry-header background-image text-center" style="background-image: url( <?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?> )" >
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<small class="entry-meta">Posted on <?php the_time('F j, Y'); ?> in <?php the_category(', '); ?> <br /> <?php the_tags(); ?> <?php edit_post_link('Edit'); ?></small>		
	</header><!-- .entry-header -->
	
</article>




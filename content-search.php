<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center text-lg-left">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>	
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<div class="button-container text-center text-lg-left">
			<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'ibaslogic' ); ?></a>
		</div>
	</div><!-- .entry-content -->
</article>
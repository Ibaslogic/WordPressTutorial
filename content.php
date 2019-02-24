<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center text-lg-left">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<small class="entry-meta">Posted on <?php the_time('F j, Y'); ?> in <?php the_category(', '); ?> <br /> <?php the_tags(); ?> <?php edit_post_link('Edit'); ?></small>
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



<?php 
 /**
 * Template for displaying comments
 */
 
 // Check if current post required Password to be seen
 if ( post_password_required() ) {
 	return;
 }  ?>

<div id="comments" class="comments-area"> 	

	<h2 class="comments-heading">
	<?php
		$comments_num = get_comments_number(); 
		if( $comments_num == 0 ){
			_e( 'No Comments', 'ibaslogic' );			
		}elseif( $comments_num > 1 ){ 
			echo '<span class="comment-num" >' . $comments_num . '</span> Comments ';
		}else{
			echo '<span class="comment-num" >1</span> Comment'; 			   
		}
	?>
	</h2>


	<?php if ( have_comments() ) : ?> 
		
	<ol class="comment-list">
		<?php 
			wp_list_comments( array(		
				'style'	=>	'ol',
				'reply_text' => __( 'Reply', 'ibaslogic' ),
				'avatar_size'	=>	64,
				'short_ping'	=>	false,
			) ); 

		?>
	</ol>

	<nav class="comment-pagination navigation">
		<?php paginate_comments_links( array( 
			'prev_text' => '«', 
			'next_text' => '»' 
		) );  
		?>
	</nav>

	<?php endif; 

	// If comments are closed and there are comments, let's leave a little note.
	if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments text-center"><?php _e( 'Comments are closed.', 'ibaslogic' ); ?></p>
	<?php
	endif;

	comment_form(); 

	?>

</div><!-- .comments-area -->

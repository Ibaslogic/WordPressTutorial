<form role="search" class="search-form" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="form-input" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" title="Search" />	
	<input type="hidden" value="post" name="post_type" />
	<button><i class="fas fa-search"></i></button>
</form>


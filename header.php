<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php bloginfo( 'name' ); ?><?php wp_title('|'); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" >
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>  
</head>
<?php 
	if (is_front_page()) :
		$class = 'ibaslogic-front-page';
	else:
		$class = 'not-front-page';
	endif;
 ?>
<body <?php body_class( $class ); ?> >
	<header class="site-header background-image" style="background-image: url(<?php header_image(); ?>);">	<!-- role="banner"  -->

	<div class="container-fluid">
		<div class="row banner-content">
			<div class="col-12"> 
				<div class="site-brand">
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</p>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
				<nav class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'	 => 'nav justify-content-center',
				) );	
				?>			
				</nav><!-- .navigation-top -->
			</div><!-- .col-12 -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->

	</header><!-- .site-header -->

			

	

	
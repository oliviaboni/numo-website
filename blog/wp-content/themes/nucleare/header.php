<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nucleare
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="http://numoapp.com/favicon.png">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'nucleare' ); ?></a>
	
	<div class="theNavigationBar">
		<div class="theNavigationBlock">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php 
				global $nucleare_theme_options;
				$se_options = get_option( 'nucleare_theme_options', $nucleare_theme_options );
			?>
			<div class="theNavigationSocial">
				<?php if ( $se_options['facebookurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['facebookurl']); ?>" title="Facebook"><i class="fa fa-facebook"><span class="screen-reader-text">Facebook</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['twitterurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['twitterurl']); ?>" title="Twitter"><i class="fa fa-twitter"><span class="screen-reader-text">Twitter</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['googleplusurl']); ?>" title="Google Plus"><i class="fa fa-google-plus"><span class="screen-reader-text">Google Plus</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['linkedinurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['linkedinurl']); ?>" title="Linkedin"><i class="fa fa-linkedin"><span class="screen-reader-text">Linkedin</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['instagramurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['instagramurl']); ?>" title="Instagram"><i class="fa fa-instagram"><span class="screen-reader-text">Instagram</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['youtubeurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['youtubeurl']); ?>" title="YouTube"><i class="fa fa-youtube"><span class="screen-reader-text">YouTube</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['pinteresturl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['pinteresturl']); ?>" title="Pinterest"><i class="fa fa-pinterest"><span class="screen-reader-text">Pinterest</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['tumblrurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['tumblrurl']); ?>" title="Tumblr"><i class="fa fa-tumblr"><span class="screen-reader-text">Tumblr</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['vkurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['vkurl']); ?>" title="VK"><i class="fa fa-vk"><span class="screen-reader-text">VK</span></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><i class="fa fa-rss"><span class="screen-reader-text">RSS</span></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hidesearch'] ) : ?>
					<div id="open-search" class="top-search"><i class="fa fa-search"><span class="screen-reader-text">Search</span></i></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php if ( ! $se_options['hidesearch'] ) : ?>
	<!-- Start: Search Form -->
						<div id="search-full">
							<div class="search-container">
								<?php get_search_form(); ?>
								<span><a id="close-search"><i class="fa fa-close spaceRight"></i><?php _e('Close', 'nucleare'); ?></a></span>
							</div>
						</div>
	<!-- End: Search Form -->
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

<?php 
/**
 * nucleare functions and dynamic template
 *
 * @package nucleare
 */
 
 /**
 * Replace Excerpt More
 */
function nucleare_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'nucleare_new_excerpt_more');

 /**
 * Delete font size style from tag cloud widget
 */
function nucleare_fix_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'nucleare_fix_tag_cloud',10,3);

 /**
 * Register All Colors
 */
function nucleare_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
		'slug'=>'text_color_first', 
		'default' => '#5e5e5e',
		'label' => __('Text Color', 'nucleare')
	);
	
	$colors[] = array(
		'slug'=>'text_color_fourth', 
		'default' => '#b9b9b9',
		'label' => __('Second Text Color', 'nucleare')
	);
	
	$colors[] = array(
		'slug'=>'box_color_second', 
		'default' => '#ffffff',
		'label' => __('Box Background', 'nucleare')
	);
	
	$colors[] = array(
		'slug'=>'special_color_third', 
		'default' => '#36c3aa',
		'label' => __('Special Color', 'nucleare')
	);
	
	foreach( $colors as $nucleare_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting( 'nucleare_theme_options[' . $nucleare_theme_options['slug'] . ']', array(
				'default' => $nucleare_theme_options['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$nucleare_theme_options['slug'], 
				array('label' => $nucleare_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'nucleare_theme_options[' . $nucleare_theme_options['slug'] . ']',
				)
			)
		);
	}
	
}
add_action( 'customize_register', 'nucleare_color_primary_register' );

/**
 * Add Custom CSS to Header 
 */
function nucleare_custom_css_styles() { 
	global $nucleare_theme_options;
	$se_options = get_option( 'nucleare_theme_options', $nucleare_theme_options );
	if( isset( $se_options[ 'text_color_first' ] ) ) {
		$text_color_first = $se_options['text_color_first'];
	}
	if( isset( $se_options[ 'box_color_second' ] ) ) {
		$box_color_second = $se_options['box_color_second'];
	}
	if( isset( $se_options[ 'special_color_third' ] ) ) {
		$special_color_third = $se_options['special_color_third'];
	}
	if( isset( $se_options[ 'text_color_fourth' ] ) ) {
		$text_color_fourth = $se_options['text_color_fourth'];
	}
?>

<style type="text/css">
	<?php if (!empty($text_color_first) && $text_color_first != '#5e5e5e' ) : ?>
	body,
	button,
	input,
	select,
	textarea,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	textarea:focus,
	a:hover,
	a:focus,
	a:active,
	.entry-title a,
	.main-navigation ul li:hover > a, 
	.main-navigation ul li.focus > a, 
	.main-navigation li.current-menu-item > a, 
	.main-navigation li.current-menu-parent > a, 
	.main-navigation li.current-page-ancestor > a,
	.main-navigation .current_page_item > a, 
	.main-navigation .current_page_parent > a,
	.post-navigation .meta-nav .nextPrevName,
	.page-links span {
		color: <?php echo esc_attr($text_color_first); ?>;
	}
	.site-info {
		color: <?php echo esc_attr($text_color_first); ?> !important;
	}
	<?php endif; ?>
	
	<?php if (!empty($text_color_fourth) && $text_color_fourth != '#b9b9b9' ) : ?>
	.smallPart,
	aside .tagcloud,
	.smallPart a,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	input[type="search"],
	textarea,
	.theNavigationSocial a,
	.sticky .entry-header:before,
	.menu-toggle {
		color: <?php echo esc_attr($text_color_fourth); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	button:focus,
	input[type="button"]:focus,
	input[type="reset"]:focus,
	input[type="submit"]:focus,
	button:active,
	input[type="button"]:active,
	input[type="reset"]:active,
	input[type="submit"]:active,
	.tagcloud a:hover,
	.theNavigationSocial .top-search:hover,
	.theNavigationSocial .top-search:focus,
	.readMoreLink:hover,
	.page-links span a:hover,
	.page-links span a:focus {
		background: <?php echo esc_attr($text_color_fourth); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($box_color_second) && $box_color_second != '#ffffff' ) : ?>
	<?php list($r, $g, $b) = sscanf($box_color_second, '#%02x%02x%02x'); ?>
	#search-full {
		background: rgba(<?php echo $r.', '.$g.', '.$b; ?>, 0.9);
	}
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.tagcloud a,
	.tagcloud a:hover,
	#wp-calendar > caption,
	.theNavigationSocial .top-search,
	figure.entry-featuredImg figcaption,
	figure.entry-featuredImg p,
	.page-links span a,
	.menu-toggle:focus,
	.menu-toggle:hover {
		color: <?php echo esc_attr($box_color_second); ?>;
	}
	.readMoreLink a,
	.readMoreLink a:hover {
		color: <?php echo esc_attr($box_color_second); ?> !important;
	}
	.main-navigation li,
	.site-main .paging-navigation,
	.site-main .post-navigation,
	.theNavigationBar,
	#toTop,
	figure.entry-featuredImg:after,
	.hentry,
	.page-header,
	.page-content,
	.comments-area,
	.menu-toggle {
		background: <?php echo esc_attr($box_color_second); ?>;
	}
	figure.entry-featuredImg figcaption::before {
		border-top: 1px solid <?php echo esc_attr($box_color_second); ?>;
		border-bottom: 1px solid <?php echo esc_attr($box_color_second); ?>;
	}
	figure.entry-featuredImg figcaption::after {
		border-right: 1px solid <?php echo esc_attr($box_color_second); ?>;
		border-left: 1px solid <?php echo esc_attr($box_color_second); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($special_color_third) && $special_color_third != '#7fc7af' ) : ?>
	.site-info a,
	.site-info a:hover {
		color: <?php echo esc_attr($special_color_third); ?> !important;
	}
	a, 
	.entry-title a:hover, 
	.entry-title a:focus,
	.post-navigation .meta-nav .nextPrevName:hover,
	.theNavigationSocial a:hover {
		color: <?php echo esc_attr($special_color_third); ?>;
	}
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.tagcloud a,
	#wp-calendar > caption,
	.theNavigationSocial .top-search,
	.readMoreLink,
	figure.entry-featuredImg,
	.page-links span a,
	.menu-toggle:focus,
	.menu-toggle:hover {
		background: <?php echo esc_attr($special_color_third); ?>;
	}
	blockquote {
		border-left: 5px solid <?php echo esc_attr($special_color_third); ?>;
		border-right: 2px solid <?php echo esc_attr($special_color_third); ?>;
	}
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	textarea:focus,
	#wp-calendar tbody td#today {
		border: 1px solid <?php echo esc_attr($special_color_third); ?>;
	}
	.main-navigation div > ul > li > ul > li:first-child {
		border-top: 2px solid <?php echo esc_attr($special_color_third); ?>;
	}
	.main-navigation div > ul > li > ul::before,
	.main-navigation div > ul > li > ul::after	{
		border-bottom-color: <?php echo esc_attr($special_color_third); ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'nucleare_custom_css_styles');
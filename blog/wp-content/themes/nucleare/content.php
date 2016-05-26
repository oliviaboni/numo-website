<?php
/**
 * @package nucleare
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<figure class="entry-featuredImg"><a href="' .get_permalink(). '">';
			the_post_thumbnail('nucleare-normal-post');
			echo '<figcaption><p><i class="fa fa-file-text"></i></p></figcaption></a></figure>';
		}
	?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta smallPart">
			<?php nucleare_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<div class="entry-bottom smallPart">
			<?php edit_post_link( __( 'Edit', 'nucleare' ), '<span class="edit-link floatLeft"><i class="fa fa-wrench spaceRight"></i>', '</span>' ); ?>
			<div class="readMoreLink">
				<a href="<?php echo get_permalink(); ?>"><?php _e('Read More', 'nucleare') ?><i class="fa spaceLeft fa-angle-double-right"></i></a>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
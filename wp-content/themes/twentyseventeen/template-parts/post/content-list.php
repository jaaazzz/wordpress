<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<p class="entry-title">', '</p>' );
			} else {
				the_title( '<p class="entry-title" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-left:2px"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' );
			}
		?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->

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

<article style="padding-bottom:10px" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
				the_title( '<div class="entry-title" 
					style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
					padding-left:2px;float:left;width:330px">
					<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );
					?>
		<div class='book_author' style="float:right;margin-right:5px;text-align:center;
				white-space:nowrap;overflow:hidden;text-overflow:ellipsis;width:150px">
			<?php 
			global $wpdb;
			// $post->ID是文章id，自行修改
			$date = $wpdb->get_row( $wpdb->prepare( "SELECT o_author FROM $wpdb->posts WHERE ID = %d", $post->ID) );
			$o_author = $date->o_author;
			$o_author = preg_replace('/\[(.*?)\]/is', '', $o_author);
			$o_author = preg_replace('/\((.*?)\)/is', '', $o_author);
			echo '作者:'.$o_author;
			?>
		</div>
		<div class='download_num' style="float:right;margin-right:25px">
			<?php 
			echo '下载量:'.getPostViews($post->ID);
			?>
		</div>
		<?php

			}
		?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->

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
<!-- 	<header class="entry-header"> -->
	<?php
			// if ( 'post' === get_post_type() ) :
			// 	echo '<div class="entry-meta">';
			// 		if ( is_single() ) :
			// 			twentyseventeen_posted_on();
			// 		else :
			// 			echo twentyseventeen_time_link();
			// 			twentyseventeen_edit_link();
			// 		endif;
			// 	echo '</div><!-- .entry-meta -->';
			// endif;

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?> 
<!-- 	</header> --><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			// the_content( sprintf(
			// 	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			// 	get_the_title()
			// ) );
			global $wpdb;
			// $post->ID是文章id，自行修改
			$date = $wpdb->get_row( $wpdb->prepare( "SELECT book_link FROM $wpdb->posts WHERE ID = %d", $post->ID) );

			$book_link = $date->book_link;
			//需要根据book_link，来调整文章的html
			$link_key = explode(' ',$book_link);
			if(count($link_key)<2){//没有密码
				//preg_replace("/<style>.+<\/style>/is", "", $msg);
				
				$content = str_replace(
					"<button class='b_download'><a href=''>",
					"<button class='b_download'><a href='". $link_key[0] ."'>",
					$post->post_content);
				$content = str_replace(
					"<button class='b_keyword' onclick='get_keyword()'>获取密码</button>",
					"",$content);

			}else{
				$content = str_replace(
					"<button class='b_download'><a href=''>",
					"<button class='b_download'><a href='". $link_key[0] ."'>",
					$post->post_content);
				$content = str_replace(
					'document.getElementById("password").innerHTML=""',
					'document.getElementById("password").innerHTML="密码: '. $link_key[1] .'"',
					$content);
			}
			$homeurl = home_url();
			$content = str_replace(
					'<img style="height:200px;width:150px" src="/wp-content/uploads/',
					'<img style="height:200px;width:150px" src="'.$homeurl.'/wp-content/uploads/',
					$content);

			echo $content;

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->

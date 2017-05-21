<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
		<div style='color:#999;text-indent:25px;
			background:url(<?php echo home_url();?>/wp-content/themes/twentyseventeen/assets/images/bread.png) no-repeat 0 5px'>
				当前位置 >
			<?php
				printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); 
				// the_archive_description();
			?>
		</div>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area" style="width:70%;border:1px solid #ebebeb;
			margin-right:0px;background:#fff;padding:15px">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'fulllist' );
				echo '<hr>';

			endwhile; // End of the loop.

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div style="float:right;width:280px">
		<?php get_template_part( 'template-parts/post/content-push');?>
		<?php get_template_part( 'template-parts/post/content-newest');?>
		<?php get_template_part( 'template-parts/post/content-hotest');?>
	</div>
</div><!-- .wrap -->

<?php get_footer();

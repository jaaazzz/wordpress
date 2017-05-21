<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<div style='color:#999;text-indent:25px;
			background:url(<?php echo home_url();?>/wp-content/themes/twentyseventeen/assets/images/bread.png) no-repeat 0 5px'>
				当前位置 >
			<?php
				the_archive_title();
				// the_archive_description();
			?>
			</div>

		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area" style="width:70%;border:1px solid #ebebeb;
			margin-right:0px;background:#fff;padding:15px">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'fulllist' );
				echo '<hr>';
			endwhile;

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div style="float:right;width:280px">
		<?php get_template_part( 'template-parts/post/content-push');?>
		<?php get_template_part( 'template-parts/post/content-newest');?>
		<?php get_template_part( 'template-parts/post/content-hotest');?>
	</div>
</div><!-- .wrap -->

<?php get_footer();

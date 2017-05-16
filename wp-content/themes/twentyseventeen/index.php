<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
<!-- 	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
	</header>
	<?php endif; ?> -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			get_template_part( 'template-parts/keywords/hotkey');
			// if ( have_posts() ) :

			// 	/* Start the Loop */
			// 	while ( have_posts() ) : the_post();

			// 		/*
			// 		 * Include the Post-Format-specific template for the content.
			// 		 * If you want to override this in a child theme, then include a file
			// 		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			// 		 */
			// 		//get_template_part( 'template-parts/post/content', get_post_format() );

			// 	endwhile;

			// 	// the_posts_pagination( array(
			// 	// 	'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
			// 	// 	'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			// 	// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			// 	// ) );

			// else :

			// 	//get_template_part( 'template-parts/post/content', 'none' );

			// endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div style='float:right;width:26%;background-color:#fff;border:1px solid #ebebeb;height:183px;padding:15px'>
		<?php 
		// the_widget( 'WP_Widget_Tag_Cloud'); 
		$args = array(
			'smallest'  => 12, 
		    'largest'   => 12,
		    'unit'      => 'pt', 
		    'number'    => 19,  
		    'format'    => 'flat',
		    'separator' => '',
		    'orderby'   => 'count',//name,count 
		    'order'     => 'DESC',
		    'exclude'   => '145,155,156,159,283', //要被排除的标签id
		    'include'   => '', 
		    'link'      => 'view', 
		    'taxonomy'  => 'post_tag', 
		    'echo'      => true 
		);
		wp_tag_cloud($args); 
		?>

	</div>
</div><!-- .wrap -->
<!-- 自定义首页下面的分类链接 -->
<div class='f_rows' style="width:72%;height:500px;margin:15px auto">
	<div class='cell_1' style="height:500px;width:33%;border:1px solid #ebebeb;
			float:left;margin-right:3px;background:#fff;padding:15px">
		<div class='title_1' style='color:#4499ee;font-size:1.15em'>
			<div style='width:5px;height:1em;background-color:#4499ee;float:left;margin-top:5px;margin-right:15px'></div>
			<p style="margin-bottom:5px">文学书籍</p>
		</div>
		<?php
			/* Start the Loop */

			query_posts( 'cat=86&posts_per_page=10' );
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content-list', get_post_format() );

			endwhile;
			?>

	</div>
	<div class='cell_1' style="height:500px;width:33%;border:1px solid #ebebeb;
			float:left;margin-right:3px;background:#fff;padding:15px">
		<div class='title_1' style='color:#4499ee;font-size:1.15em'>
			<div style='width:5px;height:1em;background-color:#4499ee;float:left;margin-top:5px;margin-right:15px'></div>
			<p style="margin-bottom:5px">工具教科</p>
		</div>
			<?php
			/* Start the Loop */

			query_posts( 'cat=96&posts_per_page=10' );
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content-list', get_post_format() );

			endwhile;
			?>
	</div>
	<div class='cell_1' style="height:500px;width:33%;border:1px solid #ebebeb;
			float:left;background:#fff;padding:15px">
		<div class='title_1' style='color:#4499ee;font-size:1.15em'>
			<div style='width:5px;height:1em;background-color:#4499ee;float:left;margin-top:5px;margin-right:15px'></div>
			<p style="margin-bottom:5px">网络小说</p>
		</div>
			<?php
			/* Start the Loop */

			query_posts( 'cat=101&posts_per_page=10' );
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content-list', get_post_format() );

			endwhile;
			?>
	</div>
</div>
<?php get_footer();

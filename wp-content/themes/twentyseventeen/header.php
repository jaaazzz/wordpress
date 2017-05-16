<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

 		<?//php get_template_part( 'template-parts/header/header', 'image' ); ?> 

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top" style='height:75px;
			background-image: url(<?php echo home_url();?>/wp-content/themes/twentyseventeen/assets/images/banner/2.jpg);background-size:100% 100%;'>
				<div class="wrap">
					<a href='<?php echo home_url();?>'>
						<img src="<?php echo home_url();?>/wp-content/themes/twentyseventeen/assets/images/banner/A3.png" style='height:44px;float:left'/>
					</a>
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
					<div style="display:inline-block;width:300px;position:relative;margin-right:0px;top:-55px;right:-657px">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
		echo '<div class="single-featured-image-header">';
		the_post_thumbnail( 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">

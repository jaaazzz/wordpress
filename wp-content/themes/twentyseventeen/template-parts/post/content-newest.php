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

<ul style="float:right;width:275px;border:1px solid #ebebeb;
			margin-right:0px;background:#fff;margin-top:0px;padding:15px"> 
	<div class='title_1' style='color:#4499ee;font-size:1.15em'>
		<div style='width:5px;height:1em;background-color:#4499ee;float:left;margin-top:5px;margin-right:15px'></div>
		<p style="margin-bottom:5px">最近更新</p>
	</div>
	<?php $post_query = new WP_Query('showposts=10'); 
	while ($post_query->have_posts()) : $post_query->the_post(); 
	$do_not_duplicate = $post->ID; ?> 
	<li style="list-style-type:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-bottom:10px">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li> 
	<?php endwhile;?> 
</ul> 

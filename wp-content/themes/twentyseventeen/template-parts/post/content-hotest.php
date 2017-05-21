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
		<p style="margin-bottom:5px">大家都看</p>
	</div>
	<?php 
	$post_num = 10; // 设置调用条数 
	$args = array( 
	'post_password' => '', 
	'post_status' => 'publish', // 只选公开的文章. 
	'post__not_in' => array($post->ID),//排除当前文章 
	'caller_get_posts' => 1, // 排除置顶文章. 
	'orderby' => 'comment_count', // 依评论数排序. 
	'posts_per_page' => $post_num 
	); 
	$query_posts = new WP_Query(); 
	$query_posts->query($args); 
	while( $query_posts->have_posts() ) : $query_posts->the_post(); ?> 
	<li style="list-style-type:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-bottom:10px">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_title(); ?>
		</a>
	</li> 
	<?php  wp_reset_query();?> 
	<?php endwhile;?> 
</ul> 

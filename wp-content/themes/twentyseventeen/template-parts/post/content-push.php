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

 <ul id="tags_related" style="float:right;width:275px;border:1px solid #ebebeb;
			margin-right:0px;background:#fff;margin-top:0px;padding:15px">
		<div class='title_1' style='color:#4499ee;font-size:1.15em'>
			<div style='width:5px;height:1em;background-color:#4499ee;float:left;margin-top:5px;margin-right:15px'></div>
			<p style="margin-bottom:5px">猜你喜欢</p>
		</div>
 <?php
 global $post;
 $post_tags = wp_get_post_tags($post->ID);
 if ($post_tags) {
   foreach ($post_tags as $tag) {
     // 获取标签列表
     $tag_list[] .= $tag->term_id;
   }
   // 随机获取标签列表中的一个标签
   $post_tag = $tag_list[ mt_rand(0, count($tag_list) - 1) ];
   // 该方法使用 query_posts() 函数来调用相关文章，以下是参数列表
   $args = array(
         'tag__in' => array($post_tag),
         'category__not_in' => array(NULL),  // 不包括的分类ID
         'post__not_in' => array($post->ID),
         'showposts' => 20,                           // 显示相关文章数量
         'caller_get_posts' => 1
     );
   query_posts($args);
   if (have_posts()) {
     while (have_posts()) {
       the_post(); update_post_caches($posts); ?>
     <li style="list-style-type:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding-bottom:10px">
     	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
     </li>
 <?php
     }
   }
   else {
     			  //没有相关文章，则随机抽取几篇文章
 	global $post, $wpdb;
	$cats = wp_get_post_categories($post->ID);
	if ($cats) {
	  $related = $wpdb->get_results("
	  SELECT post_title, ID
	  FROM {$wpdb->prefix}posts, {$wpdb->prefix}term_relationships, {$wpdb->prefix}term_taxonomy
	  WHERE {$wpdb->prefix}posts.ID = {$wpdb->prefix}term_relationships.object_id
	  AND {$wpdb->prefix}term_taxonomy.taxonomy = 'category'
	  AND {$wpdb->prefix}term_taxonomy.term_taxonomy_id = {$wpdb->prefix}term_relationships.term_taxonomy_id
	  AND {$wpdb->prefix}posts.post_status = 'publish'
	  AND {$wpdb->prefix}posts.post_type = 'post'
	  AND {$wpdb->prefix}posts.ID != '" . $post->ID . "'
	  ORDER BY RAND( )
	  LIMIT 20");
	  if ( $related ) {
	      foreach ($related as $related_post) {
	?>
	    <li style="list-style-type:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;;padding-bottom:10px">
	    	<a href="<?php echo get_permalink($related_post->ID); ?>" rel="bookmark" title="<?php echo $related_post->post_title; ?>"><?php echo $related_post->post_title; ?></a>
	    </li>
	<?php
	    }
	}
 }
   }
   wp_reset_query();
}
 else {
  //没有相关文章，则随机抽取几篇文章
 	global $post, $wpdb;
	$cats = wp_get_post_categories($post->ID);
	if ($cats) {
	  $related = $wpdb->get_results("
	  SELECT post_title, ID
	  FROM {$wpdb->prefix}posts, {$wpdb->prefix}term_relationships, {$wpdb->prefix}term_taxonomy
	  WHERE {$wpdb->prefix}posts.ID = {$wpdb->prefix}term_relationships.object_id
	  AND {$wpdb->prefix}term_taxonomy.taxonomy = 'category'
	  AND {$wpdb->prefix}term_taxonomy.term_taxonomy_id = {$wpdb->prefix}term_relationships.term_taxonomy_id
	  AND {$wpdb->prefix}posts.post_status = 'publish'
	  AND {$wpdb->prefix}posts.post_type = 'post'
	  AND {$wpdb->prefix}term_taxonomy.term_id = '" . $cats[0] . "'
	  AND {$wpdb->prefix}posts.ID != '" . $post->ID . "'
	  ORDER BY RAND( )
	  LIMIT 20");
	  if ( $related ) {
	      foreach ($related as $related_post) {
	?>
	    <li style="list-style-type:none;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;;padding-bottom:10px">
	    	<a href="<?php echo get_permalink($related_post->ID); ?>" rel="bookmark" title="<?php echo $related_post->post_title; ?>"><?php echo $related_post->post_title; ?></a>
	    </li>
	<?php
	    }
	}
 }
}
 ?>
  </ul>

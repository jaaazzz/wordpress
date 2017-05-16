<?php
/**
 * Displays hotkeys
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="hotkeys" style="background:#fff;border:1px solid #ebebeb;height:183px;padding: 15px 0">
	<div class="wrap">
		<div class='title_jw' style='color:#4499ee;font-size:1.15em'>
			<div style='width:5px;height:1em;background-color:#4499ee;float:left;margin-top:5px;margin-right:15px'></div>
			<p style="margin-bottom:5px">热门搜索</p>
		</div>
	<?php
	$hotkeys_arr2 = array();
	$hotkeys = query_hotkeys();
	$j=0;
	foreach ($hotkeys as $value) {
		if($j<4){
			$hotkeys_arr2[0][] = $value->keywords;
		}
		if($j<8&&$j>3){
			$hotkeys_arr2[1][] = $value->keywords;
		}
		if($j<12&&$j>7){
			$hotkeys_arr2[2][] = $value->keywords;
		}
		if($j<16&&$j>11){
			$hotkeys_arr2[3][] = $value->keywords;
		}			
		$j=$j+1;	
	}
	foreach ($hotkeys_arr2 as $key => $value){
	?>
		<div class='rows'>
		<?php foreach ($hotkeys_arr2[$key] as $key => $value){?>
			<div class='cells' style='display:inline-block;float:left;width:150px;height:35px;
			white-space:nowrap;overflow:hidden;text-overflow:ellipsis;'>
				<a href='<?php echo home_url('/?s=').$value; ?>'><?php echo $value; ?></a></div>
		<?php }?>
		</div>
	<?php } ?>


	</div><!-- .wrap -->
</div><!-- .site-branding -->
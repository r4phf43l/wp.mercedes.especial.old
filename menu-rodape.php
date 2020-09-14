<?php
$menu_name = 'rodape';
if ( has_nav_menu( $menu_name ) ) {
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		foreach ( (array) $menu_items as $key => $menu_item ) {
			if ( $menu_item->menu_item_parent == 0 ) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				$mid = $menu_item->object_id;
				$menu_list .= '<li><a href="' . $url . '" class="mbc-meta-link mbc-hover">' . $title . '</a></li>';
			}
		}
		 echo $menu_list;	 
	}
 }
?>
<script>
$(document).ready(function() {
	$('.mbcom-cta-strap > ul > li > a[href^="#menu-"]').on('click', function(e) {
		e.preventDefault();
		console.log('in');
		var p = $(this).attr('href')
		if ( $(p).is(':checked') ) {
			console.log('check');
			$(p).prop('checked', false)
		} else {
			console.log('uncheck');
			$(p).prop('checked', true)
		}
		block_scroll(p)
	})
})

</script>
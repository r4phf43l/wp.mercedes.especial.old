<?php
$menu_name = 'topo';
if ( has_nav_menu( $menu_name ) ) {
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$mid = $menu_item->object_id;
			$menu_list .= '<div class="dropdown-toggle" data-toggle="dropdown"  style="display: inline-table; margin-right:30px" id="menu-item-' . $mid . '"><a href="' . $url . '" class="mbc-site-switch-link mbc-hover">' . $title . '</a></div>';
		}
		 echo $menu_list;	 
	}
 }
?>
<?php
$menu_name = 'principal';
if ( has_nav_menu( $menu_name ) ) {
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_list = '<ul id="menu-' . $menu_name . '">';
		$i=1;
		foreach ( (array) $menu_items as $key => $menu_item ) {
			if ( $menu_item->menu_item_parent == 0 ) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				$mid = $menu_item->object_id;
				$target = $menu_item->target;
				$menu_list .= '<li class="depth-0" id="menu-item-' . $mid . '">
				<a class="mbc-brand-hub-nav-link" href="' . $url . '" ' . (( $target ) ? 'target="_blank"' : '') . ' >
				<span class="nav-link-text-wrapper"><span style="width:100%; height:20px; margin-bottom:7px; display:block; line-height:1; background: url(' .  get_theme_mod('mcbra_icon_menu_'.$i) . ') no-repeat center center; background-size:contain" ></span>' . $title . '</span></a></li>';
				$i++;
			}			
		}
		$menu_list .= '<div class="main-nav__invisbox"></div></ul>';
		echo $menu_list;		 
	}
 }
?>
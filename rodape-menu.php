<?php
$menu_name = 'flutuante';

if ( has_nav_menu( $menu_name ) ) {
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$i=1;
		foreach ( (array) $menu_items as $key => $menu_item ) {
			if ( $menu_item->menu_item_parent == 0 ) {
				$title = $menu_item->title;
				$url = $menu_item->url;
				$mid = $menu_item->object_id;
				$thumb_list = wp_get_attachment_image_src( get_post_thumbnail_id( $menu_item->ID,'thumbnail' ), 'single-post-thumbnail' );
				$menu_list .= '			
				<li>			
				<a class="mbc-brand-hub-nav-link vehicles" href="' . $url . '" >			
				<i class="mbcom-icon" style="background: url(' . $thumb_list[0] . ') no-repeat center center" ></i>
				<span class="mbcom-cta-strap-label">' . $title . '</span>
				</a>
				</li>';
				$i++;
			}
		}
		 echo $menu_list;		 
	}
 }
?>
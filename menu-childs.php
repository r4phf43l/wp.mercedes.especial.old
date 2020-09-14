<?php
	$menu_name = 'principal';
	/*wp_enqueue_style('Mega-Menu-CSS', get_template_directory_uri() . '/css/menus.css');*/
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<style><!--
.m_seta { background: url(<?=get_template_directory_uri()?>/images/seta-up.gif) no-repeat bottom center }
--></style>
<script>
function block_scroll(arg) {	
	if ($("body").width()>750) {
		if ($(arg).is(':checked')) {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
			$('body').css('overflow','hidden');
		} else {
			$('body').css('overflow','auto');
		}
	}
	$('.menu-check').not(arg).prop('checked', false);	
}
</script>
        <ul>
        <?
        $count = 0;
        $submenu = false;
		$i=1;
        foreach( $menuitems as $item ):
            $link = $item->url;
            $title = $item->title;
			$target = $item->target;
            if ( !$item->menu_item_parent ):
				$parent_id = $item->ID;
				$thumb_list = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID,'thumbnail' ), 'single-post-thumbnail' );
				if ($link!='#') {
				$nmenu .= "
					<li class='depth-0' [%class%]>
							<a class='mbc-brand-hub-nav-link' href='". $link . "' " . (( $target ) ? "target='_blank'" : "") . " >
								<span class='nav-link-text-wrapper'>
									<span class='img' style='background-image: url(" .  $thumb_list[0] . ")' >
									</span>" . $title . "
								</span>
							</a>";
				} else {
				$nmenu .= "
					<li class='depth-0' [%class%]>
						<input class='menu-check' id='menu-" . $parent_id . "' type='checkbox' style='display:none' onchange='block_scroll(this)' />
						<label for='menu-" . $parent_id . "'  class='mbc-brand-hub-nav-link'>
								<span class='nav-link-text-wrapper'>
									<span class='img' style='background-image: url(" .  $thumb_list[0] . ")' >
									</span>" . $title . "
								</span>
						</label>";						
				}
			endif;
			if ( $parent_id == $item->menu_item_parent ):
                if ( !$submenu ):
					$submenu = true;					
					global $wp;
					$current_url = home_url(add_query_arg(array(),$wp->request));
							
                    $smenu = "
						<div class='m_seta'></div>				
						<div class='m_entry'>
							<div class='m_entry-content'>
								<div class='nav' style='height:71px; width:100%; padding-bottom:10px; clear:both'>
									<label for='menu-" . $parent_id . "' class='close' style='height: 13px; width: 13px; float:right; padding: 34px 56px 24px 0; color:rgb(51,51,51)'>
										<img src='" . get_template_directory_uri() . "/images/close.png' alt='Fechar Menu' />
									</label>
								</div>
								<ul>";
                endif;
				$thumb_list = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID,'thumbnail' ), 'single-post-thumbnail' );		
				$smenu .= "
								<li[%sclass%]>
									<a href='" . $link . "'  style='background-image: url(" . $thumb_list[0] . ")' " . (( $target ) ? "target='_blank'" : "") . " >
										<h2>" . $title . "</h2>
									</a>
								</li>";
				if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ):
					$smenu .= "					
							</ul>       
						</div>
					</div>";
					$smenu = str_replace("[%sclass%]", " class='last'", $smenu);
					$nmenu .= $smenu;
					$smenu = "";
					$submenu = false;
				else:
					$smenu = str_replace("[%sclass%]", "", $smenu);
				endif;
         	endif;
			if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ):				
				$nmenu .= "
					</li>";
					$i++;
				$submenu = false;
			else:
				$nmenu = str_replace("[%class%]", "", $nmenu);
			endif;
		$count++;
        endforeach;
		$nmenu = str_replace("[%class%]", " class='last'", $nmenu);
		echo $nmenu;
		?>       
        </ul>

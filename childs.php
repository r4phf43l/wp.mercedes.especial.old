<?php
	$menu_name = 'main';
	wp_enqueue_style('Mega-Menu-CSS', get_template_directory_uri() . '/css/menus.css');
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<div class='entry' style="background: #FFF; color: black">
    <div class='entry-content'>
    <?
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
    ?>
        <div class="nav" style="height:72px; width:100%; padding-bottom:10px">
            <a href="javascript:history.back()" class="close" style="float:right; padding: 34px 56px 24px 0; color:rgb(51,51,51)">
            	<img src="<? echo get_template_directory_uri() ?>/images/close.png" />
            </a>
        </div>
    <ul>
        
        <?php
        $count = 0;
        $submenu = false;
        foreach( $menuitems as $item ):
            $link = $item->url;
            $title = $item->title;
            if ( !$item->menu_item_parent ):
				$parent_id = $item->ID;
				$nmenu .= "<li class='depth-0' [%class%]><a class='mbc-brand-hub-nav-link' href='". $link . "'><span class='nav-link-text-wrapper'><span style='width:100%; height:16px; margin-bottom:11px; display:block; line-height:1; background: url(' .  get_theme_mod('mcbra_icon_menu_'.$i) . ') no-repeat center center; background-size:contain' ></span>" . $title . "</span></a>";
			endif;
			if ( $parent_id == $item->menu_item_parent ):
                if ( !$submenu ):
					$submenu = true;
                    $smenu = "<ul>";
                endif;
				$smenu .= "<li[%sclass%]><a href='" . $link . "'><h2>" . $title . "</h2></a></li>";
				if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ):
					$smenu .= "</ul>";
					$smenu = str_replace("[%sclass%]", " class='last'", $smenu);
					$nmenu .= $smenu;
					$smenu = "";
					$submenu = false;
				else:
					$smenu = str_replace("[%sclass%]", "", $smenu);
				endif;
         	endif;
			/*
			if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ):				
				$nmenu .= "</li>";
				$submenu = false;
			else:
				$nmenu = str_replace("[%class%]", "", $nmenu);
			endif;
			*/
		$count++;
        endforeach;
		$nmenu = str_replace("[%class%]", " class='last'", $nmenu);
		echo $nmenu;
		?>
        
        </ul>       
    </div>
</div>

<?
	if (get_post_thumbnail_id( $post->ID )) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	}	
?>
<style>
	<!--
		.h1-header { padding-top: 60px; width: 45%; color: rgb(51,51,51); font-family: CorporateACondensedRegular,Times New Roman,Arial,serif; font-size: 40px; line-height: 44px }
		.h1-header:before { display: block; content: ""; position: relative; margin-left: 0; margin-top: 0; margin-bottom: 28px; height: 2px; width: 60px; background: rgb(51,51,51) }
		.entry { min-height: calc(100vh - 130px); padding-bottom:20px }
		.entry-content { max-width:1280px; min-width:360px; margin: 0 auto; width:100% }
		.entry-content ul { width: 100% }
		.entry-content ul li { position:relative; float:left; margin: 0 1px 2px 1px  }
		.entry-content ul li a { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-size: cover; background-repeat:no-repeat; background-position:center center }
		.entry-content ul li a h2:before { width: 60px; height: 2px; background-color:#FFF; display: block; content: ''; margin: 0 0 20px; box-shadow: 1px 0 2px #000 }
		.entry-content ul li a h2 { margin: 30px; padding: 0 0 10px 0; text-shadow: 1px 0 2px #000 }
		.entry-content ul li a:hover h2 { color:#fff }
		
		@media all and (max-width: 480px) {
			.entry-content ul li {  width: calc(100% - 2px); padding: 42% 0 0 }
			.entry-content ul li a h2 { font-size: 20px }
		}
		@media all and (min-width: 481px) and (max-width: 750px) {
			.entry-content ul li {  width: calc(50% - 2px); padding: 21% 0 0 }
			.entry-content ul li a h2 { font-size: 18px }
		}
		@media all and (min-width: 751px) {
			.entry-content ul li {  width: calc(33.3334% - 2px); padding: 14% 0 0 }
			.entry-content ul li a h2 { font-size: 20px }
		}
		@media all and (min-width: 1280px) {
			.entry-content ul li a h2 { font-size: 24px }
		}
	-->
</style>

<div class='entry' style="background: #FFF; color: black">
    <div class='entry-content'>
		<?
			global $wp;
			$current_url = home_url(add_query_arg(array(),$wp->request));
        ?>
        <div class="nav" style="height:72px; width:100%; padding-bottom:10px">
            <a href="javascript:history.back()" class="close" style="float:right; padding: 34px 56px 24px 0; color:rgb(51,51,51)">
            	<img src="<? echo get_template_directory_uri() ?>/images/close.png" />
            </a>
        </div>
        <ul>    
            <li>		
                <a href="<?php echo $current_url; ?>" target="_self" style="background-image: url('<?=$thumb[0]?>')">         
                	<h2><?php the_title() ?></h2>
                </a>
            </li>
            <?
            $args = array(
				'orderby'=>name,
				'depth'=>1,
				'order'=>'DESC',
				'show_count'=>0,
				'child_of'=>$post->ID,
				'&title_li'=> ''
				);
            $our_pages = get_pages($args);
            if (!empty($our_pages)) {
				foreach ($our_pages as $key => $page_item) { 
					$thumb_list = wp_get_attachment_image_src( get_post_thumbnail_id( $page_item->ID,'thumbnail' ), 'single-post-thumbnail' );
					?>
					<li>		
                        <a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>" target="_self" style="background-image: url('<?=$thumb_list[0]?>')">        
                        <h2><?php echo $page_item->post_title ; ?></h2>
                        </a>
					</li>
					<?
				}
			}
			?>
        </ul>       
    </div>
</div>
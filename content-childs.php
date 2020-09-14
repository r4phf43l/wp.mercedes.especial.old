<?php
if (get_post_thumbnail_id( $post->ID )) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );	
	$thumbed = ' style="background: url('.$thumb[0].') no-repeat center top; height:42vw; width:100%; background-size: cover; position:absolute"';
}	
?>
<div class='entry' style="background: #FFF; color: black">
    <session>
    	<? if (!isset($_GET['menus'])) { ?>
        <div style="position:relative; height:100%">
       			<div <?=$thumbed?>></div>  
                <div class="h1-capsule"><h1 class="h1-header" style="position: relative">*<?php the_title(); ?></h1></div>
                
        </div>
        <? } ?>
        <div class='entry-content'>            
  			<? 
			if (!isset($_GET['menus'])) {				
				?>
          <article style="margin: 30px 20px; text-align: justify">
                <?
                
				the_content();

				/*
				$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID,             
					) );
					
		$i=1;
        if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
				$chkurl = wp_get_attachment_image_src( $attachment->ID, 'single-post-thumbnail', true );
				if ($chkurl[0] != $thumb[0]) {
					$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'img_gal', true );
					$class = ($i % 2 == 0) ? 'par' : 'impar';
					$ligals .= '<li class="'.$class.'" style="background: #FFF url('.$thumbimg[0].') no-repeat center center"></li>';
					$i++;
				}
            }
        }
		if ( $ligals != '' ) {
			echo "<ul id='galeria'>" . $ligals . "</ul>";
		}
		*/
		?>
		       </article>
              <?
		
			} else {				
global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));				
?>		
    <div class="nav" style="height:72px; width:100%; padding-bottom:10px">
    <a href="javascript:history.back()" class="close" style="float:right; padding: 34px 56px 24px 0; color:rgb(51,51,51)"><img src="<? echo get_template_directory_uri() ?>/images/close.png" /></a>
    </div><div style="clear:both"></div>
	<ul>    
            <li>		
                <a href="<?php echo $current_url; ?>" target="_self" style="background-image: url('<?=$thumb[0]?>')">         
                    <h2>
                    	<?php the_title() ?>
                    </h2>
                </a>
            </li>    
            
           <?php $args = array(
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
                    <h2>
                    	<?php echo $page_item->post_title ; ?>
                    </h2>
                </a>
            </li>
            <? } } ?>
          </ul>
            <div style="clear:both"></div>
            <? } ?>            
  </div>
    </div>
</session>
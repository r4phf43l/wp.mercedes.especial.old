<?php
if (get_post_thumbnail_id( $post->ID )) :
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$pos_text = ' style="margin-top:42vw"';	
	$thumbed = ' style="background: url('.$thumb[0].') no-repeat center top; height:42vw; width:100%; background-size: cover"';
endif
?>
<div class='entry' style="background: #FFF; color: black">
<!--<div class="widgts-pages corppages"><?=$pos_text?>
<?php //get_template_part('sidebar','sidebar'); ?>
</div>-->
<style>
<!--
.h1-header {
	padding-top: 60px;
	width: 45%;
	color: rgb(51,51,51);
	font-family: CorporateACondensedRegular,Times New Roman,Arial,serif;
	font-size: 40px;
	line-height: 44px
}
.h1-header:before {
	display: block;
	content: "";
	position: relative;
	margin-left: 0;
	margin-top: 0;
	margin-bottom: 28px;
	height: 2px;
	width: 60px;
	background: rgb(51,51,51);
}
.entry-content {max-width:1280px; min-width:360px; margin: 0 auto; padding:20px; width:100% }

-->
</style>
    <session>
        <div <?=$thumbed?>>
                <div class='entry-content'>
                <h1 class="h1-header" style=""><?php the_title(); ?></h1>
                </div>
        </div>
        <div class='entry-content'>
            <article>
                <?php the_content(); ?>
<?
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
					//$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
					$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'img_gal', true );
					//$ligals .= '<li class="' . $class . ' data-design-thumbnail ' . $chkurl[0] . ' ' . $thumb[0] .'">' . $thumbimg . '</li>';
					$class = ($i % 2 == 0) ? 'par' : 'impar';
					$ligals .= '<li class="'.$class.'" style="background: #FFF url('.$thumbimg[0].') no-repeat center center"></li>';
					$i++;
				}
            }

        }
		if ( $ligals != '' ) {
			echo "<ul id='galeria'>" . $ligals . "</ul>";
		}
		
?>
            </article>
        </div>
    </div>
</session>
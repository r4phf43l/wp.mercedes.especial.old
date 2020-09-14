<?php
if (get_post_thumbnail_id( $post->ID )) :
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$pos_text = ' style="margin-top:42vw"';	
	$thumbed = ' style="background: url('.$thumb[0].') no-repeat center top; height:42vw; width:100%; background-size: cover"';
endif
?>
<div class='entry' style="background: #FFF; color: black">
    <session>
        <div <?=$thumbed?>>
                <div class='entry-content'>
                <h1 class="h1-header" style="">*<?php the_title(); ?></h1>
                </div>
        </div>
        <div class='entry-content'>
            <article>
                <?php the_content(); ?>
            </article>
        </div>
    </div>
</session>
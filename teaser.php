<?
$slides = get_theme_mod('teaser_count_setting')!="" && get_theme_mod('teaser_count_setting')>0 ? get_theme_mod('teaser_count_setting') : 6;
$i=0;
for ($i=1; $i<=$slides; $i++) {
	if((get_theme_mod('mcbra_teaser_active_setting_'.$i)!=1) && (get_theme_mod('mcbra_teaser_img_setting_'.$i)!='')) {
	    if(get_theme_mod('mcbra_teaser_img_setting_'.$i)) {			
			$thumbnail = get_theme_mod('mcbra_teaser_img_setting_'.$i);
        } else {
			$thumbnail = get_template_directory_uri(). "/imgs/favicon-192x192.png?fit=192%2C192";
		}		
		$teaserpanel .= '
		<li class="mbcom-thumb-item  w-33 ">		
			<div class="embed-responsive embed-responsive-16by9">
            <div class="embed-responsive-item">
            <a href="' . get_theme_mod('mcbra_teaser_url_setting_'.$i) . '" target="' . ((get_theme_mod('mcbra_teaser_link_setting_'.$i)==1) ? '_blank' : '_self' ) . '">
            <div class="mbcom-thumb-item-image-wrapper">
            <img class="mbcom-thumb-item-image" src="' . $thumbnail . '" alt="' . get_theme_mod('mcbra_teaser_title_setting_'.$i) . '"/>
            <div class="mbcom-thumb-item-image-overlay"></div>
            <div class="mbcom-thumb-item-read-more-overlay">
            <span class="read-more-text"><i class="fa fa-angle-right"></i> Saiba mais</span>
            </div>            
            </div>    
            <div class="mbcom-thumb-item-overlay mbcom-thumb-item-overlay-with-subtitle">            
            <h6>
            ' . get_theme_mod('mcbra_teaser_title_setting_'.$i) . '
            </h6>            
            </div>
            <div class="mbcom-thumb-item-labeling-overlay">
            <p class="labeling "> 
            ' . get_theme_mod('mcbra_teaser_text_setting_'.$i) . '
            </p>
            </div>
            </a>
            </div>
            </div>					
		</li>';
	}
}
$teaserpanel = trim(preg_replace('/\s\s+/', ' ', $teaserpanel));
wp_enqueue_style('Swiper', get_template_directory_uri() . '/css/swiper.css');
?>
<ul class="mbcom-thumb-list reveal-it fade-in from-bottom clearfix">
	<?=$teaserpanel; ?> 
</ul>
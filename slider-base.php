<?
$c = 1;
for ($i=0; $i<=5; $i++) {
	if ((get_theme_mod('mcbra_slide_img_setting_'.$c.'_'.$i)!= "") && (get_theme_mod('mcbra_slide_active_setting_'.$c.'_'.$i)!=1)) {
		$featpanel .= '<div class="swiper-slide featsc-slide mbc-row">			
				<div class="mbc-prepend-1 mbc-column-6 mbc-column-content-text">'					
					.  ((get_theme_mod('mcbra_slide_title_setting_'.$c.'_'.$i)) ? '<h1 class="mbc-icon-headline-55x4 mbc-article-section-header mbc-icon ' . ((get_theme_mod('mcbra_slide_text_color_'.$c.'_'.$i)==1) ? 'light' : 'dark'). '">'					
					.  get_theme_mod('mcbra_slide_title_setting_'.$c.'_'.$i) . '</h1>' : '') . 				
					'<!--<div class="' . ((get_theme_mod('mcbra_slide_text_color_'.$c.'_'.$i)==1) ? 'light' : 'dark'). '">'					
					.  ((get_theme_mod('mcbra_slide_text_setting_'.$c.'_'.$i)) ? get_theme_mod('mcbra_slide_text_setting_'.$c.'_'.$i) : '') . '</div>-->				
					<div class="' . ((get_theme_mod('mcbra_slide_text_color_'.$c.'_'.$i)==1) ? 'light' : 'dark'). '">'					
					.  ((get_theme_mod('mcbra_slide_text_setting_'.$c.'_'.$i)) ? get_theme_mod('mcbra_slide_text_setting_'.$c.'_'.$i) : '') . '</div>' .					
					((get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i)!='') ? '<a href="' .  get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i) . '" target="' . ((get_theme_mod('mcbra_slide_link_setting_'.$c.'_'.$i)==1) ? '_blank' : '_self' ) . '">' : '') .					
						((get_theme_mod('mcbra_slide_button_setting_'.$c.'_'.$i)!='') ? 
						'<button class="new-button"><span>' .  get_theme_mod('mcbra_slide_button_setting_'.$c.'_'.$i) . '</span></button>' : ((get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i)=='') ? '' : '<button class="new-button"><span>Saiba mais</span></button>')) .					
						((get_theme_mod('mcbra_slide_url_setting_'.$c.'_'.$i)!='') ? '</a>' : '') . '	
					</div>					
					<div class="img_feat" style="background-image: url(' .  get_theme_mod('mcbra_slide_img_setting_'.$c.'_'.$i) . ')">					
				</div>
		</div>';
	}
}
$featpanel = trim(preg_replace('/\s\s+/', ' ', $featpanel));
wp_enqueue_script( 'Swiper', get_template_directory_uri() . '/javascript/swiper.4.js', array(), '4.1.6', true );
wp_enqueue_style('Swiper', get_template_directory_uri() . '/css/swiper.css');
?>
<div id="featsc_base" class="featsc">
	<div class="swiper-wrapper mbc-article-tpl mbc-article-start"><?=$featpanel; ?></div>
	<div class="featsc-pagination swiper-pagination"></div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div>
</div>

<script>
$(document).ready(function(){
	setTimeout(function(){
		var featSwiper_base = new Swiper('#featsc_base', {		      
		slidesPerView: 1, 
		paginationClickable: true,
		spaceBetween: 0,	
		navigation: {nextEl:'.swiper-button-next',prevEl:'.swiper-button-prev'},
		loop: true,
			preloadImages: true,
			autoplay: 5000
		});	
		$('#featsc_base .swiper-wrapper').fadeIn('fast')
	}, 5000);
})
</script>
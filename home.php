<?php get_header(); 
	if(is_home()){ ?>
    <section style="height:100% !important">
		<? get_template_part('slider-topo'); ?>
    </section>                
    <div class="page-break"></div>
<?  } ?>
<div class="welcome-layer">
<div class="wl-background" onclick="javascript:newsx();"></div>
<div class="wl-painel">
    <h2>Cadastre seu e-mail para receber descontos exclusivos!</h2>
    <div class="wl-form">
		<? es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>        
	</div>
    <div class="wl-no"><a href='#' onclick="javascript:newsno();">Não quero receber descontos</a></div>
    </div>
</div>

<script src="<?=get_template_directory_uri() ?>/javascript/cookies/src/js.cookie.js"></script>

<script>
	$(document).ready(function(){
    	$('.wl-painel .es_txt_email').attr('placeholder','Digite aqui seu email');
        $('.wl-painel .es_submit_button').attr('value','Quero receber descontos');
		if ( Cookies.get('wl-page') !== 1) { $('.welcome-layer').show('fast'); }
		/*$('.wl-painel').on('resize', function() {*/
		$("body").on('DOMSubtreeModified', ".wl-painel", function() {
		 	if (($('.es_subscription_message').is(':visible')) && ($('.es_subscription_message').html()=='Assinado com Sucesso.')) {
				setTimeout(function(){ $('.welcome-layer').hide('slow')}, 3000 )
			}
		})
	})  
	function newsno() {
		Cookies.set("wl-page", 1);
		$('.welcome-layer').hide('fast');
	}
	function newsx() {
		$('.welcome-layer').hide('fast');
	}
</script>

<? if (get_theme_mod('mcbra_bloco_1_actv')!=1) { ?>
<section class="mbc-article-tpl mbc-article-with-background mbc-article-text-image mbc-article-text-image-left mbc-text-inverted mbc-clear">
                	<div class="mbc-row mbc-row-2 mbc-row-content-text">
                    	<div class="mbc-column-7-padding-left mbc-column mbc-column-content-image">
                        	<div class="mbc-image">
                            	<figure>
                                	<img src="<?=get_theme_mod('mcbra_bloco_1_img') ?>" alt=""/>
                                </figure>
                            </div>
                        </div>
                        <div class="mbc-column-4-padding-left mbc-column mbc-column-content-text">                        
                            <h3 class="mbc-article-section-header mbc-article-headline mbc-headline-with-border mbc-icon-headline-55x4 mbc-icon">
							
							<?=get_theme_mod('mcbra_bloco_1_titulo') ?></h3>                            
                            <div class="mbc-text-wrapper mbc-text-indent">
                            <?=get_theme_mod('mcbra_bloco_1_text'); 
							echo '<br><br>'.((get_theme_mod('mcbra_bloco_1_url')!='') ? '<a href="' .  get_theme_mod('mcbra_bloco_1_url') . '" target="' . ((get_theme_mod('mcbra_bloco_1_url_targ')==1) ? '_blank' : '_self' ) . '">' : '') . '<button  class="new-button"><span>Saiba Mais</span></button></a>';
							?>
                            </div>
                        </div>
            		</div>
            	</section> 
                <div class="page-break"></div><? } /* ?>  
                <section class="mbc-article-tpl mbc-article-with-background mbc-text-inverted mbc-clear mbc-article-map">
                    <div class="mbc-row mbc-row-content">
                    	<div class="mbc-column mbc-prepend-1 mbc-column-6 mbc-column-content-text-1">
                    		<h3 class="mbc-article-section-header mbc-article-headline mbc-headline-with-border mbc-icon-headline-55x4 mbc-icon">Contato.</h3><div class="mbc-text-wrapper mbc-text-indent"><strong>Telefone:</strong> <?=get_theme_mod('mcbra_contato_phon') ?></div>
                    	</div>
                        <div class="mbc-column mbc-column-4-padding-left mbc-column-content-text-2 mbc-map-table">
                            <table class="tg">
                            <tr>
                            <th class="mbc-table-heading">Endereço:</th>
                            <th class="mbc-table-content"><?=get_theme_mod('mcbra_contato_addr') ?></th>
                            </tr><tr>
                            <td class="mbc-table-heading store-opening">Nossos horários:</td>
                            <td class="mbc-table-content store-opening"><?=get_theme_mod('mcbra_contato_time') ?></td>
                            </tr><tr>
                            <td class="mbc-table-heading">Email:</td>
                            <td class="mbc-table-content"><a href="mailto:<?=get_theme_mod('mcbra_contato_mail') ?>"><?=get_theme_mod('mcbra_contato_mail') ?></a></td>
                            </tr>
                            </table>
                        	<div class="mbc-row mbc-row-content"></div>
                        </div>
                    </div>
                </section>
                <? */ if (get_theme_mod('mcbra_home_map_setting')!='') { ?>
            	<section class='mbc-article-tpl mbc-article-with-background mbc-article-no-top-space mbc-article-text-image mbc-article-text-image-top mbc-text-inverted mbc-clear'>                
                <iframe src="<?=get_theme_mod('mcbra_home_map_setting'); ?>" style="border:0 !important; height: 30vmax; width:100%" allowfullscreen></iframe>                
                </section><div class="page-break"></div> <? } if (get_theme_mod('mcbra_bloco_2_actv')!=1) { ?>                
                <section class="mbc-article-tpl mbc-article-with-background mbc-article-text-image mbc-article-text-image-right mbc-text-inverted mbc-clear"><div class="mbc-row mbc-row-2 mbc-row-content-text"><div class="mbc-prepend-1 mbc-column mbc-column-4-padding-right mbc-column-content-text">                
<h3 class="mbc-article-section-header mbc-article-headline mbc-headline-with-border mbc-icon-headline-55x4 mbc-icon"><?=get_theme_mod('mcbra_bloco_2_titulo') ?></h3>                            
                <div class="mbc-text-wrapper mbc-text-indent">				
                            <?=get_theme_mod('mcbra_bloco_2_text'); 
							echo '<br><br>'.((get_theme_mod('mcbra_bloco_2_url')!='') ? '<a href="' .  get_theme_mod('mcbra_bloco_2_url') . '" target="' . ((get_theme_mod('mcbra_bloco_2_url_targ')==1) ? '_blank' : '_self' ) . '">' : '') . '<button  class="new-button"><span>Saiba Mais</span></button></a>';
							?>
                </div>            
            </div><div class="mbc-column mbc-column-7-padding-right mbc-column-content-image" style="float:right"><div class="mbc-image"><figure><img src="<?=get_theme_mod('mcbra_bloco_2_img') ?>" alt=""/></figure></div></div></div></section><div class="page-break"></div>
            
<!--<section class="mbc-article-gallery mbc-text-inverted ">                   
                    <? //get_template_part('slider-base'); ?>
            </section><div class="page-break"></div>
<? } ?> -->
<? if (get_theme_mod('mcbra_bloco_3_actv')!=1) { ?>            
            <section class="mbc-article-tpl mbc-article-with-background mbc-article-text-image mbc-article-text-image-left mbc-text-inverted mbc-clear">
                	<div class="mbc-row mbc-row-2 mbc-row-content-text">
                    	<div class="mbc-column-7-padding-left mbc-column mbc-column-content-image">
                        	<div class="mbc-image">
                            	<figure>
                                	<img src="<?=get_theme_mod('mcbra_bloco_3_img') ?>" alt=""/>
                                </figure>
                            </div>
                        </div>
                        <div class="mbc-column-4-padding-left mbc-column mbc-column-content-text">                        
                            <h3 class="mbc-article-section-header mbc-article-headline mbc-headline-with-border mbc-icon-headline-55x4 mbc-icon"><?=get_theme_mod('mcbra_bloco_3_titulo') ?></h3>                            
                            <div class="mbc-text-wrapper mbc-text-indent">
                            <?=get_theme_mod('mcbra_bloco_3_text'); 
							echo '<br><br>'.((get_theme_mod('mcbra_bloco_3_url')!='') ? '<a href="' .  get_theme_mod('mcbra_bloco_3_url') . '" target="' . ((get_theme_mod('mcbra_bloco_3_url_targ')==1) ? '_blank' : '_self' ) . '">' : '') . '<button  class="new-button"><span>Saiba Mais</span></button></a>';
							?>
                            </div>
                        </div>
            		</div>
            	</section> 
                <div class="page-break"></div>
<? } ?>
<section class="mbcom-sub-headline-section variant-without-hr">
<div class="container reveal-it fade-in from-bottom">
<div class="spacer large"></div>
<h2 class="mbcom-section-headline mbcom-headline-with-bar">Novidades</h2>            
</div>
</section> 
<section class="mbcom-thumb-section mbcom-thumb-tabs-item variant-thumbs-with-text-and-labeling-below variant-three-col">
<h5 class="mbcom-thumb-tabs-headline">Recommended</h5>
<? get_template_part('teaser'); ?>            
</section>
<section id="mbc-comments-and-sharing" data-funct="CommentSharing">
</section>
<?php get_footer(); ?>

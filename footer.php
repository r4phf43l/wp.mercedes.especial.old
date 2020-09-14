</article>              
    <div class="mbcom-cta-strap">
    <ul>    
    <? get_template_part('rodape-menu'); ?>    
    </ul>
    </div>    
    <footer id="mbc-main-footer" class="container mbcom-footer no-print mbcom-section reveal-it fade-in from-bottom">
    <div class="spacer large"></div>
    <div class="container h5 mbcom-section-headline mbcom-headline-with-bar">Fique por dentro</div>
    <div class="container">
    <div class="col-xs-12 col-md-5">
    <p>
    Para se manter informado, cadastre seu email.</p>
    <div class="spacer"></div>   
    <? es_subbox( $namefield = "NO", $desc = "", $group = "" ); ?>
    <style>
    <!--
    .col-xs-12 .es_lablebox { display: none }
    .col-xs-12 .col-md-5 .es_txt_email:placeholder { color: #e2e2e2 }
    -->
    </style>
    </div>
    <div class="col-xs-12 col-md-offset-1 col-md-6 mbc-main-footer-social">
    <p>
    Nos acompanhe em sua rede social favorita:</p>
    <nav class="mbc-footer-social">
    <ul>    
        <?php
		$social_sites = array(
            'facebook',
			'googleplus',
			'twitter',
			'youtube',            
			'pinterest',
			'instagram',
            'foursquare',
			'tumblr',
			'linked-in_icon',
			'telegram'			
        );
		foreach($social_sites as $social_site) {		
			if (get_theme_mod('mcbra_social_'.$social_site.'_setting')!=''):
				echo '<li><a href="' . get_theme_mod('mcbra_social_'.$social_site.'_setting') . '" class="mbc-hover"><span class="mbcom-icon mbcom-icon-'.$social_site.'"></span></a></li>';
			endif;
		}
    ?>   
    </ul>
    </nav>
    </div>
    </div>
    <div class="spacer large"></div>
    <hr class="mbcom-hr">
    <div class="spacer"></div>
    <div class="row mbc-main-footer-meta">
    <div class="col-xs-12 col-md-12 col-lg-2  mbc-meta-lang-wrapper">
    </div>
    <div class="col-xs-12 col-md-12 col-lg-9">
    <nav class="mbc-meta-nav mbc-meta-footer" data-funct="MetaNavigationFooter">
    <ul>
    <?php get_template_part( 'menu', 'rodape' ); ?>
    </ul>
	<?php
        $user_footer_text = get_theme_mod('mcbra_footer_text_setting');
        $site_url = 'http://www.rafaantonio.com/mercedes/';
        $footer_text = sprintf( __( 'Comunimax &copy; 2017', 'tracks' ), esc_url( $site_url ) );
        echo ($user_footer_text) ? $user_footer_text . ' | ': '';
        echo $footer_text;
    ?>    
    </nav>
    </div>
        <div class="col-xs-12 col-md-12 col-lg-1">
        <a href="#top" class="mbc-page-top mbc-icon mbc-hover gray"
        data-funct="GoToPageTop">Topo</a>
        </div>
    </div>
    </footer>    
    </div>	
    <link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri() ?>/css/css3.css?<?=date('mmddyy-hhmmss')?>" />
	<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/style.f9aeef7.css?<?=date('mmddyy-hhmmss')?>" />
    <![if gt IE 9]>
	<script type="text/javascript" src="<?=get_template_directory_uri() ?>/javascript/hammer.min.js"></script>
    <script type="text/javascript" src="<?=get_template_directory_uri() ?>/javascript/jquery.hammer.js"></script>
    <![endif]>    
    <? wp_footer(); ?>
        <script>
    $(document).ready(function() {
       $('.col-xs-12 .es_txt_email').attr('placeholder','Digite aqui seu email');
       fade_menu();
	   $('#mbc-main-container').fadeIn('slow');
    })
    function fade_menu() {
         if($('#mbc-menu-mobile-check:checked').length == 0) {
                $('#mbc-article .entry').show(0)
         } else {
                $('#mbc-article .entry').hide(0)
         }
    }
    </script>
    </body>
</html>

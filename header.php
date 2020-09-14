<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9" <? language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <? language_attributes(); ?>><!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta content="IE=Edge,chrome=1" http-equiv="X-UA-Compatible">
<meta content="no-cache" http-equiv="cache-control">
<meta content="no-cache" http-equiv="pragma">  
<meta name="viewport" content="width=device-width, user-scalable=no">    
<meta name="google" content="notranslate">
<meta name="pinterest" content="nohover">
<meta name="robots" content="noodp,noydir"/>
<meta name="description" content="<? bloginfo('description'); ?>"/>

<link rel="shortcut icon" type="image/x-icon" href="<?=get_template_directory_uri() ?>/favicon.ico">
<link rel="icon" type="image/png" href="<?=get_template_directory_uri() ?>/images/favicon-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?=get_template_directory_uri() ?>/images/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="<?=get_template_directory_uri() ?>/images/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?=get_template_directory_uri() ?>/images/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?=get_template_directory_uri() ?>/images/favicon-32x32.png" sizes="32x32">
<link rel="canonical" href="<?=get_template_directory_uri() ?>" />

<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?=get_template_directory_uri() ?>/images/apple-touch-icon-180x180-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=get_template_directory_uri() ?>/images/apple-touch-icon-152x152-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=get_template_directory_uri() ?>/images/apple-touch-icon-120x120-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=get_template_directory_uri() ?>/images/apple-touch-icon-76x76-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?=get_template_directory_uri() ?>/images/apple-touch-icon-precomposed.png">    

<noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>

<!--[if lt IE 9]>
<link href="<?=get_template_directory_uri()?>/css/ie8.css" type="text/css" rel="stylesheet">
<link href="<?=get_template_directory_uri()?>/css/ie8-print.css" type="text/css" media="print" rel="stylesheet">
<![endif]-->
<!--[if lte IE 9]>
<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri()?>/css/vc_lte_ie9.min.css" media="screen"><![endif]-->

<? wp_head(); ?>

<title><? wp_title(); ?></title>
</head>

<body class="mbc mbc-context-com" style='background: #000'>
    <div id="mbc-main-container" class="mbc-container mercedes-benz-classic-service-and-parts." style="display:none">       
        <article id="mbc-article"> 
            <header id="mbc-header" class="mbc-row">
                <div id="mbc-header-meta-section">
                    <div class="mbc-meta-social-links" style="margin-right: 0px; text-align:right; margin-top:8px">
                        <div class="dropdown mbc-country-chooser">											
                            <? if( has_nav_menu( 'topo' ) ) { get_template_part( 'menu', 'topo' ); } ?>
                        </div>                    
                    </div>
                </div>                
                <div id="mbc-brand-hub-navi-wrapper" class="no-print">
                    <a href="<?=home_url();?>" id="mbc-iaa-shop" class="no-print" style="float:right; margin-right: 10px; margin-top: 78px;"></a>
                    <label class="mbc-menu-mobile" for="mbc-menu-mobile-check"></label>
                    <input id="mbc-menu-mobile-check" type="checkbox" style="display:none" onchange="fade_menu()" />
                    <div id="mbc-brand-hub-navi-inner-wrapper">
                        <div class="mbc-brand-hub-navi-mobile-level">                        
                            <nav id="mbc-brand-hub-navigation" style="top: inherit;">
                                <? get_template_part( 'menu', 'childs' ); ?>                                
                            </nav>
                        </div>
                    </div>
                    
                </div>
                <a href="<?=home_url();?>" id="mbc-iaa-logo" class="no-print"></a>
                <a href="<?=home_url();?>" id="mbc-iaa-claim" class="no-print" style="background-size: 100px; background-position: 0px center"></a>
                
            </header>

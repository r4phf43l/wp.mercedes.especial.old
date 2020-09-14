<?
function mcbra_customize_register( $wp_customize ) {
    class mcbra_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
		public function render_content() { ?>
            <label>
                <span class="customize-control-title">
					<? echo esc_html( $this->label ); ?></span>
                <textarea rows="8" style="width:100%;" <? $this->link(); ?>>
					<? echo esc_textarea( $this->value() ); ?></textarea>
            </label>
	<? 	}
	}

	class mcbra_URL_Control extends WP_Customize_Control {
		public $type = 'url';
		public function render_content() {
			?>
				<label>
						<span class="customize-control-title">
							<? echo esc_html( $this->label ); ?></span>
						<input type="url" <? $this->link(); ?> value="<? echo esc_url_raw( $this->value() ); ?>" />
					</label>
		<?
		}
	}	

	class mcbra_TXT_Control extends WP_Customize_Control {
		public $type = 'url';
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?></span>
				<input type="url" <?php $this->link(); ?> value="<?php echo esc_url_raw( $this->value() ); ?>" />
			</label>
		<?php
		}
	}		

	class mcbra_HR_Control extends WP_Customize_Control {
		public $type = 'line';
		public function render_content() {
			?>
			<hr />
		<?php
		}
	}

	$wp_customize->add_section( 'ct_footer_text', array(
		'title'      => __( 'Texto do Rodapé', 'mcbra' ),
		'priority'   => 58,
		'capability' => 'edit_theme_options',
		'panel'          => 'panel_full'
	) );
	
	$wp_customize->add_setting( 'mcbra_footer_text_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',       
	) );
	
	$wp_customize->add_control( new mcbra_Textarea_Control(
		$wp_customize, 'ct_mcbra_footer_text_setting', array(
			'label'          => __( 'Edite o texto do rodapé', 'mcbra' ),
			'section'        => 'ct_footer_text',
			'settings'       => 'mcbra_footer_text_setting',			
		)
	) );

	/*
			$wp_customize->add_section( 'ct_icon_menu', array(
				'title'      => __( 'Ícones Menus Superior', 'mcbra' ),
				'capability' => 'edit_theme_options',
				'panel'  => 'panel_full'
			) );
			
			for ($i=1; $i<=6; $i++) { 
		
			$wp_customize->add_setting(
				'mcbra_icon_menu_' . $i, array(
				'default' => '',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,	
				'mcbra_icon_menu_' . $i, array(	
				'label' => 'Menu '  . $i . ' - Escolha uma Imagem',	
				'section' => 'ct_icon_menu',	
				'settings' => 'mcbra_icon_menu_' . $i	
			)));
			
			}
	//
			$wp_customize->add_section( 'ct_icon_menul', array(
				'title'      => __( 'Ícones Menus Lateral', 'mcbra' ),
				'capability' => 'edit_theme_options',
				'panel'  => 'panel_full'
			) );
			
			for ($i=1; $i<=6; $i++) { 
		
			$wp_customize->add_setting(
				'mcbra_icon_menul_' . $i, array(
				'default' => '',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,	
				'mcbra_icon_menul_' . $i, array(	
				'label' => 'Menu '  . $i . ' - Escolha uma Imagem',	
				'section' => 'ct_icon_menul',	
				'settings' => 'mcbra_icon_menul_' . $i	
			)));
			
			}		*/	
														
	
//	
	$wp_customize->add_section( 'ct_home_map', array(
		'title'      => __( 'URL do Google Maps', 'mcbra' ),
		'priority'   => 58,
		'capability' => 'edit_theme_options',
		'panel'          => 'panel_home'
	) );
	
	$wp_customize->add_setting( 'mcbra_home_map_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',       
	) );
	
	$wp_customize->add_control( new mcbra_Textarea_Control(
		$wp_customize, 'ct_mcbra_home_map_setting', array(
			'label'          => __( 'Edite o URL do mapa da página inicial', 'mcbra' ),
			'section'        => 'ct_home_map',
			'settings'       => 'mcbra_home_map_setting',			
		)
	) );
	
	for ($a=1; $a<=2; $a++) {
		
		switch ($a) {		
			case 2: $cat = "Home - Topo"; ; $c = 2; break;
			case 1: $cat = "Home - Rodapé"; $c = 1; break;
		}
		
		$slide_cat[$a] = get_theme_mod('slide_count_setting' . $c)!="" ? get_theme_mod('slide_count_setting' . $c) : 5;
		$wp_customize->add_panel( 'panel_slides' . $c, array(
			'priority'       => 52,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Slides: ' . $cat,
			'description'    => 'Container de Slides (Posição: ' . $cat . ')' . get_theme_mod('slide_count_setting' . $c),
		) );
	
		for ($i=0; $i<=5; $i++) {		
			
			$wp_customize->add_section( 'ct_slide_options_' . $c . '_' . $i, array(
				'title'      => __( 'Slide ' . $cat . ' ' . $i, 'mcbra' ),
				'capability' => 'edit_theme_options',
				'panel'  => 'panel_slides' . $c
			) );	
		
			$wp_customize->add_setting(
				'mcbra_slide_img_setting_' . $c . '_' . $i, array(
				'default' => '',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,	
				'mcbra_slide_img_setting_' . $c . '_' . $i, array(	
				'label' => 'Escolha uma Imagem',	
				'section' => 'ct_slide_options_' . $c . '_' . $i,	
				'settings' => 'mcbra_slide_img_setting_' . $c . '_' . $i	
			)));
		
			$wp_customize->add_setting( 'mcbra_slide_title_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_title_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Título', 'mcbra' ),
				'type'			 => 'text',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_title_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_text_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_text_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Descrição', 'mcbra' ),
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_text_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_text_color_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_text_color_' . $c . '_' . $i, array(
				'label'          => __( 'Texto em Branco', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_text_color_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_url_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( new mcbra_URL_Control(
				$wp_customize, 'ct_mcbra_slide_url_setting_' . $c . '_' . $i, array(
					'label'          => __( 'URL', 'mcbra' ),
					'section'        => 'ct_slide_options_' . $c . '_' . $i,
					'settings'       => 'mcbra_slide_url_setting_' . $c . '_' . $i,
				)
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_link_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_link_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Abrir em outra janela', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_link_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_button_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'default'			=> 'Saiba mais',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_button_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Botão', 'mcbra' ),
				'type'			 => 'text',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_button_setting_' . $c . '_' . $i,
			) );
			
			$wp_customize->add_setting( 'mcbra_slide_active_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_active_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Slide Inativo', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_active_setting_' . $c . '_' . $i,
			) );	
		}
	}
	
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
	
	$wp_customize->add_section( 'ct_social_links', array(
		'title'      => __( 'Midias Sociais', 'mcbra' ),
		'priority'   => 55,
		'capability' => 'edit_theme_options',
		'panel'          => 'panel_full'
	) );
	
	foreach($social_sites as $social_site) {
		$wp_customize->add_setting( 'mcbra_social_' . $social_site . '_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );
	
	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_social_' . $social_site . '_setting', array(
			'label'          => __( $social_site, 'mcbra' ),
			'section'        => 'ct_social_links',
			'settings'       => 'mcbra_social_' . $social_site . '_setting',
		)
	) ); 
	
	$wp_customize->add_panel( 'panel_full', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Configurações Gerais',
		'description'    => 'Configs',
	) );
	
	$wp_customize->add_panel( 'panel_home', array(
		'priority'       => 21,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Página Inicial',
		'description'    => 'Popula a página inicial',
	) );
	
	for ($i=1;$i<=3;$i++) {
	
		$wp_customize->add_section( 'ct_bloco_' . $i, array(
			'title'      => __( 'Bloco ' . $i, 'mcbra' ),
			'priority'   => 58,
			'capability' => 'edit_theme_options',
			'panel'          => 'panel_home'
		) );
	
		$wp_customize->add_setting( 'mcbra_bloco_'.$i.'_titulo', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',        
		) );
	
		$wp_customize->add_control('ct_mcbra_bloco_'.$i.'_titulo', array(
				'label'          => __( 'Titulo', 'mcbra' ),
				'section'        => 'ct_bloco_' . $i,
				'settings'       => 'mcbra_bloco_'.$i.'_titulo',		
		) );
	
		$wp_customize->add_setting( 'mcbra_bloco_'.$i.'_text', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',       
		) );
		
		$wp_customize->add_control( new mcbra_Textarea_Control(
			$wp_customize, 'ct_mcbra_bloco_'.$i.'_text', array(
				'label'          => __( 'Edite o Texto', 'mcbra' ),
				'section'        => 'ct_bloco_' . $i,
				'settings'       => 'mcbra_bloco_'.$i.'_text',			
			)
		) );
		
		$wp_customize->add_setting(
			'mcbra_bloco_'.$i.'_img', array(
			'default' => '',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,	
			'mcbra_bloco_'.$i.'_img', array(	
			'label' => 'Escolha a Imagem',	
			'section' => 'ct_bloco_' . $i,	
			'settings' => 'mcbra_bloco_'.$i.'_img'	
		)));
			
		$wp_customize->add_setting( 'mcbra_bloco_'.$i.'_url', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',       
		) );
		
		$wp_customize->add_control( new mcbra_URL_Control(
			$wp_customize, 'ct_mcbra_bloco_'.$i.'_url', array(
				'label'          => __( 'Edite o Link', 'mcbra' ),
				'section'        => 'ct_bloco_' . $i,
				'settings'       => 'mcbra_bloco_'.$i.'_url',
			)
		) );
		
		$wp_customize->add_setting( 'mcbra_bloco_'.$i.'_targ', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',        
		) );
	
		$wp_customize->add_control( 'ct_mcbra_bloco_'.$i.'_targ', array(
			'label'          => __( 'Abrir em outra janela', 'mcbra' ),
			'type'			 => 'checkbox',
			'section'        => 'ct_bloco_' . $i,
			'settings'       => 'mcbra_bloco_'.$i.'_targ',
		) );
	
		$wp_customize->add_setting( 'mcbra_bloco_'.$i.'_actv', array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_bloco_'.$i.'_actv', array(
			'label'          => __( 'Bloco Inativo', 'mcbra' ),
			'type'			 => 'checkbox',
			'section'        => 'ct_bloco_' . $i,
			'settings'       => 'mcbra_bloco_'.$i.'_actv',
		) );
	}
		
	$wp_customize->add_section( 'ct_contato', array(
		'title'      => __( 'Contato', 'mcbra' ),
		'priority'   => 58,
		'capability' => 'edit_theme_options',
		'panel'          => 'panel_home'
	) );
	
	$wp_customize->add_setting( 'mcbra_contato_phon', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',       
	) );
	
	$wp_customize->add_control('ct_mcbra_contato_phon', array(
		'label'          => __( 'Telefones', 'mcbra' ),
		'section'        => 'ct_contato',
		'settings'       => 'mcbra_contato_phon',		
	) );	
	
	$wp_customize->add_setting( 'mcbra_contato_addr', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );
	
	$wp_customize->add_control('ct_mcbra_contato_addr', array(
			'label'          => __( 'Endereço', 'mcbra' ),
			'section'        => 'ct_contato',
			'settings'       => 'mcbra_contato_addr',		
	) );
	
	$wp_customize->add_setting( 'mcbra_contato_mail', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );
	
	$wp_customize->add_control('ct_mcbra_contato_mail', array(
			'label'          => __( 'E-Mail', 'mcbra' ),
			'section'        => 'ct_contato',
			'settings'       => 'mcbra_contato_mail',		
	) );
	
	$wp_customize->add_setting( 'mcbra_contato_time', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',       
	) );	
	
	$wp_customize->add_control('ct_mcbra_contato_time', array(
		'label'          => __( 'Nossos horários', 'mcbra' ),
		'section'        => 'ct_contato',
		'settings'       => 'mcbra_contato_time',		
	) );
	
	}
	
	$teaser = get_theme_mod('teaser_count_setting')!="" && get_theme_mod('teaser_count_setting')>0 ? get_theme_mod('teaser_count_setting') : 9;
	$wp_customize->add_panel( 'panel_teaser', array(
		'priority'       => 53,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Miniaturas',
		'description'    => 'Minitauras da página inicial',
	) );

for ($i=1; $i<=$teaser; $i++) {
	
	$wp_customize->add_section( 'ct_teaser_options_' . $i, array(
		'title'      => __( 'Miniatura ' . $i, 'mcbra' ),
		'capability' => 'edit_theme_options',
		'panel'  => 'panel_teaser'
	) );	

	$wp_customize->add_setting(
	'mcbra_teaser_img_setting_' . $i, array(
	  'default' => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control(
		  $wp_customize,	
		  'mcbra_teaser_img_setting_' . $i, array(	
			'label' => 'Escolha uma Imagem',	
			'section' => 'ct_teaser_options_' . $i,	
			'settings' => 'mcbra_teaser_img_setting_' . $i	
	)));

	$wp_customize->add_setting( 'mcbra_teaser_title_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_teaser_title_setting_' . $i, array(
			'label'          => __( 'Título', 'mcbra' ),
			'type'			 => 'text',
			'section'        => 'ct_teaser_options_' . $i,
			'settings'       => 'mcbra_teaser_title_setting_' . $i,
	) );

	$wp_customize->add_setting( 'mcbra_teaser_text_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( 'ct_mcbra_teaser_text_setting_' . $i, array(
			'label'          => __( 'Texto', 'mcbra' ),
			'section'        => 'ct_teaser_options_' . $i,
			'settings'       => 'mcbra_teaser_text_setting_' . $i,
	) );

	$wp_customize->add_setting( 'mcbra_teaser_url_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_teaser_url_setting_'.$i, array(
			'label'          => __( 'URL', 'mcbra' ),
			'section'        => 'ct_teaser_options_' . $i,
			'settings'       => 'mcbra_teaser_url_setting_' . $i,
		)
	) );

	$wp_customize->add_setting( 'mcbra_teaser_link_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( 'ct_mcbra_teaser_link_setting_' . $i, array(
			'label'          => __( 'Abrir em outra janela', 'mcbra' ),
			'type'			 => 'checkbox',
			'section'        => 'ct_teaser_options_' . $i,
			'settings'       => 'mcbra_teaser_link_setting_' . $i,
	) );

	$wp_customize->add_setting( 'mcbra_teaser_active_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_teaser_active_setting_' . $i, array(
			'label'          => __( 'Miniatura Inativa', 'mcbra' ),
			'type'			 => 'checkbox',
			'section'        => 'ct_teaser_options_' . $i,
			'settings'       => 'mcbra_teaser_active_setting_' . $i,
	) );	

}
}

add_action( 'customize_register', 'mcbra_customize_register' );
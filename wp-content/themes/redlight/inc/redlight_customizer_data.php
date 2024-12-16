<?php
/** 
 * Redlight Customizer data
 */

function redlight_customizer( $data ) {
	$redlight_elementor_template_list = redlight_get_elementor_templates();
	$redlight_elementor_header_templates = redlight_get_elementor_header_templates();
	return array(
		'panel' => array ( 
			'id' => 'redlight',
			'name' => esc_html__('Redlight Customizer','redlight'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'redlight' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name' => esc_html__( 'Topbar Swicher', 'redlight' ),
							'id' => 'redlight_topbar_switch',
							'default' => false,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),						
						array(
							'name' => esc_html__( 'Show Button', 'redlight' ),
							'id' => 'redlight_show_header_btn',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text', 'redlight' ),
							'id' => 'redlight_header_btn_text',
							'default' => esc_html__('Sign in','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'redlight' ),
							'id' => 'redlight_header_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Button Icon', 'redlight' ),
							'id' => 'redlight_header_btn_icon',
							'default' => esc_html__('fa fa-user-o', 'redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						/** investment button **/	
						array(
							'name' => esc_html__( 'Show Investment Offer Link', 'redlight' ),
							'id' => 'redlight_show_investment_offer_link',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Link Text', 'redlight' ),
							'id' => 'redlight_header_link_text',
							'default' => esc_html__('Redlight Offer','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Link Url', 'redlight' ),
							'id' => 'redlight_header_link_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						/** contact-info **/
						array(
							'name' => esc_html__( 'Show Contact Info', 'redlight' ),
							'id' => 'redlight_show_contact_info',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Email Address', 'redlight' ),
							'id' => 'redlight_header_email',
							'default' => esc_html__('info@gmail.com','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Phone Number', 'redlight' ),
							'id' => 'redlight_header_phone',
							'default' => esc_html__('+97657945737', 'redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						)

					) 
				),
				'redlight_topbar_social_profiles_setting' => array(
					'name' => esc_html__( 'Header Social Profiles', 'redlight' ),
					'priority' => 15,
					'fields' => array(
						array(
							'name' => esc_html__( 'Show Social Profiles', 'redlight' ),
							'id' => 'redlight_show_social_profiles',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Facebook Url', 'redlight' ),
							'id' => 'redlight_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'redlight' ),
							'id' => 'redlight_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkedin Url', 'redlight' ),
							'id' => 'redlight_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'redlight' ),
							'id' => 'redlight_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
					) 
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'redlight' ),
					'priority' => 20,
					'fields' => array(
						array(
							'name' => esc_html__( 'Choose Header Style', 'redlight' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'header-style-1' => esc_html__( 'Header Style 1', 'redlight' ),
								'header-style-2' => esc_html__( 'Header Style 2', 'redlight' ),
							),
							'default' => 'header-style-2',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Type', 'redlight' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'default-header' => esc_html__( 'Default Header', 'redlight' ),
								'elementor-header' => esc_html__( 'Elementor Header', 'redlight' ),
							),
							'default' => 'default-header',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Elementor Templates', 'redlight' ),
							'id' => 'choose_elementor_header',
							'type'     => 'select',
							'choices'  => $redlight_elementor_header_templates,
							'transport'	=> 'refresh',
							'required' => ['header_source_type',
							'=',
							'e'],
						),
						array(
							'name' => esc_html__( 'Header Logo', 'redlight' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Black Logo', 'redlight' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Retina Logo', 'redlight' ),
							'id' => 'retina_logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo@2x.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Retina Black Logo', 'redlight' ),
							'id' => 'retina_secondary_logo',
							'default' => get_template_directory_uri() . '/assets/img/logo/logo-black@2x.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Header Search', 'redlight' ),
							'id' => 'redlight_header_search_show',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
					) 
				),	
				'banner_main_setting' => array(
					'name' => esc_html__( 'Sub Banner Setting', 'redlight' ),
					'priority' => 20,
					'fields' => array(
						
						array(
							'name' => esc_html__( 'Banner Image', 'redlight' ),
							'id' => 'sub-banner-img',
							'default' => get_template_directory_uri() . '/assets/img/sub-banner-img.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						
					) 
				),	
				'page_title_setting'=> array(
					'name'=> esc_html__('Page Title Setting','redlight'),
					'priority'=> 30,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Choose Breadcrumb Style', 'redlight' ),
							'id' => 'choose_default_breadcrumb',
							'type'     => 'select',
							'choices'  => array(
								'breadcrumb-style-1' => esc_html__( 'Breadcrumb Style 1', 'redlight' ),
								'breadcrumb-style-2' => esc_html__( 'default', 'redlight' ),
							),
							'default' => 'breadcrumb-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name'=>esc_html__('Breadcrumb BG Color','redlight'),
							'id'=>'breadcrumb_bg_color',
							'default'=> esc_html__('#343a40','redlight'),
							'transport'	=> 'refresh'  
						),
						array(
							'name' => esc_html__( 'Page Title Background Image', 'redlight' ),
							'id' => 'breadcrumb_bg_img',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'redlight' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'redlight' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'redlight' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'redlight' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'redlight' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'redlight' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),			
						array(
							'name' => esc_html__( 'Breadcrumb Shop', 'redlight' ),
							'id' => 'breadcrumb_shop',
							'default' => esc_html__('Shop','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),			
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'redlight' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','redlight'),
					'priority'=> 40,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog BTN', 'redlight' ),
							'id' => 'redlight_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Show Blog Btn Icon', 'redlight' ),
							'id' => 'redlight_blog_btn_icon_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'redlight' ),
							'id' => 'redlight_blog_btn',
							'default' => esc_html__('Read More','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),							
						array(
							'name' => esc_html__( 'Blog Button Icon', 'redlight' ),
							'id' => 'redlight_blog_btn_icon',
							'default' => esc_html__('fas fa-angle-double-right','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Title', 'redlight' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'redlight' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','redlight'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'redlight_footer_setting' => array(
					'name'=> esc_html__('Footer Setting','redlight'),
					'priority'=> 60,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Footer Elementor Templates', 'redlight' ),
							'id' => 'choose_elementor_footer',
							'type'     => 'select',
							'choices'  => $redlight_elementor_template_list,
							'transport'	=> 'refresh',
							'required' => ['footer_source_type',
							'=',
							'e'],
						),
						array(
							'name' => esc_html__( 'Choose Footer Style', 'redlight' ),
							'id' => 'choose_default_footer',
							'type'     => 'select',
							'choices'  => array(
								'footer-style-1' => esc_html__( 'Footer Style 1', 'redlight' ),
								'footer-style-2' => esc_html__( 'Footer Style 2', 'redlight' ),
								'footer-style-3' => esc_html__( 'Footer Style 3', 'redlight' ),
							),
							'default' => 'footer-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Footer Background Image', 'redlight' ),
							'id' => 'redlight_footer_bg',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Footer BG Color','redlight'),
							'id'=>'redlight_footer_bg_color',
							'default'=> esc_html__('#f4f9fc','redlight'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right','redlight'),
							'id'=>'redlight_copyright',
							'default'=> esc_html__('Copyright &copy; Redlight 2023. All rights reserved','redlight'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),	
						array(
							'name'=>esc_html__('Enable Scrollup','redlight'),
							'id'=>'redlight_scrollup_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Enable Footer Widgets','redlight'),
							'id'=>'redlight_enable_footer_widgets',
							'default'=> true,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),	
						array(
							'name'=>esc_html__('Enable Preloader','redlight'),
							'id'=>'redlight_preloader_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						)
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','redlight'),
					'priority'=> 90,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','redlight'),
							'id'=>'redlight_error_404_text',
							'default'=> esc_html__('404','redlight'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','redlight'),
							'id'=>'redlight_error_title',
							'default'=> esc_html__('Page not found','redlight'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','redlight'),
							'id'=>'redlight_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','redlight'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','redlight'),
							'id'=>'redlight_error_link_text',
							'default'=> esc_html__('Back To Home','redlight'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
			),
		)
	);

}

add_filter('redlight_customizer_data', 'redlight_customizer');



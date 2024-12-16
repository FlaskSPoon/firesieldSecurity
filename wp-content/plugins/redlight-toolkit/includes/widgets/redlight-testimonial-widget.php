<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor redlight-testimonial Widget.
 *
 * Elementor widget that uses the redlight-testimonial control.
 *
 * @since 1.0.0
 */
class Elementor_Redlight_Testimonial_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve redlight-testimonial widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'redlight-testimonial';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve redlight-testimonial widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'redlight Testimonial', 'elementor-redlight-testimonial-control' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve redlight-testimonial widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-carousel-loop';
	}

	/**
	 * Register redlight-testimonial widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-redlight-testimonial-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'selected_style',
			[
				'label' => esc_html__( 'Select Style', 'elementor-services-post-control' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1', // Set the default style
				'options' => [
					'style1' => esc_html__( 'Style 1', 'elementor-services-post-control' ),
					'style2' => esc_html__( 'Style 2', 'elementor-services-post-control' ),
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'elementor-redlight-testimonial-control' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas aspernatur aut odit aut fugit, sed. Beatae vitae dicta ripiscing elit, sed do euismod tempor incidunt. Labore et dolore magna aliqua ut enim ad minim adipiscing elit, sed do euismod tempor incidunt ut labore.' , 'elementor-redlight-testimonial-control' ),
				'label_block' => true,
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'list_username', [
				'label' => __( 'User Name', 'elementor-redlight-testimonial-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'User Name' , 'elementor-redlight-testimonial-control' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_designation', [
				'label' => __( 'Designation', 'elementor-redlight-testimonial-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Separtment' , 'elementor-redlight-testimonial-control' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'list_image',
			[
				'label' => esc_html__( 'User Image', 'elementor-farosa-04-control' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => PLUGIN_BASE_URI. 'assets/img/testimonial-user-img.png' ,
				],
			]
		);
		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'elementor-redlight-testimonial-control' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_content' => __( 'Content', 'elementor-redlight-testimonial-control' ),
						'list_username' => __( 'User Name', 'elementor-redlight-testimonial-control' ),
						'list_designation' => __( 'Designation Name', 'elementor-redlight-testimonial-control' ),
						'list_image' => __( 'User Image', 'elementor-redlight-testimonial-control' ),
					],
					[
						'list_content' => __( 'Content', 'elementor-redlight-testimonial-control' ),
						'list_username' => __( 'User Name', 'elementor-redlight-testimonial-control' ),
						'list_designation' => __( 'Designation Name', 'elementor-redlight-testimonial-control' ),
						'list_image' => __( 'User Image', 'elementor-redlight-testimonial-control' ),
					],
				],
				'heading_field' => '{{{ list_heading }}}',
			]
		);
		
		
        $this->end_controls_section();
		////////////////////////////////////////////////  Container Style Start /////////////////////////////////////////////////
		$this->start_controls_section(
			'container_style_section',
			[
				'label' => esc_html__( 'Container Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $slider_style = array('style 1','style 2');
		$slider_style = array_combine( $slider_style, $slider_style );
		$this->add_control(
			'redlight_testimonial_style',
			[
				'label' => esc_html__( 'Testimonial Style', 'redlight_testimonial' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'redlight_testimonial' ),
				] + $slider_style,
			]
		);


		$this->add_responsive_control(
			'container_spacing',
			[
				'label' => __( 'Space Around', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .owl-stage-outer .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		); 

	

		$this->add_responsive_control(
			'redlight_show_nav',
			[
				'label' => esc_html__( 'Show Nav', 'redlight_slides_nav' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'true' => esc_html__( 'Yes', 'redlight_slides' ),
					'false' => esc_html__( 'No', 'redlight_slides' ),
				],
				'default' => 'true',
			]
		);

		$this->add_responsive_control(
            'redlight_show_dots',
            [
                'label' => esc_html__( 'Show Dots', 'redlight_slides_dots' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'true' => esc_html__( 'Yes', 'redlight_slides' ),
                    'false' => esc_html__( 'No', 'redlight_slides' ),
                ],
                'default' => 'false',
            ]
        );

        $this->end_controls_section(); 
		////////////////////////////////////////////////  Conatiner Style Ends /////////////////////////////////////////////////
		
		////////////////////////////////////////////////  Dots Style Start /////////////////////////////////////////////////
		
        $this->start_controls_section(
			'redlight_dots_style_section',
			[
				'label' => esc_html__( ' Dots Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
        
        $this->add_control(
            'dots_color',
            [
                'label' => esc_html__('Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots .owl-dot span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'dots_active_color',
            [
                'label' => esc_html__('Active Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'custom_width1',
            [
                'label' => esc_html__('Normal Dots Width', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'custom_height1',
            [
                'label' => esc_html__('Normal Dots Height', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'custom_width',
            [
                'label' => esc_html__('Active Dots Width', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots.active .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'custom_height',
            [
                'label' => esc_html__('Active Dots height', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots.active .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		
		$this->add_control(
            'testimonial_dots_alignment',
            [
                'label' => esc_html__('Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots' => 'text-align: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_section();

		////////////////////////////////////////////////  Dots Style Ends /////////////////////////////////////////////////

	}


	/**
	 * Render redlight-testimonial widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$selected_style=$settings['selected_style'];
		?>
		<?php if ($selected_style === 'style1') { ?>
		<section class="clients-section position-relative">
			<div class="position-relative" data-aos="fade-up">
				<div class="owl-carousel testimonial-carousel-section owl-theme">
					<?php
					$count = 0;
					if ($settings['list']) {
						foreach ($settings['list'] as $item) {
							?>
							<div class="item">
								<div class="clients-outer-box position-relative" data-aos="fade-up">
									<figure class="clients-outer-box-figure">
										<?php
										if (isset($item['list_image']['id']) && !empty($item['list_image']['id'])) {
											?>
											<?php echo wp_get_attachment_image($item['list_image']['id'], 'full'); ?>
											<?php
										} else {
											?>
											<img class="img-fluid" src="<?php echo PLUGIN_BASE_URI . 'assets/images/testimonial-image.png' ?>" alt="">
											<?php
										}
										?>
									</figure>
									<figure class="position-absolute icon-figure-quotes">
											<img class="img-fluid" src="<?php echo PLUGIN_BASE_URI . 'assets/images/testimonial-comas.png' ?>" alt="">
									</figure>
									<div class="clients-right-content" data-aos="fade-up">
										<span class="spencer-span"><?php echo $item['list_username']; ?></span>
										<span class="ceo-p"><?php echo $item['list_designation']; ?></span>
									</div>
									<p class="clients-sectionp2"><?php echo $item['list_content']; ?></p>
									<ul class="list-unstyled">
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
									</ul>
								</div>
							</div>
						<?php
							$count++;
						}
					}
					?>
				</div>
			</div>
		</section>
		<?php } elseif ($selected_style === 'style2'){
		?>
		<section class="clients-section position-relative">
			<div class="position-relative" data-aos="fade-up">
				<div class="owl-carousel testimonial-carousel-section2 owl-theme">
					<?php
					$count = 0;
					if ($settings['list']) {
						foreach ($settings['list'] as $item) {
							?>
							<div class="item">
								<div class="clients-outer-box position-relative" data-aos="fade-up">
									<figure class="clients-outer-box-figure">
										<?php
										if (isset($item['list_image']['id']) && !empty($item['list_image']['id'])) {
											?>
											<?php echo wp_get_attachment_image($item['list_image']['id'], 'full'); ?>
											<?php
										} else {
											?>
											<img class="img-fluid" src="<?php echo PLUGIN_BASE_URI . 'assets/images/testimonial-image.png' ?>" alt="">
											<?php
										}
										?>
									</figure>
									<figure class="position-absolute icon-figure-quotes">
											<img class="img-fluid" src="<?php echo PLUGIN_BASE_URI . 'assets/images/testimonial-comas.png' ?>" alt="">
									</figure>
									<div class="clients-right-content" data-aos="fade-up">
										<span class="spencer-span"><?php echo $item['list_username']; ?></span>
										<span class="ceo-p"><?php echo $item['list_designation']; ?></span>
									</div>
									<p class="clients-sectionp2"><?php echo $item['list_content']; ?></p>
									<ul class="list-unstyled">
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
										<li><i class="fa-solid fa-star"></i></li>
									</ul>
								</div>
							</div>
						<?php
							$count++;
						}
					}
					?>
				</div>
			</div>
		</section>
		<?php
		}
		?>
		<script>
			var testimonial_settings = <?php echo json_encode($settings); ?>;
		</script>
		<?php
	}	
}

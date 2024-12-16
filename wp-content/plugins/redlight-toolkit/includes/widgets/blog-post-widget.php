<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor blog-post Widget.
 *
 * Elementor widget that uses the blog-post control.
 *
 * @since 1.0.0
 */
class Elementor_Blog_Post_Widget extends \Elementor\Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve blog-post widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'blog-post';
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve blog-post widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Redlight Blog Posts', 'elementor-blog-post-control' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve blog-post widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	// public function get_icon() {
	// 	return 'eicon-carousel-loop';
	// }

	/**
	 * Register blog-post widget controls.
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
				'label' => esc_html__( 'Content', 'elementor-blog-post-control' ),
				'type' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'number_of_post_blogs',
			[
				'label' => __( 'Number of Posts', 'elementor-blog-post-control' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3, // Set a default value
				'min' => 1,
				'max' => 21,
				'step' => 1,
			]
			);
		$this->add_control(
			'resturant_post_blog_category',
			[
				'label' => esc_html__( 'Select Post Category', 'elementor-blog-post-control' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_post_blog_categories(),
				'default' => 'post',
			]
		);
        $this->end_controls_section();
		$this->start_controls_section(
			'post_order_section',
			[
				'label' => esc_html__('Post Order', 'elementor-blog-post-control'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label'   => esc_html__('Post Order', 'elementor-blog-post-control'),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'asc'  => [
						'title' => esc_html__('Ascending', 'elementor-blog-post-control'),
						'icon'  => 'fa fa-sort-amount-asc',
					],
					'desc' => [
						'title' => esc_html__('Descending', 'elementor-blog-post-control'),
						'icon'  => 'fa fa-sort-amount-desc',
					],
				],
				'default' => 'asc',
			]
		);
		
		$this->add_control(
			'post_order_by',
			[
				'label'   => esc_html__('Sort Order', 'elementor-blog-post-control'),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'date'  => [
						'title' => esc_html__('Latest Posts', 'elementor-blog-post-control'),
						'icon'  => 'fa fa-calendar',
					],
					'title' => [
						'title' => esc_html__('Alphabetical Order', 'elementor-blog-post-control'),
						'icon'  => 'fa fa-sort-alpha-asc',
					],
				],
				'default' => 'date',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'image_section',
			[
				'label' => esc_html__( 'Image Controls', 'elementor-blog-post-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_responsive_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'elementor-blog-post-control' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'medium', // Set your default image size
				'options' => [
					'thumbnail' => 'Thumbnail',
					'medium' => 'Medium',
					'large' => 'Large',
					'full' => 'Full',
				],
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'image_control_section',
			[
				'label' => esc_html__( 'Image Dimensions', 'elementor-blog-post-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Image Width', 'elementor-blog-post-control' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]);
		
		$this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__( 'image Height', 'elementor-blog-post-control' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'elementor-services-post-control' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
					'image_height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default', 'elementor-services-post-control' ),
					'fill' => esc_html__( 'Fill', 'elementor-services-post-control' ),
					'cover' => esc_html__( 'Cover', 'elementor-services-post-control' ),
					'contain' => esc_html__( 'Contain', 'elementor-services-post-control' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-position',
			[
				'label' => esc_html__( 'Object Position', 'elementor-services-post-control' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__( 'Center Center', 'elementor-services-post-control' ),
					'center left' => esc_html__( 'Center Left', 'elementor-services-post-control' ),
					'center right' => esc_html__( 'Center Right', 'elementor-services-post-control' ),
					'top center' => esc_html__( 'Top Center', 'elementor-services-post-control' ),
					'top left' => esc_html__( 'Top Left', 'elementor-services-post-control' ),
					'top right' => esc_html__( 'Top Right', 'elementor-services-post-control' ),
					'bottom center' => esc_html__( 'Bottom Center', 'elementor-services-post-control' ),
					'bottom left' => esc_html__( 'Bottom Left', 'elementor-services-post-control' ),
					'bottom right' => esc_html__( 'Bottom Right', 'elementor-services-post-control' ),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				'condition' => [
					'object-fit' => 'cover',
				],
			]
		);
		
		$this->end_controls_section();			
        
	}
		/**
	 * Get blog-post categories.
	 *
	 * Retrieve the blog-post categories to populate the category control.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return array blog-post categories.
	 */
	protected function get_post_blog_categories() {
		$categories = get_categories( array( 'taxonomy' => 'category' ) );
		$options = array();

		foreach ( $categories as $category ) {
			$options[ $category->term_id ] = $category->name;
		}
		return $options;
	}
	/**
	 * Render blog-post widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$number_of_post_blogs = $settings['number_of_post_blogs'];
		$category = $settings['resturant_post_blog_category'];
		$image_size = $settings['image_size']; // Get the selected image size
		// Get user-selected post order (ascending or descending)
		$post_order = ($settings['post_order'] === 'asc') ? 'ASC' : 'DESC';
		// Get user-selected sorting order (latest posts or alphabetical)
		$post_order_by = ($settings['post_order_by'] === 'date') ? 'date' : 'title';
		
		$args = array(
            'post_type'      => 'post',
            'posts_per_page' => $number_of_post_blogs,
            'order'          => $post_order,    // Use user-selected post order
            'orderby'        => $post_order_by, // Use user-selected sorting order
        );
       
        // Check if a specific category is selected
        if (!empty($category) && $category != 'post') {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'Name',
                    'terms'    => $category,
                ),
            );
        }
		
		$result = new WP_Query($args);
		
		if ($result->have_posts()) {
			echo '<div class="row" data-aos="fade-up">';
			$count = 0;
			while ($result->have_posts()) {
				$result->the_post();
				$post_id = get_the_ID();
				$meta = get_the_post_thumbnail(get_the_ID(), 'large');
				?>
				<div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="blogs-section">
                        <a href="<?php echo the_permalink(); ?>">
                            <div class="images-blog" data-aos="fade-up">
                                <figure class="mb-0">
									<?php echo get_the_post_thumbnail($post_id, $image_size); ?>
                                </figure>
                            </div>
                            <h5 class="blogs-h5"><?php the_title(); ?></h5>
							<?php
							$content = get_the_content();
							$trimmed_content = mb_strimwidth($content, 0, 100, ''); // Trim to 100 characters
							?>
							<p class="blogs-p"><?php echo $trimmed_content; ?></p>
                        </a>
                    </div>
                </div>
				<?php
			}
			echo '</div>';
		}
		?>
		<?php
	}

}

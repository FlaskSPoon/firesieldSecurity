<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor services-post Widget.
 *
 * Elementor widget that uses the services-post control.
 *
 * @since 1.0.0
 */
class Elementor_Services_Post_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve services-post widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'services-post';
    }

    /**
     * Get widget title.
     *
     * Retrieve services-post widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Services Post', 'elementor-services-post-control');
    }

    /**
     * Get widget icon.
     *
     * Retrieve services-post widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    /**
     * Register services-post widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-services-post-control'),
                'type' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'number_of_services_post',
            [
                'label' => __('Number of Projects', 'elementor-services-post-control'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6, // Set a default value
                'min' => 1,
                'max' => 21,
                'step' => 1,
            ]
        );
        $this->add_control(
            'selected_services',
            [
                'label' => esc_html__('Select Services', 'elementor-services-post-control'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_services_options(), // Define a function to get available services options
            ]
        );
        $this->add_control(
            'display_icon',
            [
                'label' => esc_html__('Display Button Icon', 'elementor-services-post-control'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'elementor-services-post-control'),
                'label_off' => esc_html__('No', 'elementor-services-post-control'),
                'default' => 'yes', // Set the default value to 'yes' if you want the icon to be displayed by default.
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'elementor-immersive-button-control'),
                'label_block' => true,
                'placeholder' => __('Read More', 'elementor-immersive-button-control'),
                'type' => 'text',
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
        $this->end_controls_section();
        $this->start_controls_section(
            'query_section',
            [
                'label' => esc_html__('Query Settings', 'your-text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ID' => esc_html__('Post ID', 'your-text-domain'),
                    'title' => esc_html__('Title', 'your-text-domain'),
                    'date' => esc_html__('Date', 'your-text-domain'),
                    // Add other options as needed
                ],
                'default' => 'ID', // Default order by Post ID
            ]
        );

        $this->add_control(
            'post_status',
            [
                'label' => esc_html__('Post Status', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'publish' => esc_html__('Publish', 'your-text-domain'),
                    'draft' => esc_html__('Draft', 'your-text-domain'),
                    // Add other options as needed
                ],
                'default' => 'publish', // Default post status is 'publish'
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__('Ascending', 'your-text-domain'),
                    'DESC' => esc_html__('Descending', 'your-text-domain'),
                ],
                'default' => 'ASC', // Default order is ascending
            ]
        );

        $this->end_controls_section();
    }

    private function get_services_options()
    {
        $options = [];
        $args = array(
            'post_type' => 'services-post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        $services = new WP_Query($args);

        if ($services->have_posts()) {
            while ($services->have_posts()) {
                $services->the_post();
                $options[get_the_ID()] = get_the_title();
            }
            wp_reset_postdata();
        }

        return $options;
    }

    /**
     * Render services-post widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $button_text = $settings['button_text'];
        $this->add_inline_editing_attributes('title_color', 'basic');
        $this->add_render_attribute('title_color', 'class', 'elementor-heading-title');
        $this->add_render_attribute('alignment', 'class', 'your-class');
        $selected_style=$settings['selected_style'];
        $display_icon = $settings['display_icon'];
        $number_of_services_post = $settings['number_of_services_post'];
        $selected_services = $settings['selected_services'];
        $args = array(
            'post_type' => 'services-post',
            'orderby' => $this->get_settings('orderby'),
            'post_status' => $this->get_settings('post_status'),
            'order' => $this->get_settings('order'),
            'posts_per_page' => $number_of_services_post,
            'post__in' => $selected_services, // Include only the selected services
        );

        $result = new WP_Query($args);
        if ($selected_style === 'style1') {
        echo '<div class="about-us-section-start ">';
        echo '<div class="row">';
        if ($result->have_posts()) {
            while ($result->have_posts()) {
                $result->the_post();
                $url = wp_get_attachment_url(get_post_thumbnail_id(), "post_thumbnail");
                $meta = get_post_meta(get_the_ID(), 'post_thumbnail', true);
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="about-us-content" data-aos="fade-up"
                            data-aos-anchor-placement="bottom-bottom">
                            <div class="icons-rounded-box">
                                <figure class="mb-0">
                                    <img src="<?php echo $meta ?>" alt="" class="img-fluid">
                                </figure>
                            </div>
                            <h4><?php echo get_the_title(); ?></h4>
                            <?php
                            $content = get_the_content();
                            $trimmed_content = mb_strimwidth($content, 0, 98, '');
                            ?>
                            <p class="security-services-p"><?php echo $trimmed_content ?></p>
                            <?php
                            if (!empty($button_text)) {
                                // User has set values, display them
                                ?>
                                <a href="<?php echo get_post_permalink(); ?>"
                                    class="text-decoration-none"><?php echo $settings['button_text'] ?><?php if ($display_icon === 'yes') { ?><span class="forword-arrow"><i
                                            class="fa fa-angle-right"></i></span><?php } ?></a>
                                <?php
                            } else {
                                // User hasn't set values, display the default text and icon
                                ?>
                                <a href="<?php echo get_post_permalink(); ?>"
                                    class="text-decoration-none ">Learn More <?php if ($display_icon === 'yes') { ?><span class="forword-arrow"><i
                                            class="fa fa-angle-right"></i></span><?php } ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
            }
        }
        echo '</div>';
        echo '</div>';
        }
        elseif ($selected_style === 'style2') {
            echo '<div class="about-us-section-start ">';
                echo '<div class="row">';
                if ($result->have_posts()) {
                    while ($result->have_posts()) {
                        $result->the_post();
                        $url = wp_get_attachment_url(get_post_thumbnail_id(), "post_thumbnail");
                        $meta = get_post_meta(get_the_ID(), 'post_thumbnail', true);
                        ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="about-us-content" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <div class="icons-rounded-box">
                                        <figure class="mb-0">
                                            <img src="<?php echo $meta ?>" alt="" class="img-fluid">
                                        </figure>
                                    </div>
                                    <h4><?php echo get_the_title(); ?></h4>
                                    <?php
                                    $content = get_the_content();
                                    $trimmed_content = mb_strimwidth($content, 0, 98, '');
                                    ?>
                                    <p class="security-services-p"><?php echo $trimmed_content ?></p>
                                    <?php
                                    if (!empty($button_text)) {
                                        // User has set values, display them
                                        ?>
                                        <a href="<?php echo get_post_permalink(); ?>"
                                            class="text-decoration-none"><?php echo $settings['button_text'] ?><?php if ($display_icon === 'yes') { ?><span class="forword-arrow"><i
                                                    class="fa fa-angle-right"></i></span><?php } ?></a>
                                        <?php
                                    } else {
                                        // User hasn't set values, display the default text and icon
                                        ?>
                                        <a href="<?php echo get_post_permalink(); ?>"
                                            class="text-decoration-none ">Learn More <?php if ($display_icon === 'yes') { ?><span class="forword-arrow"><i
                                                    class="fa fa-angle-right"></i></span><?php } ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                }
                echo '</div>';
                echo '</div>';
        }
    }
}

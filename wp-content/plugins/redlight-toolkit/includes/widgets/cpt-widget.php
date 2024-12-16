<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor cpt Widget.
 *
 * Elementor widget that uses the cpt control.
 *
 * @since 1.0.0
 */
class Elementor_Cpt_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve cpt widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'cpt';
    }

    /**
     * Get widget title.
     *
     * Retrieve cpt widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Case Studies', 'elementor-cpt-control');
    }

    /**
     * Get widget icon.
     *
     * Retrieve cpt widget icon.
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
     * Register cpt widget controls.
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
                'label' => esc_html__('Content', 'elementor-cpt-control'),
                'type' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'number_of_case_Studies_post',
            [
                'label' => __('Number of Posts', 'elementor-cpt-control'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6, // Set a default value
                'min' => 1,
                'max' => 21,
                'step' => 1,
            ]
        );
        $this->add_control(
            'selected_case_Studies',
            [
                'label' => esc_html__('Select Case Studies', 'elementor-cpt-control'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_case_Studies_options(), // Define a function to get available case_Studies options
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

    private function get_case_Studies_options()
    {
        $options = [];
        $args = array(
            'post_type' => 'case_study',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        $case_Studies = new WP_Query($args);

        if ($case_Studies->have_posts()) {
            while ($case_Studies->have_posts()) {
                $case_Studies->the_post();
                $options[get_the_ID()] = get_the_title();
            }
            wp_reset_postdata();
        }

        return $options;
    }

    /**
     * Render cpt widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $number_of_case_Studies_post = $settings['number_of_case_Studies_post'];
        $selected_case_Studies = $settings['selected_case_Studies'];
        $args = array(
            'post_type' => 'case_study',
            'orderby' => $this->get_settings('orderby'),
            'post_status' => $this->get_settings('post_status'),
            'order' => $this->get_settings('order'),
            'posts_per_page' => $number_of_case_Studies_post,
            'post__in' => $selected_case_Studies, // Include only the selected case_Studies
        );

        $result = new WP_Query($args);
        echo '<div class="cards-section">';
        echo '<div class="row">';
        if ($result->have_posts()) {
            while ($result->have_posts()) {
                $result->the_post();
                $url = wp_get_attachment_url(get_post_thumbnail_id(), "post_thumbnail");
                $meta = get_post_meta(get_the_ID(), 'post_thumbnail', true);
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-md-left text-center">
                    <a href="<?php echo get_post_permalink(); ?>"
                                        class="text-decoration-none ">
                        <div class="cards-outer outer-card1" data-aos="fade-up">
                            <h6 class="heading-background"><?php echo get_the_title(); ?></h6>
                            <p class="card-heading-p vertical-bar-line"><?php echo get_the_excerpt();?></p>
                            <p class="date-p"><?php echo get_the_date();?></p>
                        </div>
                    </a>
                </div>
                <?php
            }
        }
        echo '</div>';
        echo '</div>';
        ?>
        <?php
    }
}

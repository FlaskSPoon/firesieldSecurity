<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package redlight
 */
?>  
    <?php 
    $redlight_footer_type = get_theme_mod('footer_source_type');
    $redlight_footer_e = get_theme_mod('choose_elementor_footer');
        echo Elementor\Plugin::instance()
        ->frontend
            ->get_builder_content_for_display($redlight_footer_e); 
    ?>
    <?php do_action('redlight_footer_style');  ?>
</div><!-- #page -->

    <?php 
    wp_footer(); ?>
    </body>
</html>
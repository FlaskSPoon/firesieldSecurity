
jQuery(document).ready(function($) {
    if(typeof testimonial_settings !== "undefined"){
        var $testimonialspace = 30;
        var $testimonialspace_laptop = 20, $testimonialspace_tablet = 15, $testimonialspace_mobile = 10;
        
        if(typeof testimonial_settings['redlight_testimonial_space'] !== "undefined"){
            $testimonialspace = testimonial_settings['redlight_testimonial_space']['size']; 
        }
        if(typeof testimonial_settings['redlight_testimonial_space_laptop'] !== "undefined"){
            $testimonialspace_laptop = testimonial_settings['redlight_testimonial_space_laptop']['size'];
        }
        if(typeof testimonial_settings['redlight_testimonial_space_tablet'] !== "undefined"){
            $testimonialspace_tablet = testimonial_settings['redlight_testimonial_space_tablet']['size'];
        }
        if(typeof testimonial_settings['redlight_testimonial_space_mobile'] !== "undefined"){
            $testimonialspace_mobile = testimonial_settings['redlight_testimonial_space_mobile']['size'];
        }

        if(typeof testimonial_settings !== "undefined"){
        
        jQuery('.testimonial-carousel-section').owlCarousel({
            margin:30,
            responsiveClass:true,
            nav:testimonial_settings['redlight_show_nav'],
            items:testimonial_settings['redlight_slides_to_show'],
            dots: testimonial_settings['redlight_show_dots'],
            responsive:{
                0:{
                    items:1,
                    nav:testimonial_settings['redlight_show_nav'],
                    margin:30,
                    dots:testimonial_settings['redlight_show_dots_mobile'],
                },
                768:{
                    items:2,
                    nav:testimonial_settings['redlight_show_nav'],
                    margin:30,
                    dots: testimonial_settings['redlight_show_dots_tablet'],
                },
                1025:{
                    items:2,
                    nav:testimonial_settings['redlight_show_nav'],
                    margin:30,
                    dots: testimonial_settings['redlight_show_dots_laptop'],
                },
                1367:{
                        items:2,
                        nav:testimonial_settings['redlight_show_nav'],
                        margin:30,
                        dots: testimonial_settings['redlight_show_dots'],
                }
            }
        });
          
        }
}
jQuery('.testimonial-carousel-section2').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        500: {
            items: 1,
            margin: 15
        },
        768: {
            items: 2,
            margin: 15
        },
        1100: {
            items: 3
        }
    }
})
})




    

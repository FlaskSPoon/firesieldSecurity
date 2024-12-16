

jQuery(document).ready(function($) {
    if(typeof services_settings !== "undefined"){
        
        var $servicesspace = 30;
        var $servicesspace_laptop = 20, $servicesspace_tablet = 15, $servicesspace_mobile = 10;
        
        
        if(typeof services_settings['services_post_space'] !== "undefined" || services_settings['services_post_space'] != ""){
            $servicesspace = services_settings['services_post_space']['size']; 
        }
        if(typeof services_settings['services_post_space_laptop'] !== "undefined"){
            $servicesspace_laptop = services_settings['services_post_space_laptop']['size'];
        }
        if(typeof services_settings['services_post_space_tablet'] !== "undefined"){
            $servicesspace_tablet = services_settings['services_post_space_tablet']['size'];
        }
        if(typeof services_settings['services_post_space_mobile'] !== "undefined"){
            $servicesspace_mobile = services_settings['services_post_space_mobile']['size'];
        }

        if(typeof services_settings !== "undefined"){
            let dots = services_settings['services_show_dots'];
            let nav = services_settings['services_show_nav'];
        jQuery('.style2 .services_section .owl-carousel').owlCarousel({
            margin:$servicesspace,
            responsiveClass:true,
            loop: true,
            nav:(nav=='true')?true:false,
            items:services_settings['services_slides_to_show'],
            dots: (dots=='true')?true:false,
            responsive:{
                0:{
                    items:services_settings['services_slides_to_show_mobile'],
                    nav: (nav=='true')?true:false,
                    margin:$servicesspace_mobile,
                    dots: (dots=='true')?true:false,
                },
                768:{
                    items:services_settings['services_slides_to_show_tablet'],
                    nav: (nav=='true')?true:false,
                    margin:$servicesspace_tablet,
                    dots: (dots=='true')?true:false,
                },
                1025:{
                    items:services_settings['services_slides_to_show_laptop'],
                    nav: (nav=='true')?true:false,
                    margin:$servicesspace_laptop,
                    dots: (dots=='true')?true:false,
                },
                1367:{
                    items:services_settings['services_slides_to_show'],
                    nav: (nav=='true')?true:false,
                    margin:$servicesspace,
                    dots: (dots=='true')?true:false,
                }
            }
            
        });
        }
    }  
    jQuery('#search i').click(function(){
        jQuery('#search').submit();
    });
})




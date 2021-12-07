class EliteSmartTestimoniElementorHandler extends elementorModules.frontend.handlers.Base {
	
    getDefaultSettings() {
        return {
            selectors: {
                content: '.avb-testimonial-wrapper',
            },
        };
    }

    getDefaultElements() {
        const selectors = ( this.getSettings('selectors') );

        return {
            $content: this.$element.find(selectors.content),
        };
    }

    bindEvents() {
        this.elements.$content.slick({
			variableWidth: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            adaptiveHeight: true,
            autoplay: true,
            centerMode: false,
            focusOnSelect: true,
            autoplaySpeed: 2000,
            arrows: true,
            infinite: true,
            responsive: [{
                breakpoint: 769,
                settings: {
                    variableWidth: false,
                    centerMode: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });
    }
	
}

jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(EliteSmartTestimoniElementorHandler, {
            $element,
        });
    };
    // Add our handler to the my-elementor Widget (this is the slug we get from get_name() in PHP)
    elementorFrontend.hooks.addAction('frontend/element_ready/availhub_testimoni_carousel.default', addHandler);
})
(function ($) {
	$(document).ready(function () {
		$( ".avb-search-form" ).hide();
		$( ".avb-search-toggle" ).click(function() {
			$( ".avb-search-form" ).slideToggle();
		});
	});
	$(document).ready(function () {
		$('.avb-video-player').hide();
		$('.avb-vid-1').show();
		$('.avb-video-title').each(function(){
			 $(this).click(function(){
				  $('.avb-video-title.avb-title-' + $(this).index() + ' .avb-title-column').toggleClass('active')
				  $('.avb-video-player').hide();
				  $('.avb-vid-' + $(this).index()).show();
			 });
		});
	});

	// training filter listing
	$(document).ready(function(){
		let trainingCat = $('.avb-trainings-category-item').first().addClass("active").attr('value');
		let yearCat = $('.avb-trainings-category-year').first().addClass("active").attr('value');
		let catFilter = $('avb-trainings-category-listing-item input[name="cat-val"]').attr('value');
		let yearFilter = $('avb-trainings-category-listing-item input[name="cat-year"]').attr('value'); 
		let query = $('.avb-trainings-listing-wrapper').data('query');

		$('.avb-category-' + trainingCat).addClass("training-cat-active");
		$('input:checkbox[name="category"].avb-trainings-category-item').change( function(e){
			if ($(this).is(':checked') ){
				
				e.preventDefault();
				trainingCat = $(this).attr('value');
				catFilter = trainingCat;
				$(this).addClass("active");
				$('.avb-trainings-category-item').not($(this)).removeClass("active");
				$('.avb-trainings-category-item').not($(this)).prop( "checked", false );

				
			}else{
				$(this).removeClass("active");
				catFilter = "";
			}

			$.ajax({
				data: {
					action: "availhub_trainings_filter",
					query: query,
					catFilter: catFilter,
					yearFilter: yearFilter,
				},
				type: "POST",
				url: _avb.ajaxurl,

				success: function (response) {

					$('.avb-trainings-listing-wrapper__item').html(response);
					console.log(response);
				},
				
				error: function(response ){
					console.warn(response);
				},
			});
			
		});

		$('input:checkbox[name="year"].avb-trainings-category-year').change( function(e){
			if ($(this).is(':checked') ){
				
				e.preventDefault();
				yearCat = $(this).attr('value');
				yearFilter = yearCat;
				$(this).addClass("active");
				$('.avb-trainings-category-year').not($(this)).removeClass("active");
				$('.avb-trainings-category-year').not($(this)).prop( "checked", false );

				
			}else{
				$(this).removeClass("active");
				yearFilter = "";

			}

			$.ajax({
				data: {
					action: "availhub_trainings_filter",
					query: query,
					catFilter: catFilter,
					yearFilter: yearFilter,
				},
				type: "POST",
				url: _avb.ajaxurl,

				success: function (response) {
					
					$('.avb-trainings-listing-wrapper__item').html(response);
					console.log(response);
				},
				
				error: function(response ){
					console.warn(response);
				},
			});
			
		});
	});

	// pricing toggle
	$(document).ready(function(){
		$('.price-toggle').on('click', function(){
			$(this).toggleClass('monthly')
			$('.pricing-tables').toggle()
		})
	});
    

	
})(jQuery);
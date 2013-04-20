jQuery(document).ready(function(){
	jQuery('.show-info').on('click', function(){
		jQuery('.info').hide();
		jQuery(this).siblings('.info').fadeIn();
	});
	jQuery('.hide-info').on('click', function(){
		jQuery(this).parent('.info').hide();
	});
});


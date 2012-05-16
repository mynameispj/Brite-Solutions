jQuery(document).ready(function($) {
	
		
	$('.specialties').jCarouselLite({
        btnNext: '.next',
        btnPrev: '.prev',
        visible: 4
    });
		
	$('.specialties').find('img').each(function(){
		var imgSrc = $(this).attr('src'); 
		$(this).hide();
		$(this).parent('a').attr('style','background:url('+imgSrc+')'); 
	}); 

	$('.title').find('img').each(function(){
		var imgSrc = $(this).attr('src'); 
		$(this).hide();
		$(this).parent('div').attr('style','background:url('+imgSrc+')'); 
	}); 

	
	$('#main').find('p:first').addClass('lead'); 
	
	$('.control-group').find('input').wrap('<div class="controls">'); 
	$('.control-group').find('select').wrap('<div class="controls">'); 

	$('.control-group').find('.help-block').appendTo('#webform-component-services-youre-interested-in .controls'); 
	
	$('a.dropdown-toggle').dropdown(); 
	
	
	$('nav li').not('#menu-quote').find('a').click(function(){
		$('#menu-quote').removeAttr('class');
		$('.quoteform').hide();	
	}); 
	
	$('#menu-quote').find('a').click(function(){
		$('.quoteform').toggle(0,function(){
			if( $('.quoteform').is(':visible') ) {
				$('#menu-quote').addClass('open');
			}
			else {
				$('#menu-quote').removeAttr('class');
			}
		}); 
		
	}); 
	
	$('html').click(function(e) {
		if (e.srcElement.id != 'quote') {
			$('#menu-quote').removeAttr('class');
			$('.quoteform').hide();	
		}
	});
	
	$('.quoteform').click(function(e){
		e.stopPropagation();
	});

	
	
	$('nav li').hover(
		function () {
			$(this).find('.caret').addClass('over');
		},
		function () {
			$(this).find('.caret').removeClass('over');
		}
	);
	
	$('#edit-submitted-services-youre-interested-in').change(function() {
		var selectedService = $(this).find('option:selected').val(); 
		if (selectedService == 'other') {
			$('#webform-component-please-describe-what-other-services-you-are-interested-in').show(); 
		} else {
			$('#webform-component-please-describe-what-other-services-you-are-interested-in').hide(); 
		}
	}); 
	
});


/* optional triggers

$(window).load(function() {
	
});

$(window).resize(function() {
	
});

*/
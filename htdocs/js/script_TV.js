$(document).ready(function(){
	$('.slider').slick({
		arrows:true,
		dots:false,
		slidesToShow:3,
		variableWidth: false,
		autoplay:false,
		speed:1000,
		autoplaySpeed:2000,
		responsive:[
			{
				breakpoint: 1000,
				settings: {
					slidesToShow:2
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow:1
				}
			}
		]
	});
	$('.slider2').slick({
		arrows:false,
		dots:false,
		slidesToShow:2,
		autoplay:false,
		speed:1000,
		autoplaySpeed:2000,
		responsive:[
			{
				breakpoint: 1100,
				settings: {
					slidesToShow:1
				}
			}
		]
	});

	$('.slider3').slick({
		arrows:false,
		dots:false,
		slidesToShow:3,
		variableWidth: false,
		autoplay:false,
		speed:1000,
		autoplaySpeed:2000,
		responsive:[
			{
				breakpoint: 1000,
				settings: {
					slidesToShow:2
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow:1
				}
			}
		]
	});
	$('.slider4').slick({
		arrows:false,
		dots:false,
		slidesToShow:1,
		variableWidth: false,
		autoplay:true,
		speed:1000,
		autoplaySpeed:2000,
		responsive:[
			{
				breakpoint: 1000,
				settings: {
					slidesToShow:1
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow:1
				}
			}
		]
	});
	$('.slider5').slick({
		arrows:false,
		dots:false,
		slidesToShow:1,
		variableWidth: false,
		autoplay:false,
		speed:1000,
		autoplaySpeed:2000,
		
	});
});


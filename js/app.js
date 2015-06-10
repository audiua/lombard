$(document).ready(function () {
	var srcImg = $('.mini-img').find('img').filter('.active').attr('src');
	console.log($('.mini-img').find('img').filter('.active').attr('src'));
	// console.log();
	$('.big-img').find('img').attr('src', srcImg);

	$('.mini-img').find('img').click(function(e){
		$('.mini-img').find('img').filter('.active').removeClass('active');
		$('.big-img').find('img').attr('src', $(this).attr('src'));
		$(this).addClass('active');
	});
});
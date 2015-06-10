// JavaScript Document
$(document).ready(function () {
    defaultStyles();
    $('.left-menu a').hover(function (e) {
    	$('#slideshowHolder').fadeIn(100);
        $(this).attr('href') ? '' : e.preventDefault();
        var index = $(this).parents('.left-menu').find('a').index(this);
        $(this).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
        $('.tabs .tab').eq(index).fadeIn(1).siblings('div').fadeOut(2);
    });
    $('.left-menu .content').mouseleave(function(){
    	$('#slideshowHolder').fadeOut(100);
    });
    $('.tab-control a').click(function (e) {
        e.preventDefault();
        var index = $(this).parents('.tab-control').find('a').index(this);
        $(this).addClass('active').parent('li').siblings('li').children('a').removeClass('active');
        $(this).parents('.tab-control').next('.panes').children('.pane').eq(index).show().siblings('div').hide();
    });
    $('#content .dialog').each(function(){
    	$(this).appendTo('body')
    });
    
    var ci = 0, fader = $('#fader img');
    //fader
    setInterval(function(){
    	fader.eq(ci).fadeIn(500).siblings('img').fadeOut(500);
    	ci++;
    	if(ci >= 3){
    		ci = -1;
    	}
    }, 8000);
    
    var topCi = 0, topFade = $('header.page .banner img');
    //fader
    setInterval(function(){
    	topFade.eq(topCi).fadeIn(500).siblings('img').fadeOut(500);
    	topCi++;
    	if(topCi >= 3){
    		topCi = -1;
    	}
    }, 5000);

    //slides
    if ($('#slides .slide').size() > 0) {
        $('#slides .slide').each(function (index) {
            var img = $(this).children('img');
            for (var i = 0; i < 10; i++) {
                var src = img.attr('src');
                $(this).append('<div class="stripe s' + i + '" style="background-image: url(' + src + ');background-position:' + -1 * (75 * i) + 'px"></div>');
                if (index != 0) {
                    $(this).children('div').css({ opacity: 0 });
                }
            }
            img.css({ display: 'none' });
        });
        var slideIndex = 0, slide = $('#slides .slide');
        setInterval(function () {
            slideIndex++;
            slide.eq(slideIndex).css({ zIndex: 2 }).siblings().css({ zIndex: 1 });
            slide.eq(slideIndex).children('div').css({ opacity: 0 });
            for (var i = 0; i < 10; i++) {
                var st = 0;
                setTimeout(function () {
                    slide.eq(slideIndex).css({ zIndex: 2 }).siblings().css({ zIndex: 1 });
                    slide.eq(slideIndex).children('.stripe').eq(st).animate({ opacity: 1 }, 1000);
                    //$('#slides .slide:eq(' + slideIndex + ') .stripe:eq(' + st + ')').animate({ opacity: 1 }, 1000);
                    st++;
                }, 200 * i);
            }
            if (slideIndex >= slide.size()) {
                slideIndex = -1;
            }
        }, 4000);
    }
});
$(window).load(function(){
	
});
function defaultStyles(){
	$('ul, ol').each(function(){
	  $(this).children('li:first').addClass('first');
	  $(this).children('li:last').addClass('last');
	});
	$('aside.module.popular ul li:odd').addClass('odd');
	$('table tr:odd').addClass('odd');
	$('table tr:even').addClass('even');
	$('table tr').hover(function(){
		$(this).addClass('hover');
	}, function(){
		$(this).removeClass('hover');
	});
}
function showDialog(id, width){
	$('#'+id).css({top: $(document).scrollTop()+'px', width: width+'px', marginLeft: -width/2-10+'px'}).fadeIn(300);
	$('#shtorka').fadeIn(300);
}
function hideDialog(id){
	$('#'+id+', #shtorka').fadeOut(300);
}
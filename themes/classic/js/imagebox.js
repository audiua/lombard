// JavaScript Document

$(document).ready(function() { 

//imagebox code begin

	$('body').append('<div id="imagebox"><div id="imageborder"></div></div><div id="shadow"></div>');

	$('#imageborder').append('<img style="display:none;" src="" alt="" /><div id="video"></div><div id="imagepanel"></div>');

	$('#imagepanel').append('<div style="float:left;"><a id="imageprev" href="javascript:void(0)">назад</a></div><div style="float:right;"><a id="imagenext" href="javascript:void(0)">вперед</a></div><div style="width:100px; margin:0 auto; text-align:center;"><a id="imageclose" href="javascript:void(0)">закрыть</a></div>');

	$("#shadow").css({opacity: "0.7"});

	var last = $("a.imagebox").size()-1;

	$("a.imagebox").click(function(){

		var current = $(this);

		var index = $("a.imagebox").index(current);

		//alert(index);

		if(index == 0){

			$("#imageprev").hide();

		}

		if(index == last){

			$("#imagenext").hide();

		}

		var path = $(current).attr("href");

		$("a#imagenext").click(function(){

			$("#imageborder img").fadeOut(0);

			$("#imagepanel").slideUp(0);

			$("#imageborder").css({height:"16px", marginTop: "-8px", width:"16px", marginLeft: "-8px"});

			var next = $("a.imagebox").eq(index+1).attr("href");

			$("#imageborder img").attr({src: next});

			$("#imageprev").show();

			index = index+1;

			if(index == last){

				$("#imagenext").hide();

			}

			return false;

		});

		$("a#imageprev").click(function(){

			$("#imageborder img").fadeOut(0);

			$("#imagepanel").slideUp(0);

			$("#imageborder").css({height:"16px", marginTop: "-8px", width:"16px", marginLeft: "-8px"});

			var prev = $("a.imagebox").eq(index-1).attr("href");

			$("#imageborder img").attr({src: prev});

			$("#imagenext").show();

			index = index-1;

			if(index == 0){

				$("#imageprev").hide();

			}

			return false;

		});

		$("#shadow").fadeIn(800);

		$("#imagebox").fadeIn(1000);

		$("#imageborder").css({top: document.documentElement.scrollTop+300});

		$("#imageborder img").attr({src: path}).bind("load", function(){

			var img_w = $(this).width();

			var img_h = $(this).height();

			$("#imageborder").animate({height:img_h+24+"px", marginTop: -1*img_h/2+"px"}, 500, function(){

				$("#imageborder").animate({width:img_w+"px", marginLeft: -1*img_w/2+"px"}, 500, function(){

					$("#imageborder img").fadeIn();

					$("#imagepanel").slideDown(200);

				});

			});

		});

		return false;

	});

	$("#imageclose").click(function(){

		$("#imageborder img").fadeOut(0).attr({src: ""});

		$("#imagepanel").slideUp(0);

		$("#imageborder").animate({height:"16px", marginTop: "-8px"}, 200, function(){

			$("#imageborder").animate({width:"16px", marginLeft: "-8px"}, 200);

		});

		$("#shadow").fadeOut(200);

		$("#imagebox").fadeOut(200);

		$("#imagenext").show(0);

		$("#imageprev").show(0);

	});

	$("#shadow").click(function(){

		$("#imageborder img").fadeOut(0).attr({src: ""});

		$("#imagepanel").slideUp(0);

		$("#imageborder").animate({height:"16px", marginTop: "-8px"}, 200, function(){

			$("#imageborder").animate({width:"16px", marginLeft: "-8px"}, 200);

		});

		$("#shadow").fadeOut(200);

		$("#imagebox").fadeOut(200);

		$("#imagenext").show(0);

		$("#imageprev").show(0);

	});

	//imegabox code end

});
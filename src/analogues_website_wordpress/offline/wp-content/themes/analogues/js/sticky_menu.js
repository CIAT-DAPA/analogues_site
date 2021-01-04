$(document).ready(function(){
        var altura = $('#top-menu').offset().top;
	var window_width = $(window).width()
	// window.alert(altura);
	// window.alert(window_width);
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ) {
			$('#top-menu').addClass('menu-fixed');
			$('#top-menu').removeClass('container-fluid');

		//	$(".subnav").css("display","none");
		} else {
			$('#top-menu').removeClass('menu-fixed');
                        $('#top-menu').addClass('container-fluid');
		//	$(".subnav").css("display", "block");
		}
	});
 
});

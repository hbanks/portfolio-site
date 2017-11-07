$(function() {

	$('a[href*="'+window.location.hash+'"]').addClass('nav-active');

	// smooth scroll
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});

	// svg animation
	var svg3 = new Walkway({
	  selector: '#Layer_1',
	  duration: '3500',
	  easing: 'linear'

	});

	svg3.draw(function() {
	  console.log('Finished test shape!');
	});


	// when we scroll down the window, do this:
	$(window).scroll(function(){
	
		//Getting the scroll percentage
		var windowHeight = $(window).height();
		var scrollHeight = $(window).scrollTop();
		var scrollPercentage =  (scrollHeight / windowHeight);
		
		
		// if we have scrolled past 200, add the alternate class to nav bar
		if(scrollPercentage > 1) {
			$('body').addClass('scrolling');
		} else {
			$('body').removeClass('scrolling');
		}
		
	});

	$('input.focused1').on('click', function(){
		$('span.label1').removeClass('labelStart');
		$('span.label1').addClass('labelSlide');
	});

	$('input.focused2').on('click', function(){
		$('span.label2').removeClass('labelStart');
		$('span.label2').addClass('labelSlide');
	});

	$('input.focused3').on('click', function(){
		$('span.label3').removeClass('labelStart');
		$('span.label3').addClass('labelSlide');
	});

	$('textarea.focused4').on('click', function(){
		$('span.label4').removeClass('labelStart');
		$('span.label4').addClass('labelSlide');
	});

	// if inputs are empty
	$('input.focused1').blur(function() {
	     if(!$.trim(this.value).length) { // zero-length string AFTER a trim
	            $('span.label1').removeClass('labelSlide');
	            $('span.label1').addClass('labelStart');
	     }
	});

	$('input.focused2').blur(function() {
	     if(!$.trim(this.value).length) { // zero-length string AFTER a trim
	            $('span.label2').removeClass('labelSlide');
	            $('span.label2').addClass('labelStart');
	     }
	});

	$('input.focused3').blur(function() {
	     if(!$.trim(this.value).length) { // zero-length string AFTER a trim
	            $('span.label3').removeClass('labelSlide');
	            $('span.label3').addClass('labelStart');
	     }
	});

	$('textarea.focused4').blur(function() {
	     if(!$.trim(this.value).length) { // zero-length string AFTER a trim
	            $('span.label4').removeClass('labelSlide');
	            $('span.label4').addClass('labelStart');
	     }
	});

	// dropdown nav

	$('a.mobileNavIcon').on('click', function (e){
		e.preventDefault();
		$('ul.menu').toggleClass('open');
	});

	// apply the class of nav-active to the current nav link
	$('ul.menu a').on('click', function(e) {
		// e.preventDefault();
		$('a.nav-active').removeClass('nav-active');
		$(this).addClass('nav-active');
	});
});
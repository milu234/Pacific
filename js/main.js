/** 
 * ===================================================================
 * main js
 *
 * ------------------------------------------------------------------- 
 */ 

(function($) {

	"use strict";


	/*----------------------------------------------------*/
	/*	Sticky Navigation
	------------------------------------------------------*/
   $(window).on('scroll', function() {

		var y = $(window).scrollTop(),
		    topBar = $('header');
     
	   if (y > 1) {
	      topBar.addClass('sticky');
	   }
      else {
         topBar.removeClass('sticky');
      }
    
	});
	

	/*-----------------------------------------------------*/
  	/* Mobile Menu
   ------------------------------------------------------ */  
   var toggleButton = $('.menu-toggle'),
       nav = $('.main-navigation');

   toggleButton.on('click', function(event){
		event.preventDefault();

		toggleButton.toggleClass('is-clicked');
		nav.slideToggle();
	});

  	if (toggleButton.is(':visible')) nav.addClass('mobile');

  	$(window).resize(function() {
   	if (toggleButton.is(':visible')) nav.addClass('mobile');
    	else nav.removeClass('mobile');
  	});

  	$('#main-nav-wrap li a').on("click", function() {   

   	if (nav.hasClass('mobile')) {   		
   		toggleButton.toggleClass('is-clicked'); 
   		nav.fadeOut();   		
   	}     
  	});


   /*----------------------------------------------------*/
  	/* Highlight the current section in the navigation bar
  	------------------------------------------------------*/
	var sections = $("section");
	navigation_links = $("#main-nav-wrap li a");	

	sections.waypoint( {

       handler: function(direction) {

		   var active_section;

			active_section = $('section#' + this.element.id);

			if (direction === "up") active_section = active_section.prev();

			var active_link = $('#main-nav-wrap a[href="#' + active_section.attr("id") + '"]');			

         navigation_links.parent().removeClass("current");
			active_link.parent().addClass("current");

		}, 

		offset: '25%'

	});



	/*----------------------------------------------------*/
  	/* Smooth Scrolling
  	------------------------------------------------------*/
  	$('.smoothscroll').on('click', function (e) {
	 	
	 	e.preventDefault();

   	var target = this.hash,
    	$target = $(target);

    	$('html, body').stop().animate({
       	'scrollTop': $target.offset().top
      }, 800, 'swing', function () {
      	window.location.hash = target;
      });

	  });  
	  
	  $(function() { // DOM ready
		// If a link has a dropdown, add sub menu toggle.
		$('nav li a:not(:only-child)').click(function(e) {
		  $(this).siblings('.nav-dropdown').toggle();
		  // Close one dropdown when selecting another
		  $('.nav-dropdown').not($(this).siblings()).hide();
		  e.stopPropagation();
		});
		// Clicking away from dropdown will remove the dropdown class
		$('html').click(function() {
		  $('.nav-dropdown').hide();
		});
	  }); // end DOM ready

})(jQuery);


(function($) {
	"use strict";
	
		$(document).ready(function() {
		
		/*-----------------------------------------------------------------------------------*/
		/*  Home icon in main menu
		/*-----------------------------------------------------------------------------------*/ 
			$('.main-navigation .menu-item-home a').prepend('<i class="fa fa-home spaceRight"></i>');
			
		/*-----------------------------------------------------------------------------------*/
		/*  If the Tagcloud widget exist or Edit Comments Link exist
		/*-----------------------------------------------------------------------------------*/ 
			if ( $( '.comment-metadata' ).length ) {
				$('.comment-metadata').addClass('smallPart');
			}
			if ( $( '.reply' ).length ) {
				$('.reply').addClass('smallPart');
			}
			
		/*-----------------------------------------------------------------------------------*/
		/*  Search button
		/*-----------------------------------------------------------------------------------*/ 
			$('#open-search').click(function() {
				$('#search-full').fadeIn(400);
				if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				} else {
					$("#search-full .search-field").focus();
				}
			});

			$('#close-search').click(function() {
				$('#search-full').fadeOut(400);
			});
		
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
			if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			} else {
				
				/*-----------------------------------------------------------------------------------*/
				/*  Scroll To Top
				/*-----------------------------------------------------------------------------------*/ 
					$(window).scroll(function(){
						if ($(this).scrollTop() > 700) {
							$('#toTop').fadeIn();
						} 
						else {
							$('#toTop').fadeOut();
						}
					}); 
					$('#toTop').click(function(){
						$("html, body").animate({ scrollTop: 0 }, 1000);
						return false;
					});

			}
		
		});
	
})(jQuery);
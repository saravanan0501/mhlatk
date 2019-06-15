$(document).ready(function(){
	 
 
    
      /* Header Fixed Script */
$(window).scroll(function() {
  if ($(window).scrollTop() > 50) {
	$('header').addClass('IAmResized');
  } else {
	$('header').removeClass('IAmResized');
  }
});
$(window).load(function() {
  if ($(window).scrollTop() > 50) {
	$('header').addClass('IAmResized');
	$('.scroll_top').addClass('visble_scroll');
  } else {
	$('header').removeClass('IAmResized');
	 $('.scroll_top').removeClass('visble_scroll');
  }  
});	
    
   $('.click_search').click(function(){
    $(this).toggleClass('remove_icon')
   $('.mobile_search').slideToggle(500); 
    
}); 
    
    $('.responsive_menu_icon').click(function(){
    $('.responsive_bar_popup').toggleClass('nav_visible');  
}); 
    
     $('.res_close_popup p').click(function(){
    $('.responsive_bar_popup').removeClass('nav_visible');  
}); 
 
 
                        $('.scroll_top p').click(function() {
                            $('html, body').animate({
                                scrollTop: 0
                            }, 800);
                            return false;
                        });
     
    
    
    
    });


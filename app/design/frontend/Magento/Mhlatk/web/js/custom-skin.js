$(document).ready(function(){
	 
    $('#tabs li a').click(function(){
  var t = $(this).attr('id');

  if($(this).hasClass('inactive')){ 
    $('#tabs li a').addClass('inactive');           
    $(this).removeClass('inactive');

    $('.tab_content').hide();
    $('#'+ t + 'C').fadeIn('slow');
 }
});
 
    
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
     
 
             $('.main_prveiw').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.photo_thumb'
});
$('.photo_thumb').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.main_prveiw',
  dots: false,
  centerMode: true,
  focusOnSelect: true
});
           
    
    });


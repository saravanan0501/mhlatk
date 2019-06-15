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
  } else {
	$('header').removeClass('IAmResized');
  }
    
    
$('.click_search').click(function(){
    $(this).toggleClass('remove_icon')
   $('.mobile_search').slideToggle(500); 
    
});    
    
    
    
    
});
  
 
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  
});	




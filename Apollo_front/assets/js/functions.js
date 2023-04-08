$( document ).ready(function() {
	
function nav(){
	
	$('.nav-toggle').click(function(){
		
		$('.nav').toggleClass('open');
		
	});
	
}

function smoothScroll(){
	
	$('a[href^="#"]').click(function(event){
		
		var target = $($(this).attr('href'));

    if (target.length){
      event.preventDefault();
      $('html, body').animate({
	      scrollTop: target.offset().top - 15
      }, 300);
    }
		
		$('.nav').toggleClass('open');
		
	});
	
}

function fullSlider(){

	$('#full-slide .prev, #full-slide .next').click(function(){
		
		var $this = $(this),
				current = $('.banner').find('.active'),
				position = $('.banner').children().index(current),
				totalPics = $('.banner').children().length;
				
		if ($this.hasClass('next')){
			
			if (position < totalPics - 1){
				$('.active').removeClass('active').next().addClass('active');
			}
			
			else {	
				$('.banner li').removeClass('active').first().addClass('active');
			}
			
		}
		
		else {
			
			if (position === 0){
				$('.banner li').removeClass('active').last().addClass('active');
			}
			
			else {
				$('.active').removeClass('active').prev().addClass('active');
			}
			
		}
		
	});

}




nav();

smoothScroll();

fullSlider();



});

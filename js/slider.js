$(function(){

	var curSlide = 0;
	var maxSlide = $('.banner-single').length;
	var delay = 3;
	
	initSlider();
	changeSlide();

	//Cria os Bullets dinamicamente
	function initSlider(){
		$('.banner-single').hide();
		$('.banner-single').eq(0).show();
		for (var i = 0; i < maxSlide+1; i++) {
			var content = $('.bullets').html();
			if(i == 0){
				content+='<span class="active-slider"></span>';
			}else{
				content+='<span></span>';
				$('.bullets').html(content);
			}
		}
	}

	//Faz animação do slide em tempo real
	function changeSlide(){
		setInterval(function(){
			$('.banner-single').eq(curSlide).stop().fadeOut(2000);
			curSlide++;
			if(curSlide > maxSlide)
				curSlide = 0;
			$('.banner-single').eq(curSlide).fadeIn(2000);
			// Trocar bullets da navegação do slider!
			$('.bullets span').removeClass('active-slider');
			$('.bullets span').eq(curSlide).addClass('active-slider');
		},delay * 1000);
	}

	//Altera os Bullets ao clicar
	$('body').on('click','.bullets span',function(){
		var currentBullet = $(this);
		$('.banner-single').eq(curSlide).stop().fadeOut(1000);
		curSlide = currentBullet.index();
		$('.banner-single').eq(curSlide).stop().fadeIn(1000);
		$('.bullets span').removeClass('active-slider');
		currentBullet.addClass('active-slider');
	});

})
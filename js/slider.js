$(function(){

	var curSlide = 0;
	var maxSlide = $('.banner-single').length;
	var delay = 3;
	
	initSlider();
	changeSlide();

	//Cria os Bullets dinamicamente
	function initSlider(){
		$('.banner-single').css('opacity','1');
		$('.banner-single').css('opacity','1');
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
			$('.banner-single').eq(curSlide).animate({'opacity':'0'},1000);
			curSlide++;
			if(curSlide > maxSlide)
				curSlide = 0;
			$('.banner-single').eq(curSlide).animate({'opacity':'1'},1000);
			// Trocar bullets da navegação do slider!
			$('.bullets span').removeClass('active-slider');
			$('.bullets span').eq(curSlide).addClass('active-slider');
		},delay * 1000);
	}

	//Altera os Bullets ao clicar
	$('body').on('click','.bullets span',function(){
		var currentBullet = $(this);
		$('.banner-single').eq(curSlide).animate({'opacity':'0'},2000);
		curSlide = currentBullet.index();
		$('.banner-single').eq(curSlide).animate({'opacity':'1'},2000);;
		$('.bullets span').removeClass('active-slider');
		currentBullet.addClass('active-slider');
	});

})
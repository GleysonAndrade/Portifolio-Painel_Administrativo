// Referência : https://api.jquery.com/category/events/
$(function(){
	// Aqui vai todo nosso código de javascript
	$('nav.mobile').click(function(){
		// o que vai acontecer quando clicar na nav mobile
		var listaMenu = $('nav.mobile ul');
		//Abrir menu com o fadein
		//verifica se o menu está aberto ou fechado

		// if(listaMenu.is(':hidden') == true){
		// 	listaMenu.fadeIn();
		// }
		// else{
		// 	listaMenu.fadeOut();
		// }

		//Abrir ou fechar sem efeitos
		// if(listaMenu.is(':hidden') == true){
		// 	listaMenu.show();
		// }
		// else{
		// 	listaMenu.hide();
		// }

		//Abrir ou fechar sem efeitos com css
		// if(listaMenu.is(':hidden') == true){
		// 	listaMenu.css('display', 'block');
		// }
		// else{
		// 	listaMenu.css('display', 'none');
		// }

		//Abrir ou fechar o menu com efeito
		//Verificar se menu está aberto ou fechado
		if(listaMenu.is(':hidden') == true){
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times')
			listaMenu.slideToggle();
		}
		else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars')
			listaMenu.slideToggle();
		}

	})
});
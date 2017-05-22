// JavaScript Document
$(function() {	
	$( window ).resize(function() {
		reSize();
	});
	reSize();
	$('.svg').inlineSVG();
});
function reSize(){
	var $colH=$('footer .suscribir').height();
	$('footer .suscribir > .col-sm-6').height($colH);
	/*if($('#encuestas').length){
		var $altura = 0;
		$.each($('#encuestas .normal'),function(key,val){
			$altura = $(val).height();
			$(val).find('.bg').height($altura);
		})
	}*/
}
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
}
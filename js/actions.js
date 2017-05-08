// JavaScript Document
$(function() {	
	$( window ).resize(function() {
		reSize();
	});
	reSize();
	$('.svg').inlineSVG();
});
function reSize(){
	var $iframeW=$('.mapa .map').width();
	$('.mapa iframe').width($iframeW);
}
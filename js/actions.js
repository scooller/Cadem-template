// JavaScript Document
$(function() {
	$(window).load(function(){
		$('.gral-content').addClass('show');
		$('.load').hide();
	});
	if($('#encuestas').length){
		$('#encuestas .normal .bg').each(function(index,key){
			$img=$(this).data('bg');
			
		});
	}
	$('#metodo .title.bold a').click(function(event){
		event.preventDefault;
		var $target=$(this).attr('href');
		console.log($target);
		$($target).addClass('active');
		return false;
	});
	$('.mini-menu.anim i.cerrar').click(function(event){
		event.preventDefault;
		$(this).parent('.mini-menu.anim').removeClass('active');
		return false;
	})
	//--
	$( window ).resize(function() {
		reSize();
	});
	reSize();
	$('.svg').inlineSVG();
	//Herramientas
	$("#CalcularTamano").submit(function(event){
		event.preventDefault;
		var S = 0;
		var N = 0;
		var Z = 0;
		var Er = 0;
		var UNIVERSO = 0;
		var MUESTRA = 0;
		S = parseFloat($('select[name="varianza"]').val());
		S = S*(1-S)
		Z = parseFloat($('select[name="confianza"]').val());
		Er =  parseFloat($('select[name="erroraceptable"]').val());
		UNIVERSO = $('input[name="tamanouniverso"]').val();
		
		MUESTRA = (Z*Z*S)/(Er*Er);

		if (UNIVERSO !='INFINITO' && UNIVERSO!=''){
			N=parseFloat(UNIVERSO);
			MUESTRA=(Z*Z*S*N) / ( (Er*Er*N) + (Z*Z*S));
		}
		$('input[name="resultado"]').val(MUESTRA.toFixed(0));
		return false;
    });
	//--
	if($("#CalcularDiferencia .comentarioDiferencia").length){
		$("#CalcularDiferencia .comentarioDiferencia").hide();
	}
	$("#CalcularDiferencia").submit(function(event){
		event.preventDefault;
		if ($('input[name="txt_m1"]').val() !=="" && $('input[name="txt_m2"]').val() !=="" && $('input[name="txt_v1"]').val() !=="" && $('input[name="txt_v2"]').val() !== "" ){
			if (parseFloat($('input[name="txt_m1"]').val()) !==0 && parseFloat($('input[name="txt_m2"]').val()) !==0 ){
				m1 =parseFloat($('input[name="txt_m1"]').val());
				m2 =parseFloat($('input[name="txt_m2"]').val());
				V1 =parseFloat($('input[name="txt_v1"]').val());
				V2 =parseFloat($('input[name="txt_v2"]').val());
				test_informe(m1, m2, V1, V2);
			}else {
				alert("los valores de Número de respuestas no pueden ser 0");
			}
		}else{
				alert("Debe completar todos los valores");
		
		}
		return false;
    });
	function test_informe(m1, m2, V1, V2){
		dif = 0;
		dec = 0;
		Val=0;
		valor_alcanzado = "nopaso";

		CONSTANTE = parseFloat($('#CalcularDiferencia select[name="cmb_z"]').val());
		if ( m1 != 0  &&  m2 != 0 ) {
			Val = (V1 * (1 - V1) / m1) + (V2 * (1 - V2) / m2);
			dec = Math.sqrt(Math.abs(Val));
		}
		if (dec !=0)
			dif = (V2 - V1) / dec;

		if (dif <= CONSTANTE )
			valor_alcanzado = "No exite diferencia significativa";

		if (dif < -CONSTANTE )
			valor_alcanzado = "El grupo 2 tiene menor proporción en la variable que el grupo 1";

		if (dif > CONSTANTE )
			valor_alcanzado = "El grupo 2 tiene mayor  proporción en la variable que el grupo 1";

		$('#CalcularDiferencia input[name="resultado2Diferencia"]').val(dif.toFixed(3));
		$('#CalcularDiferencia input[name="resultado1Diferencia"]').val( CONSTANTE );
		$("#CalcularDiferencia .comentarioDiferencia").html( '<i class="icon-info-circled"></i> '+valor_alcanzado ).show();
         return false;
    }
	//fancybox
	$(".fancy.inline").click(function(event){
		event.preventDefault;
		var $src=$(this).children('a').attr('href');
		console.log($src);
		$.fancybox.open({
			src		: $src,
			type	: 'inline'
		});
		return false;
	});
	
});
function reSize(){
	var $navH=$('nav.navbar').height();
	var $colH=$('footer .suscribir').height();
	$('body .gral-content').css('padding-top',$navH-4);
	$('footer .suscribir > .col-sm-6').height($colH);
	if($('.row.no-glutter').length){
		var $tam=$('.row.no-glutter').height();
		$('.row.no-glutter div[class^="col-"]').height($tam);
	}
}
// JavaScript Document
var isMobile = false; //initiate as false
$(function() {	
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
	
	$(window).load(function(){
		$('.gral-content').addClass('show');
		$('.load').hide();
		$('#nf-form-1-cont input[type="email"]').attr('placeholder','nombre@email.com');
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
		$('nav.navbar-fixed-top .navbar-toggle[type="button"]').addClass('collapsed');
		$('nav.navbar-fixed-top #navbar-collapse').removeClass('in');
		return false;
	});
	if(!$('body.home').length){
		var href=$('ul#gral-menu #menu-item-5 a').attr('href');
		$('ul#gral-menu #menu-item-5 a').attr('href','/'+href);
	}else{
		$('ul#gral-menu #menu-item-5 a').click(function(e){
			e.preventDefault();
			$(this).parents('li').addClass('current-menu-item');
			var href=$(this).attr('href');
			$(".gral-content").animate({scrollTop: $(href).offset().top-$('nav.navbar-fixed-top').height() }, '500');
			return false;
		});		
	}
});
function reSize(){
	var $navH=0;
	if(!isMobile){
		$navH=$('nav.navbar-fixed-top').height();
	}else{
		$navH=$('nav.navbar-fixed-top .navbar-header').height();
		$('#gral-menu').height($(window).height()-$navH);
	}
	var $colH=$('footer .suscribir').height();
	$('body .gral-content').css('padding-top',$navH-4);
	
	$('footer .suscribir > .col-sm-6').height($colH);
	if($('.row.no-glutter').length){
		var $tam=$(window).height();
		$('.row.no-glutter div[class^="col-"]').height($tam-$navH);
	}
}